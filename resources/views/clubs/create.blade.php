@extends('layouts.app')

@section('title', 'Create Page')

@section('content')


        <div class="container text-white" style="padding: 10px;margin-top:60px; ">

            <div class="col" style="padding: 5px 300px 30px 300px; ">
                <form action="{{ route('clubs.store') }}"  method="post"enctype="multipart/form-data"  style="background-color: #206D78;padding: 10px 30px 10px 30px ; border-radius: 20px">
                    @csrf
                    <div class="mb-3">
                        <label for="imgInput" class="form-label"> {{ __('lnblade.Image') }}</label>
                        <input class="form-control" type="file" id="imgInput" name="image">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            {{ __('lnblade.Name') }}
                        </label>
                        <input type="text" required name="name" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            {{ __('lnblade.Name') }}_kz
                        </label>
                        <input type="text" required name="name_kz" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            {{ __('lnblade.Name') }}_en
                        </label>
                        <input type="text" required name="name_en" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            {{ __('lnblade.COUNTRY') }}
                        </label>
                        <input type="text" required name="country" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            {{ __('lnblade.COUNTRY') }}_kz
                        </label>
                        <input type="text" required name="country_kz" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            {{ __('lnblade.COUNTRY') }}_en
                        </label>
                        <input type="text" required name="country_en" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            {{ __('lnblade.STADIUM') }}
                        </label>
                        <input type="text" required name="stadium" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            {{ __('lnblade.STADIUM') }}_kz
                        </label>
                        <input type="text" required name="stadium_kz" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            {{ __('lnblade.STADIUM') }}_en
                        </label>
                        <input type="text" required name="stadium_en" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            {{ __('lnblade.TROPHIES') }}
                        </label>
                        <input type="text" required name="trophies" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            {{ __('lnblade.COST') }}
                        </label>
                        <input type="text"  required name="cost" class="form-control">
                    </div>


                    <div class="mb-2">
                        <label class="form-label">
                            {{ __('lnblade.liga') }}
                        </label>
                        <div>
                            <select name="category_id" required class="form-select">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">
                                        <p>{{$category->name}}</p>
                                    </option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-2">
                        <button class="btn btn-light">{{ __('lnblade.ADD') }}</button>
                    </div>
                </form>
            </div>


        </div>



@endsection
