@extends('admin.layouts.admin')

@section('title')
    Created Category
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/category.css')}}">
@endsection

@section('content')
    <section class="create-category">
        <div class="title">
            <h6>Create Category</h6>
        </div>
        <div class="body">
            <div class="form">
                @include('admin.alerts.articles')
                <form action="{{route('admin.category.story')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" required="required" value="{{old('name')}}">
                                @error('name')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="parent">Parent</label>
                                <select name="parent" id="parent" class="form-control">
                                    <option value="0"> Null </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Slug <span class="text-danger">*</span></label>
                                <input type="text" name="slug" id="slug" class="form-control" required="required" placeholder="ex: category-slug" value="{{old('slug')}}">
                                @error('slug')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" @if(old('status') == 1) selected @endif>Publishing</option>
                                    <option value="0" @if(old('status') == 0) selected @endif>Draft</option>
                                </select>
                                @error('status')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection