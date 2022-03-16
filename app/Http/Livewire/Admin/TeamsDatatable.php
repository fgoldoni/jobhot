<?php
namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Admin\Datatable\WithBulkActions;
use App\Http\Livewire\Admin\Datatable\WithCachedRows;
use App\Http\Livewire\Admin\Datatable\WithPerPagePagination;
use App\Http\Livewire\Admin\Datatable\WithSorting;
use App\Mail\TeamInvitation;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mpociot\Teamwork\Exceptions\UserNotInTeamException;
use Mpociot\Teamwork\Facades\Teamwork;
use Mpociot\Teamwork\TeamInvite;

class TeamsDatatable extends Component
{
    use WithSorting;

    use WithPerPagePagination;

    use WithBulkActions;

    use WithCachedRows;

    use WithFileUploads;

    public bool $showDeleteModal = false;

    public bool $showEditModal = false;

    public bool $showMemberModal = false;

    public bool $showDeleteMemberModal = false;

    public bool $showFilters = false;

    public string $email = '';

    public Team $editing;

    public User|null $removeUser = null;

    protected $queryString = ['sorts'];

    protected $listeners = [];

    public array $filters = [
        'search' => '',
        'email' => '',
        'date-min' => null,
        'date-max' => null,
    ];

    public function rules(): array
    {
        return [
            'editing.name' => ['required', 'string', 'max:255'],
            'editing.owner_id' => 'required',
        ];
    }

    public function mount()
    {
        $this->editing = $this->makeBlankTeam();
    }

    public function toggleShowFilters()
    {
        $this->useCachedRows();

        $this->showFilters = !$this->showFilters;
    }

    public function resetFilters()
    {
        $this->resetPage();
        $this->reset('filters', 'sorts');
    }

    public function exportSelected()
    {
        return response()->streamDownload(function () {
            echo $this->selectedRowsQuery->toCsv();
        }, 'teams.csv');
    }

    public function create()
    {
        $this->useCachedRows();

        $this->resetValidation();

        if ($this->editing->getKey()) {
            $this->editing = $this->makeBlankTeam();
        }

        $this->showEditModal = true;
    }

    public function edit(Team $team)
    {
        $this->useCachedRows();

        $this->resetValidation();

        if ($this->editing->isNot($team)) {
            $this->editing = $team->load('owner', 'users', 'invites');
        }

        $this->showEditModal = true;
    }

    public function switchTeam(Team $team)
    {
        try {
            auth()->user()->switchTeam($team);
        } catch (UserNotInTeamException $e) {
            abort(403);
        }

        $this->notify('The team has been successfully switched');
    }

    public function save()
    {
        $this->editing->save();

        auth()->user()->attachTeam($this->editing);

        $this->showEditModal = false;

        $this->notify('The team has been successfully saved');
    }

    public function deleteSelected()
    {
        $deleteCount = $this->selectedRowsQuery->count();

        //$this->selectedRowsQuery->delete();

        $this->showDeleteModal = false;

        $this->notify('You\'ve deleted ' . $deleteCount . ' companies');
    }

    public function getRowsQueryProperty()
    {
        $query = auth()->user()->teams()
            ->with(['owner:id,name', 'users:id,name', 'invites:id,team_id'])
            ->when($this->filters['search'], fn ($query, $search) => $query->search($search))
            ->when($this->filters['date-min'], fn ($query, $date) => $query->where('created_at', '>=', Carbon::parse($date)))
            ->when($this->filters['date-max'], fn ($query, $date) => $query->where('created_at', '<=', Carbon::parse($date)));

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(fn () => $this->applyPagination($this->rowsQuery));
    }

    private function makeBlankTeam(): Model|Team
    {
        return Team::make(['owner_id' => auth()->user()->id]);
    }

    public function members(Team $team)
    {
        $this->useCachedRows();

        $this->resetValidation();

        if ($this->editing->isNot($team)) {
            $this->editing = $team->load('owner', 'users', 'invites');
            $this->reset('email');
        }

        $this->showMemberModal = true;
    }

    public function invite()
    {
        $validatedData = $this->validate([
            'email' => 'required|email',
        ]);

        if (!Teamwork::hasPendingInvite($validatedData['email'], $this->editing)) {
            Teamwork::inviteToTeam($validatedData['email'], $this->editing, function ($invite) {
                Mail::to($invite->email)->send(new TeamInvitation($invite));
            });

            $this->editing->load('invites');
        } else {
            $this->notify('The email address is already invited to the team.');
        }
    }

    public function resendInvite(TeamInvite $invite)
    {
        Mail::to($invite->email)->send(new TeamInvitation($invite));

        $this->resetValidation();

        $this->notify('The email address is already invited to the team.');
    }

    public function removeMember(User $user)
    {
        $this->removeUser = $user;

        $this->showDeleteMemberModal = true;
    }

    public function cancelInvite(TeamInvite $invite)
    {
        Teamwork::denyInvite($invite);

        $this->editing->load('invites');
    }

    public function removeTeamMember()
    {
        if (!auth()->user()->isOwnerOfTeam($this->editing)) {
            abort(403);
        }

        if ($this->removeUser->getKey() === auth()->user()->getKey()) {
            abort(403);
        }

        $this->removeUser->detachTeam($this->editing);

        $this->showDeleteMemberModal = false;

        $this->editing->load('users');

        $this->notify('You\'ve removed ' . $this->removeUser->name . ' from the team');
    }

    public function render()
    {
        return view('livewire.admin.teams-datatable', [
            'rows' => $this->rows
        ]);
    }
}
