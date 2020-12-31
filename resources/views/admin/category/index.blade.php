@extends('admin.layouts.admin')

@section('title')
    Categories
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/category.css')}}">
@endsection

@section('content')
    <section class="category">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categories</h1>
            <a href="{{route('admin.category.create')}}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-tag fa-sm text-white-50"></i> Add Category</a>
        </div>
        <div class="title">
            <h6>Categories Table</h6>
        </div>
        <div class="body">
            @include('admin.alerts.articles')
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Parent</td>
                        <td>Status</td>
                        <td>Control</td>
                    </tr>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>NULL</td>
                            <td>
                                @if($category->status == 1)
                                    <span class="badge badge-success" title="Publishing"><i class="fas fa-check"></i></span>
                                @else
                                    <span class="badge badge-danger" title="Draft"><i class="fas fa-times"></i></span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.category.edit', $id = $category->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <a href="{{route('admin.category.delete', $id = $category->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @foreach($subCategories as $sub)
                        <tr>
                            <td>{{$sub->id}}</td>
                            <td>{{$sub->name}}</td>
                            <td>{{$sub->categories->name}}</td>
                            <td>
                                @if($sub->status == 1)
                                    <span class="badge badge-success" title="Publishing"><i class="fas fa-check"></i></span>
                                @else
                                    <span class="badge badge-danger" title="Draft"><i class="fas fa-times"></i></span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.sub.category.edit', $id = $sub->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <a href="{{route('admin.sub.category.delete', $id = $sub->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
