@extends('site.layouts.dashboard')

@section('title')
    MASTERMIND-WILLKOMMEN – Online-Marketing-Agentur Mastermind
@endsection

@section('content')
    <div class="dashboard-content">
        <div class="title">
            <h4>HERZLICH WILLKOMMEN</h4>
        </div>
        <p class="info-p">Hallo {{auth()->user()->name}}, ich gratuliere dir zu deiner neuen Agentur-Mastermind-Mitgliedschaft.</p>
        <p class="info-p">Bevor du mit den Mastermind-Inhalten loslegst, habe ich direkt einige Tipps für dich:</p>
        <p class="info-p">1. Tritt direkt unserer Facebook-Gruppe bei: <a href="https://www.facebook.com/groups/marketingagentur/" target="_blank" class="text-danger">Klicke hier</a></p>
        <p class="info-p">2. Wenn du möchtest, kannst du dein Passwort anpassen: <a href="{{route('home.dashboard.account')}}" class="text-danger">Klicke hier</a></p>
        <div class="body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-dashboard">
                            <div class="img-dashboard">
                                <img src="{{asset('site/img/dashboard-mastermind-2.png')}}" alt="logo">
                            </div>
                            <div class="description">
                                <p>Navigiere hierfür im Menü</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-dashboard">
                            <div class="img-dashboard">
                                <img src="{{asset('site/img/dashboard-elite.png')}}" alt="logo">
                            </div>
                            <div class="description">
                                <p>Demnächst verfügbar</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-dashboard">
                            <a href="https://www.facebook.com/groups/marketingagentur/" target="_blank">
                                <div class="img-dashboard">
                                    <img src="{{asset('site/img/dashboard-fb-gruppe.png')}}" alt="logo">
                                </div>
                                <div class="description">
                                    <p>Hier geht es zur Facebook-Gruppe</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
