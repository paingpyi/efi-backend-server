<?php

namespace App\Http\Controllers\Content;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->getBlogs(0);
        $blogs = $this->getBlogs(0, 'blogs.status', '=', 'published');

        return view('admin.blog.list')->with(['blogs' => $blogs]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unpublished()
    {
        $blogs = $this->getBlogs(0, 'blogs.status', '=', 'unpublished');

        return view('admin.blog.list')->with(['blogs' => $blogs]);
    }

    /**
     * Display a drafted blog list.
     *
     * @return \Illuminate\Http\Response
     */
    public function drafted()
    {
        $blogs = $this->getBlogs(0, 'blogs.status', '=', 'draft');

        return view('admin.blog.list')->with(['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog_category = Category::where('is_active', '=', true)->where('parent_id', '=', 2)->get();

        return view('admin.product.add-edit')->with(['action' => 'new', 'blog_category' => $blog_category]);
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
            'slug_url' => 'required|unique:blogs,url_slug',
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
                'products' => isset($request->products) ? json_encode($request->products) : null,
                'featured' => ($request->featured == 'on') ? true : false,
                'image' => '/storage/' . $blogfilePath,
                'status' => $request->status,
                'author_id' => Auth::id(),
            ];

            blog::create($blog);

            return redirect()->route('blog#list')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
        } else {
            return back();
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
        $blog = blog::where('id', '=', Crypt::decryptString($id))->first();
        $blog_category = Category::where('is_active', '=', true)->where('parent_id', '=', 2)->get();
        $blog_products = Product::where('is_active', '=', true)->get();

        return view('admin.blog.add-edit')->with(['action' => 'update', 'blog_category' => $blog_category, 'blog_products' => $blog_products, 'blog' => $blog]);
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
            'content' => 'required',
            'title_burmese' => 'required|max:255',
            'content_burmese' => 'required',
            'slug_url' => 'required',
            'category' => 'required',
            'blog' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('edit#blog')
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
                'products' => isset($request->products) ? json_encode($request->products) : null,
                'featured' => ($request->featured == 'on') ? true : false,
                'image' => '/storage/' . $blogfilePath,
                'status' => $request->status,
                'author_id' => Auth::id(),
            ];
        } else {
            $blog = [
                'title' => $request->title,
                'content' => $request->content,
                'title_burmese' => $request->title_burmese,
                'content_burmese' => $request->content_burmese,
                'url_slug' => $request->slug_url,
                'category_id' => $request->category,
                'products' => isset($request->products) ? json_encode($request->products) : null,
                'featured' => ($request->featured == 'on') ? true : false,
                'status' => $request->status,
                'author_id' => Auth::id(),
            ];
        }

        blog::where('id', '=', $id)->update($blog);

        return redirect()->route('blog#list')->with(['success_message' => 'Successfully <strong>updated!</strong>']);
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
            $blog = blog::where('id', '=', Crypt::decryptString($id))->first();
            $flag = 'unpublished';

            if ($blog->status == 'published') {
                $flag = 'unpublished';
            } else {
                $flag = 'published';
            }

            blog::where('id', '=', Crypt::decryptString($id))->update(['status' => $flag]);

            return redirect()
                ->route('blog#list')
                ->with(['success_message' => 'Successfully <strong>' . $flag . '!</strong>']);
        } catch (DecryptException $e) {
            abort(404, 'Decrypt Exception occured.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function draft($id)
    {
        try {
            blog::where('id', '=', Crypt::decryptString($id))->update(['status' => 'draft']);

            return redirect()
                ->route('blog#list')
                ->with(['success_message' => 'Successfully <strong>drafted!</strong>']);
        } catch (DecryptException $e) {
            abort(404, 'Decrypt Exception occured.');
        }
    }

    private function getBlogs($paginate, $search_column = null, $search_operator = null, $search_value = null)
    {
        $blog_db = DB::table('blogs')
            ->join('categories', 'categories.id', '=', 'blogs.category_id')
            ->join('users', 'users.id', '=', 'blogs.author_id')
            ->select(
                'blogs.id as id',
                'blogs.title as title',
                'blogs.content as content',
                'blogs.image as image',
                'blogs.url_slug',
                'blogs.status',
                'blogs.category_id',
                'blogs.featured as featured',
                'blogs.title_burmese as title_burmese',
                'blogs.content_burmese as content_burmese',
                'blogs.category_id',
                'blogs.status as status',
                'blogs.created_at as created_at',
                'blogs.updated_at as updated_at',
                'categories.name as category_name',
                'categories.description as category_description',
                'categories.is_active as category_is_active',
                'blogs.author_id as author_id',
                'users.name as author_name',
                'users.email as author_email',
                'users.profile_photo_path as author_photo',
                'users.name as author_name',
                'users.email as author_email',
                'users.profile_photo_path as author_photo'
            );

        if (is_null($search_column) and is_null($search_operator) and is_null($search_value)) {
            if ($paginate > 0) {
                return $blog_db->paginate($paginate);
            } else {
                return $blog_db->get();
            }
        } else {
            if ($paginate > 0) {
                return $blog_db->where($search_column, $search_operator, $search_value)->paginate($paginate);
            } else {
                return $blog_db->where($search_column, $search_operator, $search_value)->get();
            }
        }
    }
}
