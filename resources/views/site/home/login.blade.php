@extends('site.layouts.home')

@section('title')
    LOGIN – Online-Marketing-Agentur Mastermind
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('site/css/login.css')}}">
@endsection

@section('content-header')
    <div class="title-top">
        <h5>
            {{__('home.HEADER_MIDDLE_TITLE_1')}}
            <br>
            {{__('home.HEADER_MIDDLE_TITLE_2')}}
            <br>
            {{__('home.HEADER_MIDDLE_TITLE_3')}}
        </h5>
    </div>
    <div class="clearfix"></div>
    <div class="title-middle">
        <div class="title-an wow animate__animated animate__fadeInLeft">
            <h1>AGENTUR-MASTERMIND</h1>
            <h2>DIE MASTERMIND RUND UM ONLINE-MARKETING-DIENSTLEISTUNGEN</h2>
        </div>
    </div>
@endsection

@section('content')
    <section class="section-login">
        <div class="container">
            <div class="form">
                <form action="{{route('home.login')}}" method="post">
                    @include('admin.alerts.alert')
                    @csrf
                    <div class="form-group">
                        <label for="username">Benutzername <span class="text-danger">*</span></label>
                        <input type="text" name="username" id="username" class="form-control" required="required">
                        @error('username')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Kennwort <span class="text-danger">*</span></label>
                        <input type="password" name="password" id="password" class="form-control" required="required">
                        @error('password')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <input type="checkbox" name="remember_me" id="remember_me">
                        <label for="remember_me" class="mb-0 ml-2"> Eingeloggt bleiben</label>
                    </div>
                    <div class="link-pass">
                        <a href="{{route('home.index')}}" >Kennwort vergessen?</a>
                    </div>
                    <div class="form-group text-right mt-1">
                        <button type="submit" class="form-submit">Anmelden</button>
                    </div>
                </form>
                <div class="link-signUp text-center">
                    <a href="{{route('home.getRegister')}}">Noch kein Mitglied? Jetzt registrieren!</a>
                </div>
            </div>
        </div>
    </section>
@endsection
