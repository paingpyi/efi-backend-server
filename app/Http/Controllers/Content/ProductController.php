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
        $products = $this->getProducts(0, 'products.is_active', '=', true);

        return view('admin.product.list')->with(['products' => $products]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deactivated()
    {
        $products = $this->getProducts(0, 'products.is_active', '=', false);

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
            'title' => 'required|unique:products|max:255',
            'slogan' => 'required|max:255',
            'description' => 'required',
            'benefits' => 'required',
            'table' => 'required',
            'category' => 'required',
            'benefit' => 'required|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'product' => 'required|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('new#product')
                ->withErrors($validator)
                ->withInput();
        }

        $product = [];

        if ($request->file()) {
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

            Product::create($product);

            return redirect()->route('product#list')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
        } else {
            return redirect()->route('new#product');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', '=', Crypt::decryptString($id))->first();
        $product_category = Category::where('is_active', '=', true)->where('parent_id', '=', 1)->get();

        return view('admin.product.add-edit')->with(['action' => 'update', 'product_category' => $product_category, 'product' => $product]);
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
        $parameters = explode('&', $para);
        $locale = '';
        $lang_english = 'en-us';
        $lang_chinese = 'zh-cn';
        $lang_burmese = 'my-mm';
        $conditions = [];

        foreach ($parameters as $check) {
            $value = explode('=', $check);

            if (Str::lower($value[0]) == 'locale') {
                if (isset($value[1])) {
                    $locale = $value[1];
                }
            } else {
                $conditions[] = [
                    'key' => Str::lower($value[0]),
                    'value' => isset($value[1]) ? $value[1] : null,
                ];
            }
        }

        if (Str::lower($locale) == $lang_english) {
            $product_db = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->select(
                    'products.id as id',
                    'products.title as title',
                    'products.slogan',
                    'products.description',
                    'products.benefits_block',
                    'products.benefits_image',
                    'products.table_block',
                    'products.why_block',
                    'products.downloadable_block',
                    'products.applythis_block',
                    'products.product_photo',
                    'products.category_id',
                    'products.is_active as is_active',
                    'products.created_at as created_at',
                    'products.updated_at as updated_at',
                    'categories.name as category_name',
                    'categories.machine as category_machine_name',
                    'categories.description as category_description',
                    'categories.is_active as category_is_active'
                );

            $localeData = ['lang' => 'en-US', 'name' => 'English'];
        } else if (Str::lower($locale) == $lang_burmese) {
            $product_db = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->select(
                    'products.id as id',
                    'products.title_burmese as title',
                    'products.slogan_burmese as slogan',
                    'products.description_burmese as description',
                    'products.benefits_block_burmese as benefits_block',
                    'products.table_block_burmese as table_block',
                    'products.why_block_burmese as why_block',
                    'products.downloadable_block_burmese as downloadable_block',
                    'products.applythis_block_burmese as applythis_block',
                    'products.product_photo',
                    'products.category_id',
                    'products.is_active as is_active',
                    'products.created_at as created_at',
                    'products.updated_at as updated_at',
                    'categories.name_burmese as category_name',
                    'categories.machine as category_machine_name',
                    'categories.description_burmese as category_description',
                    'categories.is_active as category_is_active'
                );

            $localeData = ['lang' => 'my-MM', 'name' => 'Burmese'];
        } else if (Str::lower($locale) == $lang_chinese) {
            $product_db = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->select(
                    'products.id as id',
                    'products.title_chinese as title',
                    'products.slogan_chinese as slogan',
                    'products.description_chinese as description',
                    'products.benefits_block_chinese as benefits_block',
                    'products.table_block_chinese as table_block',
                    'products.why_block_chinese as why_block',
                    'products.downloadable_block_chinese as downloadable_block',
                    'products.applythis_block_chinese as applythis_block',
                    'products.product_photo',
                    'products.category_id',
                    'products.is_active as is_active',
                    'products.created_at as created_at',
                    'products.updated_at as updated_at',
                    'categories.name_chinese as category_name',
                    'categories.machine as category_machine_name',
                    'categories.description_chinese as category_description',
                    'categories.is_active as category_is_active'
                );

            $localeData = ['lang' => 'zh-CN', 'name' => 'Chinese'];
        } else {
            $product_db = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->select(
                    'products.id as id',
                    'products.title as title',
                    'products.slogan',
                    'products.description as description',
                    'products.benefits_block',
                    'products.benefits_image',
                    'products.table_block',
                    'products.why_block',
                    'products.downloadable_block',
                    'products.applythis_block',
                    'products.title_burmese',
                    'products.slogan_burmese',
                    'products.description_burmese',
                    'products.benefits_block_burmese',
                    'products.table_block_burmese',
                    'products.why_block_burmese',
                    'products.downloadable_block_burmese',
                    'products.applythis_block_burmese',
                    'products.title_chinese',
                    'products.slogan_chinese',
                    'products.description_chinese',
                    'products.benefits_block_chinese',
                    'products.table_block_chinese',
                    'products.why_block_chinese',
                    'products.downloadable_block_chinese',
                    'products.applythis_block_chinese',
                    'products.product_photo',
                    'products.category_id',
                    'products.is_active as is_active',
                    'products.created_at as created_at',
                    'products.updated_at as updated_at',
                    'categories.name as category_name',
                    'categories.description as category_description',
                    'categories.name_burmese as category_name_burmese',
                    'categories.description_burmese as category_description_burmese',
                    'categories.name_chinese as category_name_chinese',
                    'categories.description_chinese as category_description_chinese',
                    'categories.machine as category_machine_name',
                    'categories.is_active as category_is_active'
                );

            $localeData = ['lang' => 'en-US/my-MM/zh-CN', 'name' => 'English/Burmese/Chinese'];
        }

        /***
         *
         * Parameters for conditions to retrieve the products
         *
         */
        foreach ($conditions as $con) {
            /***
             *
             * Retrieve products by title
             *
             **/
            if ($con['key'] == 'title') {
                if ($locale == $lang_burmese) {
                    $product_db->where('products.title_burmese', '=', Str::replace('+', ' ', $con['value']));
                } else if ($locale == $lang_chinese) {
                    $product_db->where('products.title_chinese', '=', Str::replace('+', ' ', $con['value']));
                } else {
                    $product_db->where('products.title', '=', Str::replace('+', ' ', $con['value']));
                }
            } //End of retreiving products by title

            /***
             *
             * Retrieve products with order by
             *
             **/
            else if ($con['key'] == 'order') {
                if (isset($con['value'])) {
                    $orderBy = explode(',', $con['value']);

                    if ($orderBy[0] == 'desc') {
                        if (isset($orderBy[1])) {
                            if ($orderBy[1] == 'title') {
                                if ($locale == $lang_burmese) {
                                    $product_db->orderByDesc('products.title_burmese');
                                } else if ($locale == $lang_chinese) {
                                    $product_db->orderByDesc('products.title_chinese');
                                } else {
                                    $product_db->orderByDesc('products.title');
                                }
                            } else if ($orderBy[1] == 'created') {
                                $product_db->orderByDesc('products.created_at');
                            } else if ($orderBy[1] == 'updated') {
                                $product_db->orderByDesc('products.updated_at');
                            } else {
                                $product_db->orderByDesc('products.created_at');
                            }
                        } else {
                            $product_db->orderByDesc('products.created_at');
                        }
                    } else if ($orderBy[0] == 'asc') {
                        if (isset($orderBy[1])) {
                            if ($orderBy[1] == 'title') {
                                if ($locale == $lang_burmese) {
                                    $product_db->orderBy('products.title_burmese');
                                } else if ($locale == $lang_chinese) {
                                    $product_db->orderBy('products.title_chinese');
                                } else {
                                    $product_db->orderBy('products.title');
                                }
                            } else if ($orderBy[1] == 'created') {
                                $product_db->orderBy('products.created_at');
                            } else if ($orderBy[1] == 'updated') {
                                $product_db->orderBy('products.updated_at');
                            } else {
                                $product_db->orderBy('products.created_at');
                            }
                        } else {
                            $product_db->orderBy('products.created_at');
                        }
                    } else {
                        $response = [
                            'code' => 400,
                            'status' => 'Order by key has been mismatched.',
                        ];

                        return response()->json($response);
                    }
                } else {
                    $product_db->orderByDesc('products.created_at');
                }
            } //End of order by
        } //End of conditions

        $products = $product_db->get();

        if ($products->count() > 0) {
            $response = [
                'code' => 200,
                'status' => 'success',
                'locale' => $localeData,
                'data' => $products,
            ];
        } else {
            $response = [
                'code' => 204,
                'status' => 'no content',
            ];
        }

        return response()->json($response);
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
        $data = $request->json()->all();

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

        if ($products->count() > 0) {
            $response = [
                'code' => 200,
                'status' => 'success',
                'locale' => $this->getLang($data),
                'count' => $total_count,
                'data' => $products,
            ];
        } else {
            $response = [
                'code' => 204,
                'status' => 'no content',
            ];
        }

        return response()->json($response);
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
        $data = $request->json()->all();

        if ((isset($data['slug_url']) or isset($data['id'])) and isset($data['locale'])) {
            $product_db = $this->getProductsAPI($data);

            $products = $product_db->first();

            if (isset($products)) {
                $response = [
                    'code' => 200,
                    'status' => 'success',
                    'locale' => $this->getLang($data),
                    'id' => $products->id,
                    'title' => $products->title,
                    'slogan' => $products->slogan,
                    'description' => $products->description,
                    'benefits_block' => $products->benefits_block,
                    'table_block' => $products->table_block,
                    'why_block' => $products->why_block,
                    'downloadable_block' => $products->downloadable_block,
                    'applythis_block' => $products->applythis_block,
                    'benefits_image' => $products->benefits_image,
                    'product_image' => $products->product_image,
                    'slug_url' => $products->slug_url,
                    'is_active' => $products->is_active,
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
                ];
            }
        } else {
            $response = [
                'code' => 400,
                'status' => 'Input JSON must have "locale" and ("id" or "slug_url").',
            ];
        }

        return response()->json($response);
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
        $lang_english = 'en-us';
        $lang_chinese = 'zh-cn';
        $lang_burmese = 'my-mm';

        /*
         * Locale
         *
         * MM for my-MM/Burmese and EN for en-US/English
         */
        if (isset($data['locale']) and Str::lower($data['locale']) == $lang_english) {
            $product_db = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->select(
                    'products.id as id',
                    'products.title as title',
                    'products.slogan',
                    'products.description as description',
                    'products.benefits_block',
                    DB::raw('CONCAT(\'' . Str::replace('/api/products', '', url()->current()) . '\', products.benefits_image) as benefits_image'),
                    'products.table_block',
                    'products.why_block',
                    'products.downloadable_block',
                    'products.applythis_block',
                    DB::raw('CONCAT(\'' . Str::replace('/api/products', '', url()->current()) . '\', products.product_photo) as product_image'),
                    'products.category_id',
                    'products.slug_url',
                    'products.is_active as is_active',
                    'products.created_at as created_at',
                    'products.updated_at as updated_at',
                    'categories.name as category_name',
                    'categories.description as category_description',
                    'categories.machine as category_machine_name',
                    'categories.is_active as category_is_active'
                );
        } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
            $product_db = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->select(
                    'products.id as id',
                    'products.title_chinese as title',
                    'products.slogan_chinese as slogan',
                    'products.description_chinese as description',
                    'products.benefits_block_chinese as benefits_block',
                    DB::raw('CONCAT(\'' . Str::replace('/api/products', '', url()->current()) . '\', products.benefits_image) as benefits_image'),
                    'products.table_block_chinese as table_block',
                    'products.why_block_chinese as why_block',
                    'products.downloadable_block_chinese as downloadable_block',
                    'products.applythis_block_chinese as applythis_block',
                    DB::raw('CONCAT(\'' . Str::replace('/api/products', '', url()->current()) . '\', products.product_photo) as product_image'),
                    'products.category_id',
                    'products.slug_url',
                    'products.is_active as is_active',
                    'products.created_at as created_at',
                    'products.updated_at as updated_at',
                    'categories.name_chinese as category_name',
                    'categories.description_chinese as category_description',
                    'categories.machine as category_machine_name',
                    'categories.is_active as category_is_active'
                );
        } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_burmese) {
            $product_db = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->select(
                    'products.id as id',
                    'products.title_burmese as title',
                    'products.slogan_burmese as slogan',
                    'products.description_burmese as description',
                    'products.benefits_block_burmese as benefits_block',
                    DB::raw('CONCAT(\'' . Str::replace('/api/products', '', url()->current()) . '\', products.benefits_image) as benefits_image'),
                    'products.table_block_burmese as table_block',
                    'products.why_block_burmese as why_block',
                    'products.downloadable_block_burmese as downloadable_block',
                    'products.applythis_block_burmese as applythis_block',
                    DB::raw('CONCAT(\'' . Str::replace('/api/products', '', url()->current()) . '\', products.product_photo) as product_image'),
                    'products.category_id',
                    'products.slug_url',
                    'products.is_active as is_active',
                    'products.created_at as created_at',
                    'products.updated_at as updated_at',
                    'categories.name_burmese as category_name',
                    'categories.description_burmese as category_description',
                    'categories.machine as category_machine_name',
                    'categories.is_active as category_is_active'
                );
        } else {
            $product_db = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->select(
                    'products.id as id',
                    'products.title as title',
                    'products.slogan',
                    'products.description as description',
                    'products.benefits_block',
                    DB::raw('CONCAT(\'' . Str::replace('/api/products', '', url()->current()) . '\', products.benefits_image) as benefits_image'),
                    'products.table_block',
                    'products.why_block',
                    'products.downloadable_block',
                    'products.applythis_block',
                    'products.title_burmese',
                    'products.slogan_burmese',
                    'products.description_burmese',
                    'products.benefits_block_burmese',
                    'products.table_block_burmese',
                    'products.why_block_burmese',
                    'products.downloadable_block_burmese',
                    'products.applythis_block_burmese',
                    'products.title_chinese',
                    'products.slogan_chinese',
                    'products.description_chinese',
                    'products.benefits_block_chinese',
                    'products.table_block_chinese',
                    'products.why_block_chinese',
                    'products.downloadable_block_chinese',
                    'products.applythis_block_chinese',
                    DB::raw('CONCAT(\'' . Str::replace('/api/products', '', url()->current()) . '\', products.product_photo) as product_image'),
                    'products.category_id',
                    'products.slug_url',
                    'products.is_active as is_active',
                    'products.created_at as created_at',
                    'products.updated_at as updated_at',
                    'categories.name as category_name',
                    'categories.description as category_description',
                    'categories.name_burmese as category_name_burmese',
                    'categories.description_burmese as category_description_burmese',
                    'categories.name_chinese as category_name_chinese',
                    'categories.description_chinese as category_description_chinese',
                    'categories.machine as category_machine_name',
                    'categories.is_active as category_is_active'
                );
        }

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
            if (isset($data['locale']) and Str::lower($data['locale']) == $lang_english) {
                $product_db->where('products.title', '=', $data['title']);
            } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
                $product_db->where('products.title_chinese', '=', $data['title']);
            } else {
                $product_db->where('products.title_burmese', '=', $data['title']);
            }
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
            if (isset($data['locale']) and Str::lower($data['locale']) == $lang_english) {
                if (isset($data['order']['orderby']) and Str::lower($data['order']['orderby']) == 'desc') {
                    if (isset($data['order']['field'])) {
                        $product_db->orderByDesc(Str::lower($data['order']['field']));
                    } else {
                        $product_db->orderByDesc('products.title');
                    }
                } else {
                    if (isset($data['order']['field'])) {
                        $product_db->orderBy(Str::lower($data['order']['field']));
                    } else {
                        $product_db->orderBy('products.title');
                    }
                }
            } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
                if (isset($data['order']['orderby']) and Str::lower($data['order']['orderby']) == 'desc') {
                    if (isset($data['order']['field'])) {
                        $product_db->orderByDesc(Str::lower($data['order']['field']) . '_chinese');
                    } else {
                        $product_db->orderByDesc('products.title_chinese');
                    }
                } else {
                    if (isset($data['order']['field'])) {
                        $product_db->orderBy(Str::lower($data['order']['field']) . '_chinese');
                    } else {
                        $product_db->orderBy('products.title_chinese');
                    }
                }
            } else {
                if (isset($data['order']['orderby']) and Str::lower($data['order']['orderby']) == 'desc') {
                    if (isset($data['order']['field'])) {
                        $product_db->orderByDesc(Str::lower($data['order']['field']) . '_burmese');
                    } else {
                        $product_db->orderByDesc('products.title_burmese');
                    }
                } else {
                    if (isset($data['order']['field'])) {
                        $product_db->orderBy(Str::lower($data['order']['field']) . '_burmese');
                    } else {
                        $product_db->orderBy('products.title_burmese');
                    }
                }
            }
        } //End of retreiving products ordered by

        return $product_db;
    }


    private function getProducts($paginate, $search_column = null, $search_operator = null, $search_value = null)
    {
        $product_db = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select(
                'products.id as id',
                'products.title as title',
                'products.slogan',
                'products.description as description',
                'products.benefits_block',
                'products.benefits_image',
                'products.table_block',
                'products.why_block',
                'products.downloadable_block',
                'products.applythis_block',
                'products.title_burmese',
                'products.slogan_burmese',
                'products.description_burmese',
                'products.benefits_block_burmese',
                'products.table_block_burmese',
                'products.why_block_burmese',
                'products.downloadable_block_burmese',
                'products.applythis_block_burmese',
                'products.product_photo',
                'products.category_id',
                'products.is_active as is_active',
                'products.created_at as created_at',
                'products.updated_at as updated_at',
                'categories.name as category_name',
                'categories.description as category_description',
                'categories.is_active as category_is_active'
            );


        if (is_null($search_column) and is_null($search_operator) and is_null($search_value)) {
            if ($paginate > 0) {
                return $product_db->paginate($paginate);
            } else {
                return $product_db->get();
            }
        } else {
            if ($paginate > 0) {
                return $product_db->where($search_column, $search_operator, $search_value)->paginate($paginate);
            } else {
                return $product_db->where($search_column, $search_operator, $search_value)->get();
            }
        }
    }
}
