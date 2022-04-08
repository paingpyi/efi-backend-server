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
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::where('status', '=', 'published')->get();

        return view('admin.news.list')->with(['newsroom' => $news]);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unpublished()
    {
        $news = News::where('status', '=', 'unpublished')->get();

        return view('admin.news.list')->with(['newsroom' => $news]);
    }

    /**
     * Display a drafted news list.
     *
     * @return \Illuminate\Http\Response
     */
    public function drafted()
    {
        $news = News::where('status', '=', 'draft')->get();

        return view('admin.news.list')->with(['newsroom' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.add-edit')->with(['action' => 'new']);
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
            'title' => 'required|unique:news|max:255',
            'content' => 'required',
            'title_burmese' => 'required|unique:news|max:255',
            'content_burmese' => 'required',
            'title_chinese' => 'required|unique:news|max:255',
            'content_chinese' => 'required',
            'slug_url' => 'required|unique:news,url_slug',
            'news' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('new#news')
                ->withErrors($validator)
                ->withInput();
        }

        $news = [];

        if ($request->file()) {
            $newsfileName = time() . '_' . $request->news->getClientOriginalName();
            $newsfilePath = $request->file('news')->storeAs('uploads', $newsfileName, 'public');

            $news = [
                'title' => $request->title,
                'content' => $request->content,
                'title_burmese' => $request->title_burmese,
                'content_burmese' => $request->content_burmese,
                'title_chinese' => $request->title_chinese,
                'content_chinese' => $request->content_chinese,
                'url_slug' => $request->slug_url,
                'featured' => ($request->featured == 'on') ? true : false,
                'image' => '/storage/' . $newsfilePath,
                'status' => $request->status,
                'author_id' => Auth::id(),
            ];

            News::create($news);

            return redirect()->route('news#list')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
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
        $news = News::where('id', '=', Crypt::decryptString($id))->first();

        return view('admin.news.add-edit')->with(['action' => 'update', 'news' => $news]);
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
            'news' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('edit#news', Crypt::encryptString($id))
                ->withErrors($validator)
                ->withInput();
        }

        $news = [];

        if ($request->file()) {
            $newsfileName = time() . '_' . $request->news->getClientOriginalName();
            $newsfilePath = $request->file('news')->storeAs('uploads', $newsfileName, 'public');

            $news = [
                'title' => $request->title,
                'content' => $request->content,
                'title_burmese' => $request->title_burmese,
                'content_burmese' => $request->content_burmese,
                'title_chinese' => $request->title_chinese,
                'content_chinese' => $request->content_chinese,
                'url_slug' => $request->slug_url,
                'featured' => ($request->featured == 'on') ? true : false,
                'image' => '/storage/' . $newsfilePath,
                'status' => $request->status,
                'author_id' => Auth::id(),
            ];
        } else {
            $news = [
                'title' => $request->title,
                'content' => $request->content,
                'title_burmese' => $request->title_burmese,
                'content_burmese' => $request->content_burmese,
                'title_chinese' => $request->title_chinese,
                'content_chinese' => $request->content_chinese,
                'url_slug' => $request->slug_url,
                'featured' => ($request->featured == 'on') ? true : false,
                'status' => $request->status,
                'author_id' => Auth::id(),
            ];
        }

        News::where('id', '=', $id)->update($news);

        return redirect()->route('news#list')->with(['success_message' => 'Successfully <strong>updated!</strong>']);
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
            $news = News::where('id', '=', Crypt::decryptString($id))->first();
            $flag = 'unpublished';

            if ($news->status == 'published') {
                $flag = 'unpublished';
            } else {
                $flag = 'published';
            }

            News::where('id', '=', Crypt::decryptString($id))->update(['status' => $flag]);

            return redirect()
                ->route('news#list')
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
            News::where('id', '=', Crypt::decryptString($id))->update(['status' => 'draft']);

            return redirect()
                ->route('news#list')
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

        if ($locale == $lang_english) {
            $news_db = DB::table('news')
                ->join('users', 'users.id', '=', 'news.author_id')
                ->select(
                    'news.id as id',
                    'news.title as title',
                    'news.content as content',
                    'news.status as status',
                    'news.featured as featured',
                    'news.url_slug as url_slug',
                    'news.image as image',
                    'news.created_at as created_at',
                    'news.updated_at as updated_at',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );

            $localeData = ['lang' => 'en-US', 'name' => 'English'];
        } else if ($locale == $lang_burmese) {
            $news_db = DB::table('news')
                ->join('users', 'users.id', '=', 'news.author_id')
                ->select(
                    'news.id as id',
                    'news.title_burmese as title',
                    'news.content_burmese as content',
                    'news.status as status',
                    'news.featured as featured',
                    'news.url_slug as url_slug',
                    'news.image as image',
                    'news.created_at as created_at',
                    'news.updated_at as updated_at',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );

                $localeData = ['lang' => 'my-MM', 'name' => 'Burmese'];
        } else if ($locale == $lang_chinese) {
            $news_db = DB::table('news')
                ->join('users', 'users.id', '=', 'news.author_id')
                ->select(
                    'news.id as id',
                    'news.title_chinese as title',
                    'news.content_chinese as content',
                    'news.status as status',
                    'news.featured as featured',
                    'news.url_slug as url_slug',
                    'news.image as image',
                    'news.created_at as created_at',
                    'news.updated_at as updated_at',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );

                $localeData = ['lang' => 'zh-CN', 'name' => 'Chinese'];
        } else {
            $news_db = DB::table('news')
                ->join('users', 'users.id', '=', 'news.author_id')
                ->select(
                    'news.id as id',
                    'news.title as title',
                    'news.content as content',
                    'news.title_burmese as title_burmese',
                    'news.content_burmese as content_burmese',
                    'news.title_chinese as title_chinese',
                    'news.content_chinese as content_chinese',
                    'news.status as status',
                    'news.featured as featured',
                    'news.url_slug as url_slug',
                    'news.image as image',
                    'news.created_at as created_at',
                    'news.updated_at as updated_at',
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
             * Retrieve news by title
             *
             **/
            if ($con['key'] == 'title') {
                if ($locale == $lang_burmese) {
                    $news_db->where('news.title_burmese', '=', Str::replace('+', ' ', $con['value']));
                } else if ($locale == $lang_chinese) {
                    $news_db->where('news.title_chinese', '=', Str::replace('+', ' ', $con['value']));
                } else {
                    $news_db->where('news.title', '=', Str::replace('+', ' ', $con['value']));
                }
            } //End of retreiving news by title
            /***
             *
             * Retrieve news by author
             *
             **/
            else if ($con['key'] == 'author') {
                $news_db->where('users.name', '=', Str::replace('+', ' ', $con['value']));
            } //End of retreiving news by author

            /***
             *
             * Retrieve news with order by
             *
             **/
            else if ($con['key'] == 'order') {
                if (isset($con['value'])) {
                    $orderBy = explode(',', $con['value']);

                    if ($orderBy[0] == 'desc') {
                        if (isset($orderBy[1])) {
                            if ($orderBy[1] == 'title') {
                                if ($locale == $lang_burmese) {
                                    $news_db->orderByDesc('news.title_burmese');
                                } else if ($locale == $lang_chinese) {
                                    $news_db->orderByDesc('news.title_chinese');
                                } else {
                                    $news_db->orderByDesc('news.title');
                                }
                            } else if ($orderBy[1] == 'author') {
                                $news_db->orderByDesc('users.name');
                            } else if ($orderBy[1] == 'created') {
                                $news_db->orderByDesc('news.created_at');
                            } else if ($orderBy[1] == 'updated') {
                                $news_db->orderByDesc('news.updated_at');
                            } else {
                                $news_db->orderByDesc('news.created_at');
                            }
                        } else {
                            $news_db->orderByDesc('news.created_at');
                        }
                    } else if ($orderBy[0] == 'asc') {
                        if (isset($orderBy[1])) {
                            if ($orderBy[1] == 'title') {
                                if ($locale == $lang_burmese) {
                                    $news_db->orderBy('news.title_burmese');
                                } else if ($locale == $lang_chinese) {
                                    $news_db->orderBy('news.title_chinese');
                                } else {
                                    $news_db->orderBy('news.title');
                                }
                            } else if ($orderBy[1] == 'author') {
                                $news_db->orderByDesc('users.name');
                            } else if ($orderBy[1] == 'created') {
                                $news_db->orderBy('news.created_at');
                            } else if ($orderBy[1] == 'updated') {
                                $news_db->orderBy('news.updated_at');
                            } else {
                                $news_db->orderBy('news.created_at');
                            }
                        } else {
                            $news_db->orderBy('news.created_at');
                        }
                    } else {
                        $response = [
                            'code' => 400,
                            'status' => 'Order by key has been mismatched.',
                        ];

                        return response()->json($response);
                    }
                } else {
                    $news_db->orderByDesc('news.created_at');
                }
            } //End of order by
        } //End of conditions

        $news = $news_db->get();

        if ($news->count() > 0) {
            $response = [
                'code' => 200,
                'status' => 'success',
                'locale' => $localeData,
                'data' => $news,
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
        $lang_english = 'en-us';
        $lang_chinese = 'zh-cn';
        $lang_burmese = 'my-mm';

        $data = $request->json()->all();

        /*
         * Locale
         *
         * MM for my-MM/Burmese and EN for en-US/English
         */
        if (isset($data['locale']) and Str::lower($data['locale']) == $lang_english) {
            $news_db = DB::table('news')
                ->join('users', 'users.id', '=', 'news.author_id')
                ->select(
                    'news.id as id',
                    'news.title as title',
                    'news.content as content',
                    'news.status as status',
                    'news.featured as featured',
                    'news.url_slug as url_slug',
                    'news.image as image',
                    'news.created_at as created_at',
                    'news.updated_at as updated_at',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );

            $localeData = ['lang' => 'en-US', 'name' => 'English'];
        } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_burmese) {
            $news_db = DB::table('news')
                ->join('users', 'users.id', '=', 'news.author_id')
                ->select(
                    'news.id as id',
                    'news.title_burmese as title',
                    'news.content_burmese as content',
                    'news.status as status',
                    'news.featured as featured',
                    'news.url_slug as url_slug',
                    'news.image as image',
                    'news.created_at as created_at',
                    'news.updated_at as updated_at',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );

            $localeData = ['lang' => 'my-MM', 'name' => 'Burmese'];
        } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
            $news_db = DB::table('news')
                ->join('users', 'users.id', '=', 'news.author_id')
                ->select(
                    'news.id as id',
                    'news.title_chinese as title',
                    'news.content_chinese as content',
                    'news.status as status',
                    'news.featured as featured',
                    'news.url_slug as url_slug',
                    'news.image as image',
                    'news.created_at as created_at',
                    'news.updated_at as updated_at',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );

            $localeData = ['lang' => 'zh-CN', 'name' => 'Chinese'];
        } else {
            $news_db = DB::table('news')
                ->join('users', 'users.id', '=', 'news.author_id')
                ->select(
                    'news.id as id',
                    'news.title as title',
                    'news.content as content',
                    'news.title_burmese as title_burmese',
                    'news.content_burmese as content_burmese',
                    'news.title_chinese as title_chinese',
                    'news.content_chinese as content_chinese',
                    'news.status as status',
                    'news.featured as featured',
                    'news.url_slug as url_slug',
                    'news.image as image',
                    'news.created_at as created_at',
                    'news.updated_at as updated_at',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );

            $localeData = ['lang' => 'en-US/my-MM/zh-CN', 'name' => 'English/Burmese/Chinese'];
        }

        /***
         *
         * Retrieve news by id
         *
         **/
        if (isset($data['id'])) {
            $news_db->where('news.id', '=', $data['id']);
        } //End of retreiving news by id

        /***
         *
         * Retrieve news by title
         *
         **/
        if (isset($data['title'])) {
            if (isset($data['locale']) and Str::lower($data['locale']) == $lang_english) {
                $news_db->where('news.title', '=', $data['title']);
            } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
                $news_db->where('news.title_chinese', '=', $data['title']);
            } else {
                $news_db->where('news.title_burmese', '=', $data['title']);
            }
        } //End of retreiving news by title

        /***
         *
         * Retrieve news by status
         *
         **/
        if (isset($data['status'])) {
            $news_db->where('news.status', '=', $data['status']);
        } //End of retreiving news by status

        /***
         *
         * Retrieve news by author
         *
         **/
        if (isset($data['author'])) {
            $news_db->where('users.name', '=', $data['author']);
        } //End of retreiving news by author

        /***
         *
         * Retrieve news by featured
         *
         **/
        if (isset($data['featured'])) {
            $news_db->where('news.featured', '=', $data['featured']);
        } //End of retreiving news by featured

        /***
         *
         * Retrieve news by url_slug
         *
         **/
        if (isset($data['url_slug'])) {
            $news_db->where('news.url_slug', '=', $data['url_slug']);
        } //End of retreiving news by url_slug

        /***
         *
         * Retrieve news by created
         *
         **/
        if (isset($data['created'])) {
            $news_db->whereDate('news.created_at', '=', date("Y-m-d", strtotime($data['created'])));
        } //End of retreiving news by created

        /***
         *
         * Retrieve news ordered by
         *
         **/
        if (isset($data['order'])) {
            if (isset($data['locale']) and Str::lower($data['locale']) == $lang_english) {
                if (isset($data['order']['orderby']) and Str::lower($data['order']['orderby']) == 'desc') {
                    if (isset($data['order']['field'])) {
                        $news_db->orderByDesc(Str::lower($data['order']['field']));
                    } else {
                        $news_db->orderByDesc('news.title');
                    }
                } else {
                    if (isset($data['order']['field'])) {
                        $news_db->orderBy(Str::lower($data['order']['field']));
                    } else {
                        $news_db->orderBy('news.title');
                    }
                }
            } else if(isset($data['locale']) and Str::lower($data['locale']) == $lang_burmese) {
                if (isset($data['order']['orderby']) and Str::lower($data['order']['orderby']) == 'desc') {
                    if (isset($data['order']['field'])) {
                        $news_db->orderByDesc(Str::lower($data['order']['field']) . '_burmese');
                    } else {
                        $news_db->orderByDesc('news.title_burmese');
                    }
                } else {
                    if (isset($data['order']['field'])) {
                        $news_db->orderBy(Str::lower($data['order']['field']) . '_burmese');
                    } else {
                        $news_db->orderBy('news.title_burmese');
                    }
                }
            } else {
                if (isset($data['order']['orderby']) and Str::lower($data['order']['orderby']) == 'desc') {
                    if (isset($data['order']['field'])) {
                        $news_db->orderByDesc(Str::lower($data['order']['field']) . '_chinese');
                    } else {
                        $news_db->orderByDesc('news.title_chinese');
                    }
                } else {
                    if (isset($data['order']['field'])) {
                        $news_db->orderBy(Str::lower($data['order']['field']) . '_chinese');
                    } else {
                        $news_db->orderBy('news.title_chinese');
                    }
                }
            }
        } //End of retreiving news ordered by

        /*
        * Record count
        */
        $count_db = $news_db;

        $total_count = $count_db->count();
        // End of record count

        /*
         * Limit the number of results.
         */
        if (isset($data['limit'])) {
            if (isset($data['page'])) {
                $news_db->skip($data['page'])->take($data['limit']);
            } else {
                $news_db->skip(0)->take($data['limit']);
            }
        } // End of limit the number of results.

        $news = $news_db->get();

        if ($news->count() > 0) {
            $response = [
                'code' => 200,
                'status' => 'success',
                'locale' => $localeData,
                'count' => $total_count,
                'data' => $news,
            ];
        } else {
            $response = [
                'code' => 204,
                'status' => 'no content',
            ];
        }

        return response()->json($response);
    }
}
