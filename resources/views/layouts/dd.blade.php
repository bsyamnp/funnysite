<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Football</title>
    <meta content="" name="description">
    <meta content="" name="keywords">




    <!-- Vendor CSS Files -->
    <link href="{{asset('vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/show.css')}}" rel="stylesheet">
    <!-- =======================================================
    * Template Name: BizPage - v5.10.1
    * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    <style>
        body {
            padding-top: 10px;
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


                        <ul class="nav-item dropdown">
                            @auth
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre >{{ __('messages.Balance') }}: {{\Illuminate\Support\Facades\Auth::user()->balance}} t</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="nav-link active " href="{{route('shops.balance', \Illuminate\Support\Facades\Auth::user()->id)}}">
                                        {{__('messages.Replenish the balance')}}
                                    </a>
                                </div>
                            @endauth
                        </ul>

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
<!-- ======= hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <div class="carousel-item active" style="background-image: url({{asset('img/hero-carousel/6.jpg')}}">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">{{ __('lnblade.VAMOS') }}</h2>
                            <p class="animate__animated animate__fadeInUp"> {{ __('lnblade.content') }}</p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url({{asset('img/hero-carousel/7.jpg')}}">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">{{ __('lnblade.VAMOS') }}</h2>
                            <p class="animate__animated animate__fadeInUp"> {{ __('lnblade.content') }}</p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url({{asset('img/hero-carousel/8.jpg')}}">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">{{ __('lnblade.VAMOS') }}</h2>
                            <p class="animate__animated animate__fadeInUp"> {{ __('lnblade.content') }}</p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url({{asset('img/hero-carousel/9.jpg)')}}">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">{{ __('lnblade.VAMOS') }}</h2>
                            <p class="animate__animated animate__fadeInUp"> {{ __('lnblade.content') }}</p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url({{asset('/img/hero-carousel/10.jpg)')}}">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">{{ __('lnblade.VAMOS') }}</h2>
                            <p class="animate__animated animate__fadeInUp"> {{ __('lnblade.content') }}</p>

                        </div>
                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </div>
</section><!-- End Hero Section -->

<main id="main">

    <!-- ======= Featured Services Section Section ======= -->
    <section id="featured-services">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 box">
                    <i class="bi bi-briefcase"></i>
                    <h4 class="title"><a href="">{{ __('lnblade.dostavka') }}</a></h4>
                    <p class="description">{{ __('lnblade.dostavka content') }} </div>

                <div class="col-lg-4 box box-bg">
                    <i class="bi bi-card-checklist"></i>
                    <h4 class="title"><a href="">{{ __('lnblade.Skidka') }}</a></h4>
                    <p class="description">{{ __('lnblade.skidka content') }} </div>

                <div class="col-lg-4 box">
                    <i class="bi bi-binoculars"></i>
                    <h4 class="title"><a href="">{{ __('lnblade.qosimsha') }}</a></h4>
                    <p class="description">{{ __('lnblade.qosimsha content') }}</div>

            </div>
        </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about">
        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h3>{{ __('lnblade.About Us') }}</h3>
                <p>{{ __('lnblade.ABOUT CONTENT') }}</p>
            </header>

            <div class="row about-cols">

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="about-col">
                        <div class="img">
                            <img src="assets/img/about-mission.jpg" alt="" class="img-fluid">
                            <div class="icon"><i class="bi bi-bar-chart"></i></div>
                        </div>
                        <h2 class="title"><a href="#">{{ __('lnblade.OUR MISSION') }}</a></h2>
                        <p>
                            {{ __('lnblade.MISSION CONTENT') }}
                        </p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-col">
                        <div class="img">
                            <img src="assets/img/about-plan.jpg" alt="" class="img-fluid">
                            <div class="icon"><i class="bi bi-brightness-high"></i></div>
                        </div>
                        <h2 class="title"><a href="#">{{ __('lnblade.OUR PLAN') }}</a></h2>
                        <p>
                            {{ __('lnblade.PLAN CONTENT') }}
                        </p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="about-col">
                        <div class="img">
                            <img src="assets/img/about-vision.jpg" alt="" class="img-fluid">
                            <div class="icon"><i class="bi bi-calendar4-week"></i></div>
                        </div>
                        <h2 class="title"><a href="#">{{ __('lnblade.OUR VISION') }}</a></h2>
                        <p>
                            {{ __('lnblade.VISION CONTENT') }}
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End About Us Section -->



    <section id="portfolio" class="section-bg">
        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h3 class="section-title">{{ __('lnblade.OUR CLUBS') }}</h3>
            </header>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class=" col-lg-12">

                    <div style="position: relative; margin-top: 10px; ">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                                    aria-controls="panelsStayOpen-collapseOne">
                                                {{ __('lnblade.liga') }}
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                             aria-labelledby="panelsStayOpen-headingOne">
                                            <div class="accordion-body">
                                                @foreach($categories as $category)
                                                    <p><a href="{{route('clubByCat' ,$category->id )}}"> {{$category->{'name_'.app()-> getLocale()} }}</a></p>
                                                @endforeach
                                                <p>
                                                    <a href="{{route('clubs.index')}}">All</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </div>
                        </div>
                    </div>


            </div>
        </div>
        </div>
                    <main class="py-4">
                        @yield('content')
                    </main>






    </section><!-- End Portfolio Section -->


</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-info">
                    <h3>Football</h3>
                    <p>{{ __('lnblade.contentnn') }}</div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>{{ __('lnblade.USEFUL LINKS') }}</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">{{ __('messages.Home') }}</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">{{ __('lnblade.About Us') }}</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">{{ __('lnblade.dostavka') }}</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">{{ __('lnblade.Skidka') }}</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">{{ __('lnblade.qosimsha') }}</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>{{ __('lnblade.CONTACT US') }}</h4>
                    <p>
                        {{ __('lnblade.adress') }}: Almaty, Taugul-1,46<br>
                        Kazakhstan <br>
                        <strong>{{ __('lnblade.phone') }}</strong>: +8 747 757 9236<br>
                        <strong>email</strong>: yernur.assilov@narxoz.kz <br>
                    </p>

                    <div class="social-links">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>

                </div>



            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>Football</strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
          -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Uncomment below i you want to use a preloader -->
<!-- <div id="preloader"></div> -->

<!-- Vendor JS Files -->
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

</body>

</html>
