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
                    action="{{ route('store#data#email') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <div class="card-title"><h4>Receivable Emails</h4></div>
                        <div class="card-tools">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jobapply">Job Application <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="jobapply"
                                        value="{{ old('jobapply', isset($promotion->jobapply) ? json_decode($promotion->jobapply, true)['en-us'] : null) }}"
                                        class="form-control" id="jobapply" aria-describedby="jobapplyHelp"
                                        required>
                                    <small id="jobapplyHelp" class="form-text text-muted">Please enter email address.</small>
                                    @error('jobapply')
                                        <span class="error invalid-feedback bg-danger p-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> <!-- /. col -->
                            <div class="col">
                                <div class="form-group">
                                    <label for="contact">Customer Contact <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="contact"
                                        value="{{ old('contact', isset($promotion->contact) ? json_decode($promotion->contact, true)['en-us'] : null) }}"
                                        class="form-control" id="contact" aria-describedby="contactHelp"
                                        required>
                                    <small id="contactHelp" class="form-text text-muted">Please enter email address.</small>
                                    @error('contact')
                                        <span class="error invalid-feedback bg-danger p-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> <!-- /. col -->
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="quote">Quote <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="quote"
                                        value="{{ old('quote', isset($promotion->quote) ? json_decode($promotion->quote, true)['en-us'] : null) }}"
                                        class="form-control" id="quote" aria-describedby="quoteHelp"
                                        required>
                                    <small id="quoteHelp" class="form-text text-muted">Please enter email address.</small>
                                    @error('quote')
                                        <span class="error invalid-feedback bg-danger p-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> <!-- /. col -->
                            <div class="col">
                                <div class="form-group">
                                    <label for="claim">Claim <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="claim"
                                        value="{{ old('claim', isset($promotion->claim) ? json_decode($promotion->claim, true)['en-us'] : null) }}"
                                        class="form-control" id="claim" aria-describedby="quoteHelp"
                                        required>
                                    <small id="quoteHelp" class="form-text text-muted">Please enter email address.</small>
                                    @error('claim')
                                        <span class="error invalid-feedback bg-danger p-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> <!-- /. col -->
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
                    job_apply: {
                        required: true,
                        email: true,
                    },
                    contact: {
                        required: true,
                        email: true,
                    },
                    quotes: {
                        required: true,
                        email: true,
                    },
                    claims: {
                        required: true,
                        email: true,
                    },
                },
                messages: {
                    job_apply: {
                        required: "{{ __('validation.required', ['attribute' => 'Email for Job Application']) }}",
                        email: "{{ __('validation.email', ['attribute' => 'Email for Job Application']) }}",
                    },
                    contact: {
                        required: "{{ __('validation.required', ['attribute' => 'Email for Customer Contact']) }}",
                        email: "{{ __('validation.email', ['attribute' => 'Email for Customer Contact']) }}",
                    },
                    quotes: {
                        required: "{{ __('validation.required', ['attribute' => 'Email for Product Quote']) }}",
                        email: "{{ __('validation.email', ['attribute' => 'Email for Product Quote']) }}",
                    },
                    claims: {
                        required: "{{ __('validation.required', ['attribute' => 'Email for Claim']) }}",
                        email: "{{ __('validation.email', ['attribute' => 'Email for Claim']) }}",
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
