<?php

namespace App\Http\Controllers\Content;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $blog_category = Category::where('is_active', '=', true)->where('parent_id', '=', 2)->get();
        $blog_products = Product::where('is_active', '=', true)->get();

        return view('admin.blog.add-edit')->with(['action' => 'new', 'blog_category' => $blog_category, 'blog_products' => $blog_products]);
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
            'title' => 'required|unique:blogs|max:255',
            'content' => 'required',
            'title_burmese' => 'required|unique:blogs|max:255',
            'content_burmese' => 'required',
            'slug_url' => 'required|unique:blogs',
            'category' => 'required',
            'blog' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('new#blog')
                ->withErrors($validator)
                ->withInput();
        }

        $blog = [];

        if ($request->file()) {
            $blogfileName = time() . '_' . $request->blog->getClientOriginalName();
            $blogfilePath = $request->file('blog')->storeAs('uploads', $blogfileName, 'public');

            $blog = [
                'title' => $request->title,
                'content' => $request->content,
                'title_burmese' => $request->title_burmese,
                'content_burmese' => $request->content_burmese,
                'url_slug' => $request->slug_url,
                'category_id' => $request->category,
                'products' => json_encode($request->products),
                'featured' => ($request->featured == 'on') ? true : false,
                'image' => '/storage/' . $blogfileName,
                'status' => $request->status,
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function getBlogs($paginate, $search_column = null, $search_operator = null, $search_value = null)
    {
        $product_db = DB::table('blogs')
            ->join('categories', 'categories.id', '=', 'blogs.category_id')
            ->join('users', 'users.id', '=', 'blogs.author_id')
            ->select(
                'blogs.id as id',
                'blogs.title as title',
                'blogs.slogan',
                'blogs.description as description',
                'blogs.benefits_block',
                'blogs.benefits_image',
                'blogs.table_block',
                'blogs.why_block',
                'blogs.downloadable_block',
                'blogs.applythis_block',
                'blogs.title_burmese',
                'blogs.slogan_burmese',
                'blogs.description_burmese',
                'blogs.benefits_block_burmese',
                'blogs.table_block_burmese',
                'blogs.why_block_burmese',
                'blogs.downloadable_block_burmese',
                'blogs.applythis_block_burmese',
                'blogs.product_photo',
                'blogs.category_id',
                'blogs.is_active as is_active',
                'blogs.created_at as created_at',
                'blogs.updated_at as updated_at',
                'categories.name as category_name',
                'categories.description as category_description',
                'categories.is_active as category_is_active',
                'users.name as author_name',
                'users.email as author_email',
                'users.profile_photo_path as author_photo'
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
