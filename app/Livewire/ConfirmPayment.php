<?php

namespace App\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ConfirmPayment extends Component
{
    use LivewireAlert;
    public $payments;
    public $payment_confirmed;
    public $payment_id;

    protected $listeners = [
        'delete'
    ];
    public function mount()
    {
        $this->payments = Payment::latest()->get();


    }
    public function confirmDelete($id)
    {
        $this->payment_id = $id;
        $this->alert('warning', 'Apakah yakin menghapus pesanan!', [
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Ya',
            'cancelButtonText' => 'Belom',
            'onConfirmed' => 'delete',
            'cancelButtonColor' => '#d33',
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function delete()
    {
        $payment = Payment::findOrFail($this->payment_id);
        if (Storage::disk('public')->exists($payment->proof_of_payment)) {
            Storage::disk('public')->delete($payment->proof_of_payment);
        }

        // Hapus entry dari database
        $payment->delete();

        $this->payment_id = '';

        $this->alert('success', 'order deleted successfully!');
    }
    public function render()
    {
        return view('livewire.confirm-payment');
    }
}