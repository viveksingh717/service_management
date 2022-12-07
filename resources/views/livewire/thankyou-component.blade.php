<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Thankyou !</h1>
                
                <div class="crumbs">
                    <ul>
                        <li>Your Order has been placed successfully.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="content_info">
            <div class="container">
                <div class="row" style="margin-top: -30px;">
                    <div class="titles">
                        <h2>Order <span>Details</span></h2>
                        <i class="fa fa-plane"></i>
                        <hr class="tall">
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: -70px;">
                <div class="table-responsive mt-4 mb-4">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Sr.</th>
                            <th>User Name</th>
                            <th>Phone</th>
                            <th>Service Name</th>
                            <th>Service Charge</th>
                            <th>Order Id</th>
                            <th>payment Id</th>
                          </tr>
                        </thead>
                        <tbody>
                            {{-- @if ($orderDetail)
                            <tr>
                                <th>1</th>
                                <td>{{$orderDetail['order']['user_name']}}</td>
                                <td>{{$orderDetail['order']['user_phone']}}</td>
                                <td>{{$orderDetail['service_name']}}</td>
                                <td>{{$orderDetail['service_charge']}}</td>
                                <td>{{$orderDetail['order']['order_id']}}</td>
                                <td>{{$orderDetail['order']['payment_id']}}</td>
                              </tr>
                            @endif --}}
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
        <div class="content_info">
            <div class="skin_base paddings-mini color-white text-center">
                <h2>Need Help? Call our Expert 24 X 7 - +91-9004069694</h2>
            </div>
        </div>            
    </section>
</div>
