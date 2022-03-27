<?php

namespace App\Http\Livewire\Admin\Jobs;

use App\Models\Job;
use App\Steps\General;
use Vildanbina\LivewireWizard\WizardComponent;

class JobWizard extends WizardComponent
{

    public string $jobId;


    public function model()
    {
        return Job::findOrNew($this->jobId);
    }

    public array $steps = [
        General::class,
        General::class,
        General::class,
        // Other steps...
    ];
}
