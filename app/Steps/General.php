<?php

namespace App\Steps;

use Vildanbina\LivewireWizard\Components\Step;
use Illuminate\Validation\Rule;

class General extends Step
{
    protected string $view = 'livewire.admin.jobs.steps.general';

    /*
     * Initialize step fields
     */
    public function mount()
    {
        $this->mergeState([
            'name'                  => $this->model->name,
            'content'                 => $this->model->content,
        ]);
    }

    /*
    * Step icon
    */
    public function icon(): string
    {
        return 'check';
    }

    /*
     * When Wizard Form has submitted
     */
    public function save($state)
    {
        $job = $this->model;

        $job->name     = $state['name'];
        $job->content    = $state['content'];

        $job->save();
    }

    /*
     * Step Validation
     */
    public function validate()
    {
        return [
            [
                'state.name'     => ['required', Rule::unique('jobs', 'name')->ignoreModel($this->model)],
                'state.content'    => ['required', Rule::unique('jobs', 'content')->ignoreModel($this->model)],
            ],
            [
                'state.name'     => __('Name'),
                'state.content'    => __('Content'),
            ],
        ];
    }

    /*
     * Step Title
     */
    public function title(): string
    {
        return __('General');
    }
}
