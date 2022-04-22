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
            'title_chinese' => 'required|unique:blogs|max:255',
            'content_chinese' => 'required',
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
                'title_chinese' => $request->title_chinese,
                'content_chinese' => $request->content_chinese,
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
            'title_chinese' => 'required|max:255',
            'content_chinese' => 'required',
            'slug_url' => 'required',
            'category' => 'required',
            'blog' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('edit#blog', Crypt::encryptString($id))
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
                'title_chinese' => $request->title_chinese,
                'content_chinese' => $request->content_chinese,
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
                'title_chinese' => $request->title_chinese,
                'content_chinese' => $request->content_chinese,
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
    public function getList($para = null)
    {
        // Variables
        $lang_english = 'en-us';
        $lang_chinese = 'zh-cn';
        $lang_burmese = 'my-mm';
        $localeData = [];

        $parameters = explode('&', $para);
        $locale = '';
        $conditions = [];

        foreach ($parameters as $check) {
            $value = explode('=', $check);

            if (Str::lower($value[0]) == 'locale') {
                if (isset($value[1])) {
                    $locale = Str::lower($value[1]);
                }
            } else {
                $conditions[] = [
                    'key' => Str::lower($value[0]),
                    'value' => isset($value[1]) ? $value[1] : null,
                ];
            }
        }

        if ($locale == $lang_english) {
            $blog_db = DB::table('blogs')
                ->join('categories', 'categories.id', '=', 'blogs.category_id')
                ->join('users', 'users.id', '=', 'blogs.author_id')
                ->select(
                    'blogs.id as id',
                    'blogs.title as title',
                    'blogs.content as content',
                    'blogs.category_id',
                    'blogs.products as related_products',
                    'blogs.status as status',
                    'blogs.url_slug as url_slug',
                    'blogs.featured as featured',
                    'blogs.image as image',
                    'blogs.products as related_products',
                    'blogs.created_at as created_at',
                    'blogs.updated_at as updated_at',
                    'categories.name as category_name',
                    'categories.description as category_description',
                    'categories.is_active as category_is_active',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );

            $localeData = ['lang' => 'en-US', 'name' => 'English'];
        } else if ($locale == $lang_burmese) {
            $blog_db = DB::table('blogs')
                ->join('categories', 'categories.id', '=', 'blogs.category_id')
                ->join('users', 'users.id', '=', 'blogs.author_id')
                ->select(
                    'blogs.id as id',
                    'blogs.title_burmese as title',
                    'blogs.content_burmese as content',
                    'blogs.category_id',
                    'blogs.products as related_products',
                    'blogs.status as status',
                    'blogs.url_slug as slug_url',
                    'blogs.featured as featured',
                    'blogs.image as image',
                    'blogs.products as related_products',
                    'blogs.created_at as created_at',
                    'blogs.updated_at as updated_at',
                    'categories.name_burmese as category_name',
                    'categories.description_burmese as category_description',
                    'categories.is_active as category_is_active',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );

            $localeData = ['lang' => 'my-MM', 'name' => 'Burmese'];
        } else if ($locale == $lang_chinese) {
            $blog_db = DB::table('blogs')
                ->join('categories', 'categories.id', '=', 'blogs.category_id')
                ->join('users', 'users.id', '=', 'blogs.author_id')
                ->select(
                    'blogs.id as id',
                    'blogs.title_chinese as title',
                    'blogs.content_chinese as content',
                    'blogs.category_id',
                    'blogs.products as related_products',
                    'blogs.status as status',
                    'blogs.url_slug as url_slug',
                    'blogs.featured as featured',
                    'blogs.image as image',
                    'blogs.products as related_products',
                    'blogs.created_at as created_at',
                    'blogs.updated_at as updated_at',
                    'categories.name_chinese as category_name',
                    'categories.description_chinese as category_description',
                    'categories.is_active as category_is_active',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );

            $localeData = ['lang' => 'zh-CN', 'name' => 'Chinese'];
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
                    'blogs.title_chinese as title_chinese',
                    'blogs.content_chinese as content_chinese',
                    'blogs.category_id',
                    'blogs.products as related_products',
                    'blogs.status as status',
                    'blogs.url_slug as url_slug',
                    'blogs.featured as featured',
                    'blogs.image as image',
                    'blogs.created_at as created_at',
                    'blogs.updated_at as updated_at',
                    'categories.name as category_name',
                    'categories.description as category_description',
                    'categories.name_burmese as category_name_burmese',
                    'categories.description_burmese as category_description_burmese',
                    'categories.name_chinese_chinese as category_name_chinese',
                    'categories.description_chinese as category_description_chinese',
                    'categories.is_active as category_is_active',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
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
             * Retrieve BLOGs by category name
             *
             **/
            if ($con['key'] == 'cat') {
                if ($locale == $lang_burmese) {
                    $blog_db->where('categories.name_burmese', '=', Str::replace('+', ' ', $con['value']));
                } else if ($locale == $lang_chinese) {
                    $blog_db->where('categories.name_chinese', '=', Str::replace('+', ' ', $con['value']));
                } else {
                    $blog_db->where('categories.name', '=', Str::replace('+', ' ', $con['value']));
                }
            } //End of retreiving BLOGs by category name
            /***
             *
             * Retrieve BLOGs by title
             *
             **/
            else if ($con['key'] == 'title') {
                if ($locale == $lang_burmese) {
                    $blog_db->where('blogs.title_burmese', '=', Str::replace('+', ' ', $con['value']));
                } else if ($locale == $lang_chinese) {
                    $blog_db->where('blogs.title_chinese', '=', Str::replace('+', ' ', $con['value']));
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
                                if ($locale == $lang_burmese) {
                                    $blog_db->orderByDesc('blogs.title_burmese');
                                } else if ($locale == $lang_chinese) {
                                    $blog_db->orderByDesc('blogs.title_chinese');
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
                                if ($locale == $lang_burmese) {
                                    $blog_db->orderBy('blogs.title_burmese');
                                } else if ($locale == $lang_chinese) {
                                    $blog_db->orderBy('blogs.title_chinese');
                                } else {
                                    $blog_db->orderBy('blogs.title');
                                }
                            } else if ($orderBy[1] == 'author') {
                                $blog_db->orderByDesc('users.name');
                            } else if ($orderBy[1] == 'created') {
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
                'locale' => $localeData,
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
        $lang_chinese = 'zh-cn';
        $lang_burmese = 'my-mm';

        $data = $request->json()->all();

        $blog_db = $this->getBlogsAPI($data);

        /*
        * Record count
        */
        $count_db = $blog_db;

        $total_count = $count_db->count();
        // End of record count

        /*
         * Limit the number of results.
         */
        if (isset($data['limit'])) {
            if (isset($data['page'])) {
                $blog_db->skip($data['page'])->take($data['limit']);
            } else {
                $blog_db->skip(0)->take($data['limit']);
            }
        } // End of limit the number of results.

        $blogs = $blog_db->get();

        foreach ($blogs as $row) {
            $categories = [];

            foreach (json_decode($row->category_id) as $value) {
                $temp_cat = Category::where('id', '=', $value)->first();

                if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
                    $categories[] = [
                        'id' => $temp_cat->id,
                        'name' => $temp_cat->name_chinese,
                        'description' => $temp_cat->description_chinese,
                        'parent_id' => $temp_cat->parent_id,
                        'machine_name' => $temp_cat->machine,
                        'is_active' => $temp_cat->is_active,
                    ];
                } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_burmese) {
                    $categories[] = [
                        'id' => $temp_cat->id,
                        'name' => $temp_cat->name_burmese,
                        'description' => $temp_cat->description_burmese,
                        'parent_id' => $temp_cat->parent_id,
                        'machine_name' => $temp_cat->machine,
                        'is_active' => $temp_cat->is_active,
                    ];
                } else {
                    $categories[] = [
                        'id' => $temp_cat->id,
                        'name' => $temp_cat->name,
                        'description' => $temp_cat->description,
                        'parent_id' => $temp_cat->parent_id,
                        'machine_name' => $temp_cat->machine,
                        'is_active' => $temp_cat->is_active,
                    ];
                }
            }

            $products = [];

            foreach (json_decode($row->related_products) as $value) {
                $temp = DB::table('products')
                    ->select(
                        'products.id',
                        DB::raw('JSON_EXTRACT(products.title, \'$."' . Str::lower($data['locale']) . '"\') as title'),
                        'products.image as image',
                        'products.slug_url',
                        'products.is_active'
                    )
                    ->where('id', '=', $value)->first();

                $products[] = [
                    'id' => $temp->id,
                    'title' => json_decode($temp->title),
                    'image' => $temp->image,
                    'slug_url' => $temp->slug_url,
                    'is_active' => $temp->is_active
                ];
            }

            $result[] = [
                'id' => $row->id,
                'title' => Str::replace('"', '', $row->title),
                'content' => json_decode($row->content),
                'images' => json_decode($row->images),
                'slug_url' => $row->slug_url,
                'status' => $row->status,
                'featured' => $row->featured,
                'promoted' => $row->promoted,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
                'category' => $categories,
                'related_products' => $products,
                'author_id' => $row->author_id,
                'author_name' => $row->author_name,
                'author_email' => $row->author_email,
            ];
        }

        if ($blogs->count() > 0) {
            $response = [
                'code' => 200,
                'status' => 'success',
                'locale' => $this->getLang($data),
                'count' => $total_count,
                'data' => $result,
            ];
        } else {
            $response_code = 204;

            $response = [
                'code' => 204,
                'status' => 'no content',
            ];
        }

        return response()->json($response, $response_code);
    }

    /**
     * API Detail with Post data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postDetail(Request $request)
    {
        // Variables
        $response_code = 200;
        $lang_chinese = 'zh-cn';
        $lang_burmese = 'my-mm';

        $data = $request->json()->all();//dd($data);

        if ((isset($data['slug_url']) or isset($data['id'])) and isset($data['locale'])) {

            $blog_db = $this->getBlogsAPI($data);

            $blogs = $blog_db->first();

            if (isset($blogs)) {
                $categories = [];

                foreach (json_decode($blogs->category_id) as $value) {
                    $temp_cat = Category::where('id', '=', $value)->first();

                    if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
                        $categories[] = [
                            'id' => $temp_cat->id,
                            'name' => $temp_cat->name_chinese,
                            'description' => $temp_cat->description_chinese,
                            'parent_id' => $temp_cat->parent_id,
                            'machine_name' => $temp_cat->machine,
                            'is_active' => $temp_cat->is_active,
                        ];
                    } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_burmese) {
                        $categories[] = [
                            'id' => $temp_cat->id,
                            'name' => $temp_cat->name_burmese,
                            'description' => $temp_cat->description_burmese,
                            'parent_id' => $temp_cat->parent_id,
                            'machine_name' => $temp_cat->machine,
                            'is_active' => $temp_cat->is_active,
                        ];
                    } else {
                        $categories[] = [
                            'id' => $temp_cat->id,
                            'name' => $temp_cat->name,
                            'description' => $temp_cat->description,
                            'parent_id' => $temp_cat->parent_id,
                            'machine_name' => $temp_cat->machine,
                            'is_active' => $temp_cat->is_active,
                        ];
                    }
                }

                $products = [];

                foreach (json_decode($blogs->related_products) as $value) {
                    $temp = DB::table('products')
                        ->select(
                            'products.id',
                            DB::raw('JSON_EXTRACT(products.title, \'$."' . Str::lower($data['locale']) . '"\') as title'),
                            'products.image as image',
                            'products.slug_url',
                            'products.is_active'
                        )
                        ->where('id', '=', $value)->first();

                    $products[] = [
                        'id' => $temp->id,
                        'title' => json_decode($temp->title),
                        'image' => $temp->image,
                        'slug_url' => $temp->slug_url,
                        'is_active' => $temp->is_active
                    ];
                }

                $response = [
                    'code' => 200,
                    'status' => 'success',
                    'locale' => $this->getLang($data),
                    'id' => $blogs->id,
                    'title' => Str::replace('"', '', $blogs->title),
                    'content' => json_decode($blogs->content),
                    'images' => json_decode($blogs->images),
                    'slug_url' => $blogs->slug_url,
                    'status' => $blogs->status,
                    'featured' => $blogs->featured,
                    'promoted' => $blogs->promoted,
                    'created_at' => $blogs->created_at,
                    'updated_at' => $blogs->updated_at,
                    'category' => $categories,
                    'related_products' => $products,
                    'author_id' => $blogs->author_id,
                    'author_name' => $blogs->author_name,
                    'author_email' => $blogs->author_email,
                ];
            } else {
                $response = [
                    'code' => 404,
                    'status' => 'no content',
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

    private function getBlogsAPI($data)
    {
        $blog_db = DB::table('blogs')
            ->join('users', 'blogs.author_id', '=', 'users.id')
            ->select(
                'blogs.id',
                DB::raw('JSON_EXTRACT(blogs.title, \'$."' . Str::lower($data['locale']) . '"\') as title'),
                DB::raw('JSON_EXTRACT(blogs.content, \'$."' . Str::lower($data['locale']) . '"\') as content'),
                'blogs.images as images',
                'blogs.status',
                'blogs.url_slug as slug_url',
                'blogs.category_id',
                'blogs.featured',
                'blogs.promoted',
                'blogs.related_products',
                'blogs.created_at',
                'blogs.updated_at',
                'blogs.author_id',
                'users.name as author_name',
                'users.email as author_email',
            );

        /***
         *
         * Retrieve blogs by id
         *
         **/
        if (isset($data['id'])) {
            $blog_db->where('blogs.id', '=', $data['id']);
        } //End of retreiving blogs by id

        /***
         *
         * Retrieve blogs by featured
         *
         **/
        if (isset($data['featured'])) {
            $blog_db->where('blogs.featured', '=', $data['featured']);
        } //End of retreiving blogs by featured

        /***
         *
         * Retrieve blogs by id
         *
         **/
        if (isset($data['promoted'])) {
            $blog_db->where('blogs.promoted', '=', $data['promoted']);
        } //End of retreiving blogs by id

        /***
         *
         * Retrieve blogs by title
         *
         **/
        if (isset($data['title'])) {
            $blog_db->where(DB::raw('JSON_EXTRACT(blogs.title, \'$."' . Str::lower($data['locale']) . '"\')'), '=', $data['title']);
        } //End of retreiving blogs by title

        /***
         *
         * Retrieve blogs by keyword
         *
         **/
        if (isset($data['keyword'])) {
            $blog_db
                ->where(DB::raw('JSON_EXTRACT(blogs.title, \'$."' . Str::lower($data['locale']) . '"\')'), 'LIKE', "%{$data['keyword']}%")
                ->orWhere('users.name', 'LIKE', "%{$data['keyword']}%");
        } //End of retreiving blogs by keyword

        /***
         *
         * Retrieve blogs by category_id
         *
         **/
        if (isset($data['category.id'])) {
            $blog_db
                ->where(DB::raw('JSON_EXTRACT(blogs.category_id, \'$[0]\')'), '=', $data['category.id'])
                ->orWhere(DB::raw('JSON_EXTRACT(blogs.category_id, \'$[1]\')'), '=', $data['category.id']);
        } //End of retreiving blogs by category_id

        /***
         *
         * Retrieve blogs by status
         *
         **/
        if (isset($data['status'])) {
            $blog_db->where('blogs.status', '=', $data['status']);
        } //End of retreiving blogs by status

        /***
         *
         * Retrieve blogs by title
         *
         **/
        if (isset($data['created'])) {
            $blog_db->where('blogs.created_at', '=', date("Y-m-d", strtotime($data['created'])));
        } //End of retreiving blogs by created

        /***
         *
         * Retrieve blogs by slug
         *
         **/
        if (isset($data['slug_url'])) {
            $blog_db->where('blogs.url_slug', '=', $data['slug_url']);
        } //End of retreiving blogs by slug

        /***
         *
         * Retrieve blogs ordered by
         *
         **/
        if (isset($data['order'])) {
            if (isset($data['order']['orderby']) and Str::lower($data['order']['orderby']) == 'desc') {
                $blog_db->orderByDesc(Str::lower($data['order']['field']));
            } else {
                $blog_db->orderBy(Str::lower($data['order']['field']));
            }
        } //End of retreiving blogs ordered by

        return $blog_db;
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
                'blogs.images as images',
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
