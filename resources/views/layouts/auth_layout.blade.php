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

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <link href="{{asset('assets/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #e5e7eb;
        }
        .card{
            border-radius: 7px;
        }
        .navbar{
            background-color: #e5e7eb;
        }
    </style>
   

    @livewireStyles
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->role_as === 'ADM')
                                <li class="nav-item login-form"> 
                                    <a href="{{route('register')}}" class="nav-link" title="Register">My Account (Admin)</a>
                                    <ul class="drop-down one-column hover-fade">
                                        <li><a href="{{route('admin')}}">Admin Dashboard</a></li>
                                        <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    </ul>
                                </li>
                            @elseif(Auth::user()->role_as === 'SP')
                                <li class="nav-item login-form"> 
                                    <a href="javascript:void(0)" class="nav-link" title="Register">My Account (Service-Provider)</a>
                                    <ul class="drop-down one-column hover-fade">
                                        <li><a href="{{route('service/dashboard')}}">Service Dashboard</a></li>
                                        <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item login-form"> 
                                    <a href="javascript:void(0)" class="nav-link" title="Register">My Account (User)</a>
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
                                <a href="{{route('register')}}" class="nav-link" title="Register">Register</a>
                            </li>
                            <li class="login-form"> 
                                <a href="{{route('login')}}" class="nav-link" title="Login">Login</a>
                            </li>
                        @endif   
                    @endif
                </ul>
            </div>
        </div>
    </nav>
        
    <div>
        {{$slot}}
    </div>

    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
   

    @livewireScripts
</body>
</html>