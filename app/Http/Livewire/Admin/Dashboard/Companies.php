<?php
namespace App\Http\Livewire\Admin\Dashboard;

use App\Http\Livewire\Admin\Datatable\WithCachedRows;
use App\Models\Company;
use Livewire\Component;

class Companies extends Component
{
    use WithCachedRows;

    public function render()
    {
        return view('livewire.admin.dashboard.companies', ['rows' => Company::inTeam()->count()]);
    }
}
