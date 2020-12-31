@extends('admin.layouts.admin')

@section('title')
    Edit Experts
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/expert.css')}}">
@endsection

@section('content')
    <section class="create-experts">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Expert</h1>
        </div>
        <div class="title">
            <h6>Edit Expert</h6>
        </div>
        <div class="body">
            <form method="post" action="{{route('admin.expert.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$expert->id}}">
                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" required="required" value="{{old('name', $expert->name)}}">
                    @error('name')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="description">Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" class="form-control" required="required">{{old('description', $expert->description)}}</textarea>
                    @error('description')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="image">Image <span class="text-danger">*</span></label>
                    <div class="image-user">
                        <img src="{{asset('uploads/experts/' . $expert->image)}}" alt="{{$expert->name}}">
                    </div>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Update</button>
                </div>
            </form>
        </div>
    </section>
@endsection
