<?php

namespace App\Livewire;

use App\Models\Menu;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Order as ModelOrder;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class Order extends Component
{
    use LivewireAlert;

    public $menus = [];
    public $selectedMenus = [];
    public $totalPrice = 0;
    public $lastOrderId;

    protected $listeners = [
        'saveOrder'
    ];

    public function mount()
    {
        $this->menus = Menu::all()->toArray();

        $userId = Auth::id();
        $order = ModelOrder::where('user_id', $userId)->first();

        if ($order) {
            $this->selectedMenus = $order->menus;
            $this->calculateTotal();
            $this->lastOrderId = $order->id;
        }
    }

    public function toggleMenu($menuId)
    {
        if (isset($this->selectedMenus[$menuId])) {
            unset($this->selectedMenus[$menuId]);
        } else {
            $menu = collect(Menu::all())->firstWhere('id', $menuId);
            $this->selectedMenus[$menuId] = $menu;
        }
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->totalPrice = array_sum(array_column($this->selectedMenus, 'price'));
    }

    public function confirmSaveOrder()
    {
        $this->alert('warning', 'Pastikan Pesenan Anda Sudah Benar!', [
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Sudah',
            'cancelButtonText' => 'Belom',
            'onConfirmed' => 'saveOrder',
            'cancelButtonColor' => '#d33',
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function saveOrder()
    {
        $userId = Auth::id();

        if (ModelOrder::where('user_id', $userId)->exists()) {
            return $this->alert('warning', 'Anda sudah menyimpan sebelumnya !', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
        }

        $order = ModelOrder::updateOrCreate(
            ['user_id' => $userId],
            [
                'menus' => $this->selectedMenus,
                'total_price' => $this->totalPrice,
            ]
        );

        $this->lastOrderId = $order->id;
        $this->selectedMenus = [];
        $this->totalPrice = 0;

        return redirect('payment');

    }
    public function render()
    {
        return view('livewire.user-menu', [
            'menus' => Menu::latest()->get(),
        ]);
    }
}