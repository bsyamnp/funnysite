@extends('layouts.app')
@section('title','INDEX PAGE')
@section('content')

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta property="og:type" content="site"/>
    <meta property="og:url" content="https://avrora.kz/" />
    <meta property="og:type" content="site"/>

    <link href="catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,800;1,400;1,500;1,600;1,800&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,800;1,400;1,600;1,800&display=swap" rel="stylesheet">
    <link href="catalog/view/theme/default/stylesheet/stylesheet.css" rel="stylesheet">
    <link href="catalog/view/theme/default/stylesheet/media.css?=37" rel="stylesheet">
    <link href="catalog/view/theme/default/stylesheet/stylesheet.css" rel="stylesheet">


    <link href="catalog/view/theme/default/stylesheet/jquery.mmenu.all.css" rel="stylesheet">
    <link href="catalog/view/theme/default/stylesheet/slick.css" rel="stylesheet">
    <link href="catalog/view/theme/default/stylesheet/slick-theme.css" rel="stylesheet">
    <!--<link href="catalog/view/theme/default/stylesheet/jquery.fancybox.min.css" rel="stylesheet">-->


    <link href="catalog/view/theme/default/stylesheet/personal.css?=43" rel="stylesheet">
    <link href="catalog/view/theme/default/stylesheet/media.css?=37" rel="stylesheet">
    <link href="https://avrora.kz/" rel="canonical" />


    <style type="text/css">							.xd_stickers_wrapper {
            position: absolute;
            z-index: 999;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
            line-height: 1.75;
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

         body {
             padding-top: 140px;
         }

    </style>
</head>
    @if (session('to cart'))
        @if(app()->getLocale() == 'en')
            <div class="alert alert-success" role="alert">
                {{ session('to cart') }}
            </div>
        @elseif(app()->getLocale() == 'kz')
            <div class="alert alert-success" role="alert">
                Себетке салынды
            </div>
        @endif
    @endif
    <div class="container">
        <div class="row">  <div id="content" class="col-sm-12"><div class="row row-img_wrap">
                    <div  class="col-sm-6 col-img_wrap">




                        <!-- XD stickers start -->

                        <!-- XD stickers end -->

                        <div  class="thumbimage">

                            <div class="slider-nav">


                                    <img class="img" style="margin-left:12px" src="{{$shop->url}}" alt="">


                            </div>

                            <div class="slider-for">

                                <div >

                                        <img class="img" style="margin-left:12px" src="{{$shop->url}}" alt="">

                                </div>

                            </div>

                        </div>

                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-description"></div>
                        </div>
<h1></h1>
                        <h1></h1>
                        <br>
                        <hr>
                        <div>
                            <form action="{{route('comments.store')}}" method="post">
                                @csrf
                                <textarea name="content" id="" cols="60" rows="10" required></textarea>
                                <input type="hidden"  value="{{$shop->id}}" name="shop_id">
                                <br>
                                <button type="submit"style="height: 40px; width:120px">{{ __('messages.Save') }}</button>
                            </form>
                        </div>
                        @if (session('habar'))
                            @if(app()->getLocale() == 'en')
                                <div class="alert alert-success" role="alert">
                                    {{ session('habar') }}
                                </div>
                            @elseif(app()->getLocale() == 'kz')
                                <div class="alert alert-success" role="alert">
                                    Өзгертілді
                                </div>
                            @endif
                        @endif
                        <div>
                            @foreach($shop->comments as $comment)
                                <table class="table">
                                    <thead>
                                    <tr>

                                        <th scope="col">Author</th>
                                        <th scope="col">messege</th>
                                        <th scope="col">time</th>
                                        <th scope="col"></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>


                                        <td>{{$comment->user->name}}</td>
                                        <td>{{$comment->content}}</td>
                                        <td>{{$comment->created_at}}</td>
                                        <td> @can('delete',$comment)
                                                <form action="{{route('comments.destroy',$comment->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">{{ __('messages.delete') }}</button>

                                                </form>
                                            @endcan</td>

                                    </tr>

                                    </tbody>
                                </table>



                            @endforeach

                        </div>


                    </div>
                    <div class="col-sm-6">


                        <div class="product-title_wrap" style="margin-left:12px" >
                            <h1 class="product-title" > {{$shop->name}}</h1>
                            <button type="button" data-toggle="tooltip" class="product-wishlist bt" title="В закладки" onclick="wishlist.add('6406');"><img src="/image/catalog/hearth.png"></button>
                        </div>

                        @if($avgRating!=0)
                            <h3 style="margin-left:12px" >{{$avgRating}}
                                <i style="color: yellow" class="fa fa-star"></i>
                            </h3>
                        @endif

                        <div class="price-wrap">
                            <ul class="list-unstyled product-price">

                                <li style="margin-left:12px" >
                                    <span class="price-new price-special"><span class='autocalc-product-special'>{{$shop->price}}</span></span class="price-new">
                                </li>
                            </ul>

                            <div class="product-sticker"></div>
                        </div>

                        <form action="{{route('cart.puttocart',$shop->id)}}" method="post">
                            @csrf
                        <div id="product">



          <div style="margin-left:12px"  class="form-group required form-group13">
                                <label   class="control-label"> {{ __('lnblade.color') }}:
                                    <span class="color"></span>
                                    <select name="color" style="width: 150px;height: 30px">
                                               <h1><option value="White">{{ __('lnblade.White') }}</option></h1>
                                               <option value="Black">{{ __('lnblade.Black') }}</option>
                                                <option value="Red">{{ __('lnblade.Red') }}</option>
                                               <option value="Blue">{{ __('lnblade.Blue') }}</option>

                                           </select>
                                                                        </label>
                                                                        <div id="input-option12852" class="input-option13">
                                                                            <div class="radio">
                                                                                <label class="images_option" data-popupclickimage="https://avrora.kz/image/cache/no_image-1400x2000.png">
                                                                                    <input type="radio" name="option[12852]" value="38984" data-points="0" data-prefix="+" data-price="0.0000" />
                                                                                    <img src="https://avrora.kz/image/cache/catalog/colors/bezh-45x45.png" alt="Бежевый" class="img-thumbnail" />
                                                                                    <span>Бежевый</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>



          <div class="form-group required form-group14" name="size" >
                     <base href="https://avrora.kz/" />
                        <label style="margin-left:12px" class="control-label"><div class="radio">
                         </div> {{ __('lnblade.razmer') }}:
                         <span class="size"></span>
                        <a href="/image/catalog/sizes_all.png" class="fancy sizetable">(Таблица размеров)</a>
                                                                        </label>
                                                                        <div name="size" style="margin-right:150Px" class="input-option14">
                                                                            <div class="radio">
                                                                            </div>
                                                                            <div class="radio">
                                                                                <label class="input-option14" >
                                                                                    <input type="radio" name="size" value="XL" data-points="0" data-prefix="+" data-price="0.0000" />

                                                                                    <span class="option-non_images"><option value="XL">XL</option></span>
                                                                                </label>
                                                                            </div>
                                                                            <div class="radio">
                                                                                <label class="input-option14" >
                                                                                    <input type="radio" name="size" value="L" data-points="0" data-prefix="+" data-price="0.0000" />

                                                                                    <span class="option-non_images"><option value="L">L</option></span>
                                                                                </label>
                                                                            </div>
                                                                            <div class="radio">
                                                                                <label class="input-option14" >
                                                                                    <input type="radio" name="size" value="M" data-points="0" data-prefix="+" data-price="0.0000" />

                                                                                    <span class="option-non_images"><option value="M">M</option></span>
                                                                                </label>
                                                                            </div>
                                                                            <div class="radio">
                                                                                <label class="input-option14" data-popupclickimage="https://avrora.kz/image/cache/no_image-1400x2000.png">
                                                                                    <input type="radio" name="size" value="S" data-points="0" data-prefix="+" data-price="0.0000" />

                                                                                    <span class="option-non_images"><option value="S">S</option></span>
                                                                                </label>
                                                                            </div>
                                                                            <div class="radio">
                                                                                <label class="input-option14" data-popupclickimage="https://avrora.kz/image/cache/no_image-1400x2000.png">
                                                                                    <input type="radio" name="size" value="XXL" data-points="0" data-prefix="+" data-price="0.0000" />

                                                                                    <span class="option-non_images"><option value="XXL">XXL</option></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

<br>
      <div class="form-group form-group_quantity_wrap"style="margin-left:12px" >
                                                                        <label   class="control-label" for="input-quantity">{{ __('lnblade.Quantity') }}</label>

                                    <input type="number" name="number" placeholder=1>

                                <input type="hidden" name="product_id" value="6406" />
                                <br />
                                <button type="submit" id="button-cart" data-loading-text="Загрузка..." class="bt close_modal">{{ __('messages.to cart') }}</button>

                            </div>
           </div>
                </form>
                <div class="row">
                    @can('edit',$shop)
                        <a class="btn btn-primary"style="width: 200px; margin-left: 11px" href="{{route('shops.edit',$shop->id)}}">{{ __('messages.edit') }} </a>
                    @endcan

                    @can('delete',$shop)
                        <form action="{{route('shops.destroy',$shop->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" style="width:200px " type="submit">{{ __('messages.delete') }}</button>
                        </form>
                    @endcan

                    <div class="box col-sm-12">
                        <div class="review-title">{{ __('lnblade.Reviews') }} </div>
                        @auth
                            <form action="{{route('shops.rate',$shop->id)}}" method="post">
                                @csrf

                                <select style="width: 140px; height: 30px" name="rating">
                                    @for($i=0;$i<=5;$i++){
                                    <option {{ $myRating==$i ? 'selected' : '' }}value="{{$i}}">
                                        {{$i==0 ? 'Not rated'  : $i}}
                                    </option>
                                    @endfor
                                </select>
                                <button style="width: 180px;height: 30px" type="submit">{{ __('messages.Rate') }}</button>
                            </form>
                            <form  action="{{route('shops.unrate',$shop->id)}}" method="post">
                                @csrf
                                <button  style="width: 140px; height: 30px " type="submit">{{ __('messages.UnRate') }}</button>
                            </form>

                        @endauth


                </div>

            </div>
        </div>
            </div>
        </div>
    </div>








@endsection
