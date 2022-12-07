<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function placeOrder(Request $request)
    {
        $request->validate([
            'user_name'=>'required',
            'user_email'=>'required|email|unique:orders,user_email',
            'user_phone'=>'required',
            'user_address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',
            'pincode'=>'required',
        ]);

        $placeModel = new Order();
        $service_slug = $request['slug'];
        $placeModel->user_id = Auth::id();
        $placeModel->user_name = $request->user_name;
        $placeModel->user_email = $request->user_email;
        $placeModel->user_phone = $request->user_phone;
        $placeModel->user_address = $request->user_address;
        $placeModel->city = $request->city;
        $placeModel->state = $request->state;
        $placeModel->country = $request->country;
        $placeModel->pincode = $request->pincode;
        $placeModel->order_id = 'order'.Str::random(16);
        $placeModel->payment_id = $request->payment_id;
        $placeModel->status = 1;
        $placeModel->remark = 'Order placed successfully';

        // if ($request->payment_mode == 'COD') {
        //     $checkoutModel->order_id =  'order'.Str::random(16);
        //     $checkoutModel->tracking_number = 'trackingNumber'.random_int(100000, 999999);
        // }

        if ($placeModel->save()) {
            $ordService =  Service::where('service_slug', $service_slug)->first();

            OrderItem::create([
                'order_id'=>$placeModel->id,
                'service_name'=>$ordService->service_name,
                'service_category'=>$ordService['sub_category']['subCategory_name'],
                'service_charge'=>$ordService->price,
                'tracking_number'=>substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 11),
                'status'=>1,
            ]);

            return response()->json(['message', 'Order placed successfully'], 200);
        } else {
            return response()->json(['message', 'Something went wrong'], 404);
        }
    }

    public function onlinePayment(Request $request)
    {
        $user_id = Auth::id();
        $slug = $request['slug'];
        $user_name = $request->user_name;
        $user_email = $request->user_email;
        $user_phone = $request->user_phone;
        $user_address = $request->user_address;
        $city = $request->city;
        $state = $request->state;
        $country = $request->country;
        $pincode = $request->pincode;

        $orderService =  Service::where('service_slug',$slug)->first();

        $total_amount = $orderService['price'];

        return response()->json([
            'user_id'=>$user_id,
            'user_name'=>$user_name,
            'user_email'=>$user_email,
            'user_phone'=>$user_phone,
            'user_address'=>$user_address,
            'city'=>$city,
            'state'=>$state,
            'country'=>$country,
            'pincode'=>$pincode,
            'total_amount'=>$total_amount,
        ]);
    }
}
