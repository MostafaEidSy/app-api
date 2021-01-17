@extends('admin.layouts.admin')

@section('title')
    Profile
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">
@endsection

@section('content')
    <section class="profile">
        <div class="d-flex align-items-center justify-content-center">
            <div class="box-profile">
                <div class="title">
                    <h4>Edit Profile</h4>
                </div>
                <div class="body">
                    @include('admin.alerts.articles')
                    <form method="post" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" required="required" value="{{old('name', $user->name)}}">
                            @error('name')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="text" name="email" id="email" class="form-control" required="required" value="{{old('email', $user->email)}}">
                            @error('email')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" name="password" id="password" class="form-control" required="required">
                            @error('password')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="avatar">Avatar</label>
                            <div class="img-profile">
                                @if($user->avatar == '' || $user->avatar == null)
                                    <img src="{{asset('assets/img/users/1-1.png')}}" alt="{{$user->name}}">
                                @else
                                    <img src="{{asset('uploads/avatar/' . $user->avatar)}}" alt="{{$user->name}}">
                                @endif
                            </div>
                            <input type="file" name="avatar" id="avatar" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
