<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_01_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>{{$category['subCategory_name']}} Services</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li>/</li>
                        <li>{{$category['subCategory_name']}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="container">
            <div class="row" style="margin-top: -30px;">
                <div class="titles">
                    <h2>{{$category['subCategory_name']}} <span>Services</span></h2>
                    <i class="fa fa-plane"></i>
                    <hr class="tall">
                </div>
            </div>
        </div>
        <div class="content_info" style="margin-top: -70px;">
            <div>
                <div class="container">
                    <div class="portfolioContainer">
                        @if ($allServices)
                            @foreach ($allServices as $item)
                            <div class="col-xs-6 col-sm-4 col-md-3 nature hsgrids"
                            style="padding-right: 5px;padding-left: 5px;">
                                <a class="g-list" href="{{url('serviceDetails/'.$item->service_slug)}}">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/services/'.$item['service_image'])}}" alt="{{$item['service_name']}}"
                                            class="img-responsive">
                                    </div>
                                    <div class="info-gallery">
                                        <h3>{{$item['service_name']}}</h3>
                                        <hr class="separator">
                                        <p>{{$item['tagline']}}</p>
                                        <div class="content-btn">
                                            <a href="{{url('checkout/'.$item->service_slug)}}"
                                                class="btn btn-primary">Book Now</a>
                                        </div>
                                        <div class="price"><span>&#x20b9;</span><b>From</b>{{$item['price']}}</div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        @else
                            <p class="text-center text-danger">No data</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>            
    </section>
</div>
