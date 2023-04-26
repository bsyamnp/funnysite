@extends('layouts.adm')
@section('title','Users page')
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

    <h1> USERS PAGE! </h1>
    <a class="btn btn-danger" href="{{ route('adm.category.create') }}">Create category</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Code</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->{'name_'.app()-> getLocale()} }}</td>
                <td>{{$category->code}}</td>
                <td><form action="{{route('adm.category.destroy',$category->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form></td>
        @endforeach
        </tbody>
    </table>

@endsection
