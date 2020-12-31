@extends('admin.layouts.admin')

@section('title')
    Thread
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/thread.css')}}">
@endsection

@section('content')
    <section class="thread">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thread</h1>
            <a href="{{route('admin.thread.create')}}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-home fa-sm text-white-50"></i> Add Thread</a>
        </div>
        <div class="title">
            <h6>Thread Table</h6>
        </div>
        <div class="body">
            @include('admin.alerts.articles')
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>Title</td>
                        <td>Details</td>
                        <td>Control</td>
                    </tr>
                    @foreach($threads as $thread)
                        <tr>
                            <td>{{$thread->id}}</td>
                            <td>{{$thread->title}}</td>
                            <td>
                                <ul class="list-unstyled">
                                    @foreach($thread->details as $detail)
                                            <li>_ {{$detail->detail}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <a href="{{route('admin.thread.edit', $id = $thread->id)}}" class="btn btn-success"><i class="fas fa-edit fa-fw"></i></a>
                                <a href="{{route('admin.thread.delete', $id = $thread->id)}}" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
