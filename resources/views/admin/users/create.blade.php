@extends('admin.layouts.admin')

@section('title')
    Create User
@endsection

@section('content')
    <section class="add-user">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Users</h1>
        </div>
        <div class="title">
            <h6>Create Users</h6>
        </div>
        <div class="body">
            <form method="post" action="{{route('admin.users.story')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name <span>*</span></label>
                    <input type="text" name="name" id="name" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="email">Email <span>*</span></label>
                    <input type="email" name="email" id="email" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="password">Password <span>*</span></label>
                    <input type="password" name="password" id="password" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Created</button>
                </div>
            </form>
        </div>
    </section>
@endsection
