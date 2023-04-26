@extends('layouts.adm')
@section('title','Users page')
@section('content')
    <form action="{{route('adm.users.update',$user->id)}}" method="post">
        @csrf
        @method('PUT')
        <div>
<select name="role_id">
    @foreach($roles as $role)
        <option
            @if( $role->id == $user->role_id ) selected
            @endif value="{{$role->id}}">{{$role->name}}</option>
    @endforeach
</select>
        <button type="submit">OK</button>
        </div>
    </form>
@endsection
