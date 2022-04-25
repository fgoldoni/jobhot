<?php

namespace App\Http\Livewire\User;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Modules\Plans\Entities\Plan;

class Billing extends Component
{
    public Collection $plans;

    public function mount ()
    {
        $this->plans = Plan::all();
    }

    public function setPayment($paymentMethod)
    {
        try {
            if (auth()->user()->subscribed()) {
                auth()->user()->updateDefaultPaymentMethod($paymentMethod);
            } else {
                auth()->user()->newSubscription('default', 'price_1KqBoGGyro9wqcXwIzLk59iq')->create($paymentMethod);
            }
        } catch (\Exception $exception) {

        }

        $this->notify('The User has been successfully updated');
    }

    public function render()
    {
        return view('livewire.user.billing', [
            'subscribed' => auth()->user()->subscribed(),
            'intent' => auth()->user()->createSetupIntent()
        ]);
    }
}
