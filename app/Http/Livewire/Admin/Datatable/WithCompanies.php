<?php
namespace App\Http\Livewire\Admin\Datatable;

use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;

trait WithCompanies
{
    public function mountWithCompanies()
    {
        $this->editing->company_id = $this->loadCompanies()->first()->id;
    }

    private function setDefaultCompany()
    {
        $this->editing->company_id = $this->editing->company_id ?? $this->loadCompanies()->first()->id;
    }

    private function loadCompanies(): Collection|array
    {
        return Company::query()->get(['id', 'name', 'avatar_path']);
    }
}
