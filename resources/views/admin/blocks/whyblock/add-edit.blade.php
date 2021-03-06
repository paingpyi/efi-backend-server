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
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/toastr/toastr.min.css') }}">
@endsection
{{-- /. Head Stylesheets --}}

{{-- content --}}
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <form id="inputForm" action="{{ route('why#efi#block') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active" id="nav-eng-tab" data-toggle="tab" href="#nav-eng"
                                            role="tab" aria-controls="nav-home" aria-selected="true">English</a>
                                        <a class="nav-link" id="nav-mm-tab" data-toggle="tab" href="#nav-mm" role="tab"
                                            aria-controls="nav-profile" aria-selected="false">Burmese</a>
                                        <a class="nav-link" id="nav-zh-tab" data-toggle="tab" href="#nav-zh" role="tab"
                                            aria-controls="nav-profile" aria-selected="false">Chinese</a>
                                    </div>
                                </nav>
                                <div class="tab-content pr-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active pt-3" id="nav-eng" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="form-group">
                                            <label for="text"><i class="flag-icon flag-icon-us mr-2"></i> Text <span
                                                    class="text-danger">*</span></label>
                                                    <textarea name="text" class="summernote" required id="text" aria-describedby="textHelp">{{ old('text', isset($why->text) ? json_decode($why->text, true)['en-us'] : '') }}</textarea>
                                            <small id="textHelp" class="form-text text-muted">Please enter title.</small>
                                            @error('text')
                                                <span class="error invalid-feedback bg-danger p-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> {{-- /. End of English Inputs --}}
                                    <div class="tab-pane fade pt-3" id="nav-mm" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <label for="text_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Text
                                                <span class="text-danger">*</span></label>
                                                <textarea name="text_burmese" class="summernote" required id="text_burmese" aria-describedby="text_burmeseHelp">{{ old('text_burmese', isset($why->text) ? json_decode($why->text, true)['my-mm'] : '') }}</textarea>
                                            <small id="title_burmeseHelp" class="form-text text-muted">Please enter
                                                text
                                                (Burmese).</small>
                                            @error('text_burmese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> {{-- /. End of Burmese Inputs --}}
                                    <div class="tab-pane fade pt-3" id="nav-zh" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <label for="title_chinese"><i class="flag-icon flag-icon-cn mr-2"></i> Text
                                                <span class="text-danger">*</span></label>
                                            <textarea name="text_chinese" class="summernote" required id="text_chinese" aria-describedby="text_chineseHelp">{{ old('text_chinese', isset($why->text) ? json_decode($why->text, true)['zh-cn'] : '') }}</textarea>
                                            <small id="text_chineseHelp" class="form-text text-muted">Please enter
                                                text
                                                (Chinese).</small>
                                            @error('text_chinese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> {{-- /. End of Chinese Inputs --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>
                                        Images
                                        @php
                                            if ($errors->has('image')) {
                                                echo '<span class="error bg-danger p-1 text-sm">* ' . Str::replace('.0', '', $errors->first('image')) . '</span>';
                                            } else {
                                                echo '<span class="text-danger">*</span>';
                                            }
                                        @endphp
                                    </label>
                                    @isset($sliders_en->image)
                                        <img src="{{ config('app.url') . $why->image }}" class="img-fluid"
                                            alt="Responsive image">
                                    @endisset
                                    <div class="input-group pb-3">
                                        <span class="input-group-btn">
                                            <a id="image" data-input="image_thumbnail"
                                                class="btn btn-primary lfm">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="image_thumbnail" class="form-control" type="text"
                                            name="image"
                                            value="{{ old('image', isset($why->image) ? config('app.url') . $why->image : '') }}">
                                    </div>
                                </div><!-- /. Slider Image -->
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
    <!-- Toastr -->
    <script src="{{ asset('adminlite/plugins/toastr/toastr.min.js') }}"></script>
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
                height: 250,
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

            $('.lfm').filemanager('image');

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox();

            $('#inputForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
                    title_burmese: {
                        required: true,
                    },
                    title_chinese: {
                        required: true,
                    },
                    kind: {
                        required: true,
                    },
                    main_category: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                },
                messages: {
                    title: {
                        required: "{{ __('validation.required', ['attribute' => 'title']) }}",
                    },
                    title_burmese: {
                        required: "{{ __('validation.required', ['attribute' => 'title burmese']) }}",
                    },
                    title_chinese: {
                        required: "{{ __('validation.required', ['attribute' => 'title chinese']) }}",
                    },
                    slug_url: {
                        required: "{{ __('validation.required', ['attribute' => 'slug url']) }}",
                        titleRegex: "Title must contain only letters, numbers, or dashes.",
                    },
                    main_category: {
                        required: "{{ __('validation.required', ['attribute' => 'main category']) }}",
                    },
                    status: {
                        required: "{{ __('validation.required', ['attribute' => 'status']) }}",
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

            @if (Session::has('success_message'))
                $( document ).ready(function() {
                toastr.success('{!! Session::get('success_message') !!}');
                });
            @endif
        });
    </script>
@endsection
{{-- /. page plugin --}}
