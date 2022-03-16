<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;

class Teams extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard.teams', ['rows' => auth()->user()->teams()->get()]);
    }
}
