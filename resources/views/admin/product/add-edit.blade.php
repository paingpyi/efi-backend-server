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
    <!-- flag-icon-css -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/flag-icon-css/css/flag-icon.min.css') }}">
@endsection
{{-- /. Head Stylesheets --}}

{{-- content --}}
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <form id="inputForm"
                    action="{{ $action == 'new'? route('store#data#product'): route('update#data#product', isset($product_en->id) ? $product_en->id : null) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        @include('admin.product.menu')
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
                                        @include('admin.product.form_en')
                                    </div>
                                    <div class="tab-pane fade pt-3" id="nav-mm" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        @include('admin.product.form_mm')
                                    </div>
                                    <div class="tab-pane fade pt-3" id="nav-zh" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        @include('admin.product.form_zh')
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 bg-secondary p-3">
                                <div class="form-group">
                                    <label>Product Image <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="image" data-input="image_thumbnail" data-preview="image_holder" class="btn btn-primary lfm">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="image_thumbnail" class="form-control" type="text" name="image" value="{{old('image', isset($product_en->image) ? $product_en->image : '')}}">
                                    </div>
                                    <div id="image_holder" class="img-thumbnail mx-auto d-block mt-3"></div>
                                </div> <!-- /. Product Image -->
                                <div class="form-group">
                                    <label>Cover Image <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="cover_image" data-input="cover_image_thumbnail" data-preview="cover_image_holder" class="btn btn-primary lfm">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="cover_image_thumbnail" class="form-control" type="text" name="cover_image" value="{{old('cover_image', isset($product_en->cover_image) ? $product_en->cover_image : '')}}">
                                    </div>
                                    <div id="cover_image_holder" class="img-thumbnail mx-auto d-block mt-3"></div>
                                </div> <!-- /. Product cover image -->
                                <hr>
                                <div class="form-group">
                                    <label for="category">Category <span class="text-danger">*</span></label>
                                    <select name="category" id="category" class="form-control select2"
                                        style="width: 100%;">
                                        <option value="">Please choose the product's category.</option>
                                        @foreach ($product_category as $cat)
                                            @if ($action == 'new')
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @else
                                                <option value="{{ $cat->id }}"
                                                    {{ $product_en->category_id == $cat->id ? ' selected' : '' }}>
                                                    {{ $cat->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="is_active">Active: </label>
                                    <input type="checkbox" id="is_active" name="is_active"
                                        {{ (old('is_active', isset($product_en->is_active) ? $product_en->is_active : null) == true or $action == 'new')? 'checked': '' }}
                                        data-bootstrap-switch data-on-color="success">
                                </div>
                                <div class="form-group">
                                    <label for="is_active">Home: </label>
                                    <input type="checkbox" id="is_home" name="is_home"
                                        {{ old('is_home', (isset($product_en->is_home) and $product_en->is_home==true) ? 'checked': '') }}
                                        data-bootstrap-switch data-on-color="success">
                                </div>
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
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlite/dist/js/demo.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $('.lfm').filemanager('image');
            $('.lfmfile').filemanager('file');

            //Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap4'
            });

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

            // Summernote
            $('.summernote').summernote({
                height: 350,
                placeholder: 'Write content here...',
                toolbar: [
                    ['undo', ['undo']],
                    ['redo', ['redo']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['fullscreen']],
                ],
                callbacks: {
                    onImageUpload: function(data) {
                        data.pop();
                    }
                },
            });

            $.validator.addMethod("titleRegex", function(value, element) {
                return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
            }, "Title must contain only letters, numbers, or dashes.");

            /*$('#inputForm').validate({
                rules: {
                    title: {
                        required: true,
                        titleRegex: true,
                    },
                    slogan: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    category: {
                        required: true,
                    },
                    title_burmese: {
                        required: true,
                    },
                    slogan_burmese: {
                        required: true,
                    },
                    description_burmese: {
                        required: true,
                    },
                    category_burmese: {
                        required: true,
                    },
                    @if ($action == 'new')
                        benefit: {
                        required: true,
                        },
                        product: {
                        required: true,
                        },
                    @endif
                },
                messages: {
                    title: {
                        required: "You need to fill product title.",
                        titleRegex: "Title must contain only letters, numbers, or dashes.",
                    },
                    slogan: {
                        required: "You need to fill slogan.",
                    },
                    description: {
                        required: "You need to fill description.",
                    },
                    category: {
                        required: "You need to choose the category of product.",
                    },
                    title_burmese: {
                        required: "You need to fill product title.",
                    },
                    slogan_burmese: {
                        required: "You need to fill slogan.",
                    },
                    description_burmese: {
                        required: "You need to fill description.",
                    },
                    category_burmese: {
                        required: "You need to choose the category of product.",
                    },
                    @if ($action == 'new')
                        benefit: {
                        required: "You need to upload image.",
                        },
                        product: {
                        required: "You need to upload image.",
                        },
                    @endif
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });*/
        });
    </script>
@endsection
{{-- /. page plugin --}}
