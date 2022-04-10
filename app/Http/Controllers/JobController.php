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

    public function index()
    {
        return view('jobs.index');
    }

    public function show (string $slug)
    {
        return view('jobs.show')
            ->with('job', $this->job->with('company', 'country', 'city', 'division', 'categories:id,name,type')->where('slug', $slug)->first());
    }
}
