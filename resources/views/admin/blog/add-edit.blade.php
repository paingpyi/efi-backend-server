{{-- Base Layout of Admin Controls --}}
@extends('layouts.base')
{{-- /. End of base layout --}}


{{-- Head Stylesheets --}}
@section('headStyle')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Image Upload -->
    <link href="{{ asset('adminlite/plugins/bootstrap-imageupload/bootstrap-imageupload.css') }}" rel="stylesheet">
    <!-- flag-icon-css -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
@endsection
{{-- /. Head Stylesheets --}}

{{-- content --}}
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <form id="inputForm"
                    action="{{ $action == 'new' ? route('store#data#blog') : route('update#data#blog', isset($blog->id) ? $blog->id : 0) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        @include('admin.blog.menu')
                        <div class="card-tools">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active" id="nav-eng-tab" data-toggle="tab" href="#nav-eng"
                                            role="tab" aria-controls="nav-home" aria-selected="true">English</a>
                                        <a class="nav-link" id="nav-mm-tab" data-toggle="tab" href="#nav-mm"
                                            role="tab" aria-controls="nav-profile" aria-selected="false">Burmese</a>
                                    </div>
                                </nav>
                                <div class="tab-content pr-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active pt-3" id="nav-eng" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="form-group">
                                            <label for="title"><i class="flag-icon flag-icon-us mr-2"></i> Title <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="title"
                                                value="{{ old('title', isset($blog->title) ? $blog->title : null) }}"
                                                class="form-control title2slug" id="title" aria-describedby="titleHelp">
                                            <small id="titleHelp" class="form-text text-muted">Please enter title.</small>
                                            @error('title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="content"><i class="flag-icon flag-icon-us mr-2"></i> Content Body
                                                <span class="text-danger">*</span></label>
                                            <textarea name="content" class="summernote" required
                                                id="content">{{ old('content', isset($blog->content) ? $blog->content : '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade pt-3" id="nav-mm" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <label for="title_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Title
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="title_burmese"
                                                value="{{ old('title_burmese', isset($blog->title_burmese) ? $blog->title_burmese : null) }}"
                                                class="form-control" id="title_burmese"
                                                aria-describedby="title_burmeseHelp">
                                            <small id="title_burmeseHelp" class="form-text text-muted">Please enter
                                                title
                                                (burmese).</small>
                                            @error('title_burmese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="content_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
                                                Content Body
                                                <span class="text-danger">*</span></label>
                                            <textarea name="content_burmese" class="summernote" required
                                                id="content_burmese">{{ old('content_burmese', isset($blog->content_burmese) ? $blog->content_burmese : '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 bg-secondary p-3">
                                <div class="form-group">
                                    <label for="slug_url">Slug URL
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="slug_url"
                                        value="{{ old('slug_url', isset($blog->url_slug) ? $blog->url_slug : null) }}"
                                        class="form-control" id="slug_url" aria-describedby="slug_urlHelp">
                                    <small id="slug_urlHelp" class="form-text text-white">Do not use the special charaters
                                        but you can you dash (-).</small>
                                    @error('slug_url')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category">Category <span class="text-danger">*</span></label>
                                    <select name="category" id="category" class="form-control select2" style="width: 100%;">
                                        <option value="">Please choose the category.</option>
                                        @foreach ($blog_category as $cat)
                                            @if ($action == 'new')
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @else
                                                <option value="{{ $cat->id }}"
                                                    {{ $blog->category_id == $cat->id ? ' selected' : '' }}>
                                                    {{ $cat->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Related Product</label>
                                    <select name="products[]" class="duallistbox" multiple="multiple"
                                        aria-describedby="modulesHelp">
                                        @foreach ($blog_products as $product)
                                            <option value="{{ $product->slug_url }}"{{ in_array($product->slug_url, json_decode($blog->products)) ? ' selected' : '' }}>{{ $product->title }}</option>
                                        @endforeach
                                    </select>
                                    <small id="modulesHelp" class="form-text text-muted">Please select the related
                                        products.</small>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="featured">Featured: </label>
                                    <input type="checkbox" id="featured" name="featured"
                                        {{ (old('featured', isset($blog->featured) ? $blog->featured : null) == true or $action == 'new')? 'checked': '' }}
                                        data-bootstrap-switch data-on-color="success">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control select2" style="width: 100%;">
                                        <option value="">Please choose the status.</option>
                                        <option value="published"
                                            {{ isset($blog->status) ? ($blog->status == 'published' ? ' selected' : '') : '' }}>
                                            published</option>
                                        <option value="draft"
                                            {{ isset($blog->status) ? ($blog->status == 'draft' ? ' selected' : '') : '' }}>
                                            draft</option>
                                        <option value="unpublished"
                                            {{ isset($blog->status) ? ($blog->status == 'unpublished' ? ' selected' : '') : '' }}>
                                            unpublished</option>
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Blog Image <span class="text-danger">*</span></label>
                                    @isset($blog->image)
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{ asset($blog->image) }}" alt="Blog image" class="img-thumbnail">
                                            </div>
                                        </div>
                                    @endisset
                                    <!-- bootstrap-imageupload. -->

                                    <div class="imageupload panel panel-default card card-secondary bg-secondary">

                                        <div class="panel-heading card-heading clearfix p-2">

                                            <h5 class="panel-title card-title pull-left">Select Image file</h5>

                                            <div class="btn-group pull-right float-right">

                                                <button type="button" class="btn btn-default active">File</button>

                                                <button type="button" class="btn btn-default">URL</button>

                                            </div>

                                        </div>

                                        <div class="file-tab panel-body card-body text-center">

                                            <div class="btn-group">
                                                <div class="btn btn-primary btn-file">

                                                    <span>Browse</span>

                                                    <!-- The file is stored here. -->

                                                    <input type="file" name="blog">

                                                </div>

                                                <button type="button" class="btn btn-danger">Remove</button>
                                            </div>

                                        </div>

                                        <div class="url-tab panel-body card-body">

                                            <div class="input-group">

                                                <input type="text" class="form-control hasclear" placeholder="Image URL">

                                                <div class="input-group-btn input-group-append">

                                                    <button type="button" class="btn btn-default">Submit</button>

                                                </div>

                                            </div>

                                            <button type="button" class="btn btn-danger">Remove</button>

                                            <!-- The URL is stored here. -->

                                            <input type="hidden" name="blog-image-url">

                                        </div>

                                    </div>
                                </div><!-- /. Blog Image -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="float-right"><button type="submit" class="btn btn-primary"><i
                                    class="fas fa-save"></i> Save</button></div>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
{{-- /. End of Main Content --}}

@section('footerScripts')
    <!-- Sparkline -->
    <script src="{{ asset('adminlite/plugins/sparklines/sparkline.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('adminlite/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('adminlite/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('adminlite/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('adminlite/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('adminlite/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Image Upload -->
    <script src="{{ asset('adminlite/plugins/bootstrap-imageupload/bootstrap-imageupload.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('adminlite/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlite/dist/js/demo.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap4'
            });

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

            // Summernote
            $('.summernote').summernote({
                height: 800,
                placeholder: 'Write content here...',
            });

            $('.imageupload').imageupload();

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox();

            $(".title2slug").keyup(function() {
                var Text = $(this).val();
                Text = Text.toLowerCase()
                    .replace(/[^\w ]+/g, '')
                    .replace(/ +/g, '-');
                $("#slug_url").val(Text);
            });

            $('#inputForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
                    content: {
                        required: true,
                    },
                    category: {
                        required: true,
                    },
                    title_burmese: {
                        required: true,
                    },
                    content_burmese: {
                        required: true,
                    },
                    benefit: {
                        required: true,
                    },
                    blog: {
                        required: true,
                    },
                },
                messages: {
                    title: {
                        required: "You need to fill product title.",
                    },
                    content: {
                        required: "You need to fill content.",
                    },
                    category: {
                        required: "You need to choose the category of product.",
                    },
                    title_burmese: {
                        required: "You need to fill product title.",
                    },
                    content_burmese: {
                        required: "You need to fill description.",
                    },
                    blog: {
                        required: "You need to upload image.",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback bg-danger p-1');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
{{-- /. page plugin --}}
