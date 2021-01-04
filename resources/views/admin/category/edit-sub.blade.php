@extends('admin.layouts.admin')

@section('title')
    Edit Category
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/category.css')}}">
@endsection

@section('content')
    <section class="create-category">
        <div class="title">
            <h6>Edit Category</h6>
        </div>
        <div class="body">
            <div class="form">
                @include('admin.alerts.articles')
                <form action="{{route('admin.category.update')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$category->id}}">
                    <input type="hidden" name="type" value="sub">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" required="required" value="{{old('name', $category->name)}}">
                                @error('name')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="parent">Parent</label>
                                <select name="parent" id="parent" class="form-control">
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}" @if($category->parent == $cat->id) selected @endif>{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{old('description', $category->description)}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category_content">Content</label>
                                <textarea name="category_content" id="category_content" class="form-control">{{old('category_content', $category->content)}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Slug <span class="text-danger">*</span></label>
                                <input type="text" name="slug" id="slug" class="form-control" required="required" placeholder="ex: category-slug" value="{{old('slug' , $category->slug)}}">
                                @error('slug')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" @if(old('status', $category->status) == 1) selected @endif>Publishing</option>
                                    <option value="0" @if(old('status', $category->status) == 0) selected @endif>Draft</option>
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
            $('#category_content').summernote({
                height: 600,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph', 'height', 'style']],
                    ['fm-button', ['fm']],
                    ['insert', ['table', 'hr', 'video']],
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
