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
                    action="{{ $action == 'new' ? route('store#data#stakeholder') : route('update#data#stakeholder', $stakeholder->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        @include('admin.blocks.stakeholder.menu')
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
                                            <label for="name"><i class="flag-icon flag-icon-us mr-2"></i> Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name"
                                                value="{{ old('name', isset($stakeholder->name) ? json_decode($stakeholder->name, true)['en-us'] : null) }}"
                                                class="form-control name2slug" id="name" aria-describedby="nameHelp"
                                                required>
                                            <small id="nameHelp" class="form-text text-muted">Please enter name.</small>
                                            @error('name')
                                                <span class="error invalid-feedback bg-danger p-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description_english"><i class="flag-icon flag-icon-us mr-2"></i>
                                                Description
                                                @php
                                                    if ($errors->has('description_english')) {
                                                        echo '<span class="error text-danger p-1">* ' . $errors->first('description_english') . '</span>';
                                                    } else {
                                                        echo '<span class="text-danger">*</span>';
                                                    }
                                                @endphp
                                            </label>
                                            <textarea name="description_english" class="summernote" required id="description_english">{{ old('description_english', isset($stakeholder->description) ? json_decode($stakeholder->description, true)['en-us'] : '') }}</textarea>
                                        </div>
                                    </div> {{-- /. End of English Inputs --}}
                                    <div class="tab-pane fade pt-3" id="nav-mm" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <label for="name_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Name
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="name_burmese"
                                                value="{{ old('name_burmese', isset($stakeholder->name) ? json_decode($stakeholder->name, true)['my-mm'] : null) }}"
                                                class="form-control" id="name_burmese"
                                                aria-describedby="name_burmeseHelp">
                                            <small id="name_burmeseHelp" class="form-text text-muted">Please enter
                                                name
                                                (Burmese).</small>
                                            @error('name_burmese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
                                                Description
                                                @php
                                                    if ($errors->has('description_burmese')) {
                                                        echo '<span class="error text-danger p-1">* ' . $errors->first('description_burmese') . '</span>';
                                                    } else {
                                                        echo '<span class="text-danger">*</span>';
                                                    }
                                                @endphp
                                            </label>
                                            <textarea name="description_burmese" class="summernote" required id="description_burmese">{{ old('description_burmese', isset($stakeholder->description) ? json_decode($stakeholder->description, true)['my-mm'] : '') }}</textarea>
                                        </div>
                                    </div> {{-- /. End of Burmese Inputs --}}
                                    <div class="tab-pane fade pt-3" id="nav-zh" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <label for="name_chinese"><i class="flag-icon flag-icon-cn mr-2"></i> Name
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="name_chinese"
                                                value="{{ old('name_chinese', isset($stakeholder->name) ? json_decode($stakeholder->name, true)['zh-cn'] : null) }}"
                                                class="form-control" id="name_chinese"
                                                aria-describedby="name_chineseHelp">
                                            <small id="name_chineseHelp" class="form-text text-muted">Please enter
                                                name
                                                (Chinese).</small>
                                            @error('name_chinese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description_chinese"><i class="flag-icon flag-icon-cn mr-2"></i>
                                                Description
                                                @php
                                                    if ($errors->has('description_chinese')) {
                                                        echo '<span class="error text-danger p-1">* ' . $errors->first('description_chinese') . '</span>';
                                                    } else {
                                                        echo '<span class="text-danger">*</span>';
                                                    }
                                                @endphp
                                            </label>
                                            <textarea name="description_chinese" class="summernote" required id="description_chinese">{{ old('description_chinese', isset($stakeholder->description) ? json_decode($stakeholder->description, true)['zh-cn'] : '') }}</textarea>
                                        </div>
                                    </div> {{-- /. End of Chinese Inputs --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="category">Team <span class="text-danger">*</span></label>
                                    <select name="category" id="category" class="form-control select2"
                                        style="width: 100%;">
                                        <option value="">Please choose the team.</option>
                                        @foreach ($category as $cat)
                                            @if ($action == 'new')
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @else
                                                <option value="{{ $cat->id }}"
                                                    {{ $stakeholder->team == $cat->id ? ' selected' : '' }}>
                                                    {{ $cat->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Image
                                        @php
                                            if ($errors->has('image')) {
                                                echo '<span class="error bg-danger p-1 text-sm">* ' . Str::replace('.0', '', $errors->first('image')) . '</span>';
                                            } else {
                                                echo '<span class="text-danger">*</span>';
                                            }
                                        @endphp
                                    </label>
                                    <div class="input-group pb-3">
                                        <span class="input-group-btn">
                                            <a id="image" data-input="image_thumbnail" class="btn btn-primary lfm">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="image_thumbnail" class="form-control" type="text" name="image"
                                            value="{{ old('image', isset($stakeholder->image) ? $stakeholder->image : '') }}">
                                    </div>
                                </div><!-- /. stakeholder Image -->
                                <div class="form-group">
                                    <label for="is_active">Active: </label>
                                    @if (isset($stakeholder->is_active))
                                        <input type="checkbox" id="is_active" name="is_active"
                                            {{ old('is_active', $stakeholder->is_active == true ? 'checked' : '') }}
                                            data-bootstrap-switch data-on-color="success">
                                    @else
                                        <input type="checkbox" id="is_active" name="is_active" {{ old('is_active') }}
                                            data-bootstrap-switch data-on-color="success">
                                    @endif
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
                    name: {
                        required: true,
                    },
                    name_burmese: {
                        required: true,
                    },
                    name_chinese: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "{{ __('validation.required', ['attribute' => 'name']) }}",
                    },
                    name_burmese: {
                        required: "{{ __('validation.required', ['attribute' => 'name burmese']) }}",
                    },
                    name_chinese: {
                        required: "{{ __('validation.required', ['attribute' => 'name chinese']) }}",
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
