<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Service Management - Online Service Provider for your House Needs</title>
    <meta name="Service-Management" content="service-Management">
    <meta name="Online Service Provider for your House Needs" content="">
    <meta name="Vivek Singh" content="Online Service Provider for your House Needs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">
    <link href="{{asset('assets/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap/bootstrap-theme.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/bootstrap/bootstrap-slider.css')}}" rel="stylesheet" media="screen">
    
    <link href="{{asset('assets/css/dtb/jquery.dataTables.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/toastr.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/theme-responsive.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/chblue.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" media="screen">

    @livewireStyles
</head>
<body>
    <div id="layout">
        <div class="info-head">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="visible-md visible-lg text-left">
                            <li><a href="tel:+919004069694"><i class="fa fa-phone"></i> +91-9004069694</a></li>
                            <li><a href="mailto:vivek.singh57@ymail.com"><i class="fa fa-envelope"></i>
                                    vivek.singh57@ymail.com</a></li>
                        </ul>
                        <ul class="visible-xs visible-sm">
                            <li class="text-left"><a href="tel:+919004069694"><i class="fa fa-phone"></i>
                                    +91-9004069694</a></li>
                            <li class="text-right"><a href="javascript:void(0)"><i
                                        class="fa fa-map-marker"></i> Mira Road, Mumbai</a></li>
                        </ul>
                    </div>

                    @livewire('location-component')
                </div>
            </div>
        </div>
        <header id="header" class="header-v3">
            <nav class="flat-mega-menu">
                <label for="mobile-button"> <i class="fa fa-bars"></i></label>
                <input id="mobile-button" type="checkbox">

                <ul class="collapse">
                    <li class="title">
                        <a href="/"><img src="{{asset('assets/images/mylogo7.png')}}"></a>
                    </li>

                    @php
                        $allCategory = \App\Models\Category::get();
                        $allSubCategory = \App\Models\SubCategory::get();

                    @endphp

                    @foreach ($allCategory as $category)
                    <li> 
                        <a href="#">{{$category->category_name}}</a>
                        <ul class="drop-down one-column hover-fade">
                            @foreach ($allSubCategory as $key => $subCategory)
                                @if ($category->id == $subCategory->parentCategory_id)
                                    <li><a href="{{url('serviceByCategory/'.$subCategory['subCategory_slug'])}}">{{$subCategory->subCategory_name}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    @endforeach

                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->role_as === 'ADM')
                                <li class="login-form"> 
                                    <a href="{{route('register')}}" title="Register">My Account (Admin)</a>
                                    <ul class="drop-down one-column hover-fade">
                                        <li><a href="{{route('admin')}}">Admin Dashboard</a></li>
                                        <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    </ul>
                                </li>
                            @elseif(Auth::user()->role_as === 'SP')
                                <li class="login-form"> 
                                    <a href="javascript:void(0)" title="Register">My Account (Service-Provider)</a>
                                    <ul class="drop-down one-column hover-fade">
                                        <li><a href="{{route('service/dashboard')}}">Service Dashboard</a></li>
                                        <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    </ul>
                                </li>
                            @else
                                <li class="login-form"> 
                                    <a href="javascript:void(0)" title="Register">My Account (User)</a>
                                    <ul class="drop-down one-column hover-fade">
                                        <li><a href="{{route('dashboard')}}">User Dashboard</a></li>
                                        <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    </ul>
                                </li>
                            @endif

                            <form action="{{route('logout')}}" method="post" id="logout-form" style="display: none">
                                @csrf
                            </form>
                        @else
                            <li class="login-form"> 
                                <a href="{{route('register')}}" title="Register">Register</a>
                            </li>
                            <li class="login-form"> 
                                <a href="{{route('login')}}" title="Login">Login</a>
                            </li>
                        @endif   
                    @endif

                    <li class="search-bar">
                    </li>
                </ul>
            </nav>
        </header>
        
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
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @if ($orderDetail)
                                <tr>
                                    <th>1</th>
                                    <td>{{$orderDetail['order']['user_name']}}</td>
                                    <td>{{$orderDetail['order']['user_phone']}}</td>
                                    <td>{{$orderDetail['service_name']}}</td>
                                    <td>{{$orderDetail['service_charge']}}</td>
                                    <td>{{$orderDetail['order']['order_id']}}</td>
                                    <td>{{$orderDetail['order']['payment_id']}}</td>
                                    <td><a href="{{url('downloadInvoice/'.$orderDetail['id'])}}">Download</a></td>
                                  </tr>
                                @endif
                            </tbody>
                          </table>
                    </div>
                </div>
                <div class="paddings-mini text-center">
                    <h2><a href="{{route('category')}}">Go to Services</a></h2>
                </div>
            </div>
            <div class="content_info">
                <div class="skin_base paddings-mini color-white text-center">
                    <h2>Need Help? Call our Expert 24 X 7 - +91-9004069694</h2>
                </div>
            </div>            
        </section>

        <footer id="footer" class="footer-v1">
            <div class="container">
                @php
                    $allCategoryFooter = \App\Models\Category::take(3)->inRandomOrder()->get();
                    $allSubCategoryFooter = \App\Models\SubCategory::take(6)->inRandomOrder()->get();

                @endphp

                <div class="row visible-md visible-lg">
                    @foreach ($allCategoryFooter as $category)
                    <div class="col-md-3 col-xs-6 col-sm-6">
                        <h3>{{$category->category_name}} </h3>
                        <ul>
                            @foreach ($allSubCategoryFooter as $key => $subCategory)
                                @if ($category->id == $subCategory->parentCategory_id)
                                    <li><i class="fa fa-check"></i> <a href="{{url('serviceByCategory/'.$subCategory['subCategory_slug'])}}">{{$subCategory->subCategory_name}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                    <div class="col-md-3 col-xs-6 col-sm-6">
                        <h3>CONTACT US</h3>
                        <ul class="contact_footer">
                            <li class="location">
                                <i class="fa fa-map-marker"></i> <a href="{{route('changeLocation')}}">{{Session::get('street_name') ?? 'Mira Road'}}, {{Session::get('city') ?? 'Mumbai'}}, {{Session::get('country') ?? 'India'}}</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i> <a
                                    href="mailto:vivek.singh57@ymail.com">vivek.singh57@ymail.com</a>
                            </li>
                            <li>
                                <i class="fa fa-headphones"></i> <a href="tel:+919004069694">+91-9004069694</a>
                            </li>
                        </ul>
                        <h3 style="margin-top: 10px">FOLLOW US</h3>
                        <ul class="social">
                            <li class="facebook"><span><i class="fa fa-facebook"></i></span><a href="#"></a></li>
                            <li class="twitter"><span><i class="fa fa-twitter"></i></span><a href="#"></a></li>
                            <li class="github"><span><i class="fa fa-instagram"></i></span><a href="#"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row visible-sm visible-xs">
                    <div class="col-md-6">
                        <h3 class="mlist-h">CONTACT US</h3>
                        <ul class="contact_footer mlist">
                            <li class="location">
                                <i class="fa fa-map-marker"></i> <a href="{{route('changeLocation')}}">{{Session::get('street_name') ?? 'Mira Road'}}, {{Session::get('city') ?? 'Mumbai'}}, {{Session::get('country') ?? 'India'}}</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i> <a
                                    href="mailto:vivek.singh57@ymail.com">vivek.singh57@ymail.com</a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i> <a href="tel:+919004069694">+91-9004069694</a>
                            </li>
                        </ul>
                        <ul class="social mlist-h">
                            <li class="facebook"><span><i class="fa fa-facebook"></i></span><a href="javascript:void(0)"></a></li>
                            <li class="twitter"><span><i class="fa fa-twitter"></i></span><a href="javascript:void(0)"></a></li>
                            <li class="github"><span><i class="fa fa-instagram"></i></span><a href="javascript:void(0)"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-down">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="nav-footer">
                                <li><a href="javascript:void(0)">About Us</a> </li>
                                <li><a href="{{route('contactUs')}}">Contact Us</a></li>
                                <li><a href="javascript:void(0)">FAQ</a></li>
                                <li><a href="javascript:void(0)">Terms of Use</a></li>
                                <li><a href="javascript:void(0)">Privacy</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <p class="text-xs-center crtext">&copy; 2022-23 RuntimeTerror. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>                
            </div>
        </footer>
    </div>

    <script type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery-ui.1.10.4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/toastr.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/modernizr.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/nav/jquery.sticky.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/totop/jquery.ui.totop.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/accordion/accordion.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/maps/gmap3.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/fancybox/jquery.fancybox.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/carousel/carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/filters/jquery.isotope.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/flickr/jflickrfeed.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/theme-options/theme-options.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/theme-options/jquery.cookies.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap/bootstrap-slider.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/dtb/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/dtb/jquery.table2excel.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/dtb/script.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/validation-rule.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap3-typeahead.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('.tp-banner').show().revolution({
                dottedOverlay: "none",
                delay: 5000,
                startwidth: 1170,
                startheight: 480,
                minHeight: 250,
                navigationType: "none",
                navigationArrows: "solo",
                navigationStyle: "preview1"
            });
        });
    </script>

    <!--Start of Tawk.to Script-->
    {{-- <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/638b1e66daff0e1306dab940/1gjbmtg9m';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script> --}}
    <!--End of Tawk.to Script-->

    {{-- @stack('scripts')
    @livewireScripts --}}
</body>
</html>