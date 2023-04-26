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
            <th scope="col">{{ __('messages.Name') }}</th>
            <th scope="col">Email</th>
            <th scope="col">{{ __('messages.Role') }}</th>
            <th scope="col">##</th>

        </tr>
        </thead>
        <tbody>
        @for($i=0;$i<count($users);$i++)
        <tr>
            <th scope="row">{{$i+1}}</th>
            <td>{{$users[$i]->name}}</td>
            <td>{{$users[$i]->email}}</td>
            <td>{{$users[$i]->role->name}}</td>
            <td>
                <form action="
            @if($users[$i]->is_active)
                {{route('adm.users.ban',$users[$i]->id)}}
            @else
                     {{route('adm.users.unban',$users[$i]->id)}}
                        @endif
                       "method="post">
                    @csrf
                    @method('PUT')
                    <button class="btn {{$users[$i]->is_active ? 'btn-danger': 'btn-success'}}" type="submit" >
                        @if($users[$i]->is_active)
                            {{ __('messages.Ban') }}
                        @else
                            {{ __('messages.UnBan') }}
                        @endif
                    </button>
                </form> </td>
            <td><form action="{{route('adm.users.update',$users[$i]->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div>
                        <select name="role_id">
                            @foreach($roles as $role)
                                <option
                                    @if( $role->id == $users[$i]->role_id ) selected
                                    @endif value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                        <button type="submit">OK</button>
                    </div>
                </form></td>
        </tr>
        @endfor
        </tbody>
    </table>

@endsection
