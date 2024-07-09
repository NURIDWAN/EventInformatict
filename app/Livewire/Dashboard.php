<?php

namespace App\Livewire;

use App\Models\Menu;
use App\Models\User;
use App\Models\MoneyIn;
use App\Models\Payment;
use Livewire\Component;
use App\Models\MoneyOut;
use App\Models\Timeline;
use App\Models\Documentation;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $adminCount;
    public $userCount;
    public $menuCount;
    public $timelineCount;
    public $documentationCount;
    public $ordernotconfirmedCount;
    public $orderconfirmedCount;
    public $ordercanceledCount;
    public $moneyinCount;
    public $moneyoutCount;
    public $moneynowCount;
    public $moneyinconfirmedCount;
    public $payment;
    public $moneyouts;



    public $invoice_number;

    public function mount(){
        // count dashboard
        $this->adminCount = User::role('admin')->count();
        $this->userCount = User::role('user')->count();
        $this->menuCount = Menu::count();
        $this->timelineCount = Timeline::count();
        $this->documentationCount = Documentation::count();
        $this->timelineCount = Timeline::count();
        $this->ordernotconfirmedCount = Payment::where('status', 'pending')->count();
        $this->orderconfirmedCount = Payment::where('status', 'complete')->count();
        $this->ordercanceledCount = Payment::where('status', 'canceled')->count();
        $this->moneyinCount = MoneyIn::sum('nominal');
        $this->moneyinconfirmedCount = MoneyIn::where('is_confirmed', true)->sum('nominal');
        $this->moneyoutCount = MoneyOut::sum('nominal');
        //table money out
        $this->moneyouts = MoneyOut::latest()->get();
        // count money confirm
        $this->moneynowCount = $this->moneyinconfirmedCount - $this->moneyoutCount;
        // table payment user
        $this->payment = Payment::where('user_id', Auth::user()->id)->latest()->get();
    }



    public function render()
    {
        return view('livewire.dashboard');
    }
}