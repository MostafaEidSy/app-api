@extends('site.layouts.dashboard')

@section('title')
    ACCOUNT – Online-Marketing-Agentur Mastermind
@endsection

@section('content')
    <div class="dashboard-account">
        <div class="title">
            <h4>Hallo {{auth()->user()->name}}, hier kannst du dein Kennwort ändern:</h4>
        </div>
        <div class="body">
            <div class="container-fluid">
                <div class="form">
                    @include('admin.alerts.alert')
                    <form method="post" action="{{route('home.dashboard.account.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="email">Benutzername</label>
                            <input type="email" name="email" id="email" class="form-control" readonly="readonly" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Vorname und Nachname <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" required="required" value="{{$user->name}}">
                            @error('name')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Neues Kennwort</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="username">Nutzername <span class="text-danger">*</span></label>
                            <input type="text" name="username" id="username" class="form-control" required="required" value="{{$user->username}}">
                            @error('username')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="birthday">Geburtstag</label>
                            <input type="date" name="birthday" id="birthday" class="form-control" value="{{$user->birthday}}">
                            @error('birthday')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="avatar">Benutzerbild</label>
                            <div class="img-user">
                                @if($user->avatar == '' || $user->avatar == null)
                                    <img src="{{asset('assets/img/users/1-1.png')}}" alt="{{$user->name}}">
                                @else
                                    <img src="{{asset('uploads/avatar/' . $user->avatar)}}" alt="{{$user->name}}">
                                @endif
                            </div>
                            <input type="file" name="avatar" id="avatar" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-block">Änderungen übernehmen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
