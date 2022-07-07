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
                <form id="inputForm"
                    action="{{ $action == 'new' ? route('store#data#contact') : route('update#data#contact', $contact->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        @include('admin.blocks.contact.menu')
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
                                            <label for="title"><i class="flag-icon flag-icon-us mr-2"></i> Title <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="title"
                                                value="{{ old('title', isset($contact->title) ? json_decode($contact->title, true)['en-us'] : null) }}"
                                                class="form-control title2slug" id="title" aria-describedby="titleHelp"
                                                required>
                                            <small id="titleHelp" class="form-text text-muted">Please enter title.</small>
                                            @error('title')
                                                <span class="error invalid-feedback bg-danger p-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="address_english"><i class="flag-icon flag-icon-us mr-2"></i>
                                                Address
                                                @php
                                                    if ($errors->has('address_english')) {
                                                        echo '<span class="error text-danger p-1">* ' . $errors->first('address_english') . '</span>';
                                                    } else {
                                                        echo '<span class="text-danger">*</span>';
                                                    }
                                                @endphp
                                            </label>
                                            <textarea name="address_english" class="summernote" required id="address_english">{{ old('address_english', isset($contact->address) ? json_decode($contact->address, true)['en-us'] : '') }}</textarea>
                                        </div>
                                    </div> {{-- /. End of English Inputs --}}
                                    <div class="tab-pane fade pt-3" id="nav-mm" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <label for="title_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Title
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="title_burmese"
                                                value="{{ old('title_burmese', isset($contact->title) ? json_decode($contact->title, true)['my-mm'] : null) }}"
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
                                            <label for="address_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
                                                Address
                                                @php
                                                    if ($errors->has('address_burmese')) {
                                                        echo '<span class="error text-danger p-1">* ' . $errors->first('address_burmese') . '</span>';
                                                    } else {
                                                        echo '<span class="text-danger">*</span>';
                                                    }
                                                @endphp
                                            </label>
                                            <textarea name="address_burmese" class="summernote" required id="address_burmese">{{ old('address_burmese', isset($contact->address) ? json_decode($contact->address, true)['my-mm'] : '') }}</textarea>
                                        </div>
                                    </div> {{-- /. End of Burmese Inputs --}}
                                    <div class="tab-pane fade pt-3" id="nav-zh" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <label for="title_chinese"><i class="flag-icon flag-icon-cn mr-2"></i> Title
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="title_chinese"
                                                value="{{ old('title_chinese', isset($contact->title) ? json_decode($contact->title, true)['zh-cn'] : null) }}"
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
                                            <label for="address_chinese"><i class="flag-icon flag-icon-cn mr-2"></i>
                                                Address
                                                @php
                                                    if ($errors->has('address_chinese')) {
                                                        echo '<span class="error text-danger p-1">* ' . $errors->first('address_chinese') . '</span>';
                                                    } else {
                                                        echo '<span class="text-danger">*</span>';
                                                    }
                                                @endphp
                                            </label>
                                            <textarea name="address_chinese" class="summernote" required id="address_chinese">{{ old('address_chinese', isset($contact->address) ? json_decode($contact->address, true)['zh-cn'] : '') }}</textarea>
                                        </div>
                                    </div> {{-- /. End of Chinese Inputs --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="map"><i class="fa fa-map-marker"></i>
                                        Google Map
                                        @php
                                            if ($errors->has('image')) {
                                                echo '<span class="error bg-danger p-1 text-sm">* ' . Str::replace('.0', '', $errors->first('image')) . '</span>';
                                            } else {
                                                echo '<span class="text-danger">*</span>';
                                            }
                                        @endphp
                                    </label>
                                    <input type="url" name="map"
                                                value="{{ old('map', isset($contact->map) ? $contact->map : null) }}"
                                                class="form-control" id="map">
                                </div><!-- /. contact Image -->
                                <div class="form-group">
                                    <label for="main">Is Main Address? </label>
                                    @if (isset($contact->main))
                                        <input type="checkbox" id="main" name="main"
                                            {{ old('main', $contact->main == true ? 'checked' : '') }}
                                            data-bootstrap-switch data-on-color="success" aria-describedby="mainHelp">
                                    @else
                                        <input type="checkbox" id="main" name="main" {{ old('main') }}
                                            data-bootstrap-switch data-on-color="success" aria-describedby="mainHelp">
                                    @endif
                                    <small id="mainHelp" class="form-text text-muted">If you check this, the another main address will change to "not main address".</small>
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
                height: 150,
                placeholder: 'Write content here...',
                toolbar: [
                    ['undo', ['undo']],
                    ['redo', ['redo']],
                    ['view', ['fullscreen']],
                ],
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
