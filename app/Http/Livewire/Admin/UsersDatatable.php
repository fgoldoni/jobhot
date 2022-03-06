<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UsersDatatable extends Component
{
    public function test() {
        dd('test');
    }

    public function render()
    {
        return view('livewire.admin.users-datatable', [
            'rows' => User::with(['roles:id,name'])->paginate(5),
        ]);
    }
}
