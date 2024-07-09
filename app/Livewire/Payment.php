<?php

namespace App\Livewire;

use App\Models\Announcementpayment;
use App\Models\MoneyIn;
use App\Models\Order;
use App\Models\Payment as ModelPayment;
use App\Models\Settingweb;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use SebastianBergmann\Type\FalseType;

class Payment extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $total_price;
    public $isPayment;
    public $payment_confirmed;
    public $account_name;
    public $account_number;
    public $nominal;
    public $proof_of_payment;
    public $description;
    public $order_id;
    public $notif;

    protected $listeners = [
        'store'
    ];
    public function confirmSavePayment()
    {
        $this->alert('warning', 'Pastikan Pesenan Anda Sudah Benar!', [
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Sudah',
            'cancelButtonText' => 'Belom',
            'onConfirmed' => 'store',
            'cancelButtonColor' => '#d33',
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function message(){
        return [
            'required' => 'Kolom wajib di isi',
            'image' => 'Format file harus gambar',
            'max' => 'Maksimal ukuran file 10MB'
        ];
    }



    public function resetsave(){
        $this->account_name = '';
        $this->account_number = '';
        $this->nominal = '';
        $this->proof_of_payment = null;
    }

    public function store(){
        $userId = Auth::id();

        $payment = ModelPayment::where('user_id', $userId)->first();
        $htm = Settingweb::find(1);

        $message = [
            'required' => 'Kolom wajib di isi',
            'image' => 'Format file harus gambar',
            'max' => 'Maksimal ukuran file 10MB',
            'min' => 'Min 10KB'
        ];
        $rules = [
            'account_name' => 'required',
            'account_number' => 'required',
            'nominal' => 'required',
            'proof_of_payment' => 'required|image|max:10000|min:10',
        ];
        if ($payment) {
            if ($payment->status == 'pending') {
                 return $this->alert('warning', 'Pembayaran sudah di simpan tunggu konfirmasi admin!', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => true,
                ]);
            }
            if ($payment->status == 'complete') {
                 return $this->alert('success', 'Pembayaran sudah di konfirmasi admin!', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => true,
                ]);
            }
        }
            $this->validate($rules,$message);
            $payment = ModelPayment::create([
                'user_id' => auth::id(),
                'order_id' => $this->order_id,
                'account_name' => $this->account_name,
                'account_number' => $this->account_number,
                'nominal' => $this->nominal,
                'proof_of_payment' => $this->proof_of_payment->store('public/photos'),
                'description' => $this->description,
                'status'=> 'pending',
            ]);

            MoneyIn::create([
                'user_id' => auth::id(),
                'payment_id' => $payment->id,
                'nominal' => $this->nominal,
                'is_payment' => false
            ]);

            $this->resetsave();
        return redirect()->route('payment-confirmed.user');


    }
    public function mount(){
        $htm = Settingweb::find(1);

        $userId = Auth::id();
        $order_user = Order::where('user_id', $userId)->first();
        $payment = ModelPayment::where('user_id', $userId)->where('status', 'pending')->first();
        $payment_confirmed = ModelPayment::where('user_id', $userId)->where('status', 'complete')->first();
        if ($order_user) {
            $this->alert('success', 'Pembayaran berhasil di simpan !', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
            $this->total_price = $order_user->total_price + $htm->htm;
            $this->order_id = $order_user->id;
        }

        if ($payment == true) {
            $this->isPayment = true;
        }

        $this->notif = Announcementpayment::latest()->get();

    }
    public function render()
    {
        return view('livewire.payment');
    }
}