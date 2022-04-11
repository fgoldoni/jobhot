<?php
namespace App\Listeners;

use App\Events\JobViewCount;

class JobViewCountHandler
{
    public function handle(JobViewCount $event)
    {
        if (!$this->isJobViewed($event->job)) {
            $event->job->increment('view_count');
            $event->job->view_counter += 1;

            $this->storeJob($event->job);
        }
    }

    private function isJobViewed($job): bool
    {
        $viewed = session()->get('viewed_jobs', []);

        return in_array($job->id, $viewed);
    }

    private function storeJob($job)
    {
        session()->push('viewed_jobs', $job->id);
    }
}
