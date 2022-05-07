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
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('adminlite/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection
{{-- /. Head Stylesheets --}}

{{-- content --}}
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <form id="inputForm"
                    action="{{ $action == 'new' ? route('store#data#job') : route('update#data#job', isset($job_en->id) ? $job_en->id : 0) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        @include('admin.job.menu')
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
                                            <label for="position"><i class="flag-icon flag-icon-us mr-2"></i> Position <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="position"
                                                value="{{ old('position', isset($job_en->position) ? json_decode($job_en->position) : null) }}"
                                                class="form-control position2slug" id="position"
                                                aria-describedby="positionHelp">
                                            <small id="positionHelp" class="form-text text-muted">Please enter vacant
                                                position position.</small>
                                            @error('position')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="department"><i class="flag-icon flag-icon-us mr-2"></i>
                                                Department</label>
                                            <input type="text" name="department" id="department" class="form-control"
                                                value="{{ old('department', isset($job_en->department) ? json_decode($job_en->department) : null) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="jd"><i class="flag-icon flag-icon-us mr-2"></i> Job Description
                                                <span class="text-danger">*</span></label>
                                            <textarea name="jd" class="summernote" required
                                                id="jd">{{ old('jd', isset($job_en->description) ? json_decode($job_en->description) : '') }}</textarea>
                                        </div>
                                    </div> {{-- /. End of English Inputs --}}
                                    <div class="tab-pane fade pt-3" id="nav-mm" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <label for="position_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
                                                Position
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="position_burmese"
                                                value="{{ old('position_burmese', isset($job_mm->position) ? json_decode($job_mm->position) : null) }}"
                                                class="form-control" id="position_burmese"
                                                aria-describedby="position_burmeseHelp">
                                            <small id="position_burmeseHelp" class="form-text text-muted">Please enter the
                                                vacant
                                                position title
                                                (burmese).</small>
                                            @error('position_burmese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="department_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
                                                Department</label>
                                            <input type="text" name="department_burmese" id="department_burmese"
                                                class="form-control"
                                                value="{{ old('department_burmese', isset($job_mm->department) ? json_decode($job_mm->department) : null) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="jd_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
                                                Job Description
                                                <span class="text-danger">*</span></label>
                                            <textarea name="jd_burmese" class="summernote" required
                                                id="jd_burmese">{{ old('jd_burmese', isset($job_mm->description) ? json_decode($job_mm->description) : '') }}</textarea>
                                        </div>
                                    </div> {{-- /. End of Burmese Inputs --}}
                                    <div class="tab-pane fade show pt-3" id="nav-zh" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="form-group">
                                            <label for="position_chinese"><i class="flag-icon flag-icon-cn mr-2"></i>
                                                Position <span class="text-danger">*</span></label>
                                            <input type="text" name="position_chinese"
                                                value="{{ old('position_chinese', isset($job_zh->position) ? json_decode($job_zh->position) : null) }}"
                                                class="form-control" id="position_chinese"
                                                aria-describedby="position_chineseHelp">
                                            <small id="position_chineseHelp" class="form-text text-muted">Please enter
                                                vacant position position (Chinese).</small>
                                            @error('position_chinese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="department_chinese"><i class="flag-icon flag-icon-cn mr-2"></i>
                                                Department</label>
                                            <input type="text" name="department_chinese" id="department_chinese"
                                                class="form-control"
                                                value="{{ old('department_chinese', isset($job_zh->department) ? json_decode($job_zh->department) : null) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="jd_chinese"><i class="flag-icon flag-icon-cn mr-2"></i> Job
                                                Description
                                                <span class="text-danger">*</span></label>
                                            <textarea name="jd_chinese" class="summernote" required
                                                id="jd_chinese">{{ old('jd_chinese', isset($job_zh->description) ? json_decode($job_zh->description) : '') }}</textarea>
                                        </div>
                                    </div> {{-- /. End of Chinese Inputs --}}
                                </div>
                            </div>
                            <div class="col-4 bg-secondary p-3">
                                <div class="form-group">
                                    <label for="slug_url">Slug URL
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="slug_url"
                                        value="{{ old('slug_url', isset($job_en->slug_url) ? $job_en->slug_url : null) }}"
                                        class="form-control" id="slug_url" aria-describedby="slug_urlHelp">
                                    <small id="slug_urlHelp" class="form-text text-white">Do not use the special charaters
                                        but you can you dash (-).</small>
                                    @error('slug_url')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="due">Application Due Date</label>
                                    <div class="input-group date" id="due" data-target-input="nearest"
                                        aria-describedby="dueHelp">
                                        <input name="due" value="{{ old('due') }}" type="text"
                                            class="form-control datetimepicker-input" data-target="#due" />
                                        <div class="input-group-append" data-target="#due" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <small id="dueHelp" class="form-text text-muted">Please blank this field if you want to
                                        open this position until your organization has the right person.</small>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="main_category">Main Category <span class="text-danger">*</span></label>
                                    <select id="main_category" name="main_category" id="main_category"
                                        class="form-control select2" style="width: 100%;">
                                        <option value="">Please choose the main category.</option>
                                        @foreach ($category as $cat)
                                            @if ($action == 'new')
                                                <option value="{{ $cat->id }}, {{ $cat->machine }}">{{ $cat->name }}</option>
                                            @else
                                                <option value="{{ $cat->id }}"
                                                    {{ $job_en->category_id == $cat->id ? ' selected' : '' }}>
                                                    {{ $cat->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="active">Open: </label>
                                    <input type="checkbox" id="active" name="active"
                                        {{ (old('active', isset($job_en->is_vacant) ? $job_en->is_vacant : null) == true or $action == 'new')? 'checked': '' }}
                                        data-bootstrap-switch data-on-color="success">
                                </div>
                                <div class="form-group">
                                    <label for="instant">Instant: </label>
                                    <input type="checkbox" id="instant" name="instant"
                                        {{ (old('instant', isset($job_en->instant) ? $job_en->instant : null) == true)? 'checked': '' }}
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
    <script src="{{ asset('adminlite/plugins/bootstrap-imageupload/bootstrap-imageupload.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('adminlite/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminlite/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlite/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
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

            //Date picker
            $('#due').datetimepicker({
                format: 'L',
                @isset($job_en->due_date)
                    defaultDate: moment("{{ date('Y-m-d', strtotime($job_en->due_date)) }}", "YYYY-MM-DD"),
                @endisset
            });

            // Summernote
            $('.summernote').summernote({
                height: 800,
                placeholder: 'Write job description here...',
            });

            $('.imageupload').imageupload();

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox();

            $(".position2slug").keyup(function() {
                var Text = $(this).val();
                Text = Text.toLowerCase()
                    .replace(/[^\w ]+/g, '')
                    .replace(/ +/g, '-');
                var Today = new Date();
                var TextToday = Today.getFullYear().toString() + '-' + Today.getMonth().toString() + '-' +
                    Today.getDate().toString() + '-' + Today.getHours().toString() + '-' + Today
                    .getMinutes().toString() + '-' + Today.getSeconds().toString();
                TextToday = TextToday.toLowerCase()
                    .replace(/[^\w ]+/g, '')
                    .replace(/ +/g, '-');
                $("#slug_url").val(Text +  '-' + TextToday);
            });

            $.validator.addMethod("positionRegex", function(value, element) {
                return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
            }, "position must contain only letters, numbers, or dashes.");

            $('#inputForm').validate({
                rules: {
                    position: {
                        required: true,
                        positionRegex: true,
                    },
                    department: {
                        required: true,
                    },
                    position_burmese: {
                        required: true,
                    },
                    department_burmese: {
                        required: true,
                    },
                    position_chinese: {
                        required: true,
                    },
                    department_chinese: {
                        required: true,
                    },
                    slug_url: {
                        required: true,
                        positionRegex: true,
                    }
                },
                messages: {
                    position: {
                        required: "You need to fill vacant position.",
                        positionRegex: "position must contain only letters, numbers, or dashes.",
                    },
                    department: {
                        required: "You need to fill content.",
                    },
                    position_burmese: {
                        required: "You need to fill vacant position.",
                    },
                    department_burmese: {
                        required: "You need to fill job description.",
                    },
                    position_chinese: {
                        required: "You need to fill vacant position.",
                    },
                    department_chinese: {
                        required: "You need to fill job description.",
                    },
                    slug_url: {
                        required: "You need to fill slug url for SEO.",
                        positionRegex: "position must contain only letters, numbers, or dashes.",
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
