<?php
namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Admin\Datatable\WithBulkActions;
use App\Http\Livewire\Admin\Datatable\WithCachedRows;
use App\Http\Livewire\Admin\Datatable\WithPerPagePagination;
use App\Http\Livewire\Admin\Datatable\WithRoles;
use App\Http\Livewire\Admin\Datatable\WithSorting;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection as StatesCollection;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class UsersDatatable extends Component
{
    use WithSorting;

    use WithPerPagePagination;

    use WithBulkActions;

    use WithCachedRows;

    use WithRoles;

    use WithFileUploads;

    public bool $showDeleteModal = false;

    public bool $showEditModal = false;

    public bool $showFilters = false;

    public bool $showEditor = false;

    public int $selectedState = 1;

    public StatesCollection $states;

    public string $categoryType = 'industry';

    public $avatar;

    public User $editing;

    protected $queryString = [
        'sortField' => ['except' => 'id'],
        'sortDirection' => ['except' => 'asc'],
        'sorts'
    ];

    protected $listeners = ['refreshTransactions' => '$refresh'];

    public array $filters = [
        'search' => '',
        'date-min' => null,
        'date-max' => null,
    ];

    public function rules(): array
    {
        return [
            'editing.name' => 'required|min:3',
            'editing.email' => 'required|max:255|unique:users,email,' . $this->editing->id,
            'selectedRole' => 'required|int',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
        ];
    }

    public function mount()
    {
        $this->editing = $this->makeBlankUser();
    }

    private function makeBlankUser(): Model|User
    {
        return User::make();
    }

    public function toggleShowFilters()
    {
        $this->useCachedRows();

        $this->showFilters = !$this->showFilters;
    }

    public function resetFilters()
    {
        $this->resetPage();

        $this->reset('sortField', 'sortDirection', 'filters', 'sorts');
    }

    public function create()
    {
        $this->useCachedRows();

        if ($this->editing->getKey()) {
            $this->editing = $this->makeBlankUser();
        }

        $this->showEditModal = true;
    }

    public function edit(User $user)
    {
        $this->useCachedRows();

        $this->resetValidation();

        if ($this->editing->isNot($user)) {
            $this->editing = $user->load('roles:id,name');

            $this->setDefaultRole();

            $this->avatar = null;
        }

        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        if (!$this->editing->getKey()) {

            $this->editing->password = bcrypt(Str::random(10));

            $this->editing->attachTeam(auth()->user()->currentTeam);

            $this->editing->email_verified_at = now();
        }

        $this->editing->save();

        if (isset($this->avatar)) {
            $this->editing->updateAvatar($this->avatar);
        }

        $this->editing->syncRoles($this->selectedRole);

        $this->showEditModal = false;

        $this->notify('The user has been successfully updated');
    }

    public function deleteSelected()
    {
        $deleteCount = $this->selectedRowsQuery->count();

        $this->selectedRowsQuery->delete();

        $this->showDeleteModal = false;

        $this->notify('You\'ve deleted ' . $deleteCount . ' users');
    }

    public function getRowsQueryProperty()
    {
        $query = User::query()

            ->with(['roles:id,name', 'lastLogin'])

            ->when($this->filters['search'], fn ($query, $search) => $query->search($search))

            ->when($this->filters['date-min'], fn ($query, $date) => $query->where('created_at', '>=', Carbon::parse($date)))

            ->when($this->filters['date-max'], fn ($query, $date) => $query->where('created_at', '<=', Carbon::parse($date)));

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(fn () => $this->applyPagination($this->rowsQuery));
    }

    public function render()
    {
        return view('livewire.admin.users-datatable', [

            'rows' => $this->rows

        ]);
    }
}
