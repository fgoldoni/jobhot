<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Billing extends Component
{
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
        return view('livewire.user.billing');
    }
}
