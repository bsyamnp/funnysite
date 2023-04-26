@extends('layouts.app')
@section('title', 'Create Page')
@section('content')
<form action="{{route('clubs.update',$club->id)}}" method="post" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <div class="col-6 mx-auto">
        <h1 class="text-center">
            Detalis Teams
        </h1>
        <div class="row mt-3">
            <div class="col-16">
                <input class="form-control" type="file" value="{{$club->image}}" name="image">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <input type="text" value="{{$club->name}}" name="name">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <input type="text" value="{{$club->name_kz}}" name="name_kz">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <input type="text" value="{{$club->name_en}}"_en name="name_en">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <input type="text" value="{{$club->country}}" name="country">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <input type="text" value="{{$club->country_kz}}" name="country_kz">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <input type="text" value="{{$club->country_en}}" name="country_en">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <input type="text" value="{{$club->stadium}}" name="stadium">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <input type="text" value="{{$club->stadium_kz}}" name="stadium_kz">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <input type="text" value="{{$club->stadium_en}}" name="stadium_en">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <input type="text" value="{{$club->trophies}}" name="trophies">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <input type="text" value="{{$club->cost}}" name="cost">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-13">
                <select name="category_id">
                    @foreach($categories as $category)
                        <option
                            @if( $category->id == $club->category_id ) selected
                            @endif value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit">OK</button>
    </div>

</form>
@endsection
