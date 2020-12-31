@extends('admin.layouts.admin')

@section('title')
    Create Thread
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/thread.css')}}">
@endsection

@section('content')
    <section class="create-thread">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Thread</h1>
        </div>
        <div class="title">
            <h6>Create Thread</h6>
        </div>
        <div class="body">
            <form method="post" action="{{route('admin.thread.update')}}">
                @csrf
                <input type="hidden" name="id" value="{{$thread->id}}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Title <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" required="required" value="{{old('name', $thread->title)}}">
                            @error('name')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <div class="info-title">
                            <h6>Details</h6>
                        </div>
                    </div>
                    <div class="col-md-12 details" id="details">
                        @foreach($thread->details as $detail)
                            <div class="row detail-row add-row" id="{{$loop->index}}">
                                <div class="col-md-1">
                                    <div class="button">
                                        @if($loop->index == 0)
                                            #
                                        @else
                                            <button type="button" class="btn btn-danger btn-sm deleteRow"><i class="fas fa-minus"></i></button>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="form-group">
                                        <input type="text" name="detail[]" id="detail" required="required" class="form-control" value="{{$detail->detail}}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @error('detail')<div class="col-md-12"><span class="text-danger">{{$message}}</span></div>@enderror
                    <div class="col-md-12">
                        <div class="button-add mb-3">
                            <button type="button" class="btn btn-success btn_add"><i class="fas fa-plus"></i> Add Row</button>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Created</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).on('click', '.btn_add', function (){
            let trCount = $('#details').find('div.detail-row:last').length;
            let numberIncr = trCount > 0 ? parseInt($('#details').find('div.detail-row:last').attr('id')) + 1 : 0;
            $('#details').append('<div class="row detail-row add-row" id="' + numberIncr + '"><div class="col-md-1"><div class="button"><button type="button" class="btn btn-danger btn-sm deleteRow"><i class="fas fa-minus"></i></button></div></div><div class="col-md-11"><div class="form-group"><input type="text" name="detail[]" id="detail" required="required" class="form-control"></div></div></div>');
        });
        $(document).on('click', '.deleteRow', function (e){
            e.preventDefault();
            $(this).parent().parent().parent().remove();
        });
    </script>
@endsection
