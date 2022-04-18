<?php
namespace App\Http\Livewire\User;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jenssegers\Agent\Agent;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class Password extends Component
{
    use WithFileUploads;

    public Collection $sessions;

    public string $current_password = '';

    public string $password_confirmation = '';

    public string $session_password = '';

    public string $password = '';

    public bool $showDeleteOtherSessionModal = false;

    public function rules(): array
    {
        return [
            'current_password' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function mount()
    {
    }

    public function save()
    {
        $validatedData = $this->validate();

        if (!auth()->validate([

            'email' => auth()->user()->email,

            'password' => $validatedData['current_password'],
        ])) {

            throw ValidationException::withMessages([

                'password' => __('auth.password'),

            ]);
        }

        $user = auth()->user()->forceFill([

            'password' => Hash::make($validatedData['password']),

            'remember_token' => Str::random(60),

        ])->save();

        event(new PasswordReset($user));

        $this->resetValidation();

        $this->notify('The User has been successfully updated');
    }

    public function showDeleteOtherSession()
    {
        $this->resetValidation();

        $this->showDeleteOtherSessionModal = true;
    }

    public function deleteOtherSession()
    {
        if (!Hash::check($this->session_password, auth()->user()->password)) {

            throw ValidationException::withMessages([

                'session_password' => [__('This password does not match our records.')],

            ]);
        }

        auth()->logoutOtherDevices($this->session_password);

        $this->deleteOtherSessionRecords();

        $this->showDeleteOtherSessionModal = false;
    }

    protected function deleteOtherSessionRecords()
    {
        if (config('session.driver') !== 'database') {

            return;

        }

        DB::table(config('session.table', 'sessions'))

            ->where('user_id', auth()->user()->getAuthIdentifier())

            ->where('id', '!=', request()->session()->getId())

            ->delete();
    }


    private function collect(): Collection
    {
        if (config('session.driver') !== 'database') {

            return collect();

        }

        return collect(DB::table(config('session.table', 'sessions'))

            ->where('user_id', auth()->user()->getAuthIdentifier())

            ->orderBy('last_activity', 'desc')

            ->get())->map(function ($session) {

                return (object) $this->sessionList($session);

            });
    }

    private function sessionList($session): array
    {
        $agent = $this->createAgent($session);

        return  [

            'key' => $session->id,

            'agent' => (object)[

                'is_desktop' => $agent->isDesktop(),

                'platform' => $agent->platform(),

                'browser' => $agent->browser(),

            ],

            'ip_address' => $session->ip_address,

            'is_current_device' => $session->id === request()->session()->getId(),

            'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
        ];
    }

    private function createAgent($session)
    {
        return tap(new Agent, function ($agent) use ($session) {

            $agent->setUserAgent($session->user_agent);

        });
    }

    public function render()
    {
        return view('livewire.user.password', [

            'browserSessions' => $this->collect()

        ]);
    }
}
