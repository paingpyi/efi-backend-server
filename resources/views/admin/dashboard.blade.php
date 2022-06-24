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
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/summernote/summernote-bs4.min.css') }}">
@endsection
{{-- /. Head Stylesheets --}}


{{-- Main Content --}}
@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $product_count }}</h3>

                    <p>Products</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box nav-icon"></i>
                </div>
                <a href="{{ route('product#list') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $jobs_count }} <sup style="font-size: 20px">has been opened</sup></h3>

                    <p>Careers</p>
                </div>
                <div class="icon">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                </div>
                <a href="{{ route('job#list') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $blog_count }}</h3>

                    <p>Blogs</p>
                </div>
                <div class="icon">
                    <i class="fas fa-blog" aria-hidden="true"></i>
                </div>
                <a href="{{ route('blog#list') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $user_count }}</h3>

                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users" aria-hidden="true"></i>
                </div>
                <a href="{{ route('user#list') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
            <!-- Calendar -->
            <div class="card bg-gradient-primary">
                <div class="card-header border-0">

                    <h3 class="card-title">
                        <i class="far fa-calendar-alt"></i>
                        Calendar
                    </h3>
                    <!-- tools card -->
                    <div class="card-tools">
                        <!-- button -->
                        <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-primary btn-sm" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body pt-0">
                    <!--The calendar -->
                    <div id="calendar" style="width: 100%"></div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
            <!-- Clock -->
            <div class="card bg-gradient-dark text-white">
                <div class="card-header border-0">
                    <h3 class="card-title"><i class="fa fa-clock"></i> Clock</h3>
                    <!-- tools card -->
                    <div class="card-tools">
                        <!-- button -->
                        <button type="button" class="btn btn-secondary btn-sm" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-center mt-2 h2">
                        <a><span class="hours border border-secondary rounded p-3"></span></a> :
                        <a><span class="min border border-secondary rounded p-3"></span></a> :
                        <a><span class="sec border border-secondary rounded p-3"></span></a>
                    </div>
                </div>
            </div>
            <!-- /.card -->
            <div class="card bg-gradient-success">
                <div class="card-header border-0">
                    <h3 class="card-title"><i class="fa fa-question-circle"></i> Troubleshoot</h3>
                    <!-- tools card -->
                    <div class="card-tools">
                        <!-- button -->
                        <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-8">
                                <select name="page" id="page" class="form-control select2">
                                    <option value="">Please Select the page</option>
                                    <option value="home">Home page</option>
                                    <option value="product">Product page</option>
                                    <option value="blog">Blog page</option>
                                    <option value="career">Career page</option>
                                </select>
                            </div>
                            <div class="col-4"><button class="btn btn-success border" type="submit">Refresh</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
@endsection
{{-- /. End of Main Content --}}

@section('footerScripts')
    <!-- ChartJS -->
    <script src="{{ asset('adminlite/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('adminlite/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('adminlite/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('adminlite/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('adminlite/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('adminlite/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlite/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminlite/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('adminlite/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlite/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('adminlite/dist/js/pages/dashboard.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $('.select2').select2({
                theme: 'bootstrap4'
            });

            @isset($success_message)
                $(document).ready(function() {
                    toastr.success('{!! $success_message !!}');
                });
            @endisset
        });
    </script>
    <script>
        $(document).ready(function() {
            setInterval(function() {
                var hours = new Date().getHours();
                $(".hours").html((hours < 10 ? "0" : "") + hours);
            }, 1000);
            setInterval(function() {
                var minutes = new Date().getMinutes();
                $(".min").html((minutes < 10 ? "0" : "") + minutes);
            }, 1000);
            setInterval(function() {
                var seconds = new Date().getSeconds();
                $(".sec").html((seconds < 10 ? "0" : "") + seconds);
            }, 1000);
        });
    </script>
@endsection
