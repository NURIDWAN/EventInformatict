<?php

namespace App\Livewire;

use App\Models\Menu;
use App\Models\Order;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AdminOrders extends Component
{
    use LivewireAlert;

    public $orders;
    public $order_id;

    protected $listeners = [
        'delete'
    ];

    public function mount()
    {
        $this->orders = Order::all();

    }

    public function confirmSaveOrder($id)
    {
        $this->order_id = $id;
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
        $order = Order::findOrFail($this->order_id);
        $order->delete();

        $this->order_id = '';

        $this->alert('success', 'order deleted successfully!');
    }

    public function render()
    {
        return view('livewire.admin-orders');
    }
}