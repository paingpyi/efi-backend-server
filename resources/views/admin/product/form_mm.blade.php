<div class="form-group">
    <label for="title"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="title_burmese" value="{{ old('title_burmese') }}" class="form-control" id="title_burmese"
        aria-describedby="title_burmeseHelp">
    <small id="title_burmeseHelp" class="form-text text-muted">Please enter
        title.</small>
    @error('title_burmese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="slogan_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Slogan</label>
    <input type="text" name="slogan_burmese" value="{{ old('slogan_burmese') }}" class="form-control" id="slogan_burmese">
</div>
<!-- Paragraphs -->
<hr>
<h4>Description</h4>
<div class="form-group">
    <label for="lr_title_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="lr_title_burmese" value="{{ old('lr_title_burmese') }}" class="form-control" id="lr_title_burmese">
    @error('lr_title_burmese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="lr_description_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="lr_description_burmese" class="summernote"
        id="lr_description_burmese">{{ old('lr_description_burmese') }}</textarea>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-btn">
            <a id="lr_image_burmese" data-input="lr_image_thumbnail_burmese" data-preview="lr_image_burmese_holder" class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="lr_image_thumbnail_burmese" class="form-control" type="text" name="lr_image_burmese">
    </div>
    <div id="lr_image_burmese_holder" class="img-thumbnail mx-auto d-block mt-3"></div>
</div> <!-- /. Paragraphs Image -->
<!-- /. End of Paragraphs -->
<!-- Diagram and Table -->
<hr>
<h4>Diagram and Table</h4>
<div class="form-group">
    <label for="diagram_table_title_burmese[]"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="diagram_table_title_burmese[]" value="{{ old('diagram_table_title_burmese[0]') }}" class="form-control"
        id="diagram_table_title_burmese1">
    @error('diagram_table_title_burmese[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="diagram_table_description_burmese1"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="diagram_table_description_burmese[]" class="summernote"
        id="diagram_table_description_burmese1">{{ old('diagram_table_description_burmese[0]') }}</textarea>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-btn">
            <a id="diagram_table_image_burmese" data-input="diagram_table_image_thumbnail_burmese"
                data-preview="diagram_table_image_burmese_holder" class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="diagram_table_image_thumbnail_burmese" class="form-control" type="text" name="diagram_table_image_burmese[]">
    </div>
    <div id="diagram_table_image_burmese_holder" class="img-thumbnail mx-auto d-block mt-3"></div>
</div> <!-- /. Diagram and Table Image -->
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="diagram_table_image_width_burmese[]"><i class="flag-icon flag-icon-mm mr-2"></i> Image Width
                <span class="text-danger">*</span></label>
            <input type="text" name="diagram_table_image_width_burmese[]" value="{{ old('diagram_table_image_width_burmese[]') }}"
                class="form-control" id="diagram_table_image_width_burmese1" placeholder="Image Width (px)">
        </div>
    </div> <!-- /. Image width -->
    <div class="col">
        <div class="form-group">
            <label for="diagram_table_image_height_burmese[]"><i class="flag-icon flag-icon-mm mr-2"></i> Image Height
                <span class="text-danger">*</span></label>
            <input type="text" name="diagram_table_image_height_burmese[]" value="{{ old('diagram_table_image_height_burmese[]') }}"
                class="form-control" id="diagram_table_image_height_burmese1" placeholder="Image Height (px)">
        </div>
    </div> <!-- /. Image height -->
</div> <!-- /. Image width and height -->
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
    <label for="diagram_table_description_burmese2"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="diagram_table_description_burmese[]" class="summernote"
        id="diagram_table_description_burmese2">{{ old('diagram_table_description_burmese[1]') }}</textarea>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-btn">
            <a id="diagram_table_image_burmese2" data-input="diagram_table_image_thumbnail_burmese2"
                data-preview="diagram_table_image_burmese_holder2" class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="diagram_table_image_thumbnail_burmese2" class="form-control" type="text" name="diagram_table_image_burmese[]">
    </div>
    <div id="diagram_table_image_burmese_holder2" class="img-thumbnail mx-auto d-block mt-3"></div>
</div> <!-- /. Diagram and Table Image -->
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="diagram_table_image_width_burmese[]"><i class="flag-icon flag-icon-mm mr-2"></i> Image Width
                <span class="text-danger">*</span></label>
            <input type="text" name="diagram_table_image_width_burmese[]" value="{{ old('diagram_table_image_width_burmese[]') }}"
                class="form-control" id="diagram_table_image_width_burmese2" placeholder="Image Width (px)">
        </div>
    </div> <!-- /. Image width -->
    <div class="col">
        <div class="form-group">
            <label for="diagram_table_image_height_burmese[]"><i class="flag-icon flag-icon-mm mr-2"></i> Image Height
                <span class="text-danger">*</span></label>
            <input type="text" name="diagram_table_image_height_burmese[]" value="{{ old('diagram_table_image_height_burmese[]') }}"
                class="form-control" id="diagram_table_image_height_burmese2" placeholder="Image Height (px)">
        </div>
    </div> <!-- /. Image height -->
</div> <!-- /. Image width and height -->
<!-- /. End of Diagram and Table -->
<!-- Apply Insurance Block -->
<hr>
<h4>Apply Insurance Block</h4>
<div class="form-group">
    <label for="apply_insurance_title_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
        Title
        <span class="text-danger">*</span></label>
    <input type="text" name="apply_insurance_title_burmese" value="{{ old('apply_insurance_title_burmese') }}" class="form-control"
        id="apply_insurance_title_burmese">
    @error('apply_insurance_title_burmese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="apply_insurance_description_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="apply_insurance_description_burmese" class="summernote"
        id="apply_insurance_description_burmese">{{ old('apply_insurance_description_burmese') }}</textarea>
</div>
<div class="form-group">
    <label for="apply_insurance_buttonText_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Button Text
        <span class="text-danger">*</span></label>
    <input type="text" name="apply_insurance_buttonText_burmese" value="{{ old('apply_insurance_buttonText_burmese') }}"
        class="form-control" id="apply_insurance_buttonText_burmese">
    @error('apply_insurance_buttonText_burmese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<!-- /. End of Apply Insurance Block -->
<!-- Why Work With Us Block -->
<hr>
<h4>Why work with us Block</h4>
<div class="form-group">
    <label for="why_work_title_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="why_work_title_burmese" value="{{ old('why_work_title_burmese') }}" class="form-control"
        id="why_work_title_burmese">
    @error('why_work_title_burmese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="why_work_description_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="why_work_description_burmese" class="summernote"
        id="why_work_description_burmese">{{ old('why_work_description_burmese') }}</textarea>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-btn">
            <a id="why_work_image_burmese" data-input="why_work_image_thumbnail_burmese" data-preview="why_work_image_burmese_holder"
                class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="why_work_image_thumbnail_burmese" class="form-control" type="text" name="why_work_image_burmese">
    </div>
    <div id="why_work_image_burmese_holder" class="img-thumbnail mx-auto d-block mt-3"></div>
</div> <!-- /. Why Work With Us Image -->
<!-- /. End of Why Work With Us Block -->
<!-- Additional Benifits -->
<hr>
<h4>Additional Benifits Block</h4>
<div class="form-group">
    <label for="additional_title_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="additional_title_burmese" value="{{ old('additional_title_burmese') }}" class="form-control"
        id="additional_title_burmese">
    @error('additional_title_burmese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<hr>
<div class="form-group">
    <label>Icon <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="additional_icon_burmese1" data-input="additional_icon_thumbnail_burmese" data-preview="additional_icon_burmese_holder"
                class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="additional_icon_thumbnail_burmese1" class="form-control" type="text" name="additional_icon_burmese[]">
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <div id="additional_icon_burmese_holder" class="img-thumbnail mx-auto d-block"></div>
        </div>
        <div class="col-9">
            <textarea name="additional_iconText_burmese[]" class="summernote"
                id="additional_iconText_burmese1">{{ old('additional_iconText_burmese[0]') }}</textarea>
        </div>
    </div>
</div> <!-- /. Additional Benefit Image -->
<div class="form-group">
    <label>Icon <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="additional_icon2" data-input="additional_icon_thumbnail2" data-preview="additional_icon_holder2"
                class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="additional_icon_thumbnail2" class="form-control" type="text" name="additional_icon[]">
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <div id="additional_icon_holder2" class="img-thumbnail mx-auto d-block"></div>
        </div>
        <div class="col-9">
            <textarea name="additional_iconText[]" class="summernote"
                id="additional_iconText2">{{ old('additional_iconText[1]') }}</textarea>
        </div>
    </div>
</div> <!-- /. Additional Benefit Image -->
<div class="form-group">
    <label>Icon <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="additional_icon3" data-input="additional_icon_thumbnail3" data-preview="additional_icon_holder3"
                class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="additional_icon_thumbnail3" class="form-control" type="text" name="additional_icon[]">
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <div id="additional_icon_holder3" class="img-thumbnail mx-auto d-block"></div>
        </div>
        <div class="col-9">
            <textarea name="additional_iconText[]" class="summernote"
                id="additional_iconText3">{{ old('additional_iconText[2]') }}</textarea>
        </div>
    </div>
</div> <!-- /. Additional Benefit Image -->
<div class="form-group">
    <label>Icon <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="additional_icon4" data-input="additional_icon_thumbnail4" data-preview="additional_icon_holder4"
                class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="additional_icon_thumbnail4" class="form-control" type="text" name="additional_icon[]">
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <div id="additional_icon_holder4" class="img-thumbnail mx-auto d-block"></div>
        </div>
        <div class="col-9">
            <textarea name="additional_iconText[]" class="summernote"
                id="additional_iconText4">{{ old('additional_iconText[3]') }}</textarea>
        </div>
    </div>
</div> <!-- /. Additional Benefit Image -->
<div class="form-group">
    <label>Icon <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="additional_icon5" data-input="additional_icon_thumbnail5" data-preview="additional_icon_holder5"
                class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="additional_icon_thumbnail5" class="form-control" type="text" name="additional_icon[]">
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <div id="additional_icon_holder5" class="img-thumbnail mx-auto d-block"></div>
        </div>
        <div class="col-9">
            <textarea name="additional_iconText[]" class="summernote"
                id="additional_iconText5">{{ old('additional_iconText[4]') }}</textarea>
        </div>
    </div>
</div> <!-- /. Additional Benefit Image -->
<!-- Additional Benifits -->
<!-- Attachments -->
<hr>
<h4>Attachments</h4>
<div class="form-group">
    <label for="attachments_title1"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="attachments_title[]" value="{{ old('attachments_title[0]') }}" class="form-control"
        id="attachments_title1">
    @error('attachments_title[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="attachments_description1"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="attachments_description[]" class="summernote"
        id="attachments_description1">{{ old('attachments_description[0]') }}</textarea>
</div>
<div class="form-group">
    <label>icon <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="attachments_icon1" data-input="attachments_icon_thumbnail1" data-preview="attachments_icon_holder1"
                class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="attachments_icon_thumbnail1" class="form-control" type="text" name="attachments_icon[]">
    </div>
    <div id="additional_icon_holder4" class="img-thumbnail mx-auto d-block mt-3"></div>
</div> <!-- /. Attachment Image -->
<div class="form-group">
    <label for="attachments_buttonText1"><i class="flag-icon flag-icon-mm mr-2"></i> Button Text
        <span class="text-danger">*</span></label>
    <input type="text" name="attachments_buttonText[]" value="{{ old('attachments_buttonText[0]') }}"
        class="form-control" id="attachments_buttonText1">
</div>
<div class="form-group">
    <label for="attachments_title2"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="attachments_title[]" value="{{ old('attachments_title[1]') }}" class="form-control"
        id="attachments_title2">
    @error('attachments_title[1]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="attachments_description2"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="attachments_description[]" class="summernote"
        id="attachments_description2">{{ old('attachments_description[1]') }}</textarea>
</div>
<div class="form-group">
    <label>icon <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="attachments_icon4" data-input="attachments_icon_thumbnail4" data-preview="attachments_icon_holder4"
                class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="attachments_icon_thumbnail4" class="form-control" type="text" name="attachments_icon[]">
    </div>
    <div id="additional_icon_holder4" class="img-thumbnail mx-auto d-block mt-3"></div>
</div> <!-- /. Attachment Image -->
<div class="form-group">
    <label for="attachments_buttonText2"><i class="flag-icon flag-icon-mm mr-2"></i> Button Text
        <span class="text-danger">*</span></label>
    <input type="text" name="attachments_buttonText[]" value="{{ old('attachments_buttonText[1]') }}"
        class="form-control" id="attachments_buttonText2">
</div>
<!-- /. End of Attachments -->
<!-- FAQ -->
<hr>
<h4>Frequently Asked Questions</h4>
<div class="form-group">
    <label for="faq_title"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_title" value="{{ old('faq_title') }}" class="form-control" id="faq_title">
    @error('faq_title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_question_1"><i class="flag-icon flag-icon-mm mr-2"></i> Question
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_question[]" value="{{ old('faq_question[0]') }}" class="form-control" id="faq_question_1">
    @error('faq_question[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_answers_1"><i class="flag-icon flag-icon-mm mr-2"></i>
        Answers
        <span class="text-danger">*</span></label>
    <textarea name="faq_answers[]" class="summernote" id="faq_answers_1">{{ old('faq_answers[0]') }}</textarea>
</div>
<div class="form-group">
    <label for="faq_question_2"><i class="flag-icon flag-icon-mm mr-2"></i> Question
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_question[]" value="{{ old('faq_question[1]') }}" class="form-control" id="faq_question_2">
    @error('faq_question[1]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_answers_2"><i class="flag-icon flag-icon-mm mr-2"></i>
        Answers
        <span class="text-danger">*</span></label>
    <textarea name="faq_answers[]" class="summernote" id="faq_answers_2">{{ old('faq_answers[1]') }}</textarea>
</div>
<div class="form-group">
    <label for="faq_question_3"><i class="flag-icon flag-icon-mm mr-2"></i> Question
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_question[]" value="{{ old('faq_question[2]') }}" class="form-control" id="faq_question_3">
    @error('faq_question[2]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_answers_3"><i class="flag-icon flag-icon-mm mr-2"></i>
        Answers
        <span class="text-danger">*</span></label>
    <textarea name="faq_answers[]" class="summernote" id="faq_answers_3">{{ old('faq_answers[2]') }}</textarea>
</div>
<div class="form-group">
    <label for="faq_question_4"><i class="flag-icon flag-icon-mm mr-2"></i> Question
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_question[]" value="{{ old('faq_question[3]') }}" class="form-control" id="faq_question_4">
    @error('faq_question[3]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_answers_4"><i class="flag-icon flag-icon-mm mr-2"></i>
        Answers
        <span class="text-danger">*</span></label>
    <textarea name="faq_answers[]" class="summernote" id="faq_answers_4">{{ old('faq_answers[3]') }}</textarea>
</div>
<!-- /. End of FAQ -->
