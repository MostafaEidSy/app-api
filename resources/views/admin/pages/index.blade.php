@extends('admin.layouts.admin')

@section('title')
    Pages
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/pages.css')}}">
@endsection

@section('content')
    <section class="pages">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pages</h1>
            <a href="{{route('admin.pages.create')}}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-folder fa-sm text-white-50"></i> Add Page</a>
        </div>
        <div class="title">
            <h6>Pages Table</h6>
        </div>
        <div class="body">
            @include('admin.alerts.articles')
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>User</td>
                        <td>Status</td>
                        <td>Control</td>
                    </tr>
                    @foreach($pages as $page)
                        <tr>
                            <td>{{$page->id}}</td>
                            <td>{{$page->name}}</td>
                            <td>{{$page->user->name}}</td>
                            <td>
                                @if($page->status == 1)
                                    <span class="badge badge-success" title="Publishing"><i class="fas fa-check"></i></span>
                                @else
                                    <span class="badge badge-danger" title="Draft"><i class="fas fa-times"></i></span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.pages.edit', $id = $page->id)}}" class="btn btn-success"><i class="fas fa-edit fa-fw"></i></a>
                                <a href="{{route('admin.pages.delete', $id = $page->id)}}" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
