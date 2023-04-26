@extends('layouts.app')
@section('title','Category page')
@section('content')
    <h1> Create Category! </h1>

    <div class="container text-white" style="padding: 10px;margin-top:60px; ">

        <div class="col" style="padding: 5px 300px 30px 300px; ">
            <form action="{{ route('adm.category.store') }}"  method="post" style="background-color: #206D78;padding: 10px 30px 10px 30px ; border-radius: 20px">
                @csrf

                <div class="mb-2">
                    <label class="form-label">
                        Name
                    </label>
                    <input type="text" required name="name" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        Name_en
                    </label>
                    <input type="text" required name="name_en" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        Name_kz
                    </label>
                    <input type="text" required name="name_kz" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        Code
                    </label>
                    <input type="text" required name="code" class="form-control">
                </div>
                <div class="mb-2">
                    <button class="btn btn-light">ADD </button>
                </div>
@endsection
