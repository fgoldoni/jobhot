<?php
namespace App\Http\Controllers;

use App\Events\JobViewCount;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * @var \App\Models\Job
     */
    private Job $job;

    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    public function index()
    {
        return view('jobs.index');
    }

    public function show(Job $job)
    {
        JobViewCount::dispatch($job);

        return view('jobs.show')
            ->with('job', $job->load('company', 'country', 'city', 'division', 'categories:id,name,type'))
            ->with('rows', $this->job->published()->with(['company', 'country:id,name', 'city:id,name', 'division:id,name', 'categories'])->inRandomOrder()->whereNot('jobs.id', $job->id)->where('company_id', $job->company_id)->take(4)->get());
    }
}
