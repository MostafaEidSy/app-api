<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login To Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <link href="https://fonts.googleapis.com/css2?family=Scheherazade:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/img/icon.png')}}">
</head>
<body>
<section class="login">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="{{route('admin.login')}}">
                        <img src="{{asset('assets/img/logo.png')}}" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="login-form">
                    <h2 class="text-center">LogIn To Admin Dashboard</h2>
                    @include('admin.alerts.alert')
                    <div class="form">
                        <form method="post" action="{{route('admin.getLogin')}}">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" autocomplete="off" placeholder="Email" required="required">
                                @error('email')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" autocomplete="new-password" placeholder="Password" required="required">
                                @error('password')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember_token" id="remember_token">
                                <label for="remember_token">Remember Me</label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('assets/js/login/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/login/popper.min.js')}}"></script>
<script src="{{asset('assets/js/login/bootstrap.min.js')}}"></script>
</body>
</html>
