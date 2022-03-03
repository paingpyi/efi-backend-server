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
<<<<<<< HEAD
=======
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('adminlite/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
>>>>>>> dev
@endsection
{{-- /. Head Stylesheets --}}

{{-- content --}}
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <form id="inputForm"
<<<<<<< HEAD
                    action="{{ $action == 'new'? route('store#data#product'): route('update#data#product', isset($product->id) ? $product->id : null) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        @include('admin.product.menu')
=======
                    action="{{ $action == 'new' ? route('store#data#blog') : route('update#data#blog', isset($blog->id) ? $blog->id : 0) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        @include('admin.blog.menu')
>>>>>>> dev
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
                                    </div>
                                </nav>
                                <div class="tab-content pr-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active pt-3" id="nav-eng" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="form-group">
                                            <label for="title"><i class="flag-icon flag-icon-us mr-2"></i> Title <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="title"
<<<<<<< HEAD
                                                value="{{ old('title', isset($product->title) ? $product->title : null) }}"
                                                class="form-control" id="title" aria-describedby="titleHelp">
                                            <small id="titleHelp" class="form-text text-muted">Please enter product's
                                                title.</small>
=======
                                                value="{{ old('title', isset($blog->title) ? $blog->title : null) }}"
                                                class="form-control title2slug" id="title" aria-describedby="titleHelp">
                                            <small id="titleHelp" class="form-text text-muted">Please enter title.</small>
>>>>>>> dev
                                            @error('title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
<<<<<<< HEAD
                                            <label for="slogan"><i class="flag-icon flag-icon-us mr-2"></i> Slogan <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="slogan"
                                                value="{{ old('slogan', isset($product->slogan) ? $product->slogan : null) }}"
                                                class="form-control" id="slogan" aria-describedby="sloganHelp">
                                            <small id="sloganHelp" class="form-text text-muted">Please enter product's
                                                slogan.</small>
                                            @error('slogan')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description"><i class="flag-icon flag-icon-us mr-2"></i> Description
                                                <span class="text-danger">*</span></label>
                                            <textarea name="description" class="summernote" required
                                                id="description">{{ old('description', isset($product->description) ? $product->description : '') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="benefits"><i class="flag-icon flag-icon-us mr-2"></i> Benefits Block
                                                <span class="text-danger">*</span></label>
                                            <textarea name="benefits" class="summernote" required
                                                id="benefits">{{ old('benefits', isset($product->benefits_block) ? $product->benefits_block : '') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="table"><i class="flag-icon flag-icon-us mr-2"></i> Table of Content
                                                Block
                                                <span class="text-danger">*</span></label>
                                            <textarea name="table" required id="table"
                                                class="table-block">{{ old('table',isset($product->table_block)? $product->table_block: '<table><thead><tr><th>Head 1<th><th>Head 2<th><th>Head 3<th><th>Head 4<th><th>Head 5<th></tr></thead><tbody><tr><td>Cell 1<td><td>Cell 2<td><td>Cell 3<td><td>Cell 4<td><td>Cell 5<td></tr><tr><td>Cell 6<td><td>Cell 7<td><td>Cell 8<td><td>Cell 9<td><td>Cell 10<td></tr><tr><td>Cell 11<td><td>Cell 12<td><td>Cell 13<td><td>Cell 14<td><td>Cell 15<td></tr></tbody></table>') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="why"><i class="flag-icon flag-icon-us mr-2"></i> Why Work With Us
                                                Block</label>
                                            <textarea name="why" class="summernote" required
                                                id="why">{{ old('why', isset($product->why_block) ? $product->why_block : '') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="downloadable"><i class="flag-icon flag-icon-us mr-2"></i>
                                                Downloadable
                                                Block</label>
                                            <textarea name="downloadable" class="summernote" required
                                                id="downloadable">{{ old('downloadable', isset($product->downloadable_block) ? $product->downloadable_block : '') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="applythis"><i class="flag-icon flag-icon-us mr-2"></i> Apply This
                                                Block</label>
                                            <textarea name="applythis" class="summernote" required
                                                id="applythis">{{ old('applythis', isset($product->applythis_block) ? $product->applythis_block : '') }}</textarea>
=======
                                            <label for="content"><i class="flag-icon flag-icon-us mr-2"></i> Content Body
                                                <span class="text-danger">*</span></label>
                                            <textarea name="content" class="summernote" required
                                                id="content">{{ old('content', isset($blog->content) ? $blog->content : '') }}</textarea>
>>>>>>> dev
                                        </div>
                                    </div>
                                    <div class="tab-pane fade pt-3" id="nav-mm" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <label for="title_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Title
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="title_burmese"
<<<<<<< HEAD
                                                value="{{ old('title_burmese', isset($product->title_burmese) ? $product->title_burmese : null) }}"
                                                class="form-control" id="title_burmese"
                                                aria-describedby="title_burmeseHelp">
                                            <small id="title_burmeseHelp" class="form-text text-muted">Please enter
                                                product's title
=======
                                                value="{{ old('title_burmese', isset($blog->title_burmese) ? $blog->title_burmese : null) }}"
                                                class="form-control" id="title_burmese"
                                                aria-describedby="title_burmeseHelp">
                                            <small id="title_burmeseHelp" class="form-text text-muted">Please enter
                                                title
>>>>>>> dev
                                                (burmese).</small>
                                            @error('title_burmese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
<<<<<<< HEAD
                                            <label for="slogan_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Slogan
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="slogan_burmese"
                                                value="{{ old('slogan_burmese', isset($product->slogan_burmese) ? $product->slogan_burmese : null) }}"
                                                class="form-control" id="slogan_burmese"
                                                aria-describedby="slogan_burmeseHelp">
                                            <small id="slogan_burmeseHelp" class="form-text text-muted">Please enter
                                                product's
                                                slogan (Burmese).</small>
                                            @error('slogan_burmese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
                                                Description
                                                <span class="text-danger">*</span></label>
                                            <textarea name="description_burmese" class="summernote" required
                                                id="description_burmese">{{ old('description_burmese', isset($product->description_burmese) ? $product->description_burmese : '') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="benefits_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
                                                Benefits Block
                                                <span class="text-danger">*</span></label>
                                            <textarea name="benefits_burmese" class="summernote" required
                                                id="benefits_burmese">{{ old('benefits_burmese', isset($product->benefits_block_burmese) ? $product->benefits_block_burmese : '') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="table_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Table of
                                                Content
                                                Block <span class="text-danger">*</span></label>
                                            <textarea name="table_burmese" required id="table_burmese"
                                                class="table-block">{{ old('table_burmese',isset($product->table_block_burmese)? $product->table_block_burmese: '<table><thead><tr><th>Head 1<th><th>Head 2<th><th>Head 3<th><th>Head 4<th><th>Head 5<th></tr></thead><tbody><tr><td>Cell 1<td><td>Cell 2<td><td>Cell 3<td><td>Cell 4<td><td>Cell 5<td></tr><tr><td>Cell 6<td><td>Cell 7<td><td>Cell 8<td><td>Cell 9<td><td>Cell 10<td></tr><tr><td>Cell 11<td><td>Cell 12<td><td>Cell 13<td><td>Cell 14<td><td>Cell 15<td></tr></tbody></table>') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="why_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Why Work
                                                With Us
                                                Block</label>
                                            <textarea name="why_burmese" class="summernote" required
                                                id="why_burmese">{{ old('why_burmese', isset($product->why_block_burmese) ? $product->why_block_burmese : '') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="downloadable_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
                                                Downloadable Block</label>
                                            <textarea name="downloadable_burmese" class="summernote" required
                                                id="downloadable_burmese">{{ old('downloadable_burmese',isset($product->downloadable_block_burmese) ? $product->downloadable_block_burmese : '') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="applythis_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Apply
                                                This
                                                Block</label>
                                            <textarea name="applythis_burmese" class="summernote" required
                                                id="applythis_burmese">{{ old('applythis_burmese', isset($product->applythis_block_burmese) ? $product->applythis_block_burmese : '') }}</textarea>
=======
                                            <label for="content_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
                                                Content Body
                                                <span class="text-danger">*</span></label>
                                            <textarea name="content_burmese" class="summernote" required
                                                id="content_burmese">{{ old('content_burmese', isset($blog->content_burmese) ? $blog->content_burmese : '') }}</textarea>
>>>>>>> dev
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 bg-secondary p-3">
                                <div class="form-group">
<<<<<<< HEAD
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
=======
                                    <label for="slug_url">Slug URL
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="slug_url"
                                        value="{{ old('slug_url', isset($blog->url_slug) ? $blog->url_slug : null) }}"
                                        class="form-control" id="slug_url" aria-describedby="slug_urlHelp">
                                    <small id="slug_urlHelp" class="form-text text-white">Do not use the special charaters
                                        but you can you dash (-).</small>
                                    @error('slug_url')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category">Category <span class="text-danger">*</span></label>
                                    <select name="category" id="category" class="form-control select2" style="width: 100%;">
                                        <option value="">Please choose the category.</option>
                                        @foreach ($blog_category as $cat)
                                            @if ($action == 'new')
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @else
                                                <option value="{{ $cat->id }}"
                                                    {{ $blog->category_id == $cat->id ? ' selected' : '' }}>
                                                    {{ $cat->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Related Product</label>
                                    <select name="products[]" class="duallistbox" multiple="multiple"
                                        aria-describedby="modulesHelp">
                                        @foreach ($blog_products as $product)
                                            <option value="{{ $product->slug_url }}"
                                                {{ isset($blog->products)? (in_array($product->slug_url, json_decode($blog->products))? ' selected': ''): '' }}>
                                                {{ $product->title }}</option>
                                        @endforeach
                                    </select>
                                    <small id="modulesHelp" class="form-text text-muted">Please select the related
                                        products.</small>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="featured">Featured: </label>
                                    <input type="checkbox" id="featured" name="featured"
                                        {{ (old('featured', isset($blog->featured) ? $blog->featured : null) == true or $action == 'new')? 'checked': '' }}
                                        data-bootstrap-switch data-on-color="success">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control select2" style="width: 100%;">
                                        <option value="">Please choose the status.</option>
                                        <option value="published"
                                            {{ isset($blog->status) ? ($blog->status == 'published' ? ' selected' : '') : '' }}>
                                            published</option>
                                        <option value="draft"
                                            {{ isset($blog->status) ? ($blog->status == 'draft' ? ' selected' : '') : '' }}>
                                            draft</option>
                                        <option value="unpublished"
                                            {{ isset($blog->status) ? ($blog->status == 'unpublished' ? ' selected' : '') : '' }}>
                                            unpublished</option>
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Blog Image <span class="text-danger">*</span></label>
                                    @isset($blog->image)
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{ asset($blog->image) }}" alt="Blog image" class="img-thumbnail">
>>>>>>> dev
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

<<<<<<< HEAD
                                                    <input type="file" name="product">
=======
                                                    <input type="file" name="blog">
>>>>>>> dev

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

<<<<<<< HEAD
                                            <input type="hidden" name="product-image-url">
=======
                                            <input type="hidden" name="blog-image-url">
>>>>>>> dev

                                        </div>

                                    </div>
<<<<<<< HEAD
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
=======
                                </div><!-- /. Blog Image -->
>>>>>>> dev
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
<<<<<<< HEAD
=======
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('adminlite/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
>>>>>>> dev
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
<<<<<<< HEAD
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

=======
                height: 800,
                placeholder: 'Write content here...',
            });

            $('.imageupload').imageupload();

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox();

            $(".title2slug").keyup(function() {
                var Text = $(this).val();
                Text = Text.toLowerCase()
                    .replace(/[^\w ]+/g, '')
                    .replace(/ +/g, '-');
                $("#slug_url").val(Text);
            });

>>>>>>> dev
            $('#inputForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
<<<<<<< HEAD
                    slogan: {
                        required: true,
                    },
                    description: {
=======
                    content: {
>>>>>>> dev
                        required: true,
                    },
                    category: {
                        required: true,
                    },
                    title_burmese: {
                        required: true,
                    },
<<<<<<< HEAD
                    slogan_burmese: {
                        required: true,
                    },
                    description_burmese: {
                        required: true,
                    },
                    category_burmese: {
=======
                    content_burmese: {
>>>>>>> dev
                        required: true,
                    },
                    benefit: {
                        required: true,
                    },
<<<<<<< HEAD
                    product: {
                        required: true,
                    },
=======
                    @if ($action == 'new')
                        blog: {
                        required: true,
                        },
                    @endif
>>>>>>> dev
                },
                messages: {
                    title: {
                        required: "You need to fill product title.",
                    },
<<<<<<< HEAD
                    slogan: {
                        required: "You need to fill slogan.",
                    },
                    description: {
                        required: "You need to fill description.",
=======
                    content: {
                        required: "You need to fill content.",
>>>>>>> dev
                    },
                    category: {
                        required: "You need to choose the category of product.",
                    },
                    title_burmese: {
                        required: "You need to fill product title.",
                    },
<<<<<<< HEAD
                    slogan_burmese: {
                        required: "You need to fill slogan.",
                    },
                    description_burmese: {
                        required: "You need to fill description.",
                    },
                    category_burmese: {
                        required: "You need to choose the category of product.",
                    },
                    benefit: {
                        required: "You need to upload image.",
                    },
                    product: {
                        required: "You need to upload image.",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
=======
                    content_burmese: {
                        required: "You need to fill description.",
                    },
                    @if ($action == 'new')
                        blog: {
                        required: "You need to upload image.",
                        },
                    @endif
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback bg-danger p-1');
>>>>>>> dev
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
