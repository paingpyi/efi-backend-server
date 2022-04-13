<div class="form-group">
    <label for="title"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title"
        aria-describedby="titleHelp">
    <small id="titleHelp" class="form-text text-muted">Please enter
        title.</small>
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<!-- Paragraphs -->
<hr>
<h4>Description</h4>
<div class="form-group">
    <label for="lr_title"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="lr_title" value="{{ old('lr_title') }}" class="form-control" id="lr_title">
    @error('lr_title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="lr_description"><i class="flag-icon flag-icon-us mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="lr_description" class="summernote" required
        id="lr_description">{{ old('lr_description') }}</textarea>
</div>
<div class="form-group">
    <label>Image <span class="text-danger">*</span></label>
    @isset($product->product_photo)
        <div class="card">
            <div class="card-body">
                <img src="{{ asset($product->product_photo) }}" alt="Why Work With US Image" class="img-thumbnail">
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

                    <input type="file" name="lr_image">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>

        </div>

    </div>
</div> <!-- /. Paragraphs Image -->
<!-- /. End of Paragraphs -->
<!-- Diagram and Table -->
<hr>
<h4>Diagram and Table</h4>
<div class="form-group">
    <label for="diagram_table_title[]"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="diagram_table_title[]" value="{{ old('diagram_table_title[0]') }}" class="form-control"
        id="diagram_table_title1">
    @error('diagram_table_title[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="diagram_table_description1"><i class="flag-icon flag-icon-us mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="diagram_table_description[]" class="summernote" required
        id="diagram_table_description1">{{ old('diagram_table_description[0]') }}</textarea>
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

                    <input type="file" name="diagram_table_image[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>

        </div>

    </div>
</div> <!-- /. Diagram and Table Image -->
<div class="form-group">
    <label for="diagram_table_title[]"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="diagram_table_title[]" value="{{ old('diagram_table_title[1]') }}" class="form-control"
        id="diagram_table_title2">
    @error('diagram_table_title[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="diagram_table_description2"><i class="flag-icon flag-icon-us mr-2"></i>
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

                    <input type="file" name="diagram_table_image[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>

        </div>

    </div>
</div> <!-- /. Diagram and Table Image -->
<!-- /. End of Diagram and Table -->
<!-- Apply Insurance Block -->
<hr>
<h4>Apply Insurance Block</h4>
<div class="form-group">
    <label for="apply_insurance_title"><i class="flag-icon flag-icon-us mr-2"></i>
        Title
        <span class="text-danger">*</span></label>
    <input type="text" name="apply_insurance_title" value="{{ old('apply_insurance_title') }}" class="form-control"
        id="apply_insurance_title">
    @error('apply_insurance_title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="apply_insurance_description"><i class="flag-icon flag-icon-us mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="apply_insurance_description" class="summernote" required
        id="apply_insurance_description">{{ old('apply_insurance_description') }}</textarea>
</div>
<div class="form-group">
    <label for="apply_insurance_buttonText"><i class="flag-icon flag-icon-us mr-2"></i> Button Text
        <span class="text-danger">*</span></label>
    <input type="text" name="apply_insurance_buttonText" value="{{ old('apply_insurance_buttonText') }}"
        class="form-control" id="apply_insurance_buttonText">
    @error('apply_insurance_buttonText')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<!-- /. End of Apply Insurance Block -->
<!-- Why Work With Us Block -->
<hr>
<h4>Why work with us</h4>
<div class="form-group">
    <label for="why_work_title"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="why_work_title" value="{{ old('why_work_title') }}" class="form-control"
        id="why_work_title">
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
                <img src="{{ asset($product->product_photo) }}" alt="Why Work With US Image" class="img-thumbnail">
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
<!-- Additional Benifits -->
<hr>
<h4>Additional Benifits</h4>
<div class="form-group">
    <label for="additional_title"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="additional_title" value="{{ old('additional_title') }}" class="form-control"
        id="additional_title">
    @error('additional_title')
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

                    <input type="file" name="additional_icon[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="additional_iconText[]" value="{{ old('additional_iconText[0]') }}"
                    class="form-control" id="additional_iconText1" placeholder="Icon Text">
                @error('additional_iconText[0]')
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

                    <input type="file" name="additional_icon[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="additional_iconText[]" value="{{ old('additional_iconText[1]') }}"
                    class="form-control" id="additional_iconText2" placeholder="Icon Text">
                @error('additional_iconText[1]')
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

                    <input type="file" name="additional_icon[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="additional_iconText[]" value="{{ old('additional_iconText[2]') }}"
                    class="form-control" id="additional_iconText3" placeholder="Icon Text">
                @error('additional_iconText[2]')
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

                    <input type="file" name="additional_icon[]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="additional_iconText[]" value="{{ old('additional_iconText[3]') }}"
                    class="form-control" id="additional_iconText4" placeholder="Icon Text">
                @error('additional_iconText[3]')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

    </div>
</div> <!-- /. Additional Benefit Image -->
<div class="form-group">
    <label>Icon <span class="text-danger">*</span></label>
    @isset($product->product_photo)
        <div class="card">
            <div class="card-body">
                <img src="{{ asset($product->product_photo) }}" alt="Why Work With US Image" class="img-thumbnail">
            </div>
        </div>
    @endisset
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
                @error('additional_iconText[4]')
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
    <label for="attachments_title1"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="attachments_title[0]" value="{{ old('attachments_title[0]') }}" class="form-control"
        id="attachments_title1">
    @error('attachments_title[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="attachments_description1"><i class="flag-icon flag-icon-us mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="attachments_description[0]" class="summernote" required
        id="attachments_description1">{{ old('attachments_description[0]') }}</textarea>
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

                    <input type="file" name="attachments_image[0]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="attachments_iconText[]" value="{{ old('attachments_iconText[0]') }}"
                    class="form-control" id="attachments_iconText1" placeholder="Icon Text">
                @error('attachments_iconText[0]')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

    </div>
</div> <!-- /. Attachment Image -->
<div class="form-group">
    <label for="attachments_title2"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="attachments_title[1]" value="{{ old('attachments_title[1]') }}" class="form-control"
        id="attachments_title1">
    @error('attachments_title[1]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="attachments_description2"><i class="flag-icon flag-icon-us mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="attachments_description[1]" class="summernote" required
        id="attachments_description2">{{ old('attachments_description[1]') }}</textarea>
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

                    <input type="file" name="attachments_image[1]">

                </div>

                <button type="button" class="btn btn-danger">Remove</button>
            </div>
            <div class="row pt-3">
                <input type="text" name="attachments_iconText[]" value="{{ old('attachments_iconText[1]') }}"
                    class="form-control" id="attachments_iconText2" placeholder="Icon Text">
                @error('attachments_iconText[1]')
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
    <label for="faq_title"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_title" value="{{ old('faq_title') }}" class="form-control" id="faq_title">
    @error('faq_title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_title_1"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_title_1" value="{{ old('faq_title_1') }}" class="form-control"
        id="faq_title_1">
    @error('faq_title_1')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_detail_1"><i class="flag-icon flag-icon-us mr-2"></i>
        Detail
        <span class="text-danger">*</span></label>
    <textarea name="faq_detail_1" class="summernote" required
        id="faq_detail_1">{{ old('faq_detail_1') }}</textarea>
</div>
<div class="form-group">
    <label for="faq_title_2"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_title_2" value="{{ old('faq_title_2') }}" class="form-control"
        id="faq_title_2">
    @error('faq_title_2')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_detail_2"><i class="flag-icon flag-icon-us mr-2"></i>
        Detail
        <span class="text-danger">*</span></label>
    <textarea name="faq_detail_2" class="summernote" required
        id="faq_detail_2">{{ old('faq_detail_2') }}</textarea>
</div>
<div class="form-group">
    <label for="faq_title_3"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_title_3" value="{{ old('faq_title_3') }}" class="form-control"
        id="faq_title_3">
    @error('faq_title_3')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_detail_3"><i class="flag-icon flag-icon-us mr-2"></i>
        Detail
        <span class="text-danger">*</span></label>
    <textarea name="faq_detail_3" class="summernote" required
        id="faq_detail_3">{{ old('faq_detail_3') }}</textarea>
</div>
<div class="form-group">
    <label for="faq_title_4"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_title_4" value="{{ old('faq_title_4') }}" class="form-control"
        id="faq_title_4">
    @error('faq_title_4')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_detail_4"><i class="flag-icon flag-icon-us mr-2"></i>
        Detail
        <span class="text-danger">*</span></label>
    <textarea name="faq_detail_4" class="summernote" required
        id="faq_detail_4">{{ old('faq_detail_4') }}</textarea>
</div>
<!-- /. End of FAQ -->
