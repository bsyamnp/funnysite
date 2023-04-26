@extends('layouts.app')
@section('title', 'Create Page')
@section('content')
    <form action="{{route('shops.update',$shop->id)}}" method="post" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="col-6 mx-auto">
            <h1 class="text-center">
                Detalis Teams
            </h1>
            <div class="row mt-3">
                <div class="col-16">
                    <input class="form-control" type="file" value="{{$shop->url}}" name="url">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <input type="text" value="{{$shop->name}}" name="name">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-6">
                    <input type="text" value="{{$shop->price}}" name="price">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-13">
                    <select name="club_id">
                        @foreach($clubs as $cl)
                            <option
                                @if( $cl->id == $shop->club_id ) selected
                                @endif value="{{$cl->id}}">{{$cl->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit">OK</button>
        </div>
    </form>
@endsection
