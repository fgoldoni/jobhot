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
            ->with('job', $job->load('company', 'country', 'city', 'division', 'categories:id,name,type'));
    }
}
