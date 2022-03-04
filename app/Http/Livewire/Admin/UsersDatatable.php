<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UsersDatatable extends Component
{
    public function render()
    {
        return view('livewire.admin.users-datatable', [
            'rows' => User::paginate(5),
        ]);
    }
}
