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
use Response;

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
            'benefit' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            'product' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
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
            'benefit' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
            'product' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function list($para = null)
    {
        $parameters = explode('&', $para);
        $locale = '';
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

        if ($locale == 'en') {
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
                    'products.product_photo',
                    'products.category_id',
                    'products.is_active as is_active',
                    'products.created_at as created_at',
                    'products.updated_at as updated_at',
                    'categories.name as category_name',
                    'categories.description as category_description',
                    'categories.is_active as category_is_active'
                );
        } else if ($locale == 'mm') {
            $product_db = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->select(
                    'products.id as id',
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
                    'products.product_photo',
                    'products.category_id',
                    'products.is_active as is_active',
                    'products.created_at as created_at',
                    'products.updated_at as updated_at',
                    'categories.name as category_name',
                    'categories.description as category_description',
                    'categories.is_active as category_is_active'
                );
        }

        foreach ($conditions as $con) {
            if ($con['key'] == 'cat')
            {
                $product_db->where('categories.name', '=', Str::replace('+', ' ', $con['value']));
            }
        }

        $products = $product_db->get();

        if ($products->count() > 0) {
            $response = [
                'code' => 200,
                'status' => 'success',
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

    private function getProducts($paginate, $search_column = null, $search_operator = null, $search_value = null, $locale = 'all')
    {
        if ($locale == 'all') {
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
        } else if ($locale == 'en') {
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
                    'products.product_photo',
                    'products.category_id',
                    'products.is_active as is_active',
                    'products.created_at as created_at',
                    'products.updated_at as updated_at',
                    'categories.name as category_name',
                    'categories.description as category_description',
                    'categories.is_active as category_is_active'
                );
        } else {
            $product_db = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->select(
                    'products.id as id',
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
        }


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
