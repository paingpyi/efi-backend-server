<div class="form-group">
    <label for="title"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="title" value="{{ old('title', isset($product_en->title) ? $product_en->title : '') }}"
        class="form-control" id="title" aria-describedby="titleHelp">
    <small id="titleHelp" class="form-text text-muted">Please enter
        title.</small>
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="slogan"><i class="flag-icon flag-icon-us mr-2"></i> Slogan</label>
    <input type="text" name="slogan"
        value="{{ old('slogan', isset($product_en->slogan) ? $product_en->slogan : '') }}" class="form-control"
        id="slogan">
</div>
<!-- Paragraphs -->
<hr>
<h4>Description</h4>
@php
$lr = [];

if (isset($product_en)) {
    foreach (json_decode($product_en->lr) as $item) {
        $lr[] = [
            'title' => $item->title,
            'description' => $item->description,
            'image' => config('app.url') . $item->image,
        ];
    }
}
@endphp
<div class="form-group">
    <label for="lr_title"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="lr_title" value="{{ old('lr_title', isset($lr[0]['title']) ? $lr[0]['title'] : '') }}"
        class="form-control" id="lr_title">
    @error('lr_title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="lr_description"><i class="flag-icon flag-icon-us mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="lr_description" class="summernote"
        id="lr_description">{{ old('lr_description', isset($lr[0]['description']) ? $lr[0]['description'] : '') }}</textarea>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-btn">
            <a id="lr_image" data-input="lr_image_thumbnail" data-preview="lr_image_holder" class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="lr_image_thumbnail" class="form-control" type="text" name="lr_image"
            value="{{ old('lr_image', isset($lr[0]['image']) ? $lr[0]['image'] : '') }}">
    </div>
    <div id="lr_image_holder" class="img-thumbnail mx-auto d-block mt-3"></div>
</div> <!-- /. Paragraphs Image -->
<!-- /. End of Paragraphs -->
<!-- Diagram and Table -->
<hr>
<h4>Diagram and Table</h4>
@php
$diagrams_and_table = [];

if (isset($product_en)) {
    foreach (json_decode($product_en->diagrams_and_table) as $item) {
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
    <label for="diagram_table_title[]"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="diagram_table_title[]"
        value="{{ old('diagram_table_title[0]', isset($diagrams_and_table[0]['title']) ? $diagrams_and_table[0]['title'] : '') }}"
        class="form-control" id="diagram_table_title1">
    @error('diagram_table_title[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="diagram_table_description1"><i class="flag-icon flag-icon-us mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="diagram_table_description[]" class="summernote"
        id="diagram_table_description1">{{ old('diagram_table_description[0]',isset($diagrams_and_table[0]['description']) ? $diagrams_and_table[0]['description'] : '') }}</textarea>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-btn">
            <a id="diagram_table_image" data-input="diagram_table_image_thumbnail"
                data-preview="diagram_table_image_holder" class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="diagram_table_image_thumbnail" class="form-control" type="text" name="diagram_table_image[]"
            value="{{ old('diagram_table_image[0]',isset($diagrams_and_table[0]['image']['src']) ? $diagrams_and_table[0]['image']['src'] : '') }}">
    </div>
    <div id="diagram_table_image_holder" class="img-thumbnail mx-auto d-block mt-3"></div>
</div> <!-- /. Diagram and Table Image -->
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="diagram_table_image_width[]"><i class="flag-icon flag-icon-us mr-2"></i> Image Width
                <span class="text-danger">*</span></label>
            <input type="text" name="diagram_table_image_width[]"
                value="{{ old('diagram_table_image_width[0]',isset($diagrams_and_table[0]['image']['width']) ? $diagrams_and_table[0]['image']['width'] : '') }}"
                class="form-control" id="diagram_table_image_width1" placeholder="Image Width (px)">
        </div>
    </div> <!-- /. Image width -->
    <div class="col">
        <div class="form-group">
            <label for="diagram_table_image_height[]"><i class="flag-icon flag-icon-us mr-2"></i> Image Height
                <span class="text-danger">*</span></label>
            <input type="text" name="diagram_table_image_height[]"
                value="{{ old('diagram_table_image_height[0]',isset($diagrams_and_table[0]['image']['height']) ? $diagrams_and_table[0]['image']['height'] : '') }}"
                class="form-control" id="diagram_table_image_height1" placeholder="Image Height (px)">
        </div>
    </div> <!-- /. Image height -->
</div> <!-- /. Image width and height -->
<div class="form-group">
    <label for="diagram_table_title[]"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="diagram_table_title[]"
        value="{{ old('diagram_table_title[1]', isset($diagrams_and_table[1]['title']) ? $diagrams_and_table[1]['title'] : '') }}"
        class="form-control" id="diagram_table_title2">
    @error('diagram_table_title[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="diagram_table_description2"><i class="flag-icon flag-icon-us mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="diagram_table_description[]" class="summernote"
        id="diagram_table_description2">{{ old('diagram_table_description[1]',isset($diagrams_and_table[1]['description']) ? $diagrams_and_table[1]['description'] : '') }}</textarea>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-btn">
            <a id="diagram_table_image2" data-input="diagram_table_image_thumbnail2"
                data-preview="diagram_table_image_holder2" class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="diagram_table_image_thumbnail2" class="form-control" type="text" name="diagram_table_image[]"
            value="{{ old('diagram_table_image[1]',isset($diagrams_and_table[1]['image']['src']) ? $diagrams_and_table[1]['image']['src'] : '') }}">
    </div>
    <div id="diagram_table_image_holder2" class="img-thumbnail mx-auto d-block mt-3"></div>
</div> <!-- /. Diagram and Table Image -->
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="diagram_table_image_width[]"><i class="flag-icon flag-icon-us mr-2"></i> Image Width
                <span class="text-danger">*</span></label>
            <input type="text" name="diagram_table_image_width[]"
                value="{{ old('diagram_table_image_width[1]',isset($diagrams_and_table[1]['image']['width']) ? $diagrams_and_table[1]['image']['width'] : '') }}"
                class="form-control" id="diagram_table_image_width2" placeholder="Image Width (px)">
        </div>
    </div> <!-- /. Image width -->
    <div class="col">
        <div class="form-group">
            <label for="diagram_table_image_height[]"><i class="flag-icon flag-icon-us mr-2"></i> Image Height
                <span class="text-danger">*</span></label>
            <input type="text" name="diagram_table_image_height[]"
                value="{{ old('diagram_table_image_height[1]',isset($diagrams_and_table[1]['image']['height']) ? $diagrams_and_table[1]['image']['height'] : '') }}"
                class="form-control" id="diagram_table_image_height2" placeholder="Image Height (px)">
        </div>
    </div> <!-- /. Image height -->
</div> <!-- /. Image width and height -->
<!-- /. End of Diagram and Table -->
<!-- Apply Insurance Block -->
<hr>
<h4>Apply Insurance Block</h4>
<div class="form-group">
    <label for="apply_insurance_title"><i class="flag-icon flag-icon-us mr-2"></i>
        Title
        <span class="text-danger">*</span></label>
    <input type="text" name="apply_insurance_title"
        value="{{ old('apply_insurance_title',isset($product_en) and(isset(json_decode($product_en->apply_insurance)->title)? json_decode($product_en->apply_insurance)->title: '')) }}"
        class="form-control" id="apply_insurance_title">
    @error('apply_insurance_title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="apply_insurance_description"><i class="flag-icon flag-icon-us mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="apply_insurance_description" class="summernote"
        id="apply_insurance_description">{{ old('apply_insurance_description',isset($product_en) and(isset(json_decode($product_en->apply_insurance)->description)? json_decode($product_en->apply_insurance)->description: '')) }}</textarea>
</div>
<div class="form-group">
    <label for="apply_insurance_buttonText"><i class="flag-icon flag-icon-us mr-2"></i> Button Text
        <span class="text-danger">*</span></label>
    <input type="text" name="apply_insurance_buttonText"
        value="{{ old('apply_insurance_buttonText',isset($product_en) and(isset(json_decode($product_en->apply_insurance)->buttonText)? json_decode($product_en->apply_insurance)->buttonText: '')) }}"
        class="form-control" id="apply_insurance_buttonText">
    @error('apply_insurance_buttonText')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<!-- /. End of Apply Insurance Block -->
<!-- Why Work With Us Block -->
<hr>
<h4>Why work with us Block</h4>
<div class="form-group">
    <label for="why_work_title"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="why_work_title"
        value="{{ old('why_work_title',isset($product_en) and(isset(json_decode($product_en->why_work_with_us)->title)? json_decode($product_en->why_work_with_us)->title: '')) }}"
        class="form-control" id="why_work_title">
    @error('why_work_title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="why_work_description"><i class="flag-icon flag-icon-us mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="why_work_description" class="summernote"
        id="why_work_description">{{ old('why_work_description',isset($product_en) and(isset(json_decode($product_en->why_work_with_us)->description)? json_decode($product_en->why_work_with_us)->description: '')) }}</textarea>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-btn">
            <a id="why_work_image" data-input="why_work_image_thumbnail" data-preview="why_work_image_holder"
                class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="why_work_image_thumbnail" class="form-control" type="text"
            value="{{ old('why_work_image',isset($product_en) and(isset(json_decode($product_en->why_work_with_us)->image)? json_decode($product_en->why_work_with_us)->image: '')) }}"
            name="why_work_image">
    </div>
    <div id="why_work_image_holder" class="img-thumbnail mx-auto d-block mt-3"></div>
</div> <!-- /. Why Work With Us Image -->
<!-- /. End of Why Work With Us Block -->
<!-- Additional Benifits -->
<hr>
<h4>Additional Benifits Block</h4>
@php
$additional_benifits_data = [];

if (isset($product_en)) {
    foreach (json_decode($product_en->additional_benifits)->data as $item) {
        $additional_benifits_data[] = [
            'icon' => config('app.url') . $item->icon,
            'text' => $item->text,
        ];
    }
}
@endphp
<div class="form-group">
    <label for="additional_title"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="additional_title"
        value="{{ old('additional_title',isset($product_en) and isset(json_decode($product_en->additional_benifits)->title)? json_decode($product_en->additional_benifits)->title: '') }}"
        class="form-control" id="additional_title">
    @error('additional_title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<hr>
<div class="form-group">
    <label>Icon <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="additional_icon1" data-input="additional_icon_thumbnail1" data-preview="additional_icon_holder"
                class="btn btn-primary lfm">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="additional_icon_thumbnail1" class="form-control" type="text"
            value="{{ old('additional_icon[0]',isset($additional_benifits_data[0]['icon']) ? $additional_benifits_data[0]['icon'] : '') }}"
            name="additional_icon[]">
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <div id="additional_icon_holder" class="img-thumbnail mx-auto d-block"></div>
        </div>
        <div class="col-9">
            <textarea name="additional_iconText[]" class="summernote"
                id="additional_iconText1">{{ old('additional_iconText[0]',isset($additional_benifits_data[0]['text']) ? $additional_benifits_data[0]['text'] : '') }}</textarea>
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
        <input id="additional_icon_thumbnail2" class="form-control" type="text"
            value="{{ old('additional_icon[1]',isset($additional_benifits_data[1]['icon']) ? $additional_benifits_data[1]['icon'] : '') }}"
            name="additional_icon[]">
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <div id="additional_icon_holder2" class="img-thumbnail mx-auto d-block"></div>
        </div>
        <div class="col-9">
            <textarea name="additional_iconText[]" class="summernote"
                id="additional_iconText2">{{ old('additional_iconText[1]',isset($additional_benifits_data[1]['text']) ? $additional_benifits_data[1]['text'] : '') }}</textarea>
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
        <input id="additional_icon_thumbnail3" class="form-control"
            value="{{ old('additional_icon[2]',isset($additional_benifits_data[2]['icon']) ? $additional_benifits_data[2]['icon'] : '') }}"
            type="text" name="additional_icon[]">
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <div id="additional_icon_holder3" class="img-thumbnail mx-auto d-block"></div>
        </div>
        <div class="col-9">
            <textarea name="additional_iconText[]" class="summernote"
                id="additional_iconText3">{{ old('additional_iconText[2]',isset($additional_benifits_data[2]['text']) ? $additional_benifits_data[2]['text'] : '') }}</textarea>
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
        <input id="additional_icon_thumbnail4" class="form-control"
            value="{{ old('additional_icon[3]',isset($additional_benifits_data[3]['icon']) ? $additional_benifits_data[3]['icon'] : '') }}"
            type="text" name="additional_icon[]">
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <div id="additional_icon_holder4" class="img-thumbnail mx-auto d-block"></div>
        </div>
        <div class="col-9">
            <textarea name="additional_iconText[]" class="summernote"
                id="additional_iconText4">{{ old('additional_iconText[3]',isset($additional_benifits_data[3]['text']) ? $additional_benifits_data[3]['text'] : '') }}</textarea>
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
        <input id="additional_icon_thumbnail5" class="form-control" type="text"
            value="{{ old('additional_icon[3]',isset($additional_benifits_data[4]['icon']) ? $additional_benifits_data[4]['icon'] : '') }}"
            name="additional_icon[]">
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <div id="additional_icon_holder5" class="img-thumbnail mx-auto d-block"></div>
        </div>
        <div class="col-9">
            <textarea name="additional_iconText[]" class="summernote"
                id="additional_iconText5">{{ old('additional_iconText[4]',isset($additional_benifits_data[4]['text']) ? $additional_benifits_data[4]['text'] : '') }}</textarea>
        </div>
    </div>
</div> <!-- /. Additional Benefit Image -->
<!-- Additional Benifits -->
<!-- Attachments -->
<hr>
<h4>Attachments</h4>
@php
$attachments = [];

if (isset($product_en)) {
    foreach (json_decode($product_en->attachments) as $item) {
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
    <label for="attachments_title1"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="attachments_title[]"
        value="{{ old('attachments_title[0]', isset($attachments[0]['title']) ? $attachments[0]['title'] : '') }}"
        class="form-control" id="attachments_title1">
    @error('attachments_title[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="attachments_description1"><i class="flag-icon flag-icon-us mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="attachments_description[]" class="summernote"
        id="attachments_description1">{{ old('attachments_description[0]',isset($attachments[0]['description']) ? $attachments[0]['description'] : '') }}</textarea>
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
        <input id="attachments_icon_thumbnail1" class="form-control" type="text"
            value="{{ old('attachments_icon[0]', isset($attachments[0]['icon']) ? $attachments[0]['icon'] : '') }}"
            name="attachments_icon[]">
    </div>
    <div id="attachments_icon_holder1" class="img-thumbnail mx-auto d-block mt-3"></div>
</div> <!-- /. Attachment Image -->
<div class="form-group">
    <label for="attachments_buttonText1"><i class="flag-icon flag-icon-us mr-2"></i> Button Text
        <span class="text-danger">*</span></label>
    <input type="text" name="attachments_buttonText[]"
        value="{{ old('attachments_buttonText[0]', isset($attachments[0]['buttonText']) ? $attachments[0]['buttonText'] : '') }}"
        class="form-control" id="attachments_buttonText1">
</div>
<div class="form-group">
    <label>Product Proposal <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="attachments_proposal1" data-input="attachments_proposal_file1" class="btn btn-primary lfmfile">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="attachments_proposal_file1" class="form-control" type="text"
            value="{{ old('attachments_proposal_file[0]',isset($attachments[0]['proposal_file']) ? $attachments[0]['proposal_file'] : '') }}"
            name="attachments_proposal_file[]">
    </div>
</div> <!-- /. Product Proposal -->
<div class="form-group">
    <label for="attachments_title2"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="attachments_title[]"
        value="{{ old('attachments_title[1]', isset($attachments[1]['title']) ? $attachments[1]['title'] : '') }}"
        class="form-control" id="attachments_title2">
    @error('attachments_title[1]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="attachments_description2"><i class="flag-icon flag-icon-us mr-2"></i>
        Description
        <span class="text-danger">*</span></label>
    <textarea name="attachments_description[]" class="summernote"
        id="attachments_description2">{{ old('attachments_description[1]',isset($attachments[1]['description']) ? $attachments[1]['description'] : '') }}</textarea>
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
        <input id="attachments_icon_thumbnail4" class="form-control" type="text"
            value="{{ old('attachments_icon[1]', isset($attachments[1]['icon']) ? $attachments[1]['icon'] : '') }}"
            name="attachments_icon[]">
    </div>
    <div id="attachments_icon_holder4" class="img-thumbnail mx-auto d-block mt-3"></div>
</div> <!-- /. Attachment Image -->
<div class="form-group">
    <label for="attachments_buttonText2"><i class="flag-icon flag-icon-us mr-2"></i> Button Text
        <span class="text-danger">*</span></label>
    <input type="text" name="attachments_buttonText[]"
        value="{{ old('attachments_buttonText[1]', isset($attachments[1]['buttonText']) ? $attachments[1]['buttonText'] : '') }}"
        class="form-control" id="attachments_buttonText2">
</div>
<div class="form-group">
    <label>Product Proposal <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="attachments_proposal2" data-input="attachments_proposal_file2" class="btn btn-primary lfmfile">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="attachments_proposal_file2" class="form-control" type="text" name="attachments_proposal_file[]"
            value="{{ old('attachments_proposal_file[1]',isset($attachments[1]['proposal_file']) ? $attachments[1]['proposal_file'] : '') }}">
    </div>
</div> <!-- /. Product Proposal -->
<!-- /. End of Attachments -->
<!-- FAQ -->
<hr>
<h4>Frequently Asked Questions</h4>
@php
if(isset($product_en)) {
$faq = json_decode($product_en->faq)->data;
} else {
    $faq = [];
}
@endphp
<div class="form-group">
    <label for="faq_title"><i class="flag-icon flag-icon-us mr-2"></i> Title
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_title"
        value="{{ old('faq_title',isset($product_en) and isset(json_decode($product_en->faq)->title) ? json_decode($product_en->faq)->title : '') }}"
        class="form-control" id="faq_title">
    @error('faq_title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_question_1"><i class="flag-icon flag-icon-us mr-2"></i> Question
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_question[]"
        value="{{ old('faq_question[0]', isset($faq[0]->question) ? $faq[0]->question : '') }}"
        class="form-control" id="faq_question_1">
    @error('faq_question[0]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_answers_1"><i class="flag-icon flag-icon-us mr-2"></i>
        Answers
        <span class="text-danger">*</span></label>
    <textarea name="faq_answers[]" class="summernote"
        id="faq_answers_1">{{ old('faq_answers[0]', isset($faq[0]->answers) ? $faq[0]->answers : '') }}</textarea>
</div>
<div class="form-group">
    <label for="faq_question_2"><i class="flag-icon flag-icon-us mr-2"></i> Question
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_question[]"
        value="{{ old('faq_question[1]', isset($faq[1]->question) ? $faq[1]->question : '') }}"
        class="form-control" id="faq_question_2">
    @error('faq_question[1]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_answers_2"><i class="flag-icon flag-icon-us mr-2"></i>
        Answers
        <span class="text-danger">*</span></label>
    <textarea name="faq_answers[]" class="summernote"
        id="faq_answers_2">{{ old('faq_answers[1]', isset($faq[1]->answers) ? $faq[1]->answers : '') }}</textarea>
</div>
<div class="form-group">
    <label for="faq_question_3"><i class="flag-icon flag-icon-us mr-2"></i> Question
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_question[]"
        value="{{ old('faq_question[2]', isset($faq[2]->question) ? $faq[2]->question : '') }}"
        class="form-control" id="faq_question_3">
    @error('faq_question[2]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_answers_3"><i class="flag-icon flag-icon-us mr-2"></i>
        Answers
        <span class="text-danger">*</span></label>
    <textarea name="faq_answers[]" class="summernote"
        id="faq_answers_3">{{ old('faq_answers[2]', isset($faq[2]->answers) ? $faq[2]->answers : '') }}</textarea>
</div>
<div class="form-group">
    <label for="faq_question_4"><i class="flag-icon flag-icon-us mr-2"></i> Question
        <span class="text-danger">*</span></label>
    <input type="text" name="faq_question[]"
        value="{{ old('faq_question[3]', isset($faq[3]->question) ? $faq[3]->question : '') }}"
        class="form-control" id="faq_question_4">
    @error('faq_question[3]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="faq_answers_4"><i class="flag-icon flag-icon-us mr-2"></i>
        Answers
        <span class="text-danger">*</span></label>
    <textarea name="faq_answers[]" class="summernote"
        id="faq_answers_4">{{ old('faq_answers[3]', isset($faq[3]->answers) ? $faq[3]->answers : '') }}</textarea>
</div>
<!-- /. End of FAQ -->
