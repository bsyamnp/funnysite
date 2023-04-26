<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Первоапрельская зона</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <!-- CSS only -->


    <!-- Template Main CSS File -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/show.css')}}" rel="stylesheet">
    <!-- =======================================================
    * Template Name: BizPage - v5.10.1
    * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    <style type="text/css">								.xd_stickers_wrapper {
            position: absolute;
            z-index: 999;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
            line-height: 1.75;
        }
        .xd_stickers_wrapper {
            top: 5px;
            left: 15px;
            right: auto;
        }
        .xd_stickers {
            padding: 0 10px;
            margin-bottom: 5px;
        }
        .xd_sticker_sale {
            background-color:#ae0000;
            color:#FFFFFF;
        }
        .xd_sticker_novelty {
            background-color:#d5ae37;
            color:#ffffff;
        }
        .xd_sticker_last {
            background-color:#c91a1a;
            color:#ffffff;
        }
        .xd_sticker_0 {
            background-color:#bd0000;
            color:#ffffff;
        }
        .xd_sticker_1 {
            background-color:#d62222;
            color:#000000;
        }
        .xd_sticker_2 {
            background-color:#bd0000;
            color:#ffffff;
        }
        .xd_sticker_3 {
            background-color:#424242;
            color:#ffffff;
        }
    </style>
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid">

        <div class="row justify-content-center align-items-center">
            <div class="col-xl-11 d-flex align-items-center justify-content-between">
                <h1 class="logo"><a href="index.html">Football</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                <li id="navbar" class="navbar">
                    <ul>
                       <a class="nav-link scrollto active" href="{{route('clubs.index')}}">{{ __('messages.Home') }}</a>
                        <a class="nav-link scrollto" href="#about">{{ __('messages.About') }}</a>

                        <a class="nav-link  " href="{{route('cart.index')}}">{{ __('messages.Korzina') }}</a>

                        <ul class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                {{config('app.languages')[app()->getLocale()]}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @foreach(config('app.languages') as $ln=>$lang)
                                    <a class="nav-link active " href="{{route('switch.lang',$ln)}}">
                                        {{$lang}}
                                    </a>
                                @endforeach
                            </div>
                           </ul>

                        @can('viewAny', App\Models\Club::class)

                                <a href="{{route('adm.users.index')}}">{{ __('messages.Admin Page') }}</a>


                        @endcan
                        @can('create', App\Models\Club::class)
                            <a  href="{{ route('clubs.create') }}">{{ __('messages.create club') }}</a>
                        @endcan
{{--                        @can('create', App\Models\Category::class)--}}
{{--                            <a  href="{{ route('category.cr') }}">{{ __('messages.Create Category!') }}</a>--}}
{{--                        @endcan--}}
                        @can('create', App\Models\Shop::class)
                           <a  href="{{ route('shops.create')}}">{{ __('messages.create tovar') }}</a>
                        @endcan
                         <a href="{{ route('shops.index')}}">{{ __('messages.Buy now') }}</a>

<li>

                        <li><li class="hover-cart-user"><a class="click-hover-user" href="#"><span class="pe-7s-user"></span></a>
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))

                                        <li class="nav-item">
                                            <a class="nav-link scrollto" href="{{ route('login') }}">{{ __('messages.login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link scrollto" href="{{ route('register') }}">{{ __('messages.register') }}</a>
                                        </li>
                                    @endif
                                @else

                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="nav-link active" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </li>
                    </ul>
                         </li>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->
            </div>
        </div>

    </div>
</header><!-- End Header -->
<div>
</div>


<script src="{{asset('vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('vendor/aos/aos.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('vendor/waypoints/noframework.waypoints.js')}}"></script>
<script src="{{asset('vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('js/main.js')}}"></script>


@yield('content')

</body>

</html>
