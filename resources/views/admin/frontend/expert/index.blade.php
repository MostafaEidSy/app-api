@extends('admin.layouts.admin')

@section('title')
    Experts
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/expert.css')}}">
@endsection

@section('content')
    <section class="experts">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Experts</h1>
            <a href="{{route('admin.expert.create')}}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="far fa-user-circle fa-sm text-white-50"></i> Add Expert</a>
        </div>
        <div class="title">
            <h6>Experts Table</h6>
        </div>
        <div class="body">
            @include('admin.alerts.articles')
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Image</td>
                        <td>Control</td>
                    </tr>
                    @foreach($experts as $expert)
                        <tr>
                            <td>{{$expert->id}}</td>
                            <td>{{$expert->name}}</td>
                            <td><p>{{$expert->description}}</p></td>
                            <td>
                                <img src="{{asset('uploads/experts/' . $expert->image)}}" alt="{{$expert->name}}">
                            </td>
                            <td>
                                <a href="{{route('admin.expert.edit', $id = $expert->id)}}" class="btn btn-success"><i class="fas fa-edit fa-fw"></i></a>
                                <a href="{{route('admin.expert.delete', $id = $expert->id)}}" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
