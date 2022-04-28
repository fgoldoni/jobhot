<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Invoices extends Component
{
    public function download (string $invoiceId)
    {
        return auth()->user()->downloadInvoice($invoiceId, [
            'vendor' => 'Your Company',
            'product' => 'Your Product',
        ]);
    }

    public function render()
    {
        return view('livewire.user.invoices');
    }
}
