<?php
namespace App\Observers;

use App\Models\Company;

class CompanyObserver
{
    public function created(Company $company)
    {
        //
    }

    public function creating(Company $company)
    {
        if (auth()->check()) {
            abort_if(auth()->user()->cannot('create', $company), 403, 'Forbidden. The user is authenticated, but does not have the permissions to perform an action. Please contact your Support');
        }
    }

    public function updating(Company $company)
    {
        if (auth()->check()) {
            abort_if(auth()->user()->cannot('update', $company), 403, 'Forbidden. The user is authenticated, but does not have the permissions to perform an action. Please contact your Support');
        }
    }

    public function updated(Company $company)
    {
        //
    }

    public function deleted(Company $company)
    {
        //
    }

    public function restored(Company $company)
    {
        //
    }

    public function forceDeleted(Company $company)
    {
        //
    }
}
