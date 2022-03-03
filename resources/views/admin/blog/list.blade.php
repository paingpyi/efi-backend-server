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
<<<<<<< HEAD
                        @include('admin.product.menu')
=======
                        @include('admin.blog.menu')
>>>>>>> dev
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-bordered table-striped table-hover w-100">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
<<<<<<< HEAD
                                    <th>Author</th>
                                    <th></th>
=======
                                    <th>Active</th>
>>>>>>> dev
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td class="text-nowrap"><a
<<<<<<< HEAD
                                                href="{{ route('edit#product', Illuminate\Support\Facades\Crypt::encryptString($blog->id)) }}">{{ $blog->title }}<br><span
                                                    class="badge badge-info">{{ $blog->title }}</span>
                                            </a></td>
                                        <td>{{ $blog->category_name }}</td>
                                        <td>{{ $blog->author_name }}</td>
                                        <td class="text-nowrap">
                                            <form
                                                action="{{ route('deactivate#product', Illuminate\Support\Facades\Crypt::encryptString($product->id)) }}"
                                                method="post">
                                                @csrf
                                                <div class="btn-group">
                                                    <button type="submit"
                                                        class="btn {{ $product->is_active ? 'btn-success' : 'btn-danger' }}">{!! $product->is_active
    ? '<i
                                                    class="fas fa-check-square"></i> Active'
    : '<i class="fas fa-square"></i> Deactivated' !!}</button>
                                                    <button type="button"
                                                        class="btn {{ $product->is_active ? 'btn-success' : 'btn-danger' }} dropdown-toggle dropdown-toggle-split"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('edit#product', Illuminate\Support\Facades\Crypt::encryptString($product->id)) }}">Edit</a>
                                                        <button type="submit"
                                                            class="dropdown-item">{{ $product->is_active ? 'Deactivate' : 'Activate' }}</button>
                                                    </div>
                                                </div>
                                            </form>
=======
                                                href="{{ route('edit#blog', Illuminate\Support\Facades\Crypt::encryptString($blog->id)) }}">{{ $blog->title }}<br><span
                                                    class="badge badge-info">{{ $blog->title_burmese }}</span>
                                            </a></td>
                                        <td>{{ $blog->category_name }}</td>
                                        <td class="text-nowrap">
                                            <div class="btn-group">
                                                @if ($blog->status == 'published')
                                                    <button id="btn-publish" type="type" class="btn btn-success text-capitalize"><i
                                                            class="fas fa-check-square"></i> {{ $blog->status }}</button>
                                                    <button type="button"
                                                        class="btn btn-success dropdown-toggle dropdown-toggle-split"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                @elseif($blog->status == 'unpublished')
                                                    <button id="btn-publish" type="type" class="btn btn-danger text-capitalize"><i
                                                            class="fas fa-square"></i> {{ $blog->status }}</button>
                                                    <button type="button"
                                                        class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                @else
                                                    <button id="btn-publish" type="type" class="btn btn-warning text-capitalize"><i
                                                            class="fas fa-file"></i> {{ $blog->status }}</button>
                                                    <button type="button"
                                                        class="btn btn-warning dropdown-toggle dropdown-toggle-split"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                @endif

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('edit#blog', Illuminate\Support\Facades\Crypt::encryptString($blog->id)) }}">Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <form id="publish-form"
                                                        action="{{ route('unpublishing#blog', Illuminate\Support\Facades\Crypt::encryptString($blog->id)) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            class="dropdown-item">{{ $blog->status == 'published' ? 'Unpublish' : 'Publish' }}</button>
                                                    </form>
                                                    @if ($blog->status == 'published')
                                                        <form
                                                            action="{{ route('drafting#blog', Illuminate\Support\Facades\Crypt::encryptString($blog->id)) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit" class="dropdown-item">Draft</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
>>>>>>> dev
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
<<<<<<< HEAD
                                    <th>Author</th>
                                    <th></th>
=======
                                    <th>Active</th>
>>>>>>> dev
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

<<<<<<< HEAD
=======
            $("#btn-publish").click(function() {
                $("#publish-form").submit();
            });

>>>>>>> dev
            @if (Session::has('success_message'))
                $( document ).ready(function() {
                toastr.success('{!! Session::get('success_message') !!}');
                });
            @endif
        });
    </script>
@endsection
