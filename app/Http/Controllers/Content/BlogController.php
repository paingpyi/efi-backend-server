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
        $data = [
            'locale' => 'en-us',
            'status' => 'published'
        ];

        $blogs = $this->getBlogsAPI($data)->get();

        return view('admin.blog.list')->with(['blogs' => $blogs]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unpublished()
    {
        $data = [
            'locale' => 'en-us',
            'status' => 'unpublished'
        ];

        $blogs = $this->getBlogsAPI($data)->get();

        return view('admin.blog.list')->with(['blogs' => $blogs]);
    }

    /**
     * Display a drafted blog list.
     *
     * @return \Illuminate\Http\Response
     */
    public function drafted()
    {
        $data = [
            'locale' => 'en-us',
            'status' => 'draft'
        ];

        $blogs = $this->getBlogsAPI($data)->get();

        return view('admin.blog.list')->with(['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog_category = Category::where('is_active', '=', true)->where('parent_id', '=', null)->get();
        $blog_products = $this->getProducts();

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
            'title' => 'required|max:255',
            'content' => 'required',
            'title_burmese' => 'required|max:255',
            'content_burmese' => 'required',
            'title_chinese' => 'required|max:255',
            'content_chinese' => 'required',
            'slug_url' => 'required|unique:blogs,url_slug',
            'main_category' => 'required',
            'categories' => 'required',
            'status' => 'required',
            'cover_image' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('new#blog')
                ->withErrors($validator)
                ->withInput();
        }

        $cover_images = [];
        foreach ($request->cover_image as $image) {
            $cover_images[] = Str::replace(config('app.url'), '', $image);
        }

        $blog = [
            'title' => json_encode([
                'en-us' => $request->title,
                'my-mm' => $request->title_burmese,
                'zh-cn' => $request->title_chinese
            ]),
            'content' => json_encode([
                'en-us' => $request->content,
                'my-mm' => $request->content_burmese,
                'zh-cn' => $request->content_chinese
            ]),
            'images' => json_encode($cover_images),
            'url_slug' => $request->slug_url,
            'status' => $request->status,
            'main_category' => $request->main_category,
            'category_id' => json_encode($request->categories),
            'author_id' => Auth::user()->id,
            'featured' => isset($request->featured) ? true : false,
            'promoted' => isset($request->promoted) ? true : false,
            'related_products' => json_encode($request->products),
        ];

        blog::create($blog);

        return redirect()->route('blog#list')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
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
        $blog_EN = $this->getBlogsAPI(['locale' => 'en-us', 'id' => Crypt::decryptString($id)])->first();
        $blog_MM = $this->getBlogsAPI(['locale' => 'my-mm', 'id' => Crypt::decryptString($id)])->first();
        $blog_ZH = $this->getBlogsAPI(['locale' => 'zh-cn', 'id' => Crypt::decryptString($id)])->first();
        $blog_category = Category::where('is_active', '=', true)->where('parent_id', '=', null)->get();
        $blog_products = $this->getProducts();

        return view('admin.blog.add-edit')->with(['action' => 'update', 'blog_category' => $blog_category, 'blog_products' => $blog_products, 'blog_en' => $blog_EN, 'blog_mm' => $blog_MM, 'blog_zh' => $blog_ZH]);
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
            'main_category' => 'required',
            'categories' => 'required',
            'status' => 'required',
            'cover_image' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('edit#blog', Crypt::encryptString($id))
                ->withErrors($validator)
                ->withInput();
        }

        $cover_images = [];
        foreach ($request->cover_image as $image) {
            $cover_images[] = Str::replace(config('app.url'), '', $image);
        }

        $blog = [
            'title' => json_encode([
                'en-us' => $request->title,
                'my-mm' => $request->title_burmese,
                'zh-cn' => $request->title_chinese
            ]),
            'content' => json_encode([
                'en-us' => $request->content,
                'my-mm' => $request->content_burmese,
                'zh-cn' => $request->content_chinese
            ]),
            'images' => json_encode($cover_images),
            'url_slug' => $request->slug_url,
            'status' => $request->status,
            'main_category' => $request->main_category,
            'category_id' => json_encode($request->categories),
            'author_id' => Auth::user()->id,
            'featured' => isset($request->featured) ? true : false,
            'promoted' => isset($request->promoted) ? true : false,
            'related_products' => json_encode($request->products),
        ];

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
        // Code here...
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
                $blog_db->paginate($data['limit'], $data['page']);
            } else {
                $blogs = $blog_db->paginate($data['limit']);
            }
        } else {
            $blogs = $blog_db->get();
        } // End of limit the number of results.

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

            if (isset($row->related_products)) {
                foreach (json_decode($row->related_products) as $value) {
                    $products[] = $value;
                    /*$temp = DB::table('products')
                        ->select(
                            'products.id',
                            DB::raw('JSON_EXTRACT(products.title, \'$."' . Str::lower($data['locale']) . '"\') as title'),
                            'products.image as image',
                            'products.slug_url',
                            'products.is_active'
                        )
                        ->where('products.slug_url', '=', $value)->first();

                    if (isset($temp)) {
                        $products[] = [
                            'id' => $temp->id,
                            'title' => json_decode($temp->title),
                            'image' => config('app.url') . $temp->image,
                            'slug_url' => $temp->slug_url,
                            'is_active' => $temp->is_active
                        ];
                    } else {
                        $products = [];
                    }*/
                }
            } else {
                $products = [];
            }dd($products);

            $images = [];
            foreach (json_decode($row->images) as $value) {
                $images[] = config('app.url') . $value;
            }

            $main_category_name = '';
            $main_category_description = '';
            if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
                $main_category_name = $row->category_name_chinese;
                $main_category_description = $row->category_description_chinese;
            } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_burmese) {
                $main_category_name = $row->category_name_burmese;
                $main_category_description = $row->category_description_burmese;
            } else {
                $main_category_name = $row->category_name;
                $main_category_description = $row->category_description;
            }

            $result[] = [
                'id' => $row->id,
                'title' => Str::replace('"', '', $row->title),
                'content' => json_decode($row->content),
                'images' => $images,
                'slug_url' => $row->slug_url,
                'status' => $row->status,
                'featured' => $row->featured,
                'promoted' => $row->promoted,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
                'main_category_id' => $row->main_category,
                'main_category_name' => $main_category_name,
                'main_category_description' => $main_category_description,
                'main_category_machine_name' => $row->category_machine_name,
                'category' => $categories,
                'related_products' => $products,
                'author_id' => $row->author_id,
                'author_name' => $row->author_name,
                'author_email' => $row->author_email,
            ];
        }

        if ($total_count > 0) {
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

        $data = $request->json()->all(); //dd($data);

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
                        'image' => config('app.url') . $temp->image,
                        'slug_url' => $temp->slug_url,
                        'is_active' => $temp->is_active
                    ];
                }

                $images = [];
                foreach (json_decode($blogs->images) as $value) {
                    $images[] = config('app.url') . $value;
                }

                $main_category_name = '';
                $main_category_description = '';
                if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
                    $main_category_name = $blogs->category_name_chinese;
                    $main_category_description = $blogs->category_description_chinese;
                } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_burmese) {
                    $main_category_name = $blogs->category_name_burmese;
                    $main_category_description = $blogs->category_description_burmese;
                } else {
                    $main_category_name = $blogs->category_name;
                    $main_category_description = $blogs->category_description;
                }

                $response = [
                    'code' => 200,
                    'status' => 'success',
                    'locale' => $this->getLang($data),
                    'id' => $blogs->id,
                    'title' => Str::replace('"', '', $blogs->title),
                    'content' => json_decode($blogs->content),
                    'images' => $images,
                    'slug_url' => $blogs->slug_url,
                    'status' => $blogs->status,
                    'featured' => $blogs->featured,
                    'promoted' => $blogs->promoted,
                    'created_at' => $blogs->created_at,
                    'updated_at' => $blogs->updated_at,
                    'main_category_id' => $blogs->main_category,
                    'main_category_name' => $main_category_name,
                    'main_category_description' => $main_category_description,
                    'main_category_machine_name' => $blogs->category_machine_name,
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

    private function getBlogsAPI($data)
    {
        $blog_db = DB::table('blogs')
            ->join('users', 'blogs.author_id', '=', 'users.id')
            ->join('categories', 'blogs.main_category', '=', 'categories.id')
            ->select(
                'blogs.id',
                DB::raw('JSON_EXTRACT(blogs.title, \'$."' . Str::lower($data['locale']) . '"\') as title'),
                DB::raw('JSON_EXTRACT(blogs.content, \'$."' . Str::lower($data['locale']) . '"\') as content'),
                'blogs.images as images',
                'blogs.status',
                'blogs.url_slug as slug_url',
                'blogs.main_category',
                'categories.name as category_name',
                'categories.description as category_description',
                'categories.name_burmese as category_name_burmese',
                'categories.description_burmese as category_description_burmese',
                'categories.name_chinese as category_name_chinese',
                'categories.description_chinese as category_description_chinese',
                'categories.machine as category_machine_name',
                'categories.is_active as category_is_active',
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
         * Retrieve blogs by main_category_machine_name
         *
         **/
        if (isset($data['main_category_machine_name'])) {
            $blog_db->where('categories.machine', '=', $data['main_category_machine_name']);
        } //End of retreiving blogs by main_category_machine_name

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
            $keyword = Str::lower($data['keyword']);

            $blog_db
                ->Where(DB::raw('LOWER(JSON_EXTRACT(blogs.title, \'$."' . Str::lower($data['locale']) . '"\'))'), 'LIKE', "%{$keyword}%")
                ->orWhere(DB::raw('LOWER(users.name)'), 'LIKE', "%{$keyword}%");
        } //End of retreiving blogs by keyword

        /***
         *
         * Retrieve blogs by category_id
         *
         **/
        if (isset($data['category.id'])) {
            foreach ($data['category.id'] as $check) {
                $blog_db
                    ->Where(DB::raw('JSON_EXTRACT(blogs.category_id, \'$[0]\')'), '=', $check)
                    ->orWhere(DB::raw('JSON_EXTRACT(blogs.category_id, \'$[1]\')'), '=', $check);
            }
        } //End of retreiving blogs by category_id

        /***
         *
         * Retrieve blogs by related_products
         *
         **/
        if (isset($data['related_products'])) {
            $blog_db
                ->orWhere(DB::raw('JSON_EXTRACT(blogs.related_products, \'$[0]\')'), '=', $data['related_products'])
                ->orWhere(DB::raw('JSON_EXTRACT(blogs.related_products, \'$[1]\')'), '=', $data['related_products'])
                ->orWhere(DB::raw('JSON_EXTRACT(blogs.related_products, \'$[2]\')'), '=', $data['related_products'])
                ->orWhere(DB::raw('JSON_EXTRACT(blogs.related_products, \'$[3]\')'), '=', $data['related_products'])
                ->orWhere(DB::raw('JSON_EXTRACT(blogs.related_products, \'$[4]\')'), '=', $data['related_products']);
        } //End of retreiving blogs by related_products

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

    private function getProducts()
    {
        return DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select(
                'products.id',
                DB::raw('JSON_EXTRACT(products.title, \'$."en-us"\') as title'),
                'products.is_active',
                'products.is_home',
                'products.slug_url',
                'products.quote_machine_name',
                'products.claim_machine_name',
            )->where('products.is_active', '=', true)->get();
    }
}
