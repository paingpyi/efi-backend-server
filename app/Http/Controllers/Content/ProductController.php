<?php

namespace App\Http\Controllers\Content;

use Algolia\AlgoliaSearch\Http\Psr7\Response as Psr7Response;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->getProductsAPI(['locale' => 'en-us', 'isActive' => true])->get();

        return view('admin.product.list')->with(['products' => $products]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deactivated()
    {
        $products = $this->getProductsAPI(['locale' => 'en-us', 'isActive' => false])->get();

        return view('admin.product.list')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_category = Category::where('is_active', '=', true)->where('parent_id', '=', 1)->get();

        return view('admin.product.add-edit')->with(['action' => 'new', 'product_category' => $product_category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'title_burmese' => 'required|max:255',
            'title_chinese' => 'required|max:255',
            'lr_title' => 'required|max:255',
            'lr_description' => 'required',
            'lr_title_burmese' => 'required|max:255',
            'lr_description_burmese' => 'required',
            'lr_title_chinese' => 'required|max:255',
            'lr_description_chinese' => 'required',
            'image' => 'required',
            'cover_image' => 'required',
            'category' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('new#product')
                ->withErrors($validator)
                ->withInput();
        }

        $product = [
            'title' => json_encode([
                'en-us' => $request->title,
                'my-mm' => $request->title_burmese,
                'zh-cn' => $request->title_chinese
            ]),
            'slogan' => json_encode([
                'en-us' => $request->slogan,
                'my-mm' => $request->slogan_burmese,
                'zh-cn' => $request->slogan_chinese
            ]),
            'image' => Str::replace(config('app.url'), '', $request->image),
            'cover_image' => Str::replace(config('app.url'), '', $request->cover_image),
            'apply_insurance' => json_encode([
                'en-us' => [
                    'title' => $request->apply_insurance_title,
                    'description' => $request->apply_insurance_description,
                    'buttonText' => $request->apply_insurance_buttonText
                ],
                'my-mm' => [
                    'title' => $request->apply_insurance_title_burmese,
                    'description' => $request->apply_insurance_description_burmese,
                    'buttonText' => $request->apply_insurance_buttonText_burmese
                ],
                'zh-cn' => [
                    'title' => $request->apply_insurance_title_chinese,
                    'description' => $request->apply_insurance_description_chinese,
                    'buttonText' => $request->apply_insurance_buttonText_chinese
                ],
            ]),
            'why_work_with_us' => json_encode([
                'en-us' => [
                    'title' => $request->why_work_title,
                    'description' => $request->why_work_description,
                    'image' => Str::replace(config('app.url'), '', $request->why_work_image),
                ],
                'my-mm' => [
                    'title' => $request->why_work_title_burmese,
                    'description' => $request->why_work_description_burmese,
                    'image' => Str::replace(config('app.url'), '', $request->why_work_image_burmese),
                ],
                'zh-cn' => [
                    'title' => $request->why_work_title_chinese,
                    'description' => $request->why_work_description_chinese,
                    'image' => Str::replace(config('app.url'), '', $request->why_work_image_chinese),
                ],
            ]),
            'lr' => json_encode([
                'en-us' => [
                    [
                        'title' => $request->lr_title,
                        'description' => $request->lr_description,
                        'image' => Str::replace(config('app.url'), '', $request->lr_image)
                    ],
                ],
                'my-mm' => [
                    [
                        'title' => $request->lr_title_burmese,
                        'description' => $request->lr_description_burmese,
                        'image' => Str::replace(config('app.url'), '', $request->lr_image_burmese)
                    ],
                ],
                'zh-cn' => [
                    [
                        'title' => $request->lr_title_chinese,
                        'description' => $request->lr_description_chinese,
                        'image' => Str::replace(config('app.url'), '', $request->lr_image_chinese)
                    ],
                ],
            ]),
            'faq' => json_encode([
                'en-us' => [
                    'title' => $request->faq_title,
                    'data' => [
                        [
                            'question' => $request->faq_question[0],
                            'answers' => $request->faq_answers[0]
                        ],
                        [
                            'question' => $request->faq_question[1],
                            'answers' => $request->faq_answers[1]
                        ],
                        [
                            'question' => $request->faq_question[2],
                            'answers' => $request->faq_answers[2]
                        ],
                        [
                            'question' => $request->faq_question[3],
                            'answers' => $request->faq_answers[3]
                        ],
                    ],
                ],
                'my-mm' => [
                    'title' => $request->faq_title_burmese,
                    'data' => [
                        [
                            'question' => $request->faq_question_burmese[0],
                            'answers' => $request->faq_answers_burmese[0]
                        ],
                        [
                            'question' => $request->faq_question_burmese[1],
                            'answers' => $request->faq_answers_burmese[1]
                        ],
                        [
                            'question' => $request->faq_question_burmese[2],
                            'answers' => $request->faq_answers_burmese[2]
                        ],
                        [
                            'question' => $request->faq_question_burmese[3],
                            'answers' => $request->faq_answers_burmese[3]
                        ],
                    ],
                ],
                'zh-cn' => [
                    'title' => $request->faq_title_chinese,
                    'data' => [
                        [
                            'question' => $request->faq_question_chinese[0],
                            'answers' => $request->faq_answers_chinese[0]
                        ],
                        [
                            'question' => $request->faq_question_chinese[1],
                            'answers' => $request->faq_answers_chinese[1]
                        ],
                        [
                            'question' => $request->faq_question_chinese[2],
                            'answers' => $request->faq_answers_chinese[2]
                        ],
                        [
                            'question' => $request->faq_question_chinese[3],
                            'answers' => $request->faq_answers_chinese[3]
                        ],
                    ],
                ],
            ]),
            'attachments' => json_encode([
                'en-us' => [
                    [
                        'title' => $request->attachments_title[0],
                        'description' => $request->attachments_description[0],
                        'icon' => Str::replace(config('app.url'), '', $request->attachments_icon[0]),
                        'buttonText' => $request->attachments_buttonText[0],
                        'proposal_file' => $request->attachments_proposal_file[0],
                    ],
                    [
                        'title' => $request->attachments_title[1],
                        'description' => $request->attachments_description[1],
                        'icon' => Str::replace(config('app.url'), '', $request->attachments_icon[1]),
                        'buttonText' => $request->attachments_buttonText[1],
                        'proposal_file' => $request->attachments_proposal_file[1],
                    ],
                ],
                'my-mm' => [
                    [
                        'title' => $request->attachments_title_burmese[0],
                        'description' => $request->attachments_description_burmese[0],
                        'icon' => Str::replace(config('app.url'), '', $request->attachments_icon_burmese[0]),
                        'buttonText' => $request->attachments_buttonText_burmese[0],
                        'proposal_file' => $request->attachments_proposal_file_burmese[0],
                    ],
                    [
                        'title' => $request->attachments_title_burmese[1],
                        'description' => $request->attachments_description_burmese[1],
                        'icon' => Str::replace(config('app.url'), '', $request->attachments_icon_burmese[1]),
                        'buttonText' => $request->attachments_buttonText_burmese[1],
                        'proposal_file' => $request->attachments_proposal_file_burmese[1],
                    ],
                ],
                'zh-cn' => [
                    [
                        'title' => $request->attachments_title_chinese[0],
                        'description' => $request->attachments_description_chinese[0],
                        'icon' => Str::replace(config('app.url'), '', $request->attachments_icon_chinese[0]),
                        'buttonText' => $request->attachments_buttonText_chinese[0],
                        'proposal_file' => $request->attachments_proposal_file_chinese[0],
                    ],
                    [
                        'title' => $request->attachments_title_chinese[1],
                        'description' => $request->attachments_description_chinese[1],
                        'icon' => Str::replace(config('app.url'), '', $request->attachments_icon_chinese[1]),
                        'buttonText' => $request->attachments_buttonText_chinese[1],
                        'proposal_file' => $request->attachments_proposal_file_chinese[1],
                    ],
                ],
            ]),
            'additional_benifits' => json_encode([
                'en-us' => [
                    'title' => $request->additional_title,
                    'data' => [
                        [
                            'icon' => Str::replace(config('app.url'), '', $request->additional_icon[0]),
                            'text' => $request->additional_iconText[0],
                        ],
                        [
                            'icon' => Str::replace(config('app.url'), '', $request->additional_icon[1]),
                            'text' => $request->additional_iconText[1],
                        ],
                        [
                            'icon' => Str::replace(config('app.url'), '', $request->additional_icon[2]),
                            'text' => $request->additional_iconText[2],
                        ],
                        [
                            'icon' => Str::replace(config('app.url'), '', $request->additional_icon[3]),
                            'text' => $request->additional_iconText[3],
                        ],
                        [
                            'icon' => Str::replace(config('app.url'), '', $request->additional_icon[4]),
                            'text' => $request->additional_iconText[4],
                        ],
                    ],
                ],
                'my-mm' => [
                    'title' => $request->additional_title_burmese,
                    'data' => [
                        [
                            'icon' => Str::replace(config('app.url'), '', $request->additional_icon_burmese[0]),
                            'text' => $request->additional_iconText_burmese[0],
                        ],
                        [
                            'icon' => Str::replace(config('app.url'), '', $request->additional_icon_burmese[1]),
                            'text' => $request->additional_iconText_burmese[1],
                        ],
                        [
                            'icon' => Str::replace(config('app.url'), '', $request->additional_icon_burmese[2]),
                            'text' => $request->additional_iconText_burmese[2],
                        ],
                        [
                            'icon' => Str::replace(config('app.url'), '', $request->additional_icon_burmese[3]),
                            'text' => $request->additional_iconText_burmese[3],
                        ],
                        [
                            'icon' => Str::replace(config('app.url'), '', $request->additional_icon_burmese[4]),
                            'text' => $request->additional_iconText_burmese[4],
                        ],
                    ],
                ],
                'zh-cn' => [
                    'title' => $request->additional_title_chinese,
                    'data' => [
                        [
                            'icon' => Str::replace(config('app.url'), '', $request->additional_icon_chinese[0]),
                            'text' => $request->additional_iconText_chinese[0],
                        ],
                        [
                            'icon' => Str::replace(config('app.url'), '', $request->additional_icon_chinese[1]),
                            'text' => $request->additional_iconText_chinese[1],
                        ],
                        [
                            'icon' => Str::replace(config('app.url'), '', $request->additional_icon_chinese[2]),
                            'text' => $request->additional_iconText_chinese[2],
                        ],
                        [
                            'icon' => Str::replace(config('app.url'), '', $request->additional_icon_chinese[3]),
                            'text' => $request->additional_iconText_chinese[3],
                        ],
                        [
                            'icon' => Str::replace(config('app.url'), '', $request->additional_icon_chinese[4]),
                            'text' => $request->additional_iconText_chinese[4],
                        ],
                    ],
                ],
            ]),
            'diagrams_and_table' => json_encode([
                'en-us' => [
                    [
                        'title' => $request->diagram_table_title[0],
                        'description' => $request->diagram_table_description[0],
                        'image' => [
                            'src' => Str::replace(config('app.url'), '', $request->diagram_table_image[0]),
                            'width' => $request->diagram_table_image_width[0],
                            'height' => $request->diagram_table_image_height[0]
                        ],
                    ],
                    [
                        'title' => $request->diagram_table_title[1],
                        'description' => $request->diagram_table_description[1],
                        'image' => [
                            'src' => Str::replace(config('app.url'), '', $request->diagram_table_image[1]),
                            'width' => $request->diagram_table_image_width[1],
                            'height' => $request->diagram_table_image_height[1]
                        ],
                    ],
                ],
                'my-mm' => [
                    [
                        'title' => $request->diagram_table_title_burmese[0],
                        'description' => $request->diagram_table_description_burmese[0],
                        'image' => [
                            'src' => Str::replace(config('app.url'), '', $request->diagram_table_image_burmese[0]),
                            'width' => $request->diagram_table_image_width_burmese[0],
                            'height' => $request->diagram_table_image_height_burmese[0]
                        ],
                    ],
                    [
                        'title' => $request->diagram_table_title_burmese[1],
                        'description' => $request->diagram_table_description_burmese[1],
                        'image' => [
                            'src' => Str::replace(config('app.url'), '', $request->diagram_table_image_burmese[1]),
                            'width' => $request->diagram_table_image_width_burmese[1],
                            'height' => $request->diagram_table_image_height_burmese[1]
                        ],
                    ],
                ],
                'zh-cn' => [
                    [
                        'title' => $request->diagram_table_title_chinese[0],
                        'description' => $request->diagram_table_description_chinese[0],
                        'image' => [
                            'src' => Str::replace(config('app.url'), '', $request->diagram_table_image_chinese[0]),
                            'width' => $request->diagram_table_image_width_chinese[0],
                            'height' => $request->diagram_table_image_height_chinese[0]
                        ],
                    ],
                    [
                        'title' => $request->diagram_table_title_chinese[1],
                        'description' => $request->diagram_table_description_chinese[1],
                        'image' => [
                            'src' => Str::replace(config('app.url'), '', $request->diagram_table_image_chinese[1]),
                            'width' => $request->diagram_table_image_width_chinese[1],
                            'height' => $request->diagram_table_image_height_chinese[1]
                        ],
                    ],
                ],
            ]),
            'category_id' => $request->category,
            'is_active' => ($request->is_active == 'on') ? TRUE : FALSE,
            'is_home' => ($request->is_home == 'on') ? TRUE : FALSE,
            'slug_url' => Str::slug($request->title, '-'),
            'quote_machine_name' => 'quotes/general/' . Str::slug($request->title, '-'),
            'claim_machine_name' => 'claim/general/' . Str::slug($request->title, '-'),
        ];

        Product::create($product);

        return redirect()->route('product#list')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_EN = $this->getProductsAPI(['locale' => 'en-us', 'id' => Crypt::decryptString($id)])->first();
        $product_MM = $this->getProductsAPI(['locale' => 'my-mm', 'id' => Crypt::decryptString($id)])->first();
        $product_ZH = $this->getProductsAPI(['locale' => 'zh-cn', 'id' => Crypt::decryptString($id)])->first();
        $product_category = Category::where('is_active', '=', true)->where('parent_id', '=', 1)->get();

        return view('admin.product.add-edit')->with(['action' => 'update', 'product_category' => $product_category, 'product_en' => $product_EN, 'product_mm' => $product_MM, 'product_zh' => $product_ZH]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'slogan' => 'required|max:255',
            'description' => 'required',
            'benefits' => 'required',
            'table' => 'required',
            'category' => 'required',
            'benefit' => 'nullable|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'product' => 'nullable|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('edit#product', Crypt::encryptString($id))
                ->withErrors($validator)
                ->withInput();
        }

        $product = [];

        if ($request->file()) {
            if (!is_null($request->benefit) and !is_null($request->product)) {
                $benefitfileName = time() . '_' . $request->benefit->getClientOriginalName();
                $benefitfilePath = $request->file('benefit')->storeAs('uploads', $benefitfileName, 'public');

                $productfileName = time() . '_' . $request->product->getClientOriginalName();
                $productfilePath = $request->file('product')->storeAs('uploads', $productfileName, 'public');

                $product = [
                    'title' => $request->title,
                    'slogan' => $request->slogan,
                    'description' => $request->description,
                    'benefits_block' => $request->benefits,
                    'benefits_image' => '/storage/' . $benefitfilePath,
                    'table_block' => $request->table,
                    'why_block' => $request->why,
                    'downloadable_block' => $request->downloadable,
                    'applythis_block' => $request->applythis,
                    'title_burmese' => $request->title_burmese,
                    'slogan_burmese' => $request->slogan_burmese,
                    'description_burmese' => $request->description_burmese,
                    'benefits_block_burmese' => $request->benefits_burmese,
                    'table_block_burmese' => $request->table_burmese,
                    'why_block_burmese' => $request->why_burmese,
                    'downloadable_block_burmese' => $request->downloadable_burmese,
                    'applythis_block_burmese' => $request->applythis_burmese,
                    'title_chinese' => $request->title_chinese,
                    'slogan_chinese' => $request->slogan_chinese,
                    'description_chinese' => $request->description_chinese,
                    'benefits_block_chinese' => $request->benefits_chinese,
                    'table_block_chinese' => $request->table_chinese,
                    'why_block_chinese' => $request->why_chinese,
                    'downloadable_block_chinese' => $request->downloadable_chinese,
                    'applythis_block_chinese' => $request->applythis_chinese,
                    'category_id' => $request->category,
                    'product_photo' => '/storage/' . $productfilePath,
                    'is_active' => ($request->is_active == 'on') ? true : false,
                    'slug_url' => Str::slug($request->title, '-'),
                ];
            } else if (!is_null($request->benefit)) {
                $benefitfileName = time() . '_' . $request->benefit->getClientOriginalName();
                $benefitfilePath = $request->file('benefit')->storeAs('uploads', $benefitfileName, 'public');

                $product = [
                    'title' => $request->title,
                    'slogan' => $request->slogan,
                    'description' => $request->description,
                    'benefits_block' => $request->benefits,
                    'benefits_image' => '/storage/' . $benefitfilePath,
                    'table_block' => $request->table,
                    'why_block' => $request->why,
                    'downloadable_block' => $request->downloadable,
                    'applythis_block' => $request->applythis,
                    'title_burmese' => $request->title_burmese,
                    'slogan_burmese' => $request->slogan_burmese,
                    'description_burmese' => $request->description_burmese,
                    'benefits_block_burmese' => $request->benefits_burmese,
                    'table_block_burmese' => $request->table_burmese,
                    'why_block_burmese' => $request->why_burmese,
                    'downloadable_block_burmese' => $request->downloadable_burmese,
                    'applythis_block_burmese' => $request->applythis_burmese,
                    'title_chinese' => $request->title_chinese,
                    'slogan_chinese' => $request->slogan_chinese,
                    'description_chinese' => $request->description_chinese,
                    'benefits_block_chinese' => $request->benefits_chinese,
                    'table_block_chinese' => $request->table_chinese,
                    'why_block_chinese' => $request->why_chinese,
                    'downloadable_block_chinese' => $request->downloadable_chinese,
                    'applythis_block_chinese' => $request->applythis_chinese,
                    'category_id' => $request->category,
                    'is_active' => ($request->is_active == 'on') ? true : false,
                ];
            } else if (!is_null($request->product)) {
                $productfileName = time() . '_' . $request->product->getClientOriginalName();
                $productfilePath = $request->file('product')->storeAs('uploads', $productfileName, 'public');

                $product = [
                    'title' => $request->title,
                    'slogan' => $request->slogan,
                    'description' => $request->description,
                    'benefits_block' => $request->benefits,
                    'table_block' => $request->table,
                    'why_block' => $request->why,
                    'downloadable_block' => $request->downloadable,
                    'applythis_block' => $request->applythis,
                    'title_burmese' => $request->title_burmese,
                    'slogan_burmese' => $request->slogan_burmese,
                    'description_burmese' => $request->description_burmese,
                    'benefits_block_burmese' => $request->benefits_burmese,
                    'table_block_burmese' => $request->table_burmese,
                    'why_block_burmese' => $request->why_burmese,
                    'downloadable_block_burmese' => $request->downloadable_burmese,
                    'applythis_block_burmese' => $request->applythis_burmese,
                    'title_chinese' => $request->title_chinese,
                    'slogan_chinese' => $request->slogan_chinese,
                    'description_chinese' => $request->description_chinese,
                    'benefits_block_chinese' => $request->benefits_chinese,
                    'table_block_chinese' => $request->table_chinese,
                    'why_block_chinese' => $request->why_chinese,
                    'downloadable_block_chinese' => $request->downloadable_chinese,
                    'applythis_block_chinese' => $request->applythis_chinese,
                    'category_id' => $request->category,
                    'product_photo' => '/storage/' . $productfilePath,
                    'is_active' => ($request->is_active == 'on') ? true : false,
                ];
            } else {
                $product = [
                    'title' => $request->title,
                    'slogan' => $request->slogan,
                    'description' => $request->description,
                    'benefits_block' => $request->benefits,
                    'table_block' => $request->table,
                    'why_block' => $request->why,
                    'downloadable_block' => $request->downloadable,
                    'applythis_block' => $request->applythis,
                    'title_burmese' => $request->title_burmese,
                    'slogan_burmese' => $request->slogan_burmese,
                    'description_burmese' => $request->description_burmese,
                    'benefits_block_burmese' => $request->benefits_burmese,
                    'table_block_burmese' => $request->table_burmese,
                    'why_block_burmese' => $request->why_burmese,
                    'downloadable_block_burmese' => $request->downloadable_burmese,
                    'applythis_block_burmese' => $request->applythis_burmese,
                    'title_chinese' => $request->title_chinese,
                    'slogan_chinese' => $request->slogan_chinese,
                    'description_chinese' => $request->description_chinese,
                    'benefits_block_chinese' => $request->benefits_chinese,
                    'table_block_chinese' => $request->table_chinese,
                    'why_block_chinese' => $request->why_chinese,
                    'downloadable_block_chinese' => $request->downloadable_chinese,
                    'applythis_block_chinese' => $request->applythis_chinese,
                    'category_id' => $request->category,
                    'is_active' => ($request->is_active == 'on') ? true : false,
                ];
            }
        } else {
            $product = [
                'title' => $request->title,
                'slogan' => $request->slogan,
                'description' => $request->description,
                'benefits_block' => $request->benefits,
                'table_block' => $request->table,
                'why_block' => $request->why,
                'downloadable_block' => $request->downloadable,
                'applythis_block' => $request->applythis,
                'title_burmese' => $request->title_burmese,
                'slogan_burmese' => $request->slogan_burmese,
                'description_burmese' => $request->description_burmese,
                'benefits_block_burmese' => $request->benefits_burmese,
                'table_block_burmese' => $request->table_burmese,
                'why_block_burmese' => $request->why_burmese,
                'downloadable_block_burmese' => $request->downloadable_burmese,
                'applythis_block_burmese' => $request->applythis_burmese,
                'title_chinese' => $request->title_chinese,
                'slogan_chinese' => $request->slogan_chinese,
                'description_chinese' => $request->description_chinese,
                'benefits_block_chinese' => $request->benefits_chinese,
                'table_block_chinese' => $request->table_chinese,
                'why_block_chinese' => $request->why_chinese,
                'downloadable_block_chinese' => $request->downloadable_chinese,
                'applythis_block_chinese' => $request->applythis_chinese,
                'category_id' => $request->category,
                'is_active' => ($request->is_active == 'on') ? true : false,
            ];
        }

        Product::where('id', '=', $id)->update($product);

        return redirect()->route('product#list')->with(['success_message' => 'Successfully <strong>updated!</strong>']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::where('id', '=', Crypt::decryptString($id))->first();
            $flag = false;
            $message = 'deactivated';

            if ($product->is_active) {
                $flag = false;
                $message = 'deactivated';
            } else {
                $flag = true;
                $message = 'activated';
            }

            Product::where('id', '=', Crypt::decryptString($id))->update(['is_active' => $flag]);

            return redirect()
                ->route('product#list')
                ->with(['success_message' => 'Successfully <strong>' . $message . '!</strong>']);
        } catch (DecryptException $e) {
            abort(404, 'Decrypt Exception occured.');
        }
    }

    /*
     * API Methods
     *
     * @return \Illuminate\Http\Response
     */
    public function getlist($para = null)
    {
    }

    /**
     * API List with Post data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postList(Request $request)
    {
        // Variables
        $response_code = 200;
        $data = $request->json()->all();
        $result = [];

        $product_db = $this->getProductsAPI($data);

        /*
        * Record count
        */
        $count_db = $product_db;

        $total_count = $count_db->count();
        // End of record count

        /*
         * Limit the number of results.
         */
        if (isset($data['limit'])) {
            if (isset($data['page'])) {
                $product_db->skip($data['page'])->take($data['limit']);
            } else {
                $product_db->skip(0)->take($data['limit']);
            }
        } // End of limit the number of results.

        $products = $product_db->get();

        foreach ($products as $row) {
            $why_work_with_us = [
                'title' => json_decode($row->why_work_with_us)->title,
                'description' => json_decode($row->why_work_with_us)->description,
                'image' => config('app.url') . json_decode($row->why_work_with_us)->image,
            ];

            $lr = [];
            foreach (json_decode($row->lr) as $item) {
                $lr[] = [
                    'title' => $item->title,
                    'description' => $item->description,
                    'image' => config('app.url') . $item->image,
                ];
            }
            $attachments = [];
            foreach (json_decode($row->attachments) as $item) {
                $attachments[] = [
                    'title' => $item->title,
                    'description' => $item->description,
                    'icon' => config('app.url') . $item->icon,
                    'buttonText' => $item->buttonText,
                    'proposal_file' => config('app.url') . $item->proposal_file,
                ];
            }

            $additional_benifits_data = [];
            foreach (json_decode($row->additional_benifits)->data as $item) {
                $additional_benifits_data[] = [
                    'icon' => config('app.url') . $item->icon,
                    'text' => $item->text,
                ];
            }

            $additional_benifits = [
                'title' => json_decode($row->additional_benifits)->title,
                'data' => $additional_benifits_data,
            ];

            $diagrams_and_table = [];
            foreach (json_decode($row->diagrams_and_table) as $item) {
                $diagrams_and_table[] = [
                    'title' => $item->title,
                    'description' => $item->description,
                    'image' => [
                        'src' => config('app.url') . $item->image->src,
                        'width' => $item->image->width,
                        'height' => $item->image->height
                    ]
                ];
            }

            $result[] = [
                'id' => $row->id,
                'title' => Str::replace('"', '', $row->title),
                'slogan' => Str::replace('"', '', $row->slogan),
                'image' => config('app.url') . $row->image,
                'cover_image' => config('app.url') . $row->cover_image,
                'apply_insurance' => json_decode($row->apply_insurance),
                'why_work_with_us' => $why_work_with_us,
                'lr' => $lr,
                'faq' => json_decode($row->faq),
                'attachments' => $attachments,
                'additional_benifits' => $additional_benifits,
                'diagrams_and_table' => $diagrams_and_table,
                'slug_url' => $row->slug_url,
                'is_active' => $row->is_active,
                'is_home' => $row->is_home,
                'quote_machine_name' => $row->quote_machine_name,
                'claim_machine_name' => $row->claim_machine_name,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
                'category_id' => $row->category_id,
                'category_name' => $row->category_name,
                'category_description' => $row->category_description,
                'category_machine_name' => $row->category_machine_name,
                'category_is_active' => $row->category_is_active,
            ];
        }

        if ($products->count() > 0) {
            $response = [
                'code' => 200,
                'status' => 'success',
                'locale' => $this->getLang($data),
                'count' => $total_count,
                'data' => $result,
            ];
        } else {
            $response = [
                'code' => 200,
                'status' => 'no content',
                'locale' => $this->getLang($data),
                'count' => $total_count,
                'data' => [],
            ];

            $response_code = 200;
        }

        return response()->json($response, $response_code);
    }

    /**
     * API List with Post data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postDetail(Request $request)
    {
        // Variables
        $response_code = 200;
        $data = $request->json()->all();

        if ((isset($data['slug_url']) or isset($data['id'])) and isset($data['locale'])) {
            $product_db = $this->getProductsAPI($data);

            $products = $product_db->first();

            if (isset($products)) {
                $why_work_with_us = [
                    'title' => json_decode($products->why_work_with_us)->title,
                    'description' => json_decode($products->why_work_with_us)->description,
                    'image' => config('app.url') . json_decode($products->why_work_with_us)->image,
                ];

                $lr = [];
                foreach (json_decode($products->lr) as $item) {
                    $lr[] = [
                        'title' => $item->title,
                        'description' => $item->description,
                        'image' => config('app.url') . $item->image,
                    ];
                }
                $attachments = [];
                foreach (json_decode($products->attachments) as $item) {
                    $attachments[] = [
                        'title' => $item->title,
                        'description' => $item->description,
                        'icon' => config('app.url') . $item->icon,
                        'buttonText' => $item->buttonText,
                        'proposal_file' => config('app.url') . $item->proposal_file,
                    ];
                }

                $additional_benifits_data = [];
                foreach (json_decode($products->additional_benifits)->data as $item) {
                    $additional_benifits_data[] = [
                        'icon' => config('app.url') . $item->icon,
                        'text' => $item->text,
                    ];
                }

                $additional_benifits = [
                    'title' => json_decode($products->additional_benifits)->title,
                    'data' => $additional_benifits_data,
                ];

                $diagrams_and_table = [];
                foreach (json_decode($products->diagrams_and_table) as $item) {
                    $diagrams_and_table[] = [
                        'title' => $item->title,
                        'description' => $item->description,
                        'image' => [
                            'src' => config('app.url') . $item->image->src,
                            'width' => $item->image->width,
                            'height' => $item->image->height
                        ]
                    ];
                }

                $response = [
                    'code' => 200,
                    'status' => 'success',
                    'locale' => $this->getLang($data),
                    'id' => $products->id,
                    'title' => Str::replace('"', '', $products->title),
                    'slogan' => Str::replace('"', '', $products->slogan),
                    'image' => config('app.url') . $products->image,
                    'cover_image' => config('app.url') . $products->cover_image,
                    'apply_insurance' => json_decode($products->apply_insurance),
                    'why_work_with_us' => $why_work_with_us,
                    'lr' => $lr,
                    'faq' => json_decode($products->faq),
                    'attachments' => $attachments,
                    'additional_benifits' => $additional_benifits,
                    'diagrams_and_table' => $diagrams_and_table,
                    'slug_url' => $products->slug_url,
                    'is_home' => $products->is_home,
                    'is_active' => $products->is_active,
                    'quote_machine_name' => $products->quote_machine_name,
                    'claim_machine_name' => $products->claim_machine_name,
                    'created_at' => $products->created_at,
                    'updated_at' => $products->updated_at,
                    'category_id' => $products->category_id,
                    'category_name' => $products->category_name,
                    'category_description' => $products->category_description,
                    'category_machine_name' => $products->category_machine_name,
                    'category_is_active' => $products->category_is_active,
                ];
            } else {
                $response = [
                    'code' => 404,
                    'status' => 'no content',
                    'data' => []
                ];

                $response_code = 404;
            }
        } else {
            $response = [
                'code' => 400,
                'status' => 'Input JSON must have "locale" and ("id" or "slug_url").',
            ];

            $response_code = 400;
        }

        return response()->json($response, $response_code);
    }

    private function getLang($data)
    {
        $lang_english = 'en-us';
        $lang_chinese = 'zh-cn';
        $lang_burmese = 'my-mm';

        if (isset($data['locale']) and Str::lower($data['locale']) == $lang_english) {
            return ['lang' => 'en-US', 'name' => 'English'];
        } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
            return ['lang' => 'zh-CN', 'name' => 'Chinese'];
        } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_burmese) {
            return ['lang' => 'my-MM', 'name' => 'Burmese'];
        } else {
            return ['lang' => 'en-US/my-MM/zh-CN', 'name' => 'English/Burmese/Chinese'];
        }
    }

    private function getProductsAPI($data)
    {
        $lang_chinese = 'zh-cn';
        $lang_burmese = 'my-mm';

        $product_db = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select(
                'products.id',
                DB::raw('JSON_EXTRACT(products.title, \'$."' . Str::lower($data['locale']) . '"\') as title'),
                DB::raw('JSON_EXTRACT(products.slogan, \'$."' . Str::lower($data['locale']) . '"\') as slogan'),
                'products.image as image',
                'products.cover_image as cover_image',
                DB::raw('JSON_EXTRACT(products.apply_insurance, \'$."' . Str::lower($data['locale']) . '"\') as apply_insurance'),
                DB::raw('JSON_EXTRACT(products.why_work_with_us, \'$."' . Str::lower($data['locale']) . '"\') as why_work_with_us'),
                DB::raw('JSON_EXTRACT(products.lr, \'$."' . Str::lower($data['locale']) . '"\') as lr'),
                DB::raw('JSON_EXTRACT(products.faq, \'$."' . Str::lower($data['locale']) . '"\') as faq'),
                DB::raw('JSON_EXTRACT(products.attachments, \'$."' . Str::lower($data['locale']) . '"\') as attachments'),
                DB::raw('JSON_EXTRACT(products.additional_benifits, \'$."' . Str::lower($data['locale']) . '"\') as additional_benifits'),
                DB::raw('JSON_EXTRACT(products.diagrams_and_table, \'$."' . Str::lower($data['locale']) . '"\') as diagrams_and_table'),
                'products.is_active',
                'products.is_home',
                'products.slug_url',
                'products.quote_machine_name',
                'products.claim_machine_name',
                'products.created_at',
                'products.updated_at',
                'products.category_id',
                'categories.name as category_name',
                'categories.description as category_description',
                'categories.machine as category_machine_name',
                'categories.is_active as category_is_active'
            );

        /***
         *
         * Retrieve products by id
         *
         **/
        if (isset($data['id'])) {
            $product_db->where('products.id', '=', $data['id']);
        } //End of retreiving products by id

        /***
         *
         * Retrieve products by title
         *
         **/
        if (isset($data['title'])) {
            $product_db->where(DB::raw('JSON_EXTRACT(products.title, \'$."' . Str::lower($data['locale']) . '"\')'), '=', $data['title']);
        } //End of retreiving products by title

        /***
         *
         * Retrieve products by title
         *
         **/
        if (isset($data['keyword'])) {
            $product_db
                ->where(DB::raw('JSON_EXTRACT(products.title, \'$."' . Str::lower($data['locale']) . '"\')'), 'LIKE', "%{$data['keyword']}%")
                ->orWhere('categories.name', 'LIKE', "%{$data['keyword']}%");
        } //End of retreiving products by title

        /***
         *
         * Retrieve products by isActive
         *
         **/
        if (isset($data['isActive'])) {
            $product_db->where('products.is_active', '=', $data['isActive']);
        } //End of retreiving products by isActive

        /***
         *
         * Retrieve products by isActive
         *
         **/
        if (isset($data['isHome'])) {
            $product_db->where('products.is_home', '=', $data['isHome']);
        } //End of retreiving products by isActive

        /***
         *
         * Retrieve products by created date
         *
         **/
        if (isset($data['created'])) {
            $product_db->whereDate('products.created_at', '=', date("Y-m-d", strtotime($data['created'])));
        } //End of retreiving products by created date

        /***
         *
         * Retrieve products by category name
         *
         **/
        if (isset($data['category'])) {
            if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
                $product_db->where('categories.name_chinese', '=', $data['category']);
            } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_burmese) {
                $product_db->where('categories.name_burmese', '=', $data['category']);
            } else {
                $product_db->where('categories.name', '=', $data['category']);
            }
        } //End of retreiving products by category name

        /***
         *
         * Retrieve products by category's machine name
         *
         **/
        if (isset($data['category_machine_name'])) {
            $product_db->where('categories.machine', '=', $data['category_machine_name']);
        } // End of products by category's machine name

        /***
         *
         * Retrieve products by slug
         *
         **/
        if (isset($data['slug_url'])) {
            $product_db->where('products.slug_url', '=', $data['slug_url']);
        } //End of retreiving products by slug

        /***
         *
         * Retrieve products ordered by
         *
         **/
        if (isset($data['order'])) {
            if (isset($data['order']['orderby']) and Str::lower($data['order']['orderby']) == 'desc') {
                $product_db->orderByDesc(Str::lower($data['order']['field']));
            } else {
                $product_db->orderBy(Str::lower($data['order']['field']));
            }
        } //End of retreiving products ordered by

        return $product_db;
    }
}
