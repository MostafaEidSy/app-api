@extends('admin.layouts.admin')

@section('title')
    Edit Page
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/pages.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/summernote-bs4.min.css')}}">
@endsection

@section('content')
    <section class="create-pages">
        <div class="title">
            <h6>Edit Page</h6>
        </div>
        <div class="body">
            <div class="form">
                @include('admin.alerts.articles')
                <form action="{{route('admin.pages.update')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{$pages->id}}" name="id">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" required="required" value="{{old('name', $pages->name)}}">
                                @error('name')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content_articles">Content</label>
                                <textarea name="content_articles" id="content_articles" class="form-control">{{old('content_articles', $pages->content)}}</textarea>
                                @error('content_articles')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Slug <span class="text-danger">*</span></label>
                                <input type="text" name="slug" id="slug" class="form-control" required="required" placeholder="ex: article-slug" value="{{old('slug', $pages->slug)}}">
                                @error('slug')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" @if($pages->status == 1) selected @endif>Publishing</option>
                                    <option value="0" @if($pages->status == 0) selected @endif>Draft</option>
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

@section('script')
    <script src="{{asset('assets/js/summernote-bs4.min.js')}}"></script>
    <script>
        $(function () {
            const FMButton = function(context) {
                const ui = $.summernote.ui;
                const button = ui.button({
                    contents: '<i class="note-icon-picture"></i> ',
                    tooltip: 'File Manager',
                    click: function() {
                        window.open('/file-manager/summernote', 'fm', 'width=1400,height=800');
                    }
                });
                return button.render();
            };
            $('#content_articles').summernote({
                height: 600,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph', 'height', 'style']],
                    ['fm-button', ['fm']],
                    ['insert', ['table', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                    ['fontsize', ['fontsize']],
                    ['fontsizeunit', ['fontsizeunit']],
                    ['forecolor', ['forecolor']],
                    ['backcolor', ['backcolor']],
                    ['strikethrough', ['strikethrough']],
                    ['superscript', ['superscript']],
                    ['subscript', ['subscript']],
                    ['clear', ['clear']],
                ],
                buttons: {
                    fm: FMButton
                }
            });
        })
    </script>
@endsection
