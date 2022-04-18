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
<div class="form-group">
    <label for="slogan_chinese"><i class="flag-icon flag-icon-cn mr-2"></i> Slogan</label>
    <input type="text" name="slogan_chinese" value="{{ old('slogan_chinese') }}" class="form-control" id="slogan_chinese">
</div>
<!-- Paragraphs -->
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
    <label for="lr_description_chinese"><i class="flag-icon flag-icon-cn mr-2"></i>
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

                    <input type="file" name="lr_image_chinese">

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
    <label for="diagram_table_title_chinese[]"><i class="flag-icon flag-icon-cn mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="diagram_table_title_chinese[]" value="{{ old('diagram_table_title_chinese[0]') }}"
        class="form-control" id="diagram_table_title_chinese1">
    @error('diagram_table_title_chinese[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="diagram_table_description1"><i class="flag-icon flag-icon-cn mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="diagram_table_description_chinese[]" class="summernote" required
        id="diagram_table_description_chinese1">{{ old('diagram_table_description_chinese[0]') }}</textarea>
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

                    <input type="file" name="diagram_table_image_chinese[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>

        </div>

    </div>
</div> <!-- /. Diagram and Table Image -->
<div class="form-group">
    <label for="diagram_table_title_chinese[]"><i class="flag-icon flag-icon-cn mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="diagram_table_title_chinese[]" value="{{ old('diagram_table_title_chinese[1]') }}"
        class="form-control" id="diagram_table_title_chinese2">
    @error('diagram_table_title_chinese[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="diagram_table_description2"><i class="flag-icon flag-icon-cn mr-2"></i>
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

                    <input type="file" name="diagram_table_image_chinese[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>

        </div>

    </div>
</div> <!-- /. Diagram and Table Image -->
<!-- /. End of Diagram and Table -->
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
<!-- Additional Benifits -->
<h4>Additional Benifits</h4>
<div class="form-group">
    <label for="additional_title_chinese"><i class="flag-icon flag-icon-cn mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="additional_title_chinese" value="{{ old('additional_title_chinese') }}"
        class="form-control" id="additional_title_chinese">
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

                    <input type="file" name="additional_icon_chinese[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="additional_iconText_chinese[]" value="{{ old('additional_iconText_chinese[0]') }}"
                    class="form-control" id="additional_iconText_chinese1" placeholder="Icon Text">
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

                    <input type="file" name="additional_icon_chinese[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="additional_iconText_chinese[]" value="{{ old('additional_iconText_chinese[1]') }}"
                    class="form-control" id="additional_iconText2" placeholder="Icon Text">
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

                    <input type="file" name="additional_icon_chinese[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="additional_iconText_chinese[]" value="{{ old('additional_iconText_chinese[2]') }}"
                    class="form-control" id="additional_iconText3" placeholder="Icon Text">
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

                    <input type="file" name="additional_icon_chinese[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="additional_iconText_chinese[]" value="{{ old('additional_iconText[3]') }}"
                    class="form-control" id="additional_iconText_chinese4" placeholder="Icon Text">
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

                    <input type="file" name="additional_icon[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="additional_iconText[]" value="{{ old('additional_iconText[4]') }}"
                    class="form-control" id="additional_iconText5" placeholder="Icon Text">
            </div>
        </div>

    </div>
</div> <!-- /. Additional Benefit Image -->
<!-- Additional Benifits -->
<!-- Attachments -->
<hr>
<h4>Attachments</h4>
<div class="form-group">
    <label for="attachments_title_chinese1"><i class="flag-icon flag-icon-zh mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="attachments_title_chinese[0]" value="{{ old('attachments_title_chinese[0]') }}" class="form-control"
        id="attachments_title_chinese1">
    @error('attachments_title_chinese[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="attachments_description_chinese1"><i class="flag-icon flag-icon-zh mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="attachments_description_chinese[0]" class="summernote" required
        id="attachments_description_chinese1">{{ old('attachments_description_chinese[0]') }}</textarea>
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

                    <input type="file" name="attachments_image_chinese[0]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="attachments_iconText_chinese[]" value="{{ old('attachments_iconText_chinese[0]') }}"
                    class="form-control" id="attachments_iconText_chinese1" placeholder="Icon Text">
                @error('attachments_iconText_chinese[0]')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

    </div>
</div> <!-- /. Attachment Image -->
<div class="form-group">
    <label for="attachments_title_chinese2"><i class="flag-icon flag-icon-zh mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="attachments_title_chinese[1]" value="{{ old('attachments_title_chinese[1]') }}" class="form-control"
        id="attachments_title_chinese1">
    @error('attachments_title_chinese[1]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="attachments_description_chinese2"><i class="flag-icon flag-icon-zh mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="attachments_description_chinese[1]" class="summernote" required
        id="attachments_description_chinese2">{{ old('attachments_description_chinese[1]') }}</textarea>
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

                    <input type="file" name="attachments_image_chinese[1]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="attachments_iconText_chinese[]" value="{{ old('attachments_iconText_chinese[1]') }}"
                    class="form-control" id="attachments_iconText_chinese2" placeholder="Icon Text">
                @error('attachments_iconText_chinese[1]')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

    </div>
</div> <!-- /. Attachment Image -->
<!-- /. End of Attachments -->
<!-- FAQ -->
<hr>
<h4>Frequently Asked Questions</h4>
<div class="form-group">
    <label for="faq_title_chinese"><i class="flag-icon flag-icon-cn mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_title_chinese" value="{{ old('faq_title_chinese') }}" class="form-control" id="faq_title_chinese">
    @error('faq_title_chinese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_title_1_chinese"><i class="flag-icon flag-icon-cn mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_title_1_chinese" value="{{ old('faq_title_1_chinese') }}" class="form-control"
        id="faq_title_1_chinese">
    @error('faq_title_1_chinese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_detail_1_chinese"><i class="flag-icon flag-icon-cn mr-2"></i>
        Detail
        <span class="text-danger">*</span></label>
    <textarea name="faq_detail_1_chinese" class="summernote" required
        id="faq_detail_1_chinese">{{ old('faq_detail_1_chinese') }}</textarea>
</div>
<div class="form-group">
    <label for="faq_title_2_chinese"><i class="flag-icon flag-icon-cn mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_title_2_chinese" value="{{ old('faq_title_2_chinese') }}" class="form-control"
        id="faq_title_2_chinese">
    @error('faq_title_2_chinese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_detail_2_chinese"><i class="flag-icon flag-icon-cn mr-2"></i>
        Detail
        <span class="text-danger">*</span></label>
    <textarea name="faq_detail_2_chinese" class="summernote" required
        id="faq_detail_2_chinese">{{ old('faq_detail_2_chinese') }}</textarea>
</div>
<div class="form-group">
    <label for="faq_title_3_chinese"><i class="flag-icon flag-icon-cn mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_title_3_chinese" value="{{ old('faq_title_3_chinese') }}" class="form-control"
        id="faq_title_3_chinese">
    @error('faq_title_3_chinese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_detail_3_chinese"><i class="flag-icon flag-icon-cn mr-2"></i>
        Detail
        <span class="text-danger">*</span></label>
    <textarea name="faq_detail_3_chinese" class="summernote" required
        id="faq_detail_3_chinese">{{ old('faq_detail_3_chinese') }}</textarea>
</div>
<div class="form-group">
    <label for="faq_title_4_chinese"><i class="flag-icon flag-icon-cn mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_title_4_chinese" value="{{ old('faq_title_4_chinese') }}" class="form-control"
        id="faq_title_4_chinese">
    @error('faq_title_4_chinese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_detail_4_chinese"><i class="flag-icon flag-icon-cn mr-2"></i>
        Detail
        <span class="text-danger">*</span></label>
    <textarea name="faq_detail_4_chinese" class="summernote" required
        id="faq_detail_4_chinese">{{ old('faq_detail_4_chinese') }}</textarea>
</div>
<!-- /. End of FAQ -->
