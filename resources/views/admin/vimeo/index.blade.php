@extends('admin.layouts.admin')

@section('title')
    Vimeo
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/vimeo.css')}}">
@endsection

@section('content')
    @if(env('VIMEO_CLIENT') == '' || env('VIMEO_CLIENT') == null || env('VIMEO_SECRET') == '' || env('VIMEO_SECRET') == null || env('VIMEO_ACCESS') == '' || env('VIMEO_ACCESS') == null)
        <section class="error-vimeo">
            <div class="d-flex align-items-center justify-content-center vh-100">
                <div class="error-content">
                    <div class="img">
                        <img src="{{asset('assets/img/vimeo.svg')}}" alt="Vimeo">
                    </div>
                    <div class="desc">
                        <h4>Not Connected</h4>
                        <p>Please Adjust Settings For Vimeo To Display Information <br><a href="{{route('admin.vimeo.setting')}}">Setting Vimeo</a></p>
                    </div>
                </div>
            </div>
        </section>
    @elseif($video['status'] != 200)
        <section class="error-vimeo">
            <div class="d-flex align-items-center justify-content-center vh-100">
                <div class="error-content">
                    <div class="img">
                        <img src="{{asset('assets/img/vimeo.svg')}}" alt="Vimeo">
                    </div>
                    <div class="desc">
                        <h6>{{$video['body']['error']}}</h6>
                        <p>{{$video['body']['developer_message']}} <br><a href="{{route('admin.vimeo.setting')}}">Setting Vimeo</a></p>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="vimeo">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Vimeo</h1>
    {{--            <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-file-video-o fa-sm text-white-50"></i> Add Video</a>--}}
            </div>
            <div class="title">
                <h6>Video Table</h6>
            </div>
            <div class="body">
                @include('admin.alerts.articles')
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Information</td>
                            <td>Created Time</td>
                            <td>Picture</td>
                        </tr>
                        @foreach($video['body']['data'] as $vi)
                            <tr>
                                <td>{!! $vi['name'] !!}</td>
                                <td>{!! $vi['description'] !!}</td>
                                <td>
                                    <ul class="list-unstyled">
                                        <li>Duration: <span>{{$vi['duration']}}</span></li>
                                        <li>Width: <span>{{$vi['width']}}</span></li>
                                        <li>Height: <span>{{$vi['height']}}</span></li>
                                        <li>Language: <span>{{$vi['language']}}</span></li>
                                        <li>Comments: <span>{{$vi['metadata']['connections']['comments']['total']}}</span></li>
                                    </ul>
                                </td>
                                <td>{!! date('Y-m-d', strtotime($vi["created_time"])) !!}</td>
                                <td>
                                    <img src="{!! $vi['pictures']['sizes'][1]['link'] !!}" alt="{!! $vi['name'] !!}">
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </section>
    @endif
@endsection
