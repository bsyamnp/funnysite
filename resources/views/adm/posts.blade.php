@extends('layouts.adm')
@section('title','Posts page')
@section('content')
    <h1> USERS PAGE! </h1>
    <a class="btn btn-danger" href="{{ route('adm.category.create') }}">Create category</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
        </tr>
        </thead>
        <tbody>
       @foreach($shops as $shop)
            <tr>
                <th scope="row">{{$shop->id}}</th>
                <td>{{$shop->name}}</td>
                <td>{{$shop->price}}</td>
                <td>
                    <form action="{{route('shops.destroy',$shop->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" style="width:200px " type="submit">{{ __('messages.delete') }}</button>
                    </form></td>
       @endforeach
        </tbody>
    </table>

@endsection
