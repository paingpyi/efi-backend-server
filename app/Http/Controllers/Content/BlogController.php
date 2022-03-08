<?php

namespace App\Http\Controllers\Content;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
            $blog_db = DB::table('blogs')
            ->join('categories', 'categories.id', '=', 'blogs.category_id')
            ->join('users', 'users.id', '=', 'blogs.author_id')
                ->select(
                    'blogs.id as id',
                    'blogs.title as title',
                    'blogs.content as content',
                    'blogs.category_id',
                    'blogs.status as status',
                    'blogs.created_at as created_at',
                    'blogs.updated_at as updated_at',
                    'categories.name as category_name',
                    'categories.description as category_description',
                    'categories.is_active as category_is_active',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );
        } else if ($locale == 'mm') {
            $blog_db = DB::table('blogs')
            ->join('categories', 'categories.id', '=', 'blogs.category_id')
            ->join('users', 'users.id', '=', 'blogs.author_id')
                ->select(
                    'blogs.id as id',
                    'blogs.title_burmese as title_burmese',
                    'blogs.content_burmese as content_burmese',
                    'blogs.category_id',
                    'blogs.status as status',
                    'blogs.created_at as created_at',
                    'blogs.updated_at as updated_at',
                    'categories.name as category_name',
                    'categories.description as category_description',
                    'categories.is_active as category_is_active',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );
        } else {
            $blog_db = DB::table('blogs')
            ->join('categories', 'categories.id', '=', 'blogs.category_id')
            ->join('users', 'users.id', '=', 'blogs.author_id')
                ->select(
                    'blogs.id as id',
                    'blogs.title as title',
                    'blogs.content as content',
                    'blogs.title_burmese as title_burmese',
                    'blogs.content_burmese as content_burmese',
                    'blogs.category_id',
                    'blogs.status as status',
                    'blogs.created_at as created_at',
                    'blogs.updated_at as updated_at',
                    'categories.name as category_name',
                    'categories.description as category_description',
                    'categories.is_active as category_is_active',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );
        }

        /***
         *
         * Parameters for conditions to retrieve the products
         *
         */
        foreach ($conditions as $con) {
            /***
             *
             * Retrieve BLOGs by category name
             *
             **/
            if ($con['key'] == 'cat') {
                $blog_db->where('categories.name', '=', Str::replace('+', ' ', $con['value']));
            } //End of retreiving BLOGs by category name
            /***
             *
             * Retrieve BLOGs by title
             *
             **/
            else if ($con['key'] == 'title') {
                if ($locale == 'mm') {
                    $blog_db->where('blogs.title_burmese', '=', Str::replace('+', ' ', $con['value']));
                } else {
                    $blog_db->where('blogs.title', '=', Str::replace('+', ' ', $con['value']));
                }
            } //End of retreiving BLOGs by title
            /***
             *
             * Retrieve BLOGs by author
             *
             **/
            else if ($con['key'] == 'author') {
                $blog_db->where('users.name', '=', Str::replace('+', ' ', $con['value']));
            } //End of retreiving BLOGs by author

            /***
             *
             * Retrieve BLOGs with order by
             *
             **/
            else if ($con['key'] == 'order') {
                if (isset($con['value'])) {
                    $orderBy = explode(',', $con['value']);

                    if ($orderBy[0] == 'desc') {
                        if (isset($orderBy[1])) {
                            if ($orderBy[1] == 'title') {
                                if ($locale == 'mm') {
                                    $blog_db->orderByDesc('blogs.title_burmese');
                                } else {
                                    $blog_db->orderByDesc('blogs.title');
                                }
                            } else if ($orderBy[1] == 'author') {
                                $blog_db->orderByDesc('users.name');
                            } else if ($orderBy[1] == 'created') {
                                $blog_db->orderByDesc('blogs.created_at');
                            } else if ($orderBy[1] == 'updated') {
                                $blog_db->orderByDesc('blogs.updated_at');
                            } else {
                                $blog_db->orderByDesc('blogs.created_at');
                            }
                        } else {
                            $blog_db->orderByDesc('blogs.created_at');
                        }
                    } else if ($orderBy[0] == 'asc') {
                        if (isset($orderBy[1])) {
                            if ($orderBy[1] == 'title') {
                                if ($locale == 'mm') {
                                    $blog_db->orderBy('blogs.title_burmese');
                                } else {
                                    $blog_db->orderBy('blogs.title');
                                }
                            } else if ($orderBy[1] == 'author') {
                                $blog_db->orderByDesc('users.name');
                            }else if ($orderBy[1] == 'created') {
                                $blog_db->orderBy('blogs.created_at');
                            } else if ($orderBy[1] == 'updated') {
                                $blog_db->orderBy('blogs.updated_at');
                            } else {
                                $blog_db->orderBy('blogs.created_at');
                            }
                        } else {
                            $blog_db->orderBy('blogs.created_at');
                        }
                    } else {
                        $response = [
                            'code' => 400,
                            'status' => 'Order by key has been mismatched.',
                        ];

                        return response()->json($response);
                    }
                } else {
                    $blog_db->orderByDesc('blogs.created_at');
                }
            } //End of order by
        } //End of conditions

        $blogs = $blog_db->get();

        if ($blogs->count() > 0) {
            $response = [
                'code' => 200,
                'status' => 'success',
                'data' => $blogs,
            ];
        } else {
            $response = [
                'code' => 204,
                'status' => 'no content',
            ];
        }

        return response()->json($response);
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
                'blogs.title_burmese as title_burmese',
                'blogs.content_burmese as content_burmese',
                'blogs.category_id',
                'blogs.status as status',
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
