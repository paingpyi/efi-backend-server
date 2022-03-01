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
                                        <div class="form-group">
                                            <label for="name"><i class="flag-icon flag-icon-us mr-2"></i> Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name"
                                                value="{{ old('name', isset($category->name) ? $category->name : null) }}"
                                                class="form-control" id="name" aria-describedby="nameHelp">
                                            <small id="nameHelp" class="form-text text-muted">Please enter category
                                                name.</small>
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name_burmese"
                                                value="{{ old('name_burmese', isset($category->name_burmese) ? $category->name_burmese : null) }}"
                                                class="form-control" id="name_burmese"
                                                aria-describedby="name_burmeseHelp">
                                            <small id="name_burmeseHelp" class="form-text text-muted">Please enter category
                                                name.</small>
                                            @error('name_burmese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="description"><i class="flag-icon flag-icon-us mr-2"></i> Description</label>
                                            <textarea name="description" class="summernote" required
                                                id="description">{{ old('description', isset($category->description) ? $category->description : '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="description_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Description</label>
                                            <textarea name="description_burmese" class="summernote" required
                                                id="description_burmese">{{ old('description_burmese', isset($category->description_burmese) ? $category->description_burmese : '') }}</textarea>
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
