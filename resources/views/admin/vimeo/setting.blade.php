@extends('admin.layouts.admin')

@section('title')
    Setting Vimeo
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/vimeo.css')}}">
@endsection

@section('content')
    <section class="vimeo-setting">
        <div class="d-flex align-items-center justify-content-center p-4">
            <div class="box-setting">
                <div class="img">
                    <img src="{{asset('assets/img/vimeo.svg')}}" alt="Vimeo">
                </div>
                <div class="body">
                    <form method="post" action="{{route('admin.vimeo.setting.update')}}">
                        @csrf
                        <div class="form-group">
                            <label for="vimeo_client">Client Identifier</label>
                            <input type="text" name="vimeo_client" id="vimeo_client" class="form-control" value="{{env('VIMEO_CLIENT')}}">
                        </div>
                        <div class="form-group">
                            <label for="vimeo_secret">Client Secrets</label>
                            <input type="text" name="vimeo_secret" id="vimeo_secret" class="form-control" value="{{env('VIMEO_SECRET')}}">
                        </div>
                        <div class="form-group">
                            <label for="vimeo_access">Authentication (Token)</label>
                            <input type="text" name="vimeo_access" id="vimeo_access" class="form-control" value="{{env('VIMEO_ACCESS')}}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
