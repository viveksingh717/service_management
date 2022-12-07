<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Service;
use Livewire\Component;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CheckoutComponent extends Component
{
    public $slug;

    // public $user_name;
    // public $user_email;
    // public $user_phone;
    // public $user_address;
    // public $city;
    // public $state;
    // public $country;
    // public $pincode;
    // public $user_id;
    // public $order_id;
    // public $payment_id;
    // public $status;
    // public $remark;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    // public function updated($fields)
    // {
    //     $this->validateOnly($fields, [
    //         'user_name'=>'required',
    //         'user_email'=>'required',
    //         'user_phone'=>'required',
    //         'user_address'=>'required',
    //         'city'=>'required',
    //         'state'=>'required',
    //         'country'=>'required',
    //         'pincode'=>'required',
    //     ]);
    // }
    
    // public function placeOrders()
    // {
    //     $this->validate([
    //         'user_name'=>'required',
    //         'user_email'=>'required',
    //         'user_phone'=>'required',
    //         'user_address'=>'required',
    //         'city'=>'required',
    //         'state'=>'required',
    //         'country'=>'required',
    //         'pincode'=>'required',
    //     ]);

    //     $placeModel = new Order();

    //     $placeModel->user_id = Auth::user()->id;
    //     $placeModel->user_name = $this->user_name;
    //     $placeModel->user_email = $this->user_email;
    //     $placeModel->user_phone = $this->user_phone;
    //     $placeModel->user_address = $this->user_address;
    //     $placeModel->city = $this->city;
    //     $placeModel->state = $this->state;
    //     $placeModel->country = $this->country;
    //     $placeModel->pincode = $this->pincode;
    //     $placeModel->order_id = 'order'.Str::random(16);
    //     $placeModel->payment_id = 'pay'.Str::random(8);
    //     $placeModel->status = 1;
    //     $placeModel->remark = 'Order placed successfully';

    //     if ($placeModel->save()) {
            
    //         $orderService =  Service::where(['service_slug'=>$this->slug])->first();

    //         OrderItem::create([
    //             'order_id'=>$placeModel->id,
    //             'service_name'=>$orderService->service_name,
    //             'service_category'=>$orderService->sub_category->subCategory_name,
    //             'service_charge'=>$orderService->price,
    //             'tracking_number'=>substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 11),
    //             'status'=>1,
    //         ]);

    //         session()->flash('message', "Your order placed successfully");
    //         // return redirect('/thankyou')->with('message','Your order placed successfully');

    //         $this->user_name = '';
    //         $this->user_email = '';
    //         $this->user_phone = '';
    //         $this->user_address = '';
    //         $this->city = '';
    //         $this->state = '';
    //         $this->country = '';
    //         $this->pincode = '';
    //     } else {
    //         session()->flash('message', "Somethingwent wrong");
    //     }
    // }

    // public function onlinePayment()
    // {
    //     $user_id = Auth::user()->id;
    //     $user_name = $this->user_name;
    //     $user_email = $this->user_email;
    //     $user_phone = $this->user_phone;
    //     $user_address = $this->user_address;
    //     $city = $this->city;
    //     $state = $this->state;
    //     $country = $this->country;
    //     $pincode = $this->pincode;

    //     $orderService =  Service::where(['service_slug'=>$this->slug])->first();
    //     $total_amount = $orderService->price;

    //     return response()->json([
    //         'user_id'=>$user_id,
    //         'user_name'=>$user_name,
    //         'user_email'=>$user_email,
    //         'user_phone'=>$user_phone,
    //         'user_address'=>$user_address,
    //         'city'=>$city,
    //         'state'=>$state,
    //         'country'=>$country,
    //         'pincode'=>$pincode,
    //         'total_amount'=>$total_amount,
    //     ]);
    // }

    public function render()
    {
        $serviceDetails =  Service::where(['service_slug'=>$this->slug])->first();
        return view('livewire.checkout-component', compact('serviceDetails'))->layout('layouts.base_layout');;
    }
}
