<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_01_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Checkout</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>/</li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="semiboxshadow text-center">
            <img src="{{asset('assets/img/img-theme/shp.png')}}" class="img-responsive" alt="checkout">
        </div>
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row">
                        @if ( Session::has('message'))
                            <div class="alert alert-success" id="msgDiv" role="alert">
                                {{Session::get('message')}}
                            </div>    
                        @endif
                        <form style="padding: 10px">
                            @csrf
                            <input type="hidden" name="slug" id="slug" value="{{$serviceDetails['service_slug']}}">
                            <div class="col-md-8 single-blog">
                                <div class="thinborder-ontop">
                                    <h3 class="hed"><u>Checkout Details:</u></h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-weight: lighter">Full Name</label>
                                                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Full Name">
                                                {{-- @error('user_name') <span class="text-danger">{{ $message }}</span> @enderror --}}

                                                @if ($errors->has('user_name'))
                                                <span class="text-danger">{{ $errors->first('user_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-weight: lighter">Email</label>
                                                <input type="email" id="user_email" class="form-control" name="user_email" placeholder="Enter Email">
                                                @if ($errors->has('user_email'))
                                                <span class="text-danger">{{ $errors->first('user_email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label style="font-weight: lighter">Phone</label>
                                                <input type="text" class="form-control" id="user_phone" name="user_phone" placeholder="Phone">
                                                @if ($errors->has('user_phone'))
                                                <span class="text-danger">{{ $errors->first('user_phone') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label style="font-weight: lighter">Address</label>
                                        <textarea class="form-control" name="user_address" id="user_address"  rows="3" placeholder="Address.."></textarea>
                                        @if ($errors->has('user_address'))
                                        <span class="text-danger">{{ $errors->first('user_address') }}</span>
                                        @endif
                                    </div>
    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label style="font-weight: lighter">City</label>
                                                <input type="text" class="form-control" id="city" name="city" placeholder="Your City">
                                                @if ($errors->has('city'))
                                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                                @endif
                                            </div>
                                        </div>
    
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label style="font-weight: lighter">State</label>
                                                <input type="text" class="form-control" name="state"  id="state" placeholder="State">
                                                @if ($errors->has('state'))
                                                <span class="text-danger">{{ $errors->first('state') }}</span>
                                                @endif
                                            </div>
                                        </div>
    
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label style="font-weight: lighter">Country</label>
                                                <input type="text" class="form-control" id="country" name="country" placeholder="Country">
                                                @if ($errors->has('country'))
                                                <span class="text-danger">{{ $errors->first('country') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label style="font-weight: lighter">Pincode</label>
                                                <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode">
                                                @if ($errors->has('pincode'))
                                                <span class="text-danger">{{ $errors->first('pincode') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <aside class="widget" style="margin-top: 18px;">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Booking Details</div>
                                        <div class="panel-body">
                                            <table class="table">
                                                <tr>
                                                    <td style="border-top: none;">Price</td>
                                                    <td style="border-top: none;"><span>&#x20b9;</span> {{$serviceDetails['price']}}</td>
                                                </tr>
                                                @php
                                                    $total_amount = $serviceDetails->price;
                                                @endphp
                                                @if ($serviceDetails->discount)
                                                    @if ($serviceDetails->discount_type == 'fixed')
                                                        <tr>
                                                            <td>Discount</td>
                                                            <td>&#x20b9; {{$serviceDetails->discount}}</td>
                                                        </tr>
                                                        @php
                                                            $total_amount = $total_amount - $serviceDetails->discount;
                                                        @endphp
                                                    @elseif ($serviceDetails->discount_type == 'percent')
                                                        <tr>
                                                            <td>Discount</td>
                                                            <td>{{$serviceDetails->discount}} %</td>
                                                        </tr>
                                                        @php
                                                        $total_amount = $total_amount - ($serviceDetails->discount/100);
                                                    @endphp
                                                    @endif
                                                @endif
                                                
                                                <tr>
                                                    <td>Total</td>
                                                    <td><span>&#x20b9;</span> {{$total_amount}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="panel-footer">
                                            <button type="submit" class="btn btn-primary razorpayBtn">Book Now</button>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>            
    </section>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.razorpayBtn').click(function (e) { 
                e.preventDefault();

                slug = $('#slug').val();
                user_name = $('#user_name').val();
                user_email = $('#user_email').val();
                user_phone = $('#user_phone').val();
                user_address = $('#user_address').val();
                city = $('#city').val();
                state = $('#state').val();
                country = $('#country').val();
                pincode = $('#pincode').val();

                data = {
                    'slug':slug,
                    'user_name':user_name,
                    'user_email':user_email,
                    'user_phone':user_phone,
                    'user_address':user_address,
                    'city':city,
                    'state':state,
                    'country':country,
                    'pincode':pincode,
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{route('onlinePayment')}}",
                    type: "post",
                    data: data,
                    success: function (response) {
                        var options = {
                            "key": "rzp_test_qNgIMWQX4bM2Vs",
                            "amount": response.total_amount,
                            "currency": "INR",
                            "name": response.user_name,
                            "description": "Thankyou for choosing us",
                            // "image": "http://localhost:8000/smart_shop/public/images/logos/razorpayLogo",
                            // "order_id":response.order_id,

                            "handler": function (response2){
                                // alert(response2.razorpay_payment_id);
                                servSlug = $('#slug').val();
                                $.ajax({
                                    url: "{{route('placeOrder')}}",
                                    type: "post",
                                    data: {
                                        'slug':servSlug,
                                        'user_name':user_name,
                                        'user_email':user_email,
                                        'user_phone':user_phone,
                                        'user_address':user_address,
                                        'city':city,
                                        'state':state,
                                        'country':country,
                                        'pincode':pincode,
                                        'total_amount':response.total_amount,
                                        'payment_id':response2.razorpay_payment_id,
                                        'payment_mode':'Pay By RazorPay',
                                        "tracking_number":"uid" + Math.random().toString(16).slice(2),
                                    },
                                    success: function (response3) {
                                        console.log(response3);
                                        Swal.fire(response3);
                                        window.location.href='/thankyou';
                                        window.location = '/thankyou?payment_id='+response2.razorpay_payment_id;
                                    }
                                });
                            },
                            "prefill": {
                                "name": response.user_name,
                                "email": response.user_email,
                                "contact": response.user_phone
                            },
                            "notes": {
                                "address": "Vivek Singh Corporation"
                            },
                            "theme": {
                                "color": "#3399cc"
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();

                        // rzp1.on('payment.failed', function (responseErr){
                        //         alert(responseErr.error.code);
                        //         alert(responseErr.error.reason);
                        // });
                    }
                });
            });
        });
    </script>
@endpush