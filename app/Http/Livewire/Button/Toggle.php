<?php
namespace App\Http\Livewire\Button;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Toggle extends Component
{
    public Model $model;

    public string $field;

    public bool $isActive;

    public function mount()
    {
        $this->isActive = !is_null($this->model->getAttribute($this->field));
    }

    public function updatedIsActive(bool $value)
    {
        $value ? $this->model->setAttribute($this->field, now())->save() : $this->model->setAttribute($this->field, null)->save();
    }

    public function resendEmailVerificationNotification()
    {
        if ($this->model instanceof MustVerifyEmail) {
            $this->model->sendEmailVerificationNotification();
            $this->notify('A fresh verification link has been sent to your email address.');
        }
    }

    public function render()
    {
        return view('livewire.button.toggle');
    }
}
