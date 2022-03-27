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
                    action="{{ $action == 'new'? route('store#data#category'): route('update#data#category', isset($category->id) ? $category->id : null) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        @include('admin.category.menu')
                        <div class="card-tools">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-link active" id="nav-eng-tab" data-toggle="tab"
                                                    href="#nav-eng" role="tab" aria-controls="nav-home"
                                                    aria-selected="true">English</a>
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
                                                    <label for="name"><i class="flag-icon flag-icon-us mr-2"></i> Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="name"
                                                        value="{{ old('name', isset($category->name) ? $category->name : null) }}"
                                                        class="form-control" id="name" aria-describedby="nameHelp">
                                                    <small id="nameHelp" class="form-text text-muted">Please enter category
                                                        name.</small>
                                                    @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="description"><i class="flag-icon flag-icon-us mr-2"></i>
                                                        Description</label>
                                                    <textarea name="description" class="summernote" required
                                                        id="description">{{ old('description', isset($category->description) ? $category->description : '') }}</textarea>
                                                </div>
                                            </div>{{-- /. End of English Inputs --}}
                                            <div class="tab-pane fade pt-3" id="nav-mm" role="tabpanel"
                                                aria-labelledby="nav-profile-tab">
                                                <div class="form-group">
                                                    <label for="name_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
                                                        Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="name_burmese"
                                                        value="{{ old('name_burmese', isset($category->name_burmese) ? $category->name_burmese : null) }}"
                                                        class="form-control" id="name_burmese"
                                                        aria-describedby="name_burmeseHelp">
                                                    <small id="name_burmeseHelp" class="form-text text-muted">Please enter
                                                        category
                                                        name.</small>
                                                    @error('name_burmese')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="description_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
                                                        Description</label>
                                                    <textarea name="description_burmese" class="summernote" required
                                                        id="description_burmese">{{ old('description_burmese', isset($category->description_burmese) ? $category->description_burmese : '') }}</textarea>
                                                </div>
                                            </div>{{-- /. End of Burmese Inputs --}}
                                            <div class="tab-pane fade pt-3" id="nav-zh" role="tabpanel"
                                                aria-labelledby="nav-profile-tab">
                                                <div class="form-group">
                                                    <label for="name_chinese"><i class="flag-icon flag-icon-cn mr-2"></i>
                                                        Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="name_chinese"
                                                        value="{{ old('name_chinese', isset($category->name_chinese) ? $category->name_chinese : null) }}"
                                                        class="form-control" id="name_chinese"
                                                        aria-describedby="name_chineseHelp">
                                                    <small id="name_chineseHelp" class="form-text text-muted">Please enter
                                                        category
                                                        name.</small>
                                                    @error('name_chinese')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="description_chinese"><i class="flag-icon flag-icon-cn mr-2"></i>
                                                        Description</label>
                                                    <textarea name="description_chinese" class="summernote" required
                                                        id="description_chinese">{{ old('description_chinese', isset($category->description_chinese) ? $category->description_chinese : '') }}</textarea>
                                                </div>
                                            </div>{{-- /. End of Chinese Inputs --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="parent">Category</label>
                                    <select name="parent" id="parent" class="form-control select2" style="width: 100%;">
                                        <option value="">If this category have parent, please choose here. If don't, do not
                                            choose it.</option>
                                        @foreach ($parent_category as $cat)
                                            @if ($action == 'new')
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @else
                                                @if ($category->id != $cat->id)
                                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                @endif

                                                @if ($category->parent_id == $cat->id)
                                                    <option value="{{ $cat->id }}" selected>{{ $cat->name }}
                                                    </option>
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="is_active">Active: </label>
                                    <input type="checkbox" id="is_active" name="is_active"
                                        {{ (old('is_active', isset($category->is_active) ? $category->is_active : null) == true or $action == 'new')? 'checked': '' }}
                                        data-bootstrap-switch data-on-color="success">
                                </div>
                            </div> <!-- col -->
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
                placeholder: 'Write category description here...',
                toolbar: [
                    ['undo', ['undo']],
                    ['redo', ['redo']],
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen']],
                ],
            });

            $('#inputForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "You need to fill name.",
                    },
                    description: {
                        required: "You need to fill description.",
                    },
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
            });
        });
    </script>
@endsection
{{-- /. page plugin --}}
