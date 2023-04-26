@extends('layouts.app')

@section('title', 'Create Page')

@section('content')


    <div class="container text-white" style="padding: 10px;margin-top:60px; ">
        <h5 align="center">
            Set new Clubs
        </h5>
        <div class="col" style="padding: 5px 300px 30px 300px; ">
            <form action="{{route('shops.store')}}"  method="post" enctype="multipart/form-data" style="background-color: #206D78;padding: 10px 30px 10px 30px ; border-radius: 20px">
                @csrf
                <div class="mb-3">
                    <label for="imgInput" class="form-label"> {{ __('lnblade.Image') }}</label>
                    <input class="form-control" type="file" id="imgInput" name="url">
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        {{ __('lnblade.Name') }}
                    </label>
                    <input type="text" required name="name" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        {{ __('messages.Price') }}
                    </label>
                    <input type="text" required name="price" class="form-control">
                </div>

                <div class="mb-2">
                    <label class="form-label">
                        {{ __('messages.Clubs') }}
                    </label>
                    <div>
                        <select name="club_id" required class="form-select">
                            @foreach($clubs as $club)
                                <option value="{{$club->id}}">
                                    <p>{{$club->name}}</p>
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-2">
                    <button class="btn btn-light">ADD </button>
                </div>
            </form>
        </div>
    </div>
@endsection
