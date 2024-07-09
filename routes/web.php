<?php


use App\Livewire\Menu;

use App\Livewire\Notif;
use App\Livewire\Order;
use App\Livewire\Payment;
use App\Livewire\MoneyOut;
use App\Livewire\UserMenu;
use App\Livewire\Dashboard;
use App\Livewire\Timelines;
use App\Livewire\Settingweb;
use App\Livewire\AdminOrders;
use App\Livewire\ShowPayment;
use App\Livewire\Documentation;
use App\Livewire\UserComponent;
use App\Livewire\ConfirmPayment;
use App\Livewire\Announcementpayment;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use App\Livewire\Announcementfrontend;
use App\Livewire\PaymentUserConfirmed;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TimelineController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Guest
Route::get('/', [FrontendController::class, 'index']);


// User
require __DIR__ . '/auth.php';

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/redirect', [GoogleController::class, 'handleGoogleCallback'])->name('handle.google');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', Dashboard::class)->name('dashboard.user');
    Route::get('/timeline', Timelines::class)->name('timeline.user');
    Route::get('/generate-pdf/timeline', [PDFController::class, 'generateTimeline'])->name('generate.pdf.user');
    Route::get('/documentation', Documentation::class)->name('documentation.user');
    Route::get('/order', Order::class)->name('order.user');
    Route::get('/payment', Payment::class)->name('payment.user');
    Route::get('/payment-confirmed', PaymentUserConfirmed::class)->name('payment-confirmed.user');
    Route::get('/show-payment/{code_payment}', ShowPayment::class)->name('show-payment.user');
    Route::get('/generate-pdf/invoice/{code_payment}', [PDFController::class, 'generateInvoice'])->name('generate.invoice.user');
});

// admin
Route::prefix('admin')->middleware(['auth', 'verified', 'RoleOrPermission:Admin|SuperAdmin'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get('/timeline', Timelines::class)->name('timeline');
    Route::get('/generate-pdf/timeline', [PDFController::class, 'generateTimeline'])->name('generate.pdf');

    Route::get('/documentation', Documentation::class)->name('documentation');

    Route::get('/menu', Menu::class)->name('menu');
    Route::get('/money-out', MoneyOut::class)->name('money_out');
    Route::get('/orders', AdminOrders::class)->name('orders');
    Route::get('/confirm-payment', ConfirmPayment::class)->name('confirm-payment');
    Route::get('/show-payment/{code_payment}', ShowPayment::class)->name('show-payment');

    Route::get('/notif', Notif::class)->name('notif');
    Route::get('/announcement-payment', Announcementpayment::class)->name('announcement.payment');
    Route::get('/announcement-frontend', Announcementfrontend::class)->name('announcement.frontend');
    Route::get('/setting-web', Settingweb::class)->name('setting.web');
    Route::get('/users', UserComponent::class)->name('users');

});