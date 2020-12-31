@extends('admin.layouts.admin')

@section('title')
    Edit User
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/users.css')}}">
@endsection

@section('content')
    <section class="create-users">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Users</h1>
        </div>
        <div class="title">
            <h6>Edit Users</h6>
        </div>
        <div class="body">
            <form method="post" action="{{route('admin.users.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="form-group">
                    <label for="name">Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" required="required" value="{{old('name', $user->name)}}">
                    @error('name')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control" required="required" value="{{old('email', $user->email)}}">
                    @error('email')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="birthday">Birth Day</label>
                    <input type="date" name="birthday" id="birthday" class="form-control" value="{{old('birthday', $user->birthday)}}">
                    @error('birthday')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    @if($user->avatar == '' || $user->avatar == null)
                        <div class="avatar-user">
                            <img src="{{asset('assets/img/users/1-1.png')}}" alt="{{$user->name}}">
                        </div>
                    @else
                        <div class="avatar-user">
                            <img src="{{asset('uploads/avatar/' . $user->avatar)}}" alt="{{$user->name}}">
                        </div>
                    @endif
                    <input type="file" name="avatar" id="avatar" class="form-control">
                    @error('avatar')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Updated</button>
                </div>
            </form>
        </div>
    </section>
@endsection
