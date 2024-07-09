<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Timeline;
use App\Models\Payment;
use App\Models\Order;


class PDFController extends Controller
{
    public function generateTimeline()
    {
            $data = Timeline::all();
            $pdf = PDF::loadView('pdf.index', compact('data'));
            return $pdf->download('TimelineEvent.pdf');
    }

    public function generateInvoice($code_payment){
        $payments = Payment::where('code_payment',$code_payment)->get();
        $payment = $payments[0];
        $payment_username = $payments[0]->user->name;
        $payment_email = $payments[0]->user->email;

        $order = Order::where('id', $payment->order_id)->get();
        $total_price = $order[0]->total_price;
        $menus = $order[0]->menus;



        $pdf = PDF::loadView('pdf.invoice', compact('payment', 'total_price', 'menus', 'code_payment', 'payment_username','payment_email',));
            return $pdf->download('TimelineEvent.pdf');

    }

}