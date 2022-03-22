<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

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

    public function show (string $slug)
    {
        return view('jobs.job')
            ->with('job', $this->job->with('company', 'categories:id,name')->where('slug', $slug)->first());
    }
}
