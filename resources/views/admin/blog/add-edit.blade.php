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
                                        <a class="nav-link" id="nav-zh-tab" data-toggle="tab" href="#nav-zh"
                                            role="tab" aria-controls="nav-profile" aria-selected="false">Chinese</a>
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
                                    </div> {{-- /. End of English Inputs --}}
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
                                                (Burmese).</small>
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
                                    </div> {{-- /. End of Burmese Inputs --}}
                                    <div class="tab-pane fade pt-3" id="nav-zh" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <label for="title_chinese"><i class="flag-icon flag-icon-mm mr-2"></i> Title
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="title_chinese"
                                                value="{{ old('title_chinese', isset($blog->title_chinese) ? $blog->title_chinese : null) }}"
                                                class="form-control" id="title_chinese"
                                                aria-describedby="title_chineseHelp">
                                            <small id="title_chineseHelp" class="form-text text-muted">Please enter
                                                title
                                                (Chinese).</small>
                                            @error('title_chinese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="content_chinese"><i class="flag-icon flag-icon-mm mr-2"></i>
                                                Content Body
                                                <span class="text-danger">*</span></label>
                                            <textarea name="content_chinese" class="summernote" required
                                                id="content_chinese">{{ old('content_chinese', isset($blog->content_chinese) ? $blog->content_chinese : '') }}</textarea>
                                        </div>
                                    </div> {{-- /. End of Chinese Inputs --}}
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
                                    <label for="main_category">Main Category <span class="text-danger">*</span></label>
                                    <select id="main_category" name="main_category" id="main_category"
                                        class="form-control select2" style="width: 100%;">
                                        <option value="">Please choose the main category.</option>
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
                                <div class="form-group">
                                    <label for="categories">Categories <span class="text-danger">*</span></label>
                                    <select id="categories" name="categories[]" class="duallistbox" multiple="multiple">
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Related Product</label>
                                    <select name="products[]" class="duallistbox" multiple="multiple"
                                        aria-describedby="modulesHelp">
                                        @foreach ($blog_products as $product)
                                            <option value="{{ $product->slug_url }}"
                                                {{ isset($blog->products)? (in_array($product->slug_url, json_decode($blog->products))? ' selected': ''): '' }}>
                                                {{ json_decode($product->title) }}</option>
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
                                <div class="form-group">
                                    <label for="promoted">Promoted: </label>
                                    <input type="checkbox" id="promoted" name="promoted"
                                        {{ (old('promoted', isset($blog->promoted) ? $blog->promoted : null) == true or $action == 'new')? 'checked': '' }}
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
                                    <label>Cover Images <span class="text-danger">*</span></label>
                                    <div class="input-group pb-3">
                                        <span class="input-group-btn">
                                            <a id="cover_image1" data-input="cover_image1_thumbnail"
                                                class="btn btn-primary lfm">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="cover_image1_thumbnail" class="form-control" type="text"
                                            name="cover_image[]"
                                            value="{{ old('cover_image[0]', isset($product_en) ? $product_en->cover_image[0] : '') }}">
                                    </div>
                                    <div class="input-group pb-3">
                                        <span class="input-group-btn">
                                            <a id="cover_image2" data-input="cover_image2_thumbnail"
                                                class="btn btn-primary lfm">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="cover_image2_thumbnail" class="form-control" type="text"
                                            name="cover_image[]"
                                            value="{{ old('cover_image[1]', isset($product_en) ? $product_en->cover_image[1] : '') }}">
                                    </div>
                                    <div class="input-group pb-3">
                                        <span class="input-group-btn">
                                            <a id="cover_image3" data-input="cover_image3_thumbnail"
                                                class="btn btn-primary lfm">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="cover_image3_thumbnail" class="form-control" type="text"
                                            name="cover_image[]"
                                            value="{{ old('cover_image[2]', isset($product_en) ? $product_en->cover_image[2] : '') }}">
                                    </div>
                                    <div class="input-group pb-3">
                                        <span class="input-group-btn">
                                            <a id="cover_image4" data-input="cover_image4_thumbnail"
                                                class="btn btn-primary lfm">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="cover_image4_thumbnail" class="form-control" type="text"
                                            name="cover_image[]"
                                            value="{{ old('cover_image[3]', isset($product_en) ? $product_en->cover_image[3] : '') }}">
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
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
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
                height: 900,
                placeholder: 'Write content here...',
            });

            $('.lfm').filemanager('image');

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox();

            $("#main_category").on('change', function(event) {
                event.preventDefault();

                if ($('#main_category').val() == 2) {
                    $.ajax({
                        url: "/api/categories/blogs",
                        type: "POST",
                        data: {
                            locale: 'en-US',
                            parent: $('#main_category').val()
                        },
                        success: function(response) {
                            console.log(response);
                            if (response) {
                                $('#categories').empty();

                                for (i = 0; i < response.data.length; i++) {
                                    $('#categories').append(
                                        $('<option></option>')
                                        .text(response.data[i].name)
                                        .val(response.data[i].id)
                                    );
                                }
                                $('#categories').bootstrapDualListbox('refresh');
                            }
                        },
                        error: function(error) {
                            console.log(error);
                            $('#categories').empty();
                            $('#categories').bootstrapDualListbox('refresh');
                        }
                    });
                } else {
                    $('#categories').empty();
                    $('#categories').bootstrapDualListbox('refresh');
                }
            });

            $(".title2slug").keyup(function() {
                var Text = $(this).val();
                Text = Text.toLowerCase()
                    .replace(/[^\w ]+/g, '')
                    .replace(/ +/g, '-');
                $("#slug_url").val(Text);
            });

            $.validator.addMethod("titleRegex", function(value, element) {
                return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
            }, "Title must contain only letters, numbers, or dashes.");

            $('#inputForm').validate({
                rules: {
                    title: {
                        required: true,
                        titleRegex: true,
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
                    title_chinese: {
                        required: true,
                    },
                    content_chinese: {
                        required: true,
                    },
                    benefit: {
                        required: true,
                    },
                    @if ($action == 'new')
                        blog: {
                        required: true,
                        },
                    @endif
                },
                messages: {
                    title: {
                        required: "You need to fill Blog title.",
                        titleRegex: "Title must contain only letters, numbers, or dashes.",
                    },
                    content: {
                        required: "You need to fill content.",
                    },
                    category: {
                        required: "You need to choose the category of Blog.",
                    },
                    title_burmese: {
                        required: "You need to fill Blog title.",
                    },
                    content_burmese: {
                        required: "You need to fill description.",
                    },
                    title_chinese: {
                        required: "You need to fill Blog title.",
                    },
                    content_chinese: {
                        required: "You need to fill description.",
                    },
                    @if ($action == 'new')
                        blog: {
                        required: "You need to upload image.",
                        },
                    @endif
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
