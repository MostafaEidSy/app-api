@extends('admin.layouts.admin')

@section('title')
    Create User
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/users.css')}}">
@endsection

@section('content')
    <section class="create-users">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Users</h1>
        </div>
        <div class="title">
            <h6>Create Users</h6>
        </div>
        <div class="body">
            <form method="post" action="{{route('admin.users.story')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" required="required" value="{{old('name')}}">
                    @error('name')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="username">Username <span class="text-danger">*</span></label>
                    <input type="text" name="username" id="username" class="form-control" required="required" value="{{old('username')}}">
                    @error('username')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control" required="required" value="{{old('email')}}">
                    @error('email')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" id="password" class="form-control" required="required">
                    @error('password')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="birthday">Birth Day</label>
                    <input type="date" name="birthday" id="birthday" class="form-control" value="{{old('birthday')}}">
                    @error('birthday')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar" id="avatar" class="form-control">
                    @error('avatar')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Created</button>
                </div>
            </form>
        </div>
    </section>
@endsection
