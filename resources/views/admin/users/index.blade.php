@extends('admin.layouts.admin')

@section('title')
    Users
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/users.css')}}">
@endsection

@section('content')
    <section class="users">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users</h1>
            <a href="{{route('admin.users.create')}}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-plus fa-sm text-white-50"></i> Add User</a>
        </div>
        <div class="title">
            <h6>Users Table</h6>
        </div>
        <div class="body">
            @include('admin.alerts.articles')
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Avatar</td>
                        <td>Control</td>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->avatar == null || $user->avatar == '')
                                    <img src="{{asset('assets/img/users/1-1.png')}}" alt="{{$user->name}}" width="35" height="35">
                                @else
                                    <img src="{{asset('uploads/avatar/' . $user->avatar)}}" alt="{{$user->name}}" width="35" height="35">
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.users.edit', $id = $user->id)}}" class="btn btn-success"><i class="fas fa-edit fa-fw"></i></a>
                                <a href="{{route('admin.users.delete', $id = $user->id)}}" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
