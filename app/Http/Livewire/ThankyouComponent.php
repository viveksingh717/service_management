<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ThankyouComponent extends Component
{
    // public $payment_id;

    // public function mount($payment_id)
    // {
    //     $this->payment_id = $payment_id;
    // }

    public function render()
    {
        // $userId = Auth::user()->id;
        // $order = Order::where('user_id', $userId)->where('payment_id', $this->payment_id)->first();
        // $orderDetail = OrderItem::where('order_id', $order->id)->first();
        return view('livewire.thankyou-component')->layout('layouts.base_layout');
        // return view('livewire.thankyou-component', compact('order', 'orderDetail'))->layout('layouts.base_layout');
    }
}
