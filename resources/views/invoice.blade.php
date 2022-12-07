<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Service Management - Online Service Provider for your House Needs</title>
    <meta name="Service-Management" content="service-Management">
    <meta name="Online Service Provider for your House Needs" content="">
    <meta name="Vivek Singh" content="Online Service Provider for your House Needs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">

    <title>Larave Generate Invoice PDF - Nicesnippest.com</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 1px;
    }
    .p-0{
        padding: 1px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;   
    }
    .w-85{
        width:85%;   
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:140px;
        height:35px;
        padding-top:25px;
        padding-bottom:5px;
    }
    /* .logo span{
        margin-left:8px;
        top:103px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    } */
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>
    <div class="head-title">
        <h1 class="text-center m-0 p-0">Invoice</h1>
    </div>
    @php

    $allCategory = \App\Models\Category::get();
    $allSubCategory = \App\Models\SubCategory::get();

    $invoiceId = substr(str_shuffle("0123456789"), 0, 3);

    $tax = $orderDetail['service_charge'] * 18 / 100;
    $total_amt = $orderDetail['service_charge'] + $tax ;

    @endphp
    <div class="add-detail mt-10">
        <div class="w-50 float-left mt-10">
            <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">#{{$invoiceId}}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Order Id - <span class="gray-color">{{$orderDetail['order']['order_id']}}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Order Date - <span class="gray-color">{{ \Carbon\Carbon::parse($orderDetail['order']['created_at'])->format('d/m/Y')}} </span></p>
        </div>
        <div class="w-50 float-left logo mt-10">
            <img src="{{asset('assets/my-logo/mylogo7.png')}}" class="logoImg">     
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Company Address</th>
                <th class="w-50">Shipping Address</th>
            </tr>
            <tr>
                <td>
                    <div class="box-text">
                        <p>Mumbai</p>
                        <p>401107</p>
                        <p>Mira-Bhayandar Road,</p>
                        <p>Mira Road,</p>
                        <p>India</p>
                        <p>Contact : 9004069694</p>
                    </div>
                </td>
                <td>
                    <div class="box-text">
                        <p>{{$orderDetail['order']['user_address']}}</p>
                        <p>{{$orderDetail['order']['pincode']}}</p>
                        <p>{{$orderDetail['order']['city']}}</p>
                        <p>{{$orderDetail['order']['state']}}</p>
                        <p>{{$orderDetail['order']['country']}}</p>
                        <p>Contact : {{$orderDetail['order']['user_phone']}}</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Payment Method</th>
                <th class="w-50">Service Employee</th>
            </tr>
            <tr>
                <td>Online Paid Via RazorPay</td>
                <td>Signature</td>
            </tr>
        </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">SKU</th>
                <th class="w-50">Service Name</th>
                <th class="w-50">Price</th>
                <th class="w-50">Tax Amount</th>
                <th class="w-50">Grand Total</th>
            </tr>
            <tr align="center">
                <td>{{$orderDetail['service_category']}}</td>
                <td>{{$orderDetail['service_name']}}</td>
                <td>{{$orderDetail['service_charge']}}</td>
                <td>{{$tax}}</td>
                <td>{{$total_amt}}</td>
            </tr>

            <tr>
                <td colspan="7">
                    <div class="total-part">
                        <div class="total-left w-85 float-left" align="right">
                            <p>Sub Total</p>
                            <p>Tax (18%)</p>
                            <p>Total Payable</p>
                        </div>
                        <div class="total-right w-15 float-left text-bold" align="right">
                            <p>{{$orderDetail['service_charge']}}</p>
                            <p>{{$tax}}</p>
                            <p>{{$total_amt}}</p>
                        </div>
                        <div style="clear: both;"></div>
                    </div> 
                </td>
            </tr>
        </table>
    </div>
</body>
</html>