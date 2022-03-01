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
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Image Upload -->
    <link href="{{ asset('adminlite/plugins/bootstrap-imageupload/bootstrap-imageupload.css') }}" rel="stylesheet">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/summernote/summernote-bs4.min.css') }}">
@endsection
{{-- /. Head Stylesheets --}}


{{-- Main Content --}}
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <form id="inputForm"
                action="{{ $action == 'new' ? route('store#data#user') : route('update#data#user', isset($user->id) ? $user->id : null) }}"
                method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    @include('admin.user.menu')
                    <div class="card-tools">
                        <button type="submit" class="btn btn-primary"><i
                            class="fas fa-save"></i> Save</button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name"
                                    value="{{ old('name', isset($user->name) ? $user->name : null) }}"
                                    class="form-control" id="name" aria-describedby="nameHelp">
                                <small id="nameHelp" class="form-text text-muted">Please enter your name.</small>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email"
                                    value="{{ old('email', isset($user->email) ? $user->email : null) }}"
                                    class="form-control" id="email" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">You can log in via this
                                    email.</small>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="If you fill the password, this means you change the pasword. ">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="password_confirmation">
                            </div>
                            <div class="form-group">
                                <label for="is_active">Active: </label>
                                <input type="checkbox" id="is_active" name="is_active" {{ (old('is_active', isset($user->is_active) ? $user->is_active : null) == true or $action == 'new')? 'checked': '' }} data-bootstrap-switch
                                    data-on-color="success">
                            </div>
                        </div> <!-- col -->
                        <div class="col">
                            <div class="form-group">
                                <label for="team">Team <span class="text-danger">*</span></label>
                                <select id="team" name="team" class="form-control select2" style="width: 100%;"
                                    aria-describedby="teamHelp">
                                    <option selected="selected">Please select the team</option>
                                    @foreach ($teams as $team)
                                        @php
                                            $flag = '';
                                            if (isset($user->current_team_id)) {
                                                if (old('team', $user->current_team_id)) {
                                                    if (old('team', $user->current_team_id) == $team->id) {
                                                        $flag = 'selected';
                                                    }
                                                }
                                            }
                                        @endphp
                                        <option value="{{ $team->id }}" {{ $flag }}>
                                            {{ $team->name }}</option>
                                    @endforeach
                                </select>
                                <small id="teamHelp" class="form-text text-muted">Please select the team for
                                    permission.</small>
                                @error('team')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                @if (isset($user->profile_photo_path))
                                    <div class="col">
                                        <figure class="figure">
                                            <img src="{{ asset($user->profile_photo_path) }}" alt="Profile Image"
                                                class="figure-img img-thumbnail">
                                            <figcaption class="figure-caption text-center">Current Profile Image
                                            </figcaption>
                                        </figure>
                                    </div>
                                @endif
                                <div class="col">
                                    <h4>Profile Image</h4>
                                    <!-- bootstrap-imageupload. -->

                                    <div class="imageupload panel panel-default card card-default">

                                        <div class="panel-heading card-heading clearfix p-2">

                                            <h5 class="panel-title card-title pull-left">Select Image file</h5>

                                            <div class="btn-group pull-right float-right">

                                                <button type="button" class="btn btn-default active">File</button>

                                                <button type="button" class="btn btn-default">URL</button>

                                            </div>

                                        </div>

                                        <div class="file-tab panel-body card-body">

                                            <div class="btn-group">
                                                <div class="btn btn-primary btn-file">

                                                    <span>Browse</span>

                                                    <!-- The file is stored here. -->

                                                    <input type="file" name="file">

                                                </div>

                                                <button type="button" class="btn btn-danger">Remove</button>
                                            </div>

                                        </div>

                                        <div class="url-tab panel-body card-body">

                                            <div class="input-group">

                                                <input type="text" class="form-control hasclear"
                                                    placeholder="Image URL">

                                                <div class="input-group-btn input-group-append">

                                                    <button type="button" class="btn btn-default">Submit</button>

                                                </div>

                                            </div>

                                            <button type="button" class="btn btn-danger">Remove</button>

                                            <!-- The URL is stored here. -->

                                            <input type="hidden" name="image-url">

                                        </div>

                                    </div>
                                </div>
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
    <!-- daterangepicker -->
    <script src="{{ asset('adminlite/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlite/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminlite/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('adminlite/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('adminlite/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('adminlite/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('adminlite/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('adminlite/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- Image Upload -->
    <script src="{{ asset('adminlite/plugins/bootstrap-imageupload/bootstrap-imageupload.js') }}"></script>
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

            $('.imageupload').imageupload();

            $('#inputForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                },
                messages: {
                    name: {
                        required: "You need to fill user's name.",
                    },
                    email: {
                        required: "You need to fill user's email.",
                        email: "Invalid user's email.",
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
