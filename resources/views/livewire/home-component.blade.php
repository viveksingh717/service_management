<div>
    <section class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                @if ($sliders)
                    @foreach ($sliders as $item)
                    <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000"
                        data-saveperformance="off" data-title="Slide">
                        <img src="{{asset('assets/slide/'.$item['slider_image'])}}" alt="{{$item['title']}}" data-bgposition="center center"
                            data-kenburns="on" data-duration="6000" data-ease="Linear.easeNone" data-bgfit="130"
                            data-bgfitend="100" data-bgpositionend="right center">
                    </li>
                    @endforeach
                @else
                <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000"
                    data-saveperformance="off" data-title="Slide">
                    <img src="{{asset('assets/img/slide/1.jpg')}}" alt="fullslide1" data-bgposition="center center"
                        data-kenburns="on" data-duration="6000" data-ease="Linear.easeNone" data-bgfit="130"
                        data-bgfitend="100" data-bgpositionend="right center">
                </li>
                @endif
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
        <div class="filter-title">
            <div class="title-header">
                <h2 style="color:#fff;">BOOK A SERVICE</h2>
                <p class="lead">Book a service at very affordable price, poweredBy Vivek Singh </p>
            </div>
            <div class="filter-header">
                <form id="sform" action="{{route('searchServices')}}" method="post">
                    @csrf                      
                    <input type="text" id="q" name="q" required="required" placeholder="What Services do you want?"
                        class="input-large typeahead" autocomplete="off">
                    <input type="submit" name="submit" value="Search">
                </form>
            </div>
        </div>
    </section>

    <section class="content-central">
        <div class="content_info content_resalt">
            <div class="container" style="margin-top: 40px;">
                <div class="row">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul id="sponsors" class="tooltip-hover">
                            @if ($serviceCategory)
                                @foreach ($serviceCategory as $item)
                                    <li data-toggle="tooltip" title="" data-original-title="{{$item['subCategory_name']}}"> 
                                        <a href="{{url('serviceByCategory/'.$item['subCategory_slug'])}}"><img src="{{asset('assets/categories/'.$item['subCategory_image'])}}" alt="{{$item['subCategory_name']}}" height="60px" width="60px"></a>
                                    </li>
                                @endforeach
                            @else
                                <p class="text-center">No record</p>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="semiboxshadow text-center">
            <img src="{{asset('assets/img/img-theme/shp.png')}}" class="img-responsive" alt="">
        </div>
        <div class="content_info">
            <div>
                <div class="container">
                    <div class="row">
                        <div class="titles">
                            <h2>RuntimeTerror <span>Choice</span> of Services</h2>
                            <i class="fa fa-plane"></i>
                            <hr class="tall">
                        </div>
                    </div>
                    <div class="portfolioContainer" style="margin-top: -50px;">
                        @if ($services)
                        @foreach ($services as $item)
                        <div class="col-xs-6 col-sm-4 col-md-3 hsgrids"
                            style="padding-right: 5px;padding-left: 5px;">
                            <a class="g-list" href="{{url('serviceDetails/'.$item->service_slug)}}">
                                <div class="img-hover">
                                    <img src="{{asset('assets/services/'.$item['service_image'])}}" alt="{{$item['service_name']}}"
                                        class="img-responsive">
                                </div>
                                <div class="info-gallery">
                                    <h3>{{$item['service_name']}}</h3>
                                    <hr class="separator">
                                    <p>{{$item['service_name']}}</p>
                                    <div class="content-btn"><a href="{{url('checkout/'.$item->service_slug)}}"
                                            class="btn btn-primary">Book Now</a></div>
                                    <div class="price"><span>&#x20b9; </span><b>From</b>{{$item['price']}}</div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        @else
                            <p class="text-center">No data</p>
                        @endif
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="content_info">
            <div class="bg-dark color-white border-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="services-lines-info">
                                <h2>WELCOME TO DIVERSIFIED</h2>
                                <p class="lead">
                                    Book best services at one place.
                                    <span class="line"></span>
                                </p>

                                <p>Find a wide variety of home services.</p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <ul class="services-lines">
                                @if ($servicesdivercity)
                                    @foreach ($servicesdivercity as $item)
                                    <li>
                                        <a href="{{url('serviceDetails/'.$item->service_slug)}}">
                                            <div class="item-service-line">
                                                <i class="fa">
                                                    <img class="icon-img"
                                                        src="{{asset('assets/services/thumbnails/'.$item['service_image'])}}" alt="{{$item['service_name']}}" height="80px">
                                                </i>
                                                <h5>{{$item['service_name']}}</h5>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                @else
                                    <p class="text-center">No data</p>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="row">
                    <div class="titles">
                        <h2><span>Appliance</span>Services</h2>
                        <i class="fa fa-plane"></i>
                        <hr class="tall">
                    </div>
                </div>
            </div>
            <div id="boxes-carousel">
                @if ($filterServices)
                    @foreach ($filterServices as $item)
                    <div>
                        <a class="g-list" href="{{url('serviceDetails/'.$item->service_slug)}}">
                            <div class="img-hover">
                                <img src="{{asset('assets/services/thumbnails/'.$item['service_image'])}}" alt="{{$item['service_name']}}" class="img-responsive">
                            </div>
    
                            <div class="info-gallery">
                                <h3>{{$item['service_name']}}</h3>
                                <hr class="separator">
                                <p>{{$item['service_name']}}</p>
                                <div class="content-btn"><a href="{{url('checkout/'.$item->service_slug)}}"
                                        class="btn btn-primary">Book Now</a></div>
                                <div class="price"><span>&#x20b9;</span><b>From</b>{{$item['price']}}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                @else
                    <div class="text-center"><p>No data</p></div>
                @endif
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script type="text/javascript">
        var path = "{{route('autocomplete')}}";
        $('input.typeahead').typeahead({
            source: function(query, process){
                return $.get(path, {query:query}, function(data){
                    return process(data);
                });
            }
        });
    </script>
@endpush
