<?php

namespace App\Livewire;

use PDF;
use App\Models\Order;
use App\Models\MoneyIn;
use App\Models\Payment;
use Livewire\Component;
use App\Models\Timeline;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class ShowPayment extends Component
{
    use LivewireAlert;
    public $code_payment;
    public $payment;

    public $total_price;
    public $menus;

    public function mount($code_payment) {
        $this->code_payment = $code_payment;
        $payments = Payment::where('code_payment',$this->code_payment)->get();
        $this->payment = $payments[0];
        $order = Order::where('id', $this->payment->order_id)->get();
        $this->total_price = $order[0]->total_price;
        $this->menus = $order[0]->menus;

    }

    public function confirmPayment($id){

        $payment = Payment::find($id);
        $payment->update([
            'status' => 'complete'
        ]);

        $money_ins = MoneyIn::where('payment_id', $id)->first()->get();
        $money_in = $money_ins[0];
        $money_in->update([
            'is_confirmed' => true
        ]);

        return $this->alert('success', 'Pebayaran telah di konfirmasi!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function canceledPayment($id){
        $payment = Payment::find($id);
        $payment->update([
            'status' => 'canceled'
        ]);
        return $this->alert('success', 'Pebayaran telah di konfirmasi!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);
    }



    public function render()
    {
        return view('livewire.show-payment');
    }
}