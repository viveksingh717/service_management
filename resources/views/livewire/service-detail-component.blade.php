<div class="section-title-01 honmob">
    <div class="bg_parallax image_01_parallax"></div>
    <div class="opacy_bg_02">
        <div class="container">
            <h1>{{$serviceDetails['service_name']}}</h1>
            <div class="crumbs">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>/</li>
                    <li>{{$serviceDetails['service_name']}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="content-central">
    <div class="semiboxshadow text-center">
        <img src="{{asset('assets/img/img-theme/shp.png')}}" class="img-responsive" alt="{{$serviceDetails['service_name']}}">
    </div>
    <div class="content_info">
        <div class="paddings-mini">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 single-blog">
                        <div class="post-item">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="post-header">
                                        <div class="post-format-icon post-format-standard"
                                            style="margin-top: -10px;">
                                            <i class="fa fa-image"></i>
                                        </div>
                                        <div class="post-info-wrap">
                                            <h2 class="post-title"><a href="#" title="Post Format: Standard"
                                                    rel="bookmark">{{$serviceDetails['service_name']}}: {{$serviceDetails['sub_category']['subCategory_name']}}</a></h2>
                                            <div class="post-meta" style="height: 10px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div id="single-carousel">
                                        <div class="img-hover">
                                            <img src="{{asset('assets/services/'.$serviceDetails['service_image'])}}" alt="{{$serviceDetails['service_name']}}"
                                                class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="post-content">
                                        <h3>{{ucfirst($serviceDetails['service_name'])}}</h3>
                                        <p>{{ucfirst($serviceDetails['description'])}}.</p>
                                        <h4>Inclusion</h4>
                                        <ul class="list-styles">
                                            @php
                                                $inclusions = explode('|', $serviceDetails['inclusion']);
                                            @endphp

                                            @foreach ($inclusions as $inclusion)
                                                <li>
                                                    <i class="fa fa-plus"></i>{{$inclusion}}
                                                </li>
                                            @endforeach
                                        </ul>
                                        <h4>Exclusion</h4>
                                        <ul class="list-styles">
                                            @php
                                                $exclusions = explode('|', $serviceDetails['exclusion']);
                                            @endphp

                                            @foreach ($exclusions as $exclusion)
                                                <li>
                                                    <i class="fa fa-plus"></i>{{$exclusion}}
                                                </li>
                                            @endforeach
                                        </ul>
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
                                        {{-- <tr>
                                            <td>Quntity</td>
                                            <td>1</td>
                                        </tr> --}}
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
                                    <a href="{{url('checkout/'.$serviceDetails->service_slug)}}"
                                        class="btn btn-primary">Book Now</a>
                                    {{-- <form>                                                
                                        <input type="submit" class="btn btn-primary" name="submit"
                                            value=" Book Now">
                                    </form> --}}
                                </div>
                            </div>
                        </aside>
                        <aside>
                            <h3>Related Service</h3>
                            @if ($relatedService)
                            <div class="col-md-12 col-sm-6 col-xs-12 bg-dark color-white padding-top-mini"
                                style="max-width: 360px">
                                <a href="ac-wet-servicing.html">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/services/'.$relatedService->service_image)}}" alt="{{$relatedService->service_name}}}"
                                            class="img-responsive">
                                    </div>
                                    <div class="info-gallery">
                                        <h3>
                                            {{$relatedService['service_name']}}
                                        </h3>
                                        <hr class="separator">
                                        <p>{{$relatedService['service_name']}}</p>
                                        <div class="content-btn"><a href="{{url('serviceDetails/'.$relatedService->service_slug)}}"
                                                class="btn btn-warning">View Details</a></div>
                                        <div class="price"><span>&#x20b9;</span><b>From</b>{{$relatedService['price']}}</div>
                                    </div>
                                </a>
                            </div>
                            @else
                            <div class="col-md-12 col-sm-6 col-xs-12 bg-dark color-white padding-top-mini"
                                style="max-width: 360px">
                                <p class="text-center">No Related Service Found</p>
                            </div>
                            @endif
                            
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>            
</section>