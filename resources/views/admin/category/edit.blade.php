@extends('admin.layouts.admin')

@section('title')
    Edit Category
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/category.css')}}">
@endsection

@section('content')
    <section class="create-category">
        <div class="title">
            <h6>Edit Category</h6>
        </div>
        <div class="body">
            <div class="form">
                @include('admin.alerts.articles')
                <form action="{{route('admin.category.update')}}" method="post">
                    <input type="hidden" name="id" value="{{$category->id}}">
                    <input type="hidden" name="type" value="category">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" required="required" value="{{old('name', $category->name)}}">
                                @error('name')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Slug <span class="text-danger">*</span></label>
                                <input type="text" name="slug" id="slug" class="form-control" required="required" placeholder="ex: category-slug" value="{{old('slug' , $category->slug)}}">
                                @error('slug')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" @if(old('status', $category->status) == 1) selected @endif>Publishing</option>
                                    <option value="0" @if(old('status', $category->status) == 0) selected @endif>Draft</option>
                                </select>
                                @error('status')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
