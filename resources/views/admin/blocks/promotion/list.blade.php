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
    <link rel="stylesheet"
        href="{{ asset('adminlite/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/toastr/toastr.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/summernote/summernote-bs4.min.css') }}">
@endsection
{{-- /. Head Stylesheets --}}

{{-- Main Content --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        @include('admin.blocks.promotion.menu')
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-bordered table-striped table-hover w-100">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Enable</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($promotions as $promotion)
                                    <tr>
                                        <td class="text-nowrap"><a
                                                href="{{ route('edit#promotion', Illuminate\Support\Facades\Crypt::encryptString($promotion->id)) }}">{{ json_decode($promotion->title,true)['en-us'] }}
                                            </a></td>
                                        <td><img src="{{ $promotion->image }}" alt="Promotion Image" class="img-thumbnail" width="200px"></td>
                                        <td class="text-nowrap">
                                            <form
                                            action="{{ route('deactivate#promotion', Illuminate\Support\Facades\Crypt::encryptString($promotion->id)) }}"
                                            method="post">
                                            @csrf
                                            <div class="btn-group">
                                                <button type="submit"
                                                    class="btn {{ $promotion->is_active ? 'btn-success' : 'btn-danger' }}">{!! $promotion->is_active
? '<i
                                                class="fas fa-check-square"></i> Enabled'
: '<i class="fas fa-square"></i> Disabled' !!}</button>
                                                <button type="button"
                                                    class="btn {{ $promotion->is_active ? 'btn-success' : 'btn-danger' }} dropdown-toggle dropdown-toggle-split"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('edit#promotion', Illuminate\Support\Facades\Crypt::encryptString($promotion->id)) }}">Edit</a>
                                                    <button type="submit"
                                                        class="dropdown-item">{{ $promotion->is_active ? 'Disabled' : 'Enabled' }}</button>
                                                </div>
                                            </div>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Image</th>
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
    <script src="{{ asset('adminlite/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
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

            @if (Session::has('success_message'))
                $( document ).ready(function() {
                toastr.success('{!! Session::get('success_message') !!}');
                });
            @endif
        });
    </script>
@endsection
