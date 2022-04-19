<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Billing extends Component
{
    public function setPayment($paymentMethod)
    {
        auth()->user()->newSubscription('main', 'basic')->create($paymentMethod);
    }

    public function render()
    {
        return view('livewire.user.billing');
    }
}
