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
@endsection
{{-- /. Head Stylesheets --}}

{{-- content --}}
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <form id="inputForm"
                    action="{{ $action == 'new'? route('store#data#product'): route('update#data#product', isset($product->id) ? $product->id : null) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        @include('admin.product.menu')
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
                                            <label for="title"><i class="flag-icon flag-icon-us mr-2"></i> Title
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="title" value="{{ old('title') }}"
                                                class="form-control" id="title" aria-describedby="titleHelp">
                                            <small id="titleHelp" class="form-text text-muted">Please enter
                                                title.</small>
                                            @error('title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Apply Insurance Block -->
                                        <h4>Apply Insurance Block</h4>
                                        <div class="form-group">
                                            <label for="apply_insurance_title"><i class="flag-icon flag-icon-us mr-2"></i>
                                                Title
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="apply_insurance_title"
                                                value="{{ old('apply_insurance_title') }}" class="form-control"
                                                id="apply_insurance_title">
                                            @error('apply_insurance_title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="apply_insurance_description"><i
                                                    class="flag-icon flag-icon-us mr-2"></i>
                                                Description
                                                <span class="text-danger">*</span></label>
                                            <textarea name="apply_insurance_description" class="summernote" required
                                                id="apply_insurance_description">{{ old('apply_insurance_description') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="apply_insurance_buttonText"><i
                                                    class="flag-icon flag-icon-us mr-2"></i> Button Text
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="apply_insurance_buttonText"
                                                value="{{ old('apply_insurance_buttonText') }}" class="form-control"
                                                id="apply_insurance_buttonText">
                                            @error('apply_insurance_buttonText')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- /. End of Apply Insurance Block -->
                                        <!-- Why Work With Us Block -->
                                        <h4>Why work with us</h4>
                                        <div class="form-group">
                                            <label for="why_work_title"><i class="flag-icon flag-icon-us mr-2"></i> Title
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="why_work_title" value="{{ old('why_work_title') }}"
                                                class="form-control" id="why_work_title">
                                            @error('why_work_title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="why_work_description"><i class="flag-icon flag-icon-us mr-2"></i>
                                                Description
                                                <span class="text-danger">*</span></label>
                                            <textarea name="why_work_description" class="summernote" required
                                                id="why_work_description">{{ old('why_work_description') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Image <span class="text-danger">*</span></label>
                                            @isset($product->product_photo)
                                                <div class="card">
                                                    <div class="card-body">
                                                        <img src="{{ asset($product->product_photo) }}"
                                                            alt="Why Work With US Image" class="img-thumbnail">
                                                    </div>
                                                </div>
                                            @endisset
                                            <!-- bootstrap-imageupload. -->

                                            <div class="imageupload panel panel-default card card-secondary bg-secondary">

                                                <div class="panel-heading card-heading clearfix p-2">

                                                    <h5 class="panel-title card-title pull-left">Select Image file</h5>

                                                    <div class="btn-group pull-right float-right">

                                                        <button type="button" class="btn btn-default active">File</button>

                                                    </div>

                                                </div>

                                                <div class="file-tab panel-body card-body text-center">

                                                    <div class="btn-group">
                                                        <div class="btn btn-primary btn-file">

                                                            <span>Browse</span>

                                                            <!-- The file is stored here. -->

                                                            <input type="file" name="why_work_image">

                                                        </div>

                                                        <button type="button" class="btn btn-danger">Remove</button>
                                                    </div>

                                                </div>

                                            </div>
                                        </div> <!-- /. Why Work With Us Image -->
                                        <!-- /. End of Why Work With Us Block -->
                                        <!-- Paragraphs -->
                                        <div id="lr">
                                            <h4>Description <button type="button" class="btn btn-primary float-right"
                                                    id="btn_para"><i class="fas fa-plus"></i> Add Paragraph</button></h4>
                                            <div class="form-group">
                                                <label for="lr_title[0]"><i class="flag-icon flag-icon-us mr-2"></i> Title
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" name="lr_title[0]" value="{{ old('lr_title[0]') }}"
                                                    class="form-control" id="lr_title[0]">
                                                @error('lr_title[0]')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="lr_description[0]"><i class="flag-icon flag-icon-us mr-2"></i>
                                                    Description
                                                    <span class="text-danger">*</span></label>
                                                <textarea name="lr_description[0]" class="summernote" required
                                                    id="lr_description[0]">{{ old('lr_description[0]') }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Image <span class="text-danger">*</span></label>
                                                @isset($product->product_photo)
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img src="{{ asset($product->product_photo) }}"
                                                                alt="Why Work With US Image" class="img-thumbnail">
                                                        </div>
                                                    </div>
                                                @endisset
                                                <!-- bootstrap-imageupload. -->

                                                <div
                                                    class="imageupload panel panel-default card card-secondary bg-secondary">

                                                    <div class="panel-heading card-heading clearfix p-2">

                                                        <h5 class="panel-title card-title pull-left">Select Image file</h5>

                                                        <div class="btn-group pull-right float-right">

                                                            <button type="button"
                                                                class="btn btn-default active">File</button>

                                                        </div>

                                                    </div>

                                                    <div class="file-tab panel-body card-body text-center">

                                                        <div class="btn-group">
                                                            <div class="btn btn-primary btn-file">

                                                                <span>Browse</span>

                                                                <!-- The file is stored here. -->

                                                                <input type="file" name="lr_image[0]">

                                                            </div>

                                                            <button type="button" class="btn btn-danger">Remove</button>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div> <!-- /. Why Work With Us Image -->
                                        </div>
                                        <!-- /. End of Paragraphs -->
                                    </div>
                                    <div class="tab-pane fade pt-3" id="nav-mm" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <label for="title_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Title
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="title_burmese" value="{{ old('title_burmese') }}"
                                                class="form-control" id="title_burmese"
                                                aria-describedby="title_burmeseHelp">
                                            <small id="title_burmeseHelp" class="form-text text-muted">Please enter
                                                title
                                                (Burmese).</small>
                                            @error('title_burmese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Apply Insurance Block -->
                                        <h4>Apply Insurance Block</h4>
                                        <div class="form-group">
                                            <label for="apply_insurance_title_burmese"><i
                                                    class="flag-icon flag-icon-mm mr-2"></i> Title
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="apply_insurance_title_burmese"
                                                value="{{ old('apply_insurance_title_burmese') }}" class="form-control"
                                                id="apply_insurance_title_burmese">
                                            @error('apply_insurance_title_burmese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="apply_insurance_description_burmese"><i
                                                    class="flag-icon flag-icon-mm mr-2"></i>
                                                Description
                                                <span class="text-danger">*</span></label>
                                            <textarea name="apply_insurance_description_burmese" class="summernote" required
                                                id="apply_insurance_description_burmese">{{ old('apply_insurance_description_burmese') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="apply_insurance_buttonText_burmese"><i
                                                    class="flag-icon flag-icon-mm mr-2"></i> Button Text
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="apply_insurance_buttonText_burmese"
                                                value="{{ old('apply_insurance_buttonText_burmese') }}"
                                                class="form-control" id="apply_insurance_buttonText_burmese">
                                            @error('apply_insurance_buttonText_burmese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- /. End of Apply Insurance Block -->
                                        <!-- Why Work With Us Block -->
                                        <h4>Why work with us</h4>
                                        <div class="form-group">
                                            <label for="why_work_title_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
                                                Title
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="why_work_title_burmese"
                                                value="{{ old('why_work_title_burmese') }}" class="form-control"
                                                id="why_work_title_burmese">
                                            @error('why_work_title_burmese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="why_work_description_burmese"><i
                                                    class="flag-icon flag-icon-mm mr-2"></i>
                                                Description
                                                <span class="text-danger">*</span></label>
                                            <textarea name="why_work_description_burmese" class="summernote" required
                                                id="why_work_description_burmese">{{ old('why_work_description_burmese') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Image <span class="text-danger">*</span></label>
                                            @isset($product->product_photo)
                                                <div class="card">
                                                    <div class="card-body">
                                                        <img src="{{ asset($product->product_photo) }}"
                                                            alt="Why Work With US Image" class="img-thumbnail">
                                                    </div>
                                                </div>
                                            @endisset
                                            <!-- bootstrap-imageupload. -->

                                            <div class="imageupload panel panel-default card card-secondary bg-secondary">

                                                <div class="panel-heading card-heading clearfix p-2">

                                                    <h5 class="panel-title card-title pull-left">Select Image file</h5>

                                                    <div class="btn-group pull-right float-right">

                                                        <button type="button" class="btn btn-default active">File</button>

                                                    </div>

                                                </div>

                                                <div class="file-tab panel-body card-body text-center">

                                                    <div class="btn-group">
                                                        <div class="btn btn-primary btn-file">

                                                            <span>Browse</span>

                                                            <!-- The file is stored here. -->

                                                            <input type="file" name="why_work_image_burmese">

                                                        </div>

                                                        <button type="button" class="btn btn-danger">Remove</button>
                                                    </div>

                                                </div>

                                            </div>
                                        </div> <!-- /. Why Work With Us Image -->
                                        <!-- /. End of Why Work With Us Block -->
                                        <!-- Paragraphs -->
                                        <div id="lr-my">
                                            <h4>Description</h4>
                                            <div class="form-group">
                                                <label for="lr_title_burmese[0]"><i class="flag-icon flag-icon-mm mr-2"></i>
                                                    Title
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" name="lr_title_burmese[0]"
                                                    value="{{ old('lr_title_burmese[0]') }}" class="form-control"
                                                    id="lr_title_burmese[0]">
                                                @error('lr_title_burmese[0]')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="lr_description_burmese[0]"><i
                                                        class="flag-icon flag-icon-mm mr-2"></i>
                                                    Description
                                                    <span class="text-danger">*</span></label>
                                                <textarea name="lr_description_burmese[0]" class="summernote" required
                                                    id="lr_description_burmese[0]">{{ old('lr_description_burmese[0]') }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Image <span class="text-danger">*</span></label>
                                                @isset($product->product_photo)
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img src="{{ asset($product->product_photo) }}"
                                                                alt="Why Work With US Image" class="img-thumbnail">
                                                        </div>
                                                    </div>
                                                @endisset
                                                <!-- bootstrap-imageupload. -->

                                                <div
                                                    class="imageupload panel panel-default card card-secondary bg-secondary">

                                                    <div class="panel-heading card-heading clearfix p-2">

                                                        <h5 class="panel-title card-title pull-left">Select Image file</h5>

                                                        <div class="btn-group pull-right float-right">

                                                            <button type="button"
                                                                class="btn btn-default active">File</button>

                                                        </div>

                                                    </div>

                                                    <div class="file-tab panel-body card-body text-center">

                                                        <div class="btn-group">
                                                            <div class="btn btn-primary btn-file">

                                                                <span>Browse</span>

                                                                <!-- The file is stored here. -->

                                                                <input type="file" name="lr_image_burmese[0]">

                                                            </div>

                                                            <button type="button" class="btn btn-danger">Remove</button>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div> <!-- /. Why Work With Us Image -->
                                        </div>
                                        <!-- /. End of Paragraphs -->
                                    </div>
                                    <div class="tab-pane fade pt-3" id="nav-zh" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <label for="title_chinese"><i class="flag-icon flag-icon-cn mr-2"></i> Title
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="title_chinese" value="{{ old('title_chinese') }}"
                                                class="form-control" id="title_chinese"
                                                aria-describedby="title_chineseHelp">
                                            <small id="title_chineseHelp" class="form-text text-muted">Please enter
                                                title
                                                (Chinese).</small>
                                            @error('title_chinese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Apply Innsurance Block -->
                                        <h4>Apply Insurance Block</h4>
                                        <div class="form-group">
                                            <label for="apply_insurance_title_chinese"><i
                                                    class="flag-icon flag-icon-cn mr-2"></i> Title
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="apply_insurance_title_chinese"
                                                value="{{ old('apply_insurance_title_chinese') }}"
                                                class="form-control" id="apply_insurance_title_chinese">
                                            @error('apply_insurance_title_chinese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="apply_insurance_description_chinese"><i
                                                    class="flag-icon flag-icon-cn mr-2"></i>
                                                Description
                                                <span class="text-danger">*</span></label>
                                            <textarea name="apply_insurance_description_chinese" class="summernote" required
                                                id="apply_insurance_description_chinese">{{ old('apply_insurance_description_chinese') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="apply_insurance_buttonText_chinese"><i
                                                    class="flag-icon flag-icon-cn mr-2"></i> Button Text
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="apply_insurance_buttonText_chinese"
                                                value="{{ old('apply_insurance_buttonText_chinese') }}"
                                                class="form-control" id="apply_insurance_buttonText_chinese">
                                            @error('apply_insurance_buttonText_chinese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- /. End of Apply Insurance Block -->
                                        <!-- Why Work With Us Block -->
                                        <h4>Why work with us</h4>
                                        <div class="form-group">
                                            <label for="why_work_title_chinese"><i class="flag-icon flag-icon-cn mr-2"></i>
                                                Title
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="why_work_title_chinese"
                                                value="{{ old('why_work_title_chinese') }}" class="form-control"
                                                id="why_work_title_chinese">
                                            @error('why_work_title_chinese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="why_work_description_chinese"><i
                                                    class="flag-icon flag-icon-cn mr-2"></i>
                                                Description
                                                <span class="text-danger">*</span></label>
                                            <textarea name="why_work_description_chinese" class="summernote" required
                                                id="why_work_description_chinese">{{ old('why_work_description_chinese') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Image <span class="text-danger">*</span></label>
                                            @isset($product->product_photo)
                                                <div class="card">
                                                    <div class="card-body">
                                                        <img src="{{ asset($product->product_photo) }}"
                                                            alt="Why Work With US Image" class="img-thumbnail">
                                                    </div>
                                                </div>
                                            @endisset
                                            <!-- bootstrap-imageupload. -->

                                            <div class="imageupload panel panel-default card card-secondary bg-secondary">

                                                <div class="panel-heading card-heading clearfix p-2">

                                                    <h5 class="panel-title card-title pull-left">Select Image file</h5>

                                                    <div class="btn-group pull-right float-right">

                                                        <button type="button" class="btn btn-default active">File</button>

                                                    </div>

                                                </div>

                                                <div class="file-tab panel-body card-body text-center">

                                                    <div class="btn-group">
                                                        <div class="btn btn-primary btn-file">

                                                            <span>Browse</span>

                                                            <!-- The file is stored here. -->

                                                            <input type="file" name="why_work_image_chinese">

                                                        </div>

                                                        <button type="button" class="btn btn-danger">Remove</button>
                                                    </div>

                                                </div>

                                            </div>
                                        </div> <!-- /. Why Work With Us Image -->
                                        <!-- /. End of Why Work With Us Block -->
                                        <!-- Paragraphs -->
                                        <div id="lr-zh">
                                            <h4>Description</h4>
                                            <div class="form-group">
                                                <label for="lr_title_chinese"><i class="flag-icon flag-icon-cn mr-2"></i>
                                                    Title
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" name="lr_title_chinese"
                                                    value="{{ old('lr_title_chinese') }}" class="form-control"
                                                    id="lr_title_chinese">
                                                @error('lr_title_chinese')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="lr_description_chinese"><i
                                                        class="flag-icon flag-icon-cn mr-2"></i>
                                                    Description
                                                    <span class="text-danger">*</span></label>
                                                <textarea name="lr_description_chinese" class="summernote" required
                                                    id="lr_description_chinese">{{ old('lr_description_chinese') }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Image <span class="text-danger">*</span></label>
                                                @isset($product->product_photo)
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img src="{{ asset($product->product_photo) }}"
                                                                alt="Why Work With US Image" class="img-thumbnail">
                                                        </div>
                                                    </div>
                                                @endisset
                                                <!-- bootstrap-imageupload. -->

                                                <div
                                                    class="imageupload panel panel-default card card-secondary bg-secondary">

                                                    <div class="panel-heading card-heading clearfix p-2">

                                                        <h5 class="panel-title card-title pull-left">Select Image file</h5>

                                                        <div class="btn-group pull-right float-right">

                                                            <button type="button"
                                                                class="btn btn-default active">File</button>

                                                        </div>

                                                    </div>

                                                    <div class="file-tab panel-body card-body text-center">

                                                        <div class="btn-group">
                                                            <div class="btn btn-primary btn-file">

                                                                <span>Browse</span>

                                                                <!-- The file is stored here. -->

                                                                <input type="file" name="lr_image_chinese">

                                                            </div>

                                                            <button type="button" class="btn btn-danger">Remove</button>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div> <!-- /. Why Work With Us Image -->
                                        </div>
                                        <!-- /. End of Paragraphs -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 bg-secondary p-3">
                                <div class="form-group">
                                    <label>Benefit Image <span class="text-danger">*</span></label>
                                    @isset($product->benefits_image)
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{ asset($product->benefits_image) }}" alt="Benefit image"
                                                    class="img-thumbnail">
                                            </div>
                                        </div>
                                    @endisset
                                    <!-- bootstrap-imageupload. -->

                                    <div class="imageupload panel panel-default card card-secondary bg-secondary">

                                        <div class="panel-heading card-heading clearfix p-2">

                                            <h5 class="panel-title card-title pull-left">Select Image file</h5>

                                            <div class="btn-group pull-right float-right">

                                                <button type="button" class="btn btn-default active">File</button>

                                                <button type="button" class="btn btn-default">URL</button>

                                            </div>

                                        </div>

                                        <div class="file-tab panel-body card-body text-center">

                                            <div class="btn-group">
                                                <div class="btn btn-primary btn-file">

                                                    <span>Browse</span>

                                                    <!-- The file is stored here. -->

                                                    <input type="file" name="benefit">

                                                </div>

                                                <button type="button" class="btn btn-danger">Remove</button>
                                            </div>

                                        </div>

                                        <div class="url-tab panel-body card-body">

                                            <div class="input-group">

                                                <input type="text" class="form-control hasclear" placeholder="Image URL">

                                                <div class="input-group-btn input-group-append">

                                                    <button type="button" class="btn btn-default">Submit</button>

                                                </div>

                                            </div>

                                            <button type="button" class="btn btn-danger">Remove</button>

                                            <!-- The URL is stored here. -->

                                            <input type="hidden" name="benefit-image-url">

                                        </div>

                                    </div>
                                </div><!-- /. Benefit Image -->
                                <hr>
                                <div class="form-group">
                                    <label>Product Image <span class="text-danger">*</span></label>
                                    @isset($product->product_photo)
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{ asset($product->product_photo) }}" alt="Product image"
                                                    class="img-thumbnail">
                                            </div>
                                        </div>
                                    @endisset
                                    <!-- bootstrap-imageupload. -->

                                    <div class="imageupload panel panel-default card card-secondary bg-secondary">

                                        <div class="panel-heading card-heading clearfix p-2">

                                            <h5 class="panel-title card-title pull-left">Select Image file</h5>

                                            <div class="btn-group pull-right float-right">

                                                <button type="button" class="btn btn-default active">File</button>

                                                <button type="button" class="btn btn-default">URL</button>

                                            </div>

                                        </div>

                                        <div class="file-tab panel-body card-body text-center">

                                            <div class="btn-group">
                                                <div class="btn btn-primary btn-file">

                                                    <span>Browse</span>

                                                    <!-- The file is stored here. -->

                                                    <input type="file" name="product">

                                                </div>

                                                <button type="button" class="btn btn-danger">Remove</button>
                                            </div>

                                        </div>

                                        <div class="url-tab panel-body card-body">

                                            <div class="input-group">

                                                <input type="text" class="form-control hasclear" placeholder="Image URL">

                                                <div class="input-group-btn input-group-append">

                                                    <button type="button" class="btn btn-default">Submit</button>

                                                </div>

                                            </div>

                                            <button type="button" class="btn btn-danger">Remove</button>

                                            <!-- The URL is stored here. -->

                                            <input type="hidden" name="product-image-url">

                                        </div>

                                    </div>
                                </div> <!-- /. Product Image -->
                                <hr>
                                <div class="form-group">
                                    <label for="category">Category <span class="text-danger">*</span></label>
                                    <select name="category" id="category" class="form-control select2"
                                        style="width: 100%;">
                                        <option value="">Please choose the product's category.</option>
                                        @foreach ($product_category as $cat)
                                            @if ($action == 'new')
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @else
                                                <option value="{{ $cat->id }}"
                                                    {{ $product->category_id == $cat->id ? ' selected' : '' }}>
                                                    {{ $cat->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="is_active">Active: </label>
                                    <input type="checkbox" id="is_active" name="is_active"
                                        {{ (old('is_active', isset($product->is_active) ? $product->is_active : null) == true or $action == 'new')? 'checked': '' }}
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
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlite/dist/js/demo.js') }}"></script>
    <!-- Dynamic Form -->
    <script id="document-template" type="text/x-handlebars-template">
        <!-- Paragraphs -->
            <hr>
            <div class="form-group">
                <label for="lr_title[0]"><i class="flag-icon flag-icon-us mr-2"></i> Title
                    <span class="text-danger">*</span></label>
                <input type="text" name="lr_title[0]" value=""
                    class="form-control" id="lr_title[0]">
            </div>
            <div class="form-group">
                <label for="lr_description[0]"><i class="flag-icon flag-icon-us mr-2"></i>
                    Description
                    <span class="text-danger">*</span></label>
                <textarea name="lr_description[0]" class="summernote" required
                    id="lr_description[0]"></textarea>
            </div>
            <div class="form-group">
                <label>Image <span class="text-danger">*</span></label>
                <!-- bootstrap-imageupload. -->

                <div
                    class="imageupload panel panel-default card card-secondary bg-secondary">

                    <div class="panel-heading card-heading clearfix p-2">

                        <h5 class="panel-title card-title pull-left">Select Image file</h5>

                        <div class="btn-group pull-right float-right">

                            <button type="button"
                                class="btn btn-default active">File</button>

                        </div>

                    </div>

                    <div class="file-tab panel-body card-body text-center">

                        <div class="btn-group">
                            <div class="btn btn-primary btn-file">

                                <span>Browse</span>

                                <!-- The file is stored here. -->

                                <input type="file" name="lr_image[0]">

                            </div>

                            <button type="button" class="btn btn-danger">Remove</button>
                        </div>

                    </div>

                </div>
            </div> <!-- /. Why Work With Us Image -->
        <!-- /. End of Paragraphs -->
    </script>
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
                height: 350,
                placeholder: 'Write content here...',
            });

            $('.table-block').summernote({
                height: 150,
                placeholder: 'Write table here...',
                toolbar: [
                    ['undo', ['undo']],
                    ['redo', ['redo']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen']],
                ],
            });

            $('.imageupload').imageupload();

            $.validator.addMethod("titleRegex", function(value, element) {
                return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
            }, "Title must contain only letters, numbers, or dashes.");

            $('#inputForm').validate({
                rules: {
                    title: {
                        required: true,
                        titleRegex: true,
                    },
                    slogan: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    category: {
                        required: true,
                    },
                    title_burmese: {
                        required: true,
                    },
                    slogan_burmese: {
                        required: true,
                    },
                    description_burmese: {
                        required: true,
                    },
                    category_burmese: {
                        required: true,
                    },
                    @if ($action == 'new')
                        benefit: {
                        required: true,
                        },
                        product: {
                        required: true,
                        },
                    @endif
                },
                messages: {
                    title: {
                        required: "You need to fill product title.",
                        titleRegex: "Title must contain only letters, numbers, or dashes.",
                    },
                    slogan: {
                        required: "You need to fill slogan.",
                    },
                    description: {
                        required: "You need to fill description.",
                    },
                    category: {
                        required: "You need to choose the category of product.",
                    },
                    title_burmese: {
                        required: "You need to fill product title.",
                    },
                    slogan_burmese: {
                        required: "You need to fill slogan.",
                    },
                    description_burmese: {
                        required: "You need to fill description.",
                    },
                    category_burmese: {
                        required: "You need to choose the category of product.",
                    },
                    @if ($action == 'new')
                        benefit: {
                        required: "You need to upload image.",
                        },
                        product: {
                        required: "You need to upload image.",
                        },
                    @endif
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

            /*
             * Dynamic Form
             */
            var i = 0;
            $("#btn_para").click(function() {
                ++i;
                $("#lr").append(
                    $("#document-template").html()
                );
            });
            $(document).on('click', '.remove-input-field', function() {
                $(this).parents('tr').remove();
            });
            //End of Dynamic Form
        });
    </script>
@endsection
{{-- /. page plugin --}}
