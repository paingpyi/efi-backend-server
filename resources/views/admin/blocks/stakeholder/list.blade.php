{{-- Base Layout of Admin Controls --}}
@extends('layouts.base')
{{-- /. End of base layout --}}


{{-- Head Stylesheets --}}
@section('headStyle')
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('adminlite/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/toastr/toastr.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- flag-icon-css -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/flag-icon-css/css/flag-icon.min.css') }}">
@endsection
{{-- /. Head Stylesheets --}}

{{-- Main Content --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <button class="btn btn-default mb-1" type="button" data-toggle="collapse" data-target="#blockText"
                aria-expanded="false" aria-controls="blockText">
                <i class="fa fa-ellipsis-v"></i> Block Text
            </button>
            <div class="collapse" id="blockText">
                <form id="inputForm" action="{{ route('stakeholder#text#block') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Block</h4>
                            <div class="card-tools">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>
                                    Save</button>
                            </div>
                        </div>
                        <!-- /. card-header -->
                        <div class="card-body">
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
                                            value="{{ old('title', isset($block->title) ? json_decode($block->title, true)['en-us'] : null) }}"
                                            class="form-control name2slug" id="title" aria-describedby="titleHelp"
                                            required>
                                        <small id="titleHelp" class="form-text text-muted">Please enter title.</small>
                                        @error('title')
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
                                        <textarea name="description_english" class="summernote" required id="description_english">{{ old('description_english', isset($block->description) ? json_decode($block->description, true)['en-us'] : '') }}</textarea>
                                    </div>
                                </div> {{-- /. End of English Inputs --}}
                                <div class="tab-pane fade pt-3" id="nav-mm" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <div class="form-group">
                                        <label for="title_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Title
                                            <span class="text-danger">*</span></label>
                                        <input type="text" name="title_burmese"
                                            value="{{ old('title_burmese', isset($block->title) ? json_decode($block->title, true)['my-mm'] : null) }}"
                                            class="form-control" id="title_burmese" aria-describedby="title_burmeseHelp">
                                        <small id="title_burmeseHelp" class="form-text text-muted">Please enter
                                            title
                                            (Burmese).</small>
                                        @error('title_burmese')
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
                                        <textarea name="description_burmese" class="summernote" required id="description_burmese">{{ old('description_burmese', isset($block->description) ? json_decode($block->description, true)['my-mm'] : '') }}</textarea>
                                    </div>
                                </div> {{-- /. End of Burmese Inputs --}}
                                <div class="tab-pane fade pt-3" id="nav-zh" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <div class="form-group">
                                        <label for="title_chinese"><i class="flag-icon flag-icon-cn mr-2"></i> Title
                                            <span class="text-danger">*</span></label>
                                        <input type="text" name="title_chinese"
                                            value="{{ old('title_chinese', isset($block->title) ? json_decode($block->title, true)['zh-cn'] : null) }}"
                                            class="form-control" id="title_chinese" aria-describedby="title_chineseHelp">
                                        <small id="title_chineseHelp" class="form-text text-muted">Please enter
                                            title
                                            (Chinese).</small>
                                        @error('title_chinese')
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
                                        <textarea name="description_chinese" class="summernote" required id="description_chinese">{{ old('description_chinese', isset($block->description) ? json_decode($block->description, true)['zh-cn'] : '') }}</textarea>
                                    </div>
                                </div> {{-- /. End of Chinese Inputs --}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        @include('admin.blocks.stakeholder.menu')
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-bordered table-striped table-hover w-100">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Team</th>
                                    <th>Enable</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stakeholders as $stakeholder)
                                    <tr>
                                        <td class="text-nowrap"><a
                                                href="{{ route('edit#stakeholder', Illuminate\Support\Facades\Crypt::encryptString($stakeholder->id)) }}">{{ json_decode($stakeholder->name, true)['en-us'] }}
                                            </a></td>
                                        <td><img src="{{ $stakeholder->image }}" alt="stakeholder Image"
                                                class="img-thumbnail" width="100px"></td>
                                        <td>{{ $stakeholder->category_name }}</td>
                                        <td class="text-nowrap">
                                            <form
                                                action="{{ route('deactivate#stakeholder', Illuminate\Support\Facades\Crypt::encryptString($stakeholder->id)) }}"
                                                method="post">
                                                @csrf
                                                <div class="btn-group">
                                                    <button type="submit"
                                                        class="btn {{ $stakeholder->is_active ? 'btn-success' : 'btn-danger' }}">{!! $stakeholder->is_active
                                                            ? '<i
                                                                                                                                                                                                                        class="fas fa-check-square"></i> Enabled'
                                                            : '<i class="fas fa-square"></i> Disabled' !!}</button>
                                                    <button type="button"
                                                        class="btn {{ $stakeholder->is_active ? 'btn-success' : 'btn-danger' }} dropdown-toggle dropdown-toggle-split"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('edit#stakeholder', Illuminate\Support\Facades\Crypt::encryptString($stakeholder->id)) }}">Edit</a>
                                                        <button type="submit"
                                                            class="dropdown-item">{{ $stakeholder->is_active ? 'Disabled' : 'Enabled' }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Team</th>
                                    <th>Enable</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
{{-- /. End of Main Content --}}

@section('footerScripts')
    <!-- Sparkline -->
    <script src="{{ asset('adminlite/plugins/sparklines/sparkline.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('adminlite/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlite/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminlite/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('adminlite/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminlite/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlite/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlite/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlite/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlite/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlite/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlite/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminlite/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminlite/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminlite/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminlite/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminlite/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('adminlite/plugins/toastr/toastr.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#data-table").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#data-table_wrapper .col-md-6:eq(0)');

            $("#btn-publish").click(function() {
                $("#publish-form").submit();
            });

            // Summernote
            $('.summernote').summernote({
                height: 150,
                placeholder: 'Write content here...',
                toolbar: [
                    ['undo', ['undo']],
                    ['redo', ['redo']],
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['view', ['fullscreen']],
                ],
                callbacks: {
                    onImageUpload: function(data) {
                        data.pop();
                    }
                },
            });

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

            @if (Session::has('success_message'))
                $(document).ready(function() {
                    toastr.success('{!! Session::get('success_message') !!}');
                });
            @endif
        });
    </script>
@endsection
