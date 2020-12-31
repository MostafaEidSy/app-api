@extends('admin.layouts.admin')

@section('title')
    Create Experts
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/expert.css')}}">
@endsection

@section('content')
    <section class="create-experts">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Expert</h1>
        </div>
        <div class="title">
            <h6>Create Expert</h6>
        </div>
        <div class="body">
            <form method="post" action="{{route('admin.expert.story')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" required="required" value="{{old('name')}}">
                    @error('name')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="description">Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" class="form-control" required="required">{{old('description')}}</textarea>
                    @error('description')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="image">Image <span class="text-danger">*</span></label>
                    <input type="file" name="image" id="image" class="form-control" required="required">
                    @error('image')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Created</button>
                </div>
            </form>
        </div>
    </section>
@endsection
