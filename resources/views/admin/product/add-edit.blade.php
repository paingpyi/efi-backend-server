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
                                            <label for="title"><i class="flag-icon flag-icon-us mr-2"></i> Title <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="title"
                                                value="{{ old('title', isset($product->title) ? $product->title : null) }}"
                                                class="form-control" id="title" aria-describedby="titleHelp">
                                            <small id="titleHelp" class="form-text text-muted">Please enter product's
                                                title.</small>
                                            @error('title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
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
                                        </div>
                                    </div> {{-- /. End of English Inputs --}}
                                    <div class="tab-pane fade pt-3" id="nav-mm" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <label for="title_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Title
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="title_burmese"
                                                value="{{ old('title_burmese', isset($product->title_burmese) ? $product->title_burmese : null) }}"
                                                class="form-control" id="title_burmese"
                                                aria-describedby="title_burmeseHelp">
                                            <small id="title_burmeseHelp" class="form-text text-muted">Please enter
                                                product's title
                                                (burmese).</small>
                                            @error('title_burmese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
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
                                        </div>
                                    </div> {{-- /. End of Burmese Inputs --}}
                                    <div class="tab-pane fade pt-3" id="nav-zh" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <label for="title_chinese"><i class="flag-icon flag-icon-cn mr-2"></i> Title
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="title_chinese"
                                                value="{{ old('title_chinese', isset($product->title_chinese) ? $product->title_chinese : null) }}"
                                                class="form-control" id="title_chinese"
                                                aria-describedby="title_chineseHelp">
                                            <small id="title_chineseHelp" class="form-text text-muted">Please enter
                                                product's title
                                                (Chinese).</small>
                                            @error('title_chinese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="slogan_chinese"><i class="flag-icon flag-icon-cn mr-2"></i> Slogan
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="slogan_chinese"
                                                value="{{ old('slogan_chinese', isset($product->slogan_chinese) ? $product->slogan_chinese : null) }}"
                                                class="form-control" id="slogan_chinese"
                                                aria-describedby="slogan_chineseHelp">
                                            <small id="slogan_chineseHelp" class="form-text text-muted">Please enter
                                                product's
                                                slogan (Chinese).</small>
                                            @error('slogan_chinese')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description_chinese"><i class="flag-icon flag-icon-cn mr-2"></i>
                                                Description
                                                <span class="text-danger">*</span></label>
                                            <textarea name="description_chinese" class="summernote" required
                                                id="description_chinese">{{ old('description_chinese', isset($product->description_chinese) ? $product->description_chinese : '') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="benefits_chinese"><i class="flag-icon flag-icon-cn mr-2"></i>
                                                Benefits Block
                                                <span class="text-danger">*</span></label>
                                            <textarea name="benefits_chinese" class="summernote" required
                                                id="benefits_chinese">{{ old('benefits_chinese', isset($product->benefits_block_chinese) ? $product->benefits_block_chinese : '') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="table_chinese"><i class="flag-icon flag-icon-cn mr-2"></i> Table of
                                                Content
                                                Block <span class="text-danger">*</span></label>
                                            <textarea name="table_chinese" required id="table_chinese"
                                                class="table-block">{{ old('table_chinese',isset($product->table_block_chinese)? $product->table_block_chinese: '<table><thead><tr><th>Head 1<th><th>Head 2<th><th>Head 3<th><th>Head 4<th><th>Head 5<th></tr></thead><tbody><tr><td>Cell 1<td><td>Cell 2<td><td>Cell 3<td><td>Cell 4<td><td>Cell 5<td></tr><tr><td>Cell 6<td><td>Cell 7<td><td>Cell 8<td><td>Cell 9<td><td>Cell 10<td></tr><tr><td>Cell 11<td><td>Cell 12<td><td>Cell 13<td><td>Cell 14<td><td>Cell 15<td></tr></tbody></table>') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="why_chinese"><i class="flag-icon flag-icon-cn mr-2"></i> Why Work
                                                With Us
                                                Block</label>
                                            <textarea name="why_chinese" class="summernote" required
                                                id="why_chinese">{{ old('why_chinese', isset($product->why_block_chinese) ? $product->why_block_chinese : '') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="downloadable_chinese"><i class="flag-icon flag-icon-cn mr-2"></i>
                                                Downloadable Block</label>
                                            <textarea name="downloadable_chinese" class="summernote" required
                                                id="downloadable_chinese">{{ old('downloadable_chinese',isset($product->downloadable_block_chinese) ? $product->downloadable_block_chinese : '') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="applythis_chinese"><i class="flag-icon flag-icon-cn mr-2"></i> Apply
                                                This
                                                Block</label>
                                            <textarea name="applythis_chinese" class="summernote" required
                                                id="applythis_chinese">{{ old('applythis_chinese', isset($product->applythis_block_chinese) ? $product->applythis_block_chinese : '') }}</textarea>
                                        </div>
                                    </div> {{-- /. End of Chinese Inputs --}}
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
                    benefit: {
                        required: true,
                    },
                    product: {
                        required: true,
                    },
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
