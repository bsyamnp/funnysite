@extends('layouts.app')
@section('title','INDEX PAGE')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-15">
                <div class="col-sm-15">
                    <div class="card" >

                                    <div class="card-body">
                                        <h5  align="center">{{$clubs->{'name_'.app()-> getLocale()} }}</h5>

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@if($avgRating!=0)
    <h3>{{ __('lnblade.Rating') }}: {{$avgRating}}</h3>
@endif

@auth
    <form action="{{route('clubs.rate',$clubs->id)}}" method="post">
        @csrf

        <select name="rating">
            @for($i=0;$i<=5;$i++){
            <option {{ $myRating==$i ? 'selected' : '' }}value="{{$i}}">
                {{$i==0 ? 'Not rated'  : $i}}
            </option>
            @endfor
        </select>
        <button type="submit">{{ __('messages.Rate') }}</button>
    </form>
    <form action="{{route('clubs.unrate',$clubs->id)}}" method="post">
        @csrf
        <button type="submit">{{ __('messages.UnRate') }}</button>
    </form>

@endauth
    @can('edit',$clubs)
<a class="btn btn-primary" href="{{route('clubs.edit',$clubs->id)}}">{{ __('messages.edit') }} </a>
    @endcan
@can('delete',$clubs)
<form action="{{route('clubs.destroy',$clubs->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit">{{ __('messages.delete') }}</button>
</form>
@endcan
<br><br><br>


<div>
    <form action="{{route('comments.store')}}" method="post">
        @csrf
        <textarea name="content" id="" cols="40" rows="5" required></textarea>
        <input type="hidden"  value="{{$clubs->id}}" name="club_id">
        <br>
        <button type="submit">{{ __('messages.Save') }}</button>
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
<p>Comments:</p>

 <div>
        @foreach($clubs->comments as $comment)
        <p>{{$comment->content}}
            <small>{{$comment->created_at}} | author: {{$comment->user->name}}</small></p>
         @can('delete',$comment)
            <form action="{{route('comments.destroy',$comment->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">{{ __('messages.delete') }}</button>

            </form>
@endcan
        @endforeach

</div>
@endsection
