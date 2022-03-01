{{-- Base Layout of Admin Controls --}}
@extends('layouts.base')
{{-- /. End of base layout --}}


{{-- Head Stylesheets --}}
@section('headStyle')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Image Upload -->
    <link href="{{ asset('adminlite/plugins/bootstrap-imageupload/bootstrap-imageupload.css') }}" rel="stylesheet">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
@endsection
{{-- /. Head Stylesheets --}}


{{-- Main Content --}}
@section('content')
<div class="row">
    <div class="col">
        <form id="inputForm"
            action="{{ $action == 'new' ? route('store#data#team') : route('update#data#team', isset($team->id) ? $team->id : null) }}"
            method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    @include('admin.team.menu')
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
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name"
                                    value="{{ old('name', isset($team->name) ? $team->name : null) }}"
                                    class="form-control" id="name" aria-describedby="nameHelp">
                                <small id="nameHelp" class="form-text text-muted">Please enter team name.</small>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="is_active" name="is_active"
                                {{ (old('is_active', isset($team->is_active) ? $team->is_active : null) == true or $action == 'new')? 'checked': '' }}
                                    data-bootstrap-switch data-on-color="success">
                            </div>
                        </div> <!-- col -->
                        <div class="col">
                            <div class="form-group">
                                <label>Allow to access Modules</label>
                                <select name="modules[]" class="duallistbox" multiple="multiple"
                                    aria-describedby="modulesHelp">
                                    @foreach (Route::getRoutes() as $value)
                                        @if (Illuminate\Support\Str::contains($value->getName(), '#'))
                                            <option value="{{ $value->getName() }}"
                                                {{ in_array($value->getName(), old('modules', isset($team->permissions) ? json_decode($team->permissions) : [])) ? 'selected' : '' }}>
                                                {{ Str::upper(Str::replace('#', ' ', $value->getName())) }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <small id="modulesHelp" class="form-text text-muted">Please select to allow the
                                    modules.</small>
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
            </div>
            <!-- /.card -->
        </form>
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
    <!-- Image Upload -->
    <script src="{{ asset('adminlite/plugins/bootstrap-imageupload/bootstrap-imageupload.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('adminlite/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2();

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

            $('.imageupload').imageupload();

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox();

            $('#inputForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "You need to fill a team name.",
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
