<?php
namespace App\Http\Livewire\Button;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Toggle extends Component
{
    public Model $model;

    public string $field;

    public bool $isActive;

    public function mount()
    {
        $this->isActive = $this->model->getAttribute($this->field);
    }

    public function updatedIsActive(bool $value)
    {
        $this->model->setAttribute($this->field, $value);
    }

    public function render()
    {
        return view('livewire.button.toggle');
    }
}
