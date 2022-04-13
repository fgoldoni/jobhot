<?php
namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Job;
use Livewire\Component;

class Jobs extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard.jobs', ['rows' => Job::inTeam()->count()]);
    }
}
