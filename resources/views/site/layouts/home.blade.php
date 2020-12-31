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
    @yield('style')
</head>
<body>
<section class="header">
    <div class="container">
        <div class="section-links">
            <div class="links">
                <a href="{{route('home.index')}}" class="link">{{__('home.HOME_START')}}</a>
                <a href="{{route('home.dashboard')}}" class="link">{{__('home.HOME_DASHBOARD')}}</a>
                <a href="{{route('home.getLogin')}}" class="link">{{__('home.HOME_LOGIN')}}</a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="section-header-middle">
            @yield('content-header')
        </div>
        <div class="clearfix"></div>
    </div>
</section>
@yield('content')
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
<script src="{{asset('site/js/wow.min.js')}}"></script>
<script>
    wow = new WOW()
    wow.init();
</script>
@yield('script')
</body>
</html>
