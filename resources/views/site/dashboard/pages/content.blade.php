@extends('site.layouts.dashboard')

@section('title')
    {{$cate->name}} – Online-Marketing-Agentur Mastermind
@endsection

@section('content')
    <div class="dashboard-content">
        <div class="title">
            <h4>{{$cate->name}}</h4>
        </div>
        <p class="info-p">{{$cate->description}}</p>
        <div class="body">
            <div class="container-fluid">
                <div class="content">
                    {{$cate->content}}
                </div>
            </div>
        </div>
    </div>
@endsection
