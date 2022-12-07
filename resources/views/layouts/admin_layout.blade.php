<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Admin">
    <meta name="Vivek Singh" content="Admin">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Service Management</title>
    
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">
    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/admin_assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{asset('assets/admin_assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    
    @livewireStyles
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @php
            use Illuminate\Support\Str;
            $allnotify = App\Models\ContactUs::where('status', 1)->take(3)->get();
            $countNotify = App\Models\ContactUs::where('status', 1)->count();
            $userDetail = App\Models\User::where('status', 1)->first();

            // echo '<pre>';print_r(Session::get('auth_name'));echo '</pre>'; exit();
        @endphp
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Vivek-Admin <small>CoolHunter</small></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Services
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-layer-group"></i>
                    <span> Category</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Category Components:</h6>
                        <a class="collapse-item" href="{{route('admin/category')}}">Category List</a>
                        <a class="collapse-item" href="{{route('admin/add_category')}}">Add Category</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Services</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Services Category:</h6>
                        <a class="collapse-item" href="{{route('admin/services')}}">Services</a>
                        <a class="collapse-item" href="{{route('admin/addServices')}}">Add Service</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>Manage Slide</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Slider Utilities:</h6>
                        <a class="collapse-item" href="{{route('admin/slider')}}">Slider List</a>
                        <a class="collapse-item" href="{{route('admin/addSlider')}}">Add Slider</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFifth"
                    aria-expanded="true" aria-controls="collapseFifth">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>Manage Contact</span>
                </a>
                <div id="collapseFifth" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Contact:</h6>
                        <a class="collapse-item" href="{{route('admin/adminContactUs')}}">Contact List</a>
                        {{-- <a class="collapse-item" href="{{route('admin/addSlider')}}">Add Slider</a> --}}
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Booking Orders</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                {{-- <img class="sidebar-card-illustration mb-2" src="{{asset('assets/admin_assets/images/mylogo7.png')}}" alt="logo" width="140px"> --}}
                <p class="text-center mb-2">Vivek-Admin</p>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    {{-- @php
                        use Illuminate\Support\Str;
                        $allnotify = App\Models\ContactUs::where('status', 1)->take(3)->get();
                        $countNotify = App\Models\ContactUs::where('status', 1)->count();
                    @endphp --}}

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">{{$countNotify}}</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Email Center
                                </h6>
                                @if ($allnotify)
                                    @foreach ($allnotify as $item)
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('admin/adminContactUs')}}">
                                        <div class="dropdown-list-image mr-4">
                                            {{$item['name']}}
                                            {{-- <div class="status-indicator bg-success"></div> --}}
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">{!! Str::words($item['msg'], 4, ' ...') !!}</div>
                                            <div class="small text-gray-500">{{$item['email']}} · {{ \Carbon\Carbon::parse($item['created_at'])->format('d/m/Y')}}</div>
                                        </div>
                                    </a>
                                    @endforeach
                                @else
                                    <p class="text-center text-dark">No Notification</p>
                                @endif
                               
                                <a class="dropdown-item text-center small text-gray-500" href="{{route('admin/adminContactUs')}}">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Session::get('auth_name')}}</span>
                                {{-- <img class="img-profile rounded-circle"src="{{asset('assets/admin_assets/img/undraw_profile.svg')}}"> --}}
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                            <form action="{{route('logout')}}" method="post" id="logout-form" style="display: none">
                                @csrf
                            </form>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    {{$slot}}
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Vivek Singh &copy; Home Service Management 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/admin_assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/admin_assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets/admin_assets/js/sb-admin-2.min.js')}}"></script>

    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        } );
    </script>

    @livewireScripts 
</body>

</html>