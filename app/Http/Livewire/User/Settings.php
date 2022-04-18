<?php
namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Settings extends Component
{
    use WithFileUploads;

    public $avatar;

    public User $editing;

    public function rules(): array
    {
        return [
            'editing.name' => ['required', 'string', 'max:255'],
            'editing.email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->editing->id)],
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ];
    }

    public function mount(AuthManager $auth)
    {
        $this->editing = User::find($auth->user()->id);
    }

    public function save()
    {
        $this->validate();

        $this->editing->save();

        if (isset($this->avatar)) {
            $this->editing->updateAvatar($this->avatar);
        }

        $this->notify('The User has been successfully updated');
    }

    public function render()
    {
        return view('livewire.user.settings');
    }
}
