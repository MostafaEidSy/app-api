<?php
    $categories = \App\Models\Category::with(['subCategory'])->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/dashboard/dashboard.css')}}">
    @yield('style')
</head>
<body>

<section class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="logo text-left">
                    <img src="{{asset('site/img/Agentur-Mastermind-Logo.png')}}" alt="Logo">
                </div>
            </div>
            <div class="col-md-10">
                <div class="links text-right">
                    @if(auth('web')->check())
                        <a href="{{route('home.dashboard.services')}}" class="link">SERVICES</a>
                        <a href="{{route('home.dashboard')}}" class="link">DASHBOARD</a>
                        <a href="{{route('home.dashboard.account')}}" class="link">ACCOUNT</a>
                        <a href="{{route('home.dashboard.logout')}}" class="link">LOGOUT</a>
                    @else
                        <a href="{{route('home.index')}}" class="link">{{__('home.HOME_START')}}</a>
                        <a href="{{route('home.dashboard')}}" class="link">{{__('home.HOME_DASHBOARD')}}</a>
                        <a href="{{route('home.getLogin')}}" class="link">{{__('home.HOME_LOGIN')}}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="links-auth">
                    <p class="p-title">ALLGEMEIN</p>
                    <ul class="list-unstyled home">
                        <li class="@yield('dashboard')"><a href="{{route('home.dashboard')}}">DASHBOARD</a></li>
                    </ul>
                    <hr class="links-hr">
                    <p class="p-title">MASTERMIND</p>
                    @if(auth('web')->check())
                        @foreach($categories as $category)
                            <ul class="list-unstyled category">
                                <li class="name"><a href="{{route('home.dashboard.category.slug', $category->slug)}}">{{$category->name}}</a></li>
                                @foreach($category->subCategory as $sub)
                                    <li class="per"><a href="{{route('home.dashboard.sub.category.slug', ['category' => $category->slug, 'slug' => $sub->slug])}}">{{$sub->name}}</a></li>
                                @endforeach
                            </ul>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-lg-9">
                @yield('content')
            </div>
        </div>
    </div>
</section>
<section class="section-copyright">
    <div class="container">
        <div class="content">
            © Agentur-Mastermind.com |
            <a href="#">Impressum</a> |
            <a href="#">Datenschutzerklärung</a> |
            <a href="#">Partnerprogramm</a>
        </div>
    </div>
</section>

<script src="{{asset('site/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('site/js/popper.min.js')}}"></script>
<script src="{{asset('site/js/bootstrap.min.js')}}"></script>
<script src="{{asset('site/js/all.min.js')}}"></script>
@yield('script')
</body>
</html>
