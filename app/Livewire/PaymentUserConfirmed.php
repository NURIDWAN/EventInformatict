<?php

namespace App\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PaymentUserConfirmed extends Component
{
    use LivewireAlert;
    public $payments;
    public $payment_confirmed;
    public $payment_id;


    public function mount()
    {
        $this->payment_confirmed = Payment::where('user_id', Auth::user()->id)->latest()->get();
    }


    public function render()
    {
        return view('livewire.payment-user-confirmed');
    }
}