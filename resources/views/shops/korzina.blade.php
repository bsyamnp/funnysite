
@extends('layouts.app')
@section('title','INDEX PAGE')
@section('content')
    <head>
        <style>
            .gradient-custom {
                /* fallback for old browsers */
                background: #6a11cb;

                /* Chrome 10-25, Safari 5.1-6 */
                background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
            }
            body {
                padding-top: 70px;
            }
        </style>
    </head>
    @if (session('delete'))
        @if(app()->getLocale() == 'en')
            <div class="alert alert-success" role="alert">
                {{ session('delete') }}
            </div>
        @elseif(app()->getLocale() == 'kz')
            <div class="alert alert-success" role="alert">
                Пост жойылды
            </div>
        @endif
    @endif
    @if (session('buy'))
        @if(app()->getLocale() == 'en')
            <div class="alert alert-success" role="alert">
                {{ session('buy') }}
            </div>
        @elseif(app()->getLocale() == 'kz')
            <div class="alert alert-success" role="alert">
                Сатып алынды
            </div>
        @endif
    @endif
    <body class="h-150 gradient-custom">
    <section class="h-150 gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center my-4">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Cart</h5>
                        </div>
                        <div class="card-body">
                            <!-- Single item -->
                            @foreach($shopsInCart as $shop)
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                        <!-- Image -->
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                            <img src="{{$shop->url}}"
                                             class="w-100" alt="Blue Jeans Jacket"/>
                                            <a href="#!">
                                                <div class="mask" style="background-color: rgba(51, 251, 251, 0.2)"></div>
                                            </a>
                                        </div>
                                        <!-- Image -->
                                    </div>

                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <!-- Data -->
                                        <p><strong>{{$shop->name}}</strong></p>

                                        <p class="card-text"> Number: {{$shop->pivot->number}}</p>
                                        <p class="card-text">Color: {{$shop->pivot->color}}</p>
                                        <p class="card-text">Size: {{$shop->pivot->size}}</p>
                                        <p><form action="{{route('cart.deletefromcart',$shop->id)}}" method="post">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-primary" type="submit">{{ __('messages.delete') }}</button>
                                        </form></p>

                                        <!-- Data -->
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                        <p class="text-start text-md-center">
                                            <strong>{{$shop->pivot->number*$shop->price}} KZT ({{$shop->pivot->number}}x {{$shop->price}} )</strong>
                                        </p>
                                    </div>
                                </div>
                                <!-- Single item -->

                                <hr class="my-4" />
                            @endforeach

                            <!-- Single item -->

                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body">
                            <p><strong>We accept</strong></p>
                            <img class="me-2" width="45px"
                                 src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                                 alt="Visa" />
                            <img class="me-2" width="45px"
                                 src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                                 alt="American Express" />
                            <img class="me-2" width="45px"
                                 src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                                 alt="Mastercard" />
                            <img class="me-2" width="45px"
                                 src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.webp"
                                 alt="PayPal acceptance mark" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">{{ __('lnblade.Summary') }} </h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <div>
                                    <strong>Сатып алу</strong>
                                    <strong>
                                        <p class="mb-0">(including VAT)</p>
                                    </strong>
                                </div>
                                </li>
                            </ul>
{{--                            @foreach($shopsInCart as $shop)--}}
                            <form action="{{route('cart.buy')}}" method="post">
                                @csrf
                                <button class="btn btn-primary btn-lg btn-block" type="submit">{{ __('messages.Buy All') }} </button>
                            </form>
{{--                            @endforeach--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
@endsection
