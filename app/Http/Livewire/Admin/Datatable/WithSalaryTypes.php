<?php
namespace App\Http\Livewire\Admin\Datatable;

use App\Enums\SalaryType;
use Illuminate\Support\Collection as StatesCollection;

trait WithSalaryTypes
{
    public ?int $selectedSalaryType;

    public StatesCollection $salaryTypes;

    public function mountWithSalaryTypes()
    {
        $this->salaryTypes = $this->getSalaryTypes();
        $this->selectedSalaryType = $this->findSalaryTypeBy('name', ucfirst($this->editing->salary_type->value))['id'];
    }

    private function findSalaryTypeBy(string $key, $value): array
    {
        return $this->salaryTypes->filter(fn ($s) => $s[$key] === $value)->first();
    }

    public function updatedSelectedSalaryType($value)
    {
        $this->editing->salary_type = strtolower($this->findSalaryTypeBy('id', $this->selectedSalaryType)['name']);
    }

    private function getSalaryTypes(): StatesCollection
    {
        return collect([
            [
                'id' => 1,
                'name' => ucfirst((SalaryType::Hour)->value),
            ],
            [
                'id' => 2,
                'name' => ucfirst((SalaryType::Day)->value),
            ],
            [
                'id' => 3,
                'name' => ucfirst((SalaryType::Month)->value),
            ],
            [
                'id' => 4,
                'name' => ucfirst((SalaryType::Year)->value),
            ]
        ]);
    }
}
