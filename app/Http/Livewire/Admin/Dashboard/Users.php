<?php
namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard.users', ['rows' => User::all()]);
    }
}
