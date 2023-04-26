@extends('layouts.dd')
@section('title','INDEX PAGE')
@section('content')
    @if (session('create'))
        @if(app()->getLocale() == 'en')
            <div class="alert alert-success" role="alert">
                {{ session('create') }}
            </div>
        @elseif(app()->getLocale() == 'kz')
            <div class="alert alert-success" role="alert">
                Продукт қосылды.
            </div>
        @endif
    @endif
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
    @if (session('update'))
        @if(app()->getLocale() == 'en')
            <div class="alert alert-success" role="alert">
                {{ session('update') }}
            </div>
        @elseif(app()->getLocale() == 'kz')
            <div class="alert alert-success" role="alert">
               Пост Өзгертілді!!!
            </div>
        @endif
    @endif


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="col ">
                    <div class="row row-cols-1 row-cols-md-4 g-1">
                        @foreach($clubs as $club)
                            <div class="col " style="margin-bottom: 20px;">
                                <div class="card text-white  h-100 "
                                     style="width: 240px;background: linear-gradient(110.07deg, rgba(255, 255, 255, 0.2) 15.92%, rgba(164, 226, 185, 0) 101.14%), #4FA480;; ">
                                    <a href="{{route('shopByCat' ,$club->id )}}">
                                    <img src="{{$club->image}}" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$club->{'name_'.app()-> getLocale()} }}</h5>
                                        <hr>
                                        <p class="card-text">{{ __('lnblade.COUNTRY') }}: {{$club->{'country_'.app()-> getLocale()} }}</p>
                                        <p class="card-text">{{ __('lnblade.STADIUM') }}: {{$club->{'stadium_'.app()-> getLocale()} }}</p>
                                        <p class="card-text">{{ __('lnblade.TROPHIES') }}: {{$club->trophies}}</p>
                                        <p class="card-text">{{ __('lnblade.COST') }}: {{$club->cost}}$</p>
{{--                                        <p><small>author:{{$club->user->name}}</small></p>--}}
                                    </div>
                                    @can('edit',$club)
                                    <a class="btn btn-primary" href="{{route('clubs.edit',$club->id)}}">{{ __('messages.edit') }} </a>
                                    @endcan
                                        @can('delete',$club)
                                    <form action="{{route('clubs.destroy',$club->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button style="width: 239px" class="btn btn-danger" type="submit">{{ __('messages.delete') }}</button>
                                    </form>
                                    @endcan
                                </div>

                            </div>

                        @endforeach

                    </div>
            </div>
        </div>
        </div>
    </div>

@endsection
