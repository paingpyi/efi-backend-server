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
<!-- Paragraphs -->
<h4>Description</h4>
<div class="form-group">
    <label for="lr_title_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
        Title
        <span class="text-danger">*</span></label>
    <input type="text" name="lr_title_burmese"
        value="{{ old('lr_title_burmese') }}" class="form-control"
        id="lr_title_burmese">
    @error('lr_title_burmese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="lr_description_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="lr_description_burmese" class="summernote" required
        id="lr_description_burmese">{{ old('lr_description_burmese') }}</textarea>
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

                    <input type="file" name="lr_image_burmese">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>

        </div>

    </div>
</div> <!-- /. Why Work With Us Image -->
<!-- /. End of Paragraphs -->
<!-- Diagram and Table -->
<hr>
<h4>Diagram and Table</h4>
<div class="form-group">
    <label for="diagram_table_title_burmese[]"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="diagram_table_title_burmese[]" value="{{ old('diagram_table_title_burmese[0]') }}"
        class="form-control" id="diagram_table_title_burmese1">
    @error('diagram_table_title_burmese[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="diagram_table_description1"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="diagram_table_description_burmese[]" class="summernote" required
        id="diagram_table_description_burmese1">{{ old('diagram_table_description_burmese[0]') }}</textarea>
</div>
<div class="form-group">
    <label>Image <span class="text-danger">*</span></label>
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

                    <input type="file" name="diagram_table_image_burmese[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>

        </div>

    </div>
</div> <!-- /. Diagram and Table Image -->
<div class="form-group">
    <label for="diagram_table_title_burmese[]"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="diagram_table_title_burmese[]" value="{{ old('diagram_table_title_burmese[1]') }}"
        class="form-control" id="diagram_table_title_burmese2">
    @error('diagram_table_title_burmese[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="diagram_table_description2"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="diagram_table_description[]" class="summernote" required
        id="diagram_table_description2">{{ old('diagram_table_description[1]') }}</textarea>
</div>
<div class="form-group">
    <label>Image <span class="text-danger">*</span></label>
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

                    <input type="file" name="diagram_table_image_burmese[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>

        </div>

    </div>
</div> <!-- /. Diagram and Table Image -->
<!-- /. End of Diagram and Table -->
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
<!-- Additional Benifits -->
<hr>
<h4>Additional Benifits</h4>
<div class="form-group">
    <label for="additional_title_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="additional_title_burmese" value="{{ old('additional_title_burmese') }}"
        class="form-control" id="additional_title_burmese">
    @error('additional_title_burmese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<hr>
<div class="form-group">
    <label>Icon <span class="text-danger">*</span></label>
    <!-- bootstrap-imageupload. -->

    <div class="imageupload panel panel-default card card-secondary bg-secondary">

        <div class="panel-heading card-heading clearfix p-2">

            <h5 class="panel-title card-title pull-left">Select Icon file</h5>

            <div class="btn-group pull-right float-right">

                <button type="button" class="btn btn-default active">File</button>

            </div>

        </div>

        <div class="file-tab panel-body card-body text-center">

            <div class="btn-group">
                <div class="btn btn-primary btn-file">

                    <span>Browse</span>

                    <!-- The file is stored here. -->

                    <input type="file" name="additional_icon_burmese[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="additional_iconText_burmese[]" value="{{ old('additional_iconText_burmese[0]') }}"
                    class="form-control" id="additional_iconText_burmese1" placeholder="Icon Text">
                @error('additional_iconText_burmese[0]')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

    </div>
</div> <!-- /. Additional Benefit Image -->
<div class="form-group">
    <label>Icon <span class="text-danger">*</span></label>
    <!-- bootstrap-imageupload. -->

    <div class="imageupload panel panel-default card card-secondary bg-secondary">

        <div class="panel-heading card-heading clearfix p-2">

            <h5 class="panel-title card-title pull-left">Select Icon file</h5>

            <div class="btn-group pull-right float-right">

                <button type="button" class="btn btn-default active">File</button>

            </div>

        </div>

        <div class="file-tab panel-body card-body text-center">

            <div class="btn-group">
                <div class="btn btn-primary btn-file">

                    <span>Browse</span>

                    <!-- The file is stored here. -->

                    <input type="file" name="additional_icon_burmese[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="additional_iconText_burmese[]" value="{{ old('additional_iconText_burmese[1]') }}"
                    class="form-control" id="additional_iconText_burmese2" placeholder="Icon Text">
                @error('additional_iconText_burmese[1]')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

    </div>
</div> <!-- /. Additional Benefit Image -->
<div class="form-group">
    <label>Icon <span class="text-danger">*</span></label>
    <!-- bootstrap-imageupload. -->

    <div class="imageupload panel panel-default card card-secondary bg-secondary">

        <div class="panel-heading card-heading clearfix p-2">

            <h5 class="panel-title card-title pull-left">Select Icon file</h5>

            <div class="btn-group pull-right float-right">

                <button type="button" class="btn btn-default active">File</button>

            </div>

        </div>

        <div class="file-tab panel-body card-body text-center">

            <div class="btn-group">
                <div class="btn btn-primary btn-file">

                    <span>Browse</span>

                    <!-- The file is stored here. -->

                    <input type="file" name="additional_icon_burmese[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="additional_iconText_burmese[]" value="{{ old('additional_iconText_burmese[2]') }}"
                    class="form-control" id="additional_iconText_burmese3" placeholder="Icon Text">
                @error('additional_iconText_burmese[2]')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

    </div>
</div> <!-- /. Additional Benefit Image -->
<div class="form-group">
    <label>Icon <span class="text-danger">*</span></label>
    <!-- bootstrap-imageupload. -->

    <div class="imageupload panel panel-default card card-secondary bg-secondary">

        <div class="panel-heading card-heading clearfix p-2">

            <h5 class="panel-title card-title pull-left">Select Icon file</h5>

            <div class="btn-group pull-right float-right">

                <button type="button" class="btn btn-default active">File</button>

            </div>

        </div>

        <div class="file-tab panel-body card-body text-center">

            <div class="btn-group">
                <div class="btn btn-primary btn-file">

                    <span>Browse</span>

                    <!-- The file is stored here. -->

                    <input type="file" name="additional_icon_burmese[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="additional_iconText_burmese[]" value="{{ old('additional_iconText_burmese[3]') }}"
                    class="form-control" id="additional_iconText_burmese4" placeholder="Icon Text">
                @error('additional_iconText_burmese[3]')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

    </div>
</div> <!-- /. Additional Benefit Image -->
<div class="form-group">
    <label>Icon <span class="text-danger">*</span></label>
    <!-- bootstrap-imageupload. -->

    <div class="imageupload panel panel-default card card-secondary bg-secondary">

        <div class="panel-heading card-heading clearfix p-2">

            <h5 class="panel-title card-title pull-left">Select Icon file</h5>

            <div class="btn-group pull-right float-right">

                <button type="button" class="btn btn-default active">File</button>

            </div>

        </div>

        <div class="file-tab panel-body card-body text-center">

            <div class="btn-group">
                <div class="btn btn-primary btn-file">

                    <span>Browse</span>

                    <!-- The file is stored here. -->

                    <input type="file" name="additional_icon_burmese[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="additional_iconText_burmese[]" value="{{ old('additional_iconText_burmese[4]') }}"
                    class="form-control" id="additional_iconText_burmese5" placeholder="Icon Text">
                @error('additional_iconText_burmese[4]')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

    </div>
</div> <!-- /. Additional Benefit Image -->
<!-- Additional Benifits -->
<!-- Attachments -->
<hr>
<h4>Attachments</h4>
<div class="form-group">
    <label for="attachments_title_burmese1"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="attachments_title_burmese[0]" value="{{ old('attachments_title_burmese[0]') }}" class="form-control"
        id="attachments_title_burmese1">
    @error('attachments_title_burmese[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="attachments_description_burmese1"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="attachments_description_burmese[0]" class="summernote" required
        id="attachments_description_burmese1">{{ old('attachments_description_burmese[0]') }}</textarea>
</div>
<div class="form-group">
    <label>Image <span class="text-danger">*</span></label>
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

                    <input type="file" name="attachments_image_burmese[0]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="attachments_iconText_burmese[]" value="{{ old('attachments_iconText_burmese[0]') }}"
                    class="form-control" id="attachments_iconText_burmese1" placeholder="Icon Text">
                @error('attachments_iconText_burmese[0]')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

    </div>
</div> <!-- /. Attachment Image -->
<div class="form-group">
    <label for="attachments_title_burmese2"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="attachments_title_burmese[1]" value="{{ old('attachments_title_burmese[1]') }}" class="form-control"
        id="attachments_title_burmese1">
    @error('attachments_title_burmese[1]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="attachments_description_burmese2"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="attachments_description_burmese[1]" class="summernote" required
        id="attachments_description_burmese2">{{ old('attachments_description_burmese[1]') }}</textarea>
</div>
<div class="form-group">
    <label>Image <span class="text-danger">*</span></label>
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

                    <input type="file" name="attachments_image_burmese[1]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="attachments_iconText_burmese[]" value="{{ old('attachments_iconText_burmese[1]') }}"
                    class="form-control" id="attachments_iconText_burmese2" placeholder="Icon Text">
                @error('attachments_iconText_burmese[1]')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

    </div>
</div> <!-- /. Attachment Image -->
<!-- /. End of Attachments -->
