<div class="form-group">
    <label for="title"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="title_burmese"
        value="{{ old('title_burmese', isset($product_mm->title) ? json_decode($product_mm->title) : '') }}" class="form-control"
        id="title_burmese" aria-describedby="title_burmeseHelp">
    <small id="title_burmeseHelp" class="form-text text-muted">Please enter
        title.</small>
    @error('title_burmese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="slogan_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Slogan</label>
    <input type="text" name="slogan_burmese"
        value="{{ old('slogan_burmese', isset($product_mm->slogan) ? json_decode($product_mm->slogan) : '') }}"
        class="form-control" id="slogan_burmese">
</div>
<!-- Food for Thought -->
<hr>
<h4>Food for thought</h4>
<div class="form-group">
    <label for="food_for_thought_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Title</label>
    <input type="text" name="food_for_thought_burmese"
        value="{{ old('food_for_thought_burmese', isset($product_mm) or json_decode($product_mm->food_for_thought)->title != null ? json_decode($product_mm->food_for_thought)->title : '') }}"
        class="form-control" id="food_for_thought_burmese">
</div>
<div class="form-group">
    <label for="food_for_thought_description_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="food_for_thought_description_burmese" class="summernote"
        id="food_for_thought_description_burmese">{{ old('food_for_thought_description_burmese', isset($product_mm) or isset(json_decode($product_mm->food_for_thought)->description) ? json_decode($product_mm->food_for_thought)->description : '') }}</textarea>
</div>
<!-- /. End of Food for Thought -->
<!-- Paragraphs -->
<hr>
<h4>Description</h4>
@php
$lr = [];

if (isset($product_mm)) {
    foreach (json_decode($product_mm->lr) as $item) {
        $lr[] = [
            'title' => $item->title,
            'description' => $item->description,
            'image' => config('app.url') . $item->image,
        ];
    }
}
@endphp
<div class="form-group">
    <label for="lr_title_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="lr_title_burmese"
        value="{{ old('lr_title_burmese', isset($lr[0]['title']) ? $lr[0]['title'] : '') }}" class="form-control"
        id="lr_title_burmese">
    @error('lr_title_burmese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="lr_description_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="lr_description_burmese" class="summernote"
        id="lr_description_burmese">{{ old('lr_description_burmese', isset($lr[0]['description']) ? $lr[0]['description'] : '') }}</textarea>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-btn">
            <a id="lr_image_burmese" data-input="lr_image_thumbnail_burmese" data-preview="lr_image_burmese_holder"
                class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="lr_image_thumbnail_burmese" class="form-control" type="text" name="lr_image_burmese"
            value="{{ old('lr_image_burmese', isset($lr[0]['image']) ? $lr[0]['image'] : '') }}">
    </div>
    <div id="lr_image_burmese_holder" class="img-thumbnail mx-auto d-block mt-3"></div>
</div> <!-- /. Paragraphs Image -->
<!-- /. End of Paragraphs -->
<!-- Diagram and Table -->
<hr>
<h4>Diagram and Table</h4>
@php
if (isset($product_mm)) {
    $diagrams_and_table = [];

    foreach (json_decode($product_mm->diagrams_and_table) as $item) {
        $diagrams_and_table[] = [
            'title' => $item->title,
            'description' => $item->description,
            'image' => [
                'src' => config('app.url') . $item->image->src,
                'width' => $item->image->width,
                'height' => $item->image->height,
            ],
        ];
    }
}
@endphp
<div class="form-group">
    <label for="diagram_table_title_burmese[]"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="diagram_table_title_burmese[]"
        value="{{ old('diagram_table_title_burmese[0]',isset($diagrams_and_table[0]['title']) ? $diagrams_and_table[0]['title'] : '') }}"
        class="form-control" id="diagram_table_title_burmese1">
    @error('diagram_table_title_burmese[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="diagram_table_description_burmese1"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="diagram_table_description_burmese[]" class="summernote"
        id="diagram_table_description_burmese1">{{ old('diagram_table_description_burmese[0]',isset($diagrams_and_table[0]['description']) ? $diagrams_and_table[0]['description'] : '') }}</textarea>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-btn">
            <a id="diagram_table_image_burmese" data-input="diagram_table_image_thumbnail_burmese"
                data-preview="diagram_table_image_burmese_holder" class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="diagram_table_image_thumbnail_burmese" class="form-control" type="text"
            name="diagram_table_image_burmese[]"
            value="{{ old('diagram_table_image_burmese[0]',isset($diagrams_and_table[0]['image']['src']) ? $diagrams_and_table[0]['image']['src'] : '') }}">
    </div>
    <div id="diagram_table_image_burmese_holder" class="img-thumbnail mx-auto d-block mt-3"></div>
</div> <!-- /. Diagram and Table Image -->
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="diagram_table_image_width_burmese[]"><i class="flag-icon flag-icon-mm mr-2"></i> Image Width
                <span class="text-danger">*</span></label>
            <input type="text" name="diagram_table_image_width_burmese[]"
                value="{{ old('diagram_table_image_width_burmese[0]',isset($diagrams_and_table[0]['image']['width']) ? $diagrams_and_table[0]['image']['width'] : '') }}"
                class="form-control" id="diagram_table_image_width_burmese1" placeholder="Image Width (px)">
        </div>
    </div> <!-- /. Image width -->
    <div class="col">
        <div class="form-group">
            <label for="diagram_table_image_height_burmese[]"><i class="flag-icon flag-icon-mm mr-2"></i> Image Height
                <span class="text-danger">*</span></label>
            <input type="text" name="diagram_table_image_height_burmese[]"
                value="{{ old('diagram_table_image_height_burmese[0]',isset($diagrams_and_table[0]['image']['height']) ? $diagrams_and_table[0]['image']['height'] : '') }}"
                class="form-control" id="diagram_table_image_height_burmese1" placeholder="Image Height (px)">
        </div>
    </div> <!-- /. Image height -->
</div> <!-- /. Image width and height -->
<div class="form-group">
    <label for="diagram_table_title_burmese[]"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="diagram_table_title_burmese[]"
        value="{{ old('diagram_table_title_burmese[1]',isset($diagrams_and_table[1]['title']) ? $diagrams_and_table[1]['title'] : '') }}"
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
        id="diagram_table_description_burmese2">{{ old('diagram_table_description_burmese[1]',isset($diagrams_and_table[1]['description']) ? $diagrams_and_table[1]['description'] : '') }}</textarea>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-btn">
            <a id="diagram_table_image_burmese2" data-input="diagram_table_image_thumbnail_burmese2"
                data-preview="diagram_table_image_burmese_holder2" class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="diagram_table_image_thumbnail_burmese2" class="form-control" type="text"
            name="diagram_table_image_burmese[]"
            value="{{ old('diagram_table_image_burmese[1]',isset($diagrams_and_table[1]['image']['src']) ? $diagrams_and_table[1]['image']['src'] : '') }}">
    </div>
    <div id="diagram_table_image_burmese_holder2" class="img-thumbnail mx-auto d-block mt-3"></div>
</div> <!-- /. Diagram and Table Image -->
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="diagram_table_image_width_burmese[]"><i class="flag-icon flag-icon-mm mr-2"></i> Image Width
                <span class="text-danger">*</span></label>
            <input type="text" name="diagram_table_image_width_burmese[]"
                value="{{ old('diagram_table_image_width_burmese[1]',isset($diagrams_and_table[1]['image']['width']) ? $diagrams_and_table[1]['image']['width'] : '') }}"
                class="form-control" id="diagram_table_image_width_burmese2" placeholder="Image Width (px)">
        </div>
    </div> <!-- /. Image width -->
    <div class="col">
        <div class="form-group">
            <label for="diagram_table_image_height_burmese[]"><i class="flag-icon flag-icon-mm mr-2"></i> Image Height
                <span class="text-danger">*</span></label>
            <input type="text" name="diagram_table_image_height_burmese[]"
                value="{{ old('diagram_table_image_height_burmese[1]',isset($diagrams_and_table[1]['image']['height']) ? $diagrams_and_table[1]['image']['height'] : '') }}"
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
    <input type="text" name="apply_insurance_title_burmese"
        value="{{ old('apply_insurance_title_burmese',isset($product_mm) ? json_decode($product_mm->apply_insurance)->title: '') }}"
        class="form-control" id="apply_insurance_title_burmese">
    @error('apply_insurance_title_burmese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="apply_insurance_description_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="apply_insurance_description_burmese" class="summernote"
        id="apply_insurance_description_burmese">{{ old('apply_insurance_description_burmese',isset($product_mm) ? json_decode($product_mm->apply_insurance)->description: '') }}</textarea>
</div>
<div class="form-group">
    <label for="apply_insurance_buttonText_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Button Text
        <span class="text-danger">*</span></label>
    <input type="text" name="apply_insurance_buttonText_burmese"
        value="{{ old('apply_insurance_buttonText_burmese',isset($product_mm) ? json_decode($product_mm->apply_insurance)->buttonText: '') }}"
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
    <input type="text" name="why_work_title_burmese"
        value="{{ old('why_work_title_burmese',isset($product_mm) ? json_decode($product_mm->why_work_with_us)->title: '') }}"
        class="form-control" id="why_work_title_burmese">
    @error('why_work_title_burmese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="why_work_description_burmese"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="why_work_description_burmese" class="summernote"
        id="why_work_description_burmese">{{ old('why_work_description_burmese',isset($product_mm) ? json_decode($product_mm->why_work_with_us)->description: '') }}</textarea>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-btn">
            <a id="why_work_image_burmese" data-input="why_work_image_thumbnail_burmese"
                data-preview="why_work_image_burmese_holder" class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="why_work_image_thumbnail_burmese" class="form-control" type="text" name="why_work_image_burmese"
            value="{{ old('why_work_image_burmese',isset($product_mm) ? config('app.url') . json_decode($product_mm->why_work_with_us)->image: '') }}">
    </div>
    <div id="why_work_image_burmese_holder" class="img-thumbnail mx-auto d-block mt-3"></div>
</div> <!-- /. Why Work With Us Image -->
<!-- /. End of Why Work With Us Block -->
<!-- Additional Benifits -->
<hr>
<h4>Additional Benifits Block</h4>
@php
$additional_benifits_data = [];

if (isset(json_decode($product_mm->additional_benifits)->data)) {
    foreach (json_decode($product_mm->additional_benifits)->data as $item) {
        $additional_benifits_data[] = [
            'icon' => config('app.url') . $item->icon,
            'text' => $item->text,
        ];
    }
}
@endphp
<div class="form-group">
    <label for="additional_title_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="additional_title_burmese"
        value="{{ old('additional_title_burmese',isset($product_mm) or json_decode($product_mm->additional_benifits)->title != null ? json_decode($product_mm->additional_benifits)->title: '') }}"
        class="form-control" id="additional_title_burmese">
    @error('additional_title_burmese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<hr>
<div class="form-group">
    <label>Icon <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="additional_icon_burmese1" data-input="additional_icon_thumbnail_burmese1"
                data-preview="additional_icon_burmese_holder" class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="additional_icon_thumbnail_burmese1" class="form-control" type="text"
            value="{{ old('additional_icon_burmese[0]',isset($additional_benifits_data[0]['icon']) ? $additional_benifits_data[0]['icon'] : '') }}"
            name="additional_icon_burmese[]">
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <div id="additional_icon_burmese_holder" class="img-thumbnail mx-auto d-block"></div>
        </div>
        <div class="col-9">
            <textarea name="additional_iconText_burmese[]" class="summernote"
                id="additional_iconText_burmese1">{{ old('additional_iconText_burmese[0]',isset($additional_benifits_data[0]['text']) ? $additional_benifits_data[0]['text'] : '') }}</textarea>
        </div>
    </div>
</div> <!-- /. Additional Benefit Image -->
<div class="form-group">
    <label>Icon <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="additional_icon_burmese2" data-input="additional_icon_thumbnail_burmese2"
                data-preview="additional_icon_burmese_holder2" class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="additional_icon_thumbnail_burmese2" class="form-control" type="text"
            value="{{ old('additional_icon_burmese[1]',isset($additional_benifits_data[1]['icon']) ? $additional_benifits_data[1]['icon'] : '') }}"
            name="additional_icon_burmese[]">
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <div id="additional_icon_burmese_holder2" class="img-thumbnail mx-auto d-block"></div>
        </div>
        <div class="col-9">
            <textarea name="additional_iconText_burmese[]" class="summernote"
                id="additional_iconText_burmese2">{{ old('additional_iconText_burmese[1]',isset($additional_benifits_data[1]['text']) ? $additional_benifits_data[1]['text'] : '') }}</textarea>
        </div>
    </div>
</div> <!-- /. Additional Benefit Image -->
<div class="form-group">
    <label>Icon <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="additional_icon_burmese3" data-input="additional_icon_thumbnail_burmese3"
                data-preview="additional_icon_burmese_holder3" class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="additional_icon_thumbnail_burmese3" class="form-control" type="text"
            value="{{ old('additional_icon_burmese[2]',isset($additional_benifits_data[2]['icon']) ? $additional_benifits_data[2]['icon'] : '') }}"
            name="additional_icon_burmese[]">
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <div id="additional_icon_burmese_holder3" class="img-thumbnail mx-auto d-block"></div>
        </div>
        <div class="col-9">
            <textarea name="additional_iconText_burmese[]" class="summernote"
                id="additional_iconText_burmese3">{{ old('additional_iconText_burmese[2]',isset($additional_benifits_data[2]['text']) ? $additional_benifits_data[2]['text'] : '') }}</textarea>
        </div>
    </div>
</div> <!-- /. Additional Benefit Image -->
<div class="form-group">
    <label>Icon <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="additional_icon_burmese4" data-input="additional_icon_thumbnail_burmese4"
                data-preview="additional_icon_burmese_holder4" class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="additional_icon_thumbnail_burmese4" class="form-control" type="text"
            value="{{ old('additional_icon_burmese[3]',isset($additional_benifits_data[3]['icon']) ? $additional_benifits_data[3]['icon'] : '') }}"
            name="additional_icon_burmese[]">
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <div id="additional_icon_burmese_holder4" class="img-thumbnail mx-auto d-block"></div>
        </div>
        <div class="col-9">
            <textarea name="additional_iconText_burmese[]" class="summernote"
                id="additional_iconText_burmese4">{{ old('additional_iconText_burmese[3]',isset($additional_benifits_data[3]['text']) ? $additional_benifits_data[3]['text'] : '') }}</textarea>
        </div>
    </div>
</div> <!-- /. Additional Benefit Image -->
<div class="form-group">
    <label>Icon <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="additional_icon_burmese5" data-input="additional_icon_thumbnail_burmese5"
                data-preview="additional_icon_burmese_holder5" class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="additional_icon_thumbnail_burmese5" class="form-control" type="text"
            value="{{ old('additional_icon_burmese[3]',isset($additional_benifits_data[4]['icon']) ? $additional_benifits_data[4]['icon'] : '') }}"
            name="additional_icon_burmese[]">
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <div id="additional_icon_burmese_holder5" class="img-thumbnail mx-auto d-block"></div>
        </div>
        <div class="col-9">
            <textarea name="additional_iconText_burmese[]" class="summernote"
                id="additional_iconText_burmese5">{{ old('additional_iconText_burmese[4]',isset($additional_benifits_data[4]['text']) ? $additional_benifits_data[4]['text'] : '') }}</textarea>
        </div>
    </div>
</div> <!-- /. Additional Benefit Image -->
<!-- Additional Benifits -->
<!-- Attachments -->
<hr>
<h4>Attachments</h4>
@php
$attachments = [];

if (isset($product_mm)) {
    foreach (json_decode($product_mm->attachments) as $item) {
        $attachments[] = [
            'title' => $item->title,
            'description' => $item->description,
            'icon' => config('app.url') . $item->icon,
            'buttonText' => $item->buttonText,
            'proposal_file' => config('app.url') . $item->proposal_file,
        ];
    }
}
@endphp
<div class="form-group">
    <label for="attachments_title_burmese1"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="attachments_title_burmese[]"
        value="{{ old('attachments_title_burmese[0]', isset($attachments[0]['title']) ? $attachments[0]['title'] : '') }}"
        class="form-control" id="attachments_title_burmese1">
    @error('attachments_title_burmese[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="attachments_description_burmese1"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="attachments_description_burmese[]" class="summernote"
        id="attachments_description_burmese1">{{ old('attachments_description_burmese[0]',isset($attachments[0]['description']) ? $attachments[0]['description'] : '') }}</textarea>
</div>
<div class="form-group">
    <label>icon <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="attachments_icon_burmese1" data-input="attachments_icon_thumbnail_burmese1"
                data-preview="attachments_icon_burmese_holder1" class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="attachments_icon_thumbnail_burmese1" class="form-control" type="text"
            value="{{ old('attachments_icon_burmese[0]', isset($attachments[0]['icon']) ? $attachments[0]['icon'] : '') }}"
            name="attachments_icon_burmese[]">
    </div>
    <div id="attachments_icon_burmese_holder1" class="img-thumbnail mx-auto d-block mt-3"></div>
</div> <!-- /. Attachment Image -->
<div class="form-group">
    <label for="attachments_buttonText_burmese1"><i class="flag-icon flag-icon-mm mr-2"></i> Button Text
        <span class="text-danger">*</span></label>
    <input type="text" name="attachments_buttonText_burmese[]"
        value="{{ old('attachments_buttonText_burmese[0]',isset($attachments[0]['buttonText']) ? $attachments[0]['buttonText'] : '') }}"
        class="form-control" id="attachments_buttonText_burmese1">
</div>
<div class="form-group">
    <label>Product Proposal <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="attachments_proposal_burmese1" data-input="attachments_proposal_file_burmese1"
                class="btn btn-primary lfmfile">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="attachments_proposal_file_burmese1" class="form-control" type="text"
            value="{{ old('attachments_proposal_file_burmese[0]',isset($attachments[0]['proposal_file']) ? $attachments[0]['proposal_file'] : '') }}"
            name="attachments_proposal_file_burmese[]">
    </div>
</div> <!-- /. Product Proposal -->
<div class="form-group">
    <label for="attachments_title_burmese2"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="attachments_title_burmese[]"
        value="{{ old('attachments_title_burmese[1]', isset($attachments[1]['title']) ? $attachments[1]['title'] : '') }}"
        class="form-control" id="attachments_title_burmese2">
    @error('attachments_title_burmese[1]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="attachments_description_burmese2"><i class="flag-icon flag-icon-mm mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="attachments_description_burmese[]" class="summernote"
        id="attachments_description_burmese2">{{ old('attachments_description_burmese[1]',isset($attachments[1]['description']) ? $attachments[1]['description'] : '') }}</textarea>
</div>
<div class="form-group">
    <label>icon <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="attachments_icon_burmese4" data-input="attachments_icon_thumbnail_burmese4"
                data-preview="attachments_icon_burmese_holder4" class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="attachments_icon_thumbnail_burmese4" class="form-control" type="text"
            value="{{ old('attachments_icon_burmese[1]', isset($attachments[1]['icon']) ? $attachments[1]['icon'] : '') }}"
            name="attachments_icon_burmese[]">
    </div>
    <div id="attachments_icon_burmese_holder4" class="img-thumbnail mx-auto d-block mt-3"></div>
</div> <!-- /. Attachment Image -->
<div class="form-group">
    <label for="attachments_buttonText_burmese2"><i class="flag-icon flag-icon-mm mr-2"></i> Button Text
        <span class="text-danger">*</span></label>
    <input type="text" name="attachments_buttonText_burmese[]"
        value="{{ old('attachments_buttonText_burmese[1]',isset($attachments[1]['buttonText']) ? $attachments[1]['buttonText'] : '') }}"
        class="form-control" id="attachments_buttonText_burmese2">
</div>
<div class="form-group">
    <label>Product Proposal <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="attachments_proposal_burmese2" data-input="attachments_proposal_file_burmese2"
                class="btn btn-primary lfmfile">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="attachments_proposal_file_burmese2" class="form-control" type="text"
            name="attachments_proposal_file_burmese[]"
            value="{{ old('attachments_proposal_file_burmese[1]',isset($attachments[1]['proposal_file']) ? $attachments[1]['proposal_file'] : '') }}">
    </div>
</div> <!-- /. Product Proposal -->
<!-- /. End of Attachments -->
<!-- FAQ -->
<hr>
<h4>Frequently Asked Questions</h4>
@php
if(isset($product_mm)) {
$faq = json_decode($product_mm->faq)->data;
} else {
    $faq = [];
}
@endphp
<div class="form-group">
    <label for="faq_title_burmese"><i class="flag-icon flag-icon-mm mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_title_burmese"
        value="{{ old('faq_title_burmese',isset($product_mm) ? json_decode($product_mm->faq)->title : '') }}"
        class="form-control" id="faq_title_burmese">
    @error('faq_title_burmese')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_question_burmese_1"><i class="flag-icon flag-icon-mm mr-2"></i> Question
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_question_burmese[]"
        value="{{ old('faq_question_burmese[0]', isset($faq[0]->question) ? $faq[0]->question : '') }}"
        class="form-control" id="faq_question_burmese_1">
    @error('faq_question_burmese[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_answers_burmese_1"><i class="flag-icon flag-icon-mm mr-2"></i>
        Answers
        <span class="text-danger">*</span></label>
    <textarea name="faq_answers_burmese[]" class="summernote"
        id="faq_answers_burmese_1">{{ old('faq_answers_burmese[0]', isset($faq[0]->answers) ? $faq[0]->answers : '') }}</textarea>
</div>
<div class="form-group">
    <label for="faq_question_burmese_2"><i class="flag-icon flag-icon-mm mr-2"></i> Question
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_question_burmese[]"
        value="{{ old('faq_question_burmese[1]', isset($faq[1]->question) ? $faq[1]->question : '') }}"
        class="form-control" id="faq_question_burmese_2">
    @error('faq_question_burmese[1]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_answers_burmese_2"><i class="flag-icon flag-icon-mm mr-2"></i>
        Answers
        <span class="text-danger">*</span></label>
    <textarea name="faq_answers_burmese[]" class="summernote"
        id="faq_answers_burmese_2">{{ old('faq_answers_burmese[1]', isset($faq[1]->answers) ? $faq[1]->answers : '') }}</textarea>
</div>
<div class="form-group">
    <label for="faq_question_burmese_3"><i class="flag-icon flag-icon-mm mr-2"></i> Question
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_question_burmese[]"
        value="{{ old('faq_question_burmese[2]', isset($faq[2]->question) ? $faq[2]->question : '') }}"
        class="form-control" id="faq_question_burmese_3">
    @error('faq_question_burmese[2]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_answers_burmese_3"><i class="flag-icon flag-icon-mm mr-2"></i>
        Answers
        <span class="text-danger">*</span></label>
    <textarea name="faq_answers_burmese[]" class="summernote"
        id="faq_answers_burmese_3">{{ old('faq_answers_burmese[2]', isset($faq[2]->answers) ? $faq[2]->answers : '') }}</textarea>
</div>
<div class="form-group">
    <label for="faq_question_burmese_4"><i class="flag-icon flag-icon-mm mr-2"></i> Question
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_question_burmese[]"
        value="{{ old('faq_question_burmese[3]', isset($faq[3]->question) ? $faq[3]->question : '') }}"
        class="form-control" id="faq_question_burmese_4">
    @error('faq_question_burmese[3]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_answers_burmese_4"><i class="flag-icon flag-icon-mm mr-2"></i>
        Answers
        <span class="text-danger">*</span></label>
    <textarea name="faq_answers_burmese[]" class="summernote"
        id="faq_answers_burmese_4">{{ old('faq_answers_burmese[3]', isset($faq[3]->answers) ? $faq[3]->answers : '') }}</textarea>
</div>
<!-- /. End of FAQ -->
