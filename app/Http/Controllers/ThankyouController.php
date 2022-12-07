<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThankyouController extends Controller
{
    public function index(Request $request)
    {
        $payId = $request->payment_id;

        $userId = Auth::user()->id;
        $order = Order::where('user_id', $userId)->where('payment_id', $payId)->first();
        $orderDetail = OrderItem::where('order_id', $order->id)->first();

        return view('thankyou', compact('orderDetail', 'order'));
    }
}
