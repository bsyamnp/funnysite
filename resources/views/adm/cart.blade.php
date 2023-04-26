@extends('layouts.adm')
@section('title','Users page')
@section('content')

    <h1> USERS PAGE! </h1>
    <div class="input-group">
        <form action="{{route('adm.users.search')}}" method="GET">
            <div class="form-outline">
                <input type="text" name="search" id="form1" class="form-control" placeholder="Search" aria-label="Search" />
            </div>
            <button type="submit" class="btn btn-primary">
                Search
            </button>
        </form>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('messages.Shop Name') }}</th>
            <th scope="col">{{ __('messages.User Name') }}</th>
            <th scope="col">{{ __('messages.color') }}</th>
            <th scope="col">{{ __('messages.size') }}</th>
            <th scope="col">{{ __('messages.status') }}</th>
            <th scope="col">#</th>
        </tr>
        </thead>
        <tbody>
        @for($i=1;$i<count($shopsInCart);$i++)
            <tr>
                <th scope="row">{{$i-1}}</th>
                <td>{{$shopsInCart[$i-1]->shop->name}}</td>
                <td>{{$shopsInCart[$i-1]->user->name}}</td>
                <td>{{$shopsInCart[$i-1]->color}}</td>
                <td>{{$shopsInCart[$i-1]->number}}</td>
                <td>{{$shopsInCart[$i-1]->status}}</td>
                <td><form action="{{route('adm.cart.confirm',$shopsInCart[$i-1]->id)}}">
                        @csrf
                        @method('PUT')
                        <button type="submit">{{ __('messages.confirm order') }}</button>
                    </form> </td>
            </tr>
        @endfor
        </tbody>
    </table>

@endsection
