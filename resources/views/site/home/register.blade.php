@extends('site.layouts.home')

@section('title')
    REGISTRIERUNG – Online-Marketing-Agentur Mastermind
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('site/css/register.css')}}">
@endsection

@section('content-header')
    <div class="form">
        <h3 class="text-center mb-2">AGENTUR-MASTERMIND</h3>
        <h4 class="text-center mb-2">JETZT KOSTENLOS REGISTRIEREN</h4>
        <form method="post" action="{{route('home.register')}}">
            @include('admin.alerts.alert')
            @csrf
            <div class="form-group">
                <label for="fullName" class="d-none"></label>
                <input type="text" name="fullName" id="fullName" class="form-control" placeholder="Vorname und Nachname" required="required" value="{{old('fullName')}}">
                @error('fullName')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group">
                <label for="username" class="d-none"></label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Nutzername" required="required" value="{{old('username')}}">
                @error('username')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group">
                <label for="email" class="d-none"></label>
                <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail-Adresse" required="required" value="{{old('email')}}">
                @error('email')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group">
                <label for="password" class="d-none"></label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Passwort" required="required">
                @error('password')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group text-center pt-2 pb-2">
                <button type="submit" class="btn-submit">Registrieren</button>
            </div>
        </form>
        <div class="link-login text-center">
            <a href="{{route('home.getLogin')}}">Du bist bereits Mitglied? Logge dich hier ein.</a>
        </div>
    </div>
@endsection
