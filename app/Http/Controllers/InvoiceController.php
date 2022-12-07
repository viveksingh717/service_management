<?php

namespace App\Http\Controllers;

use App\Models\Order;
// use Barryvdh\DomPDF\PDF;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $ordId = $request->id;

        $userId = Auth::user()->id;
        $order = Order::where('user_id', $userId)->where('id', $ordId)->first();
        $orderDetail = OrderItem::where('order_id', $order->id)->first();
        // $orderinfo = OrderItem::where('order_id', $order->id)->first();

        // $data = [
        //     'orderDetail' =>$orderinfo,
        // ];

        // $pdf = PDF::loadView('invoice', $data);

        // return $pdf->download('service_'.time().'.pdf');

        return view('invoice', compact('orderDetail', 'order'));
    }
}
