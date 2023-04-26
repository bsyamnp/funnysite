@extends('layouts.app')
@section('title','INDEX PAGE')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <style>
        body,
        html {
            height: 100%;
        }

        .d-flex {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .align-center {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .flex-centerY-centerX {
            justify-content: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        body {
            background-color: #f7f7f7;
        }

        .page-wrapper {
            height: 100%;
            display: table;
        }

        .page-wrapper .page-inner {
            display: table-cell;
            vertical-align: middle;
        }

        .el-wrapper {
            width: 360px;
            padding: 15px;
            margin: 15px auto;
            background-color: #fff;
        }

        @media (max-width: 991px) {
            .el-wrapper {
                width: 345px;
            }
        }

        @media (max-width: 767px) {
            .el-wrapper {
                width: 290px;
                margin: 30px auto;
            }
        }

        .el-wrapper:hover .h-bg {
            left: 0px;
        }

        .el-wrapper:hover .price {
            left: 20px;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
            color: #818181;
        }

        .el-wrapper:hover .add-to-cart {
            left: 50%;
        }

        .el-wrapper:hover .img {
            webkit-filter: blur(7px);
            -o-filter: blur(7px);
            -ms-filter: blur(7px);
            filter: blur(7px);
            filter: progid:DXImageTransform.Microsoft.Blur(pixelradius='7', shadowopacity='0.0');
            opacity: 0.4;
        }

        .el-wrapper:hover .info-inner {
            bottom: 155px;
        }

        .el-wrapper:hover .a-size {
            -webkit-transition-delay: 300ms;
            -o-transition-delay: 300ms;
            transition-delay: 300ms;
            bottom: 50px;
            opacity: 1;
        }

        .el-wrapper .box-down {
            width: 100%;
            height: 60px;
            position: relative;
            overflow: hidden;
        }

        .el-wrapper .box-up {
            width: 100%;
            height: 300px;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .el-wrapper .img {
            padding: 20px 0;
            -webkit-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
            -moz-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
            -o-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
            transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
        }

        .h-bg {
            -webkit-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
            -moz-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
            -o-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
            transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            width: 660px;
            height: 100%;
            background-color: #3f96cd;
            position: absolute;
            left: -659px;
        }

        .h-bg .h-bg-inner {
            width: 50%;
            height: 100%;
            background-color: #464646;
        }

        .info-inner {
            -webkit-transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
            -moz-transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
            -o-transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
            transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            position: absolute;
            width: 100%;
            bottom: 25px;
        }

        .info-inner .p-name,
        .info-inner .p-company {
            display: block;
        }

        .info-inner .p-name {
            font-family: 'PT Sans', sans-serif;
            font-size: 18px;
            color: #252525;
        }

        .info-inner .p-company {
            font-family: 'Lato', sans-serif;
            font-size: 12px;
            text-transform: uppercase;
            color: #8c8c8c;
        }

        .a-size {
            -webkit-transition: all 300ms cubic-bezier(0, 0, 0.18, 1);
            -moz-transition: all 300ms cubic-bezier(0, 0, 0.18, 1);
            -o-transition: all 300ms cubic-bezier(0, 0, 0.18, 1);
            transition: all 300ms cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            position: absolute;
            width: 100%;
            bottom: -20px;
            font-family: 'PT Sans', sans-serif;
            color: #828282;
            opacity: 0;
        }

        .a-size .size {
            color: #252525;
        }

        .cart {
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            font-family: 'Lato', sans-serif;
            font-weight: 700;
        }

        .cart .price {
            -webkit-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
            -moz-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
            -o-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
            transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            -webkit-transition-delay: 100ms;
            -o-transition-delay: 100ms;
            transition-delay: 100ms;
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            font-size: 16px;
            color: #252525;
        }

        .cart .add-to-cart {
            -webkit-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
            -moz-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
            -o-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
            transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            -webkit-transition-delay: 100ms;
            -o-transition-delay: 100ms;
            transition-delay: 100ms;
            display: block;
            position: absolute;
            top: 50%;
            left: 110%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .cart .add-to-cart .txt {
            font-size: 12px;
            color: #fff;
            letter-spacing: 0.045em;
            text-transform: uppercase;
            white-space: nowrap;
        }

    </style>
</head>
<body>
@if (session('createshop'))
    @if(app()->getLocale() == 'en')
        <div class="alert alert-success" role="alert">
            {{ session('createshop') }}
        </div>
    @elseif(app()->getLocale() == 'kz')
        <div class="alert alert-success" role="alert">
            Продукт қосылды.
        </div>
    @endif
@endif
@if (session('deletesh'))
    @if(app()->getLocale() == 'en')
        <div class="alert alert-success" role="alert">
            {{ session('deletesh') }}
        </div>
    @elseif(app()->getLocale() == 'kz')
        <div class="alert alert-success" role="alert">
            Пост қосылды.
        </div>
    @endif
@endif
{{--<div class="row" >--}}
{{--    <div class="col-lg-12 d-flex justify-content-center">--}}
{{--        <ul id="portfolio-flters">--}}
{{--            @foreach($clubs as $cl)--}}
{{--                <a href="{{route('shopByCat' ,$cl->id )}}" style="margin: 8px;"> {{$cl->name }}</a>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="container page-wrapper">
    <div class="page-inner">
        <div class="row row-cols-1 row-cols-md-4 g-1">
            @foreach($shops as $shop)
            <div class="el-wrapper">
                <div class="box-up">
                    <a href="{{route('shops.show' , $shop->id) }}">
                    <img class="img" src="{{$shop->url}}" alt="">
                    </a>
                    <div class="img-info">
                        <div class="info-inner">
                            <span class="p-name">{{$shop->name}}</span>
                        </div>
                        <div class="a-size">Available sizes : <span class="size">S , M , L , XL</span></div>
                    </div>
                </div>

                <div class="box-down">
                    <div class="h-bg">
                        <div class="h-bg-inner"></div>
                    </div>

                    <a class="cart" href="#">
                        <span class="price">{{$shop->price}}</span>
                        <form action="{{route('shops.show' , $shop->id) }}" method="get">
                            @csrf
                            <button type="submit">
                        <span class="add-to-cart">

              <span class="txt">{{ __('messages.Add in cart') }}</span>
            </span>
                            </button>
                        </form>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
@endsection
