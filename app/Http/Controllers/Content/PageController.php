<?php

namespace App\Http\Controllers\Content;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Page;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->getPages(0, 'is_active', '=', true);

        return view('admin.page.list')->with(['pages' => $pages]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deactivated()
    {
        $pages = $this->getPages(0, 'is_active', '=', false);

        return view('admin.page.list')->with(['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('is_active', '=', true)->where('parent_id', '=', null)->get();

        return view('admin.page.add-edit')->with(['action' => 'new', 'category' => $category]);
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
            'title' => 'required|unique:pages|max:255',
            'content' => 'required',
            'title_burmese' => 'required|unique:pages|max:255',
            'content_burmese' => 'required',
            'title_chinese' => 'required|unique:pages|max:255',
            'content_chinese' => 'required',
            'slug_url' => 'required|unique:pages,url_slug',
            'page' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('new#page')
                ->withErrors($validator)
                ->withInput();
        }

        $page = [];

        if ($request->file()) {
            $pagefileName = time() . '_' . $request->page->getClientOriginalName();
            $pagefilePath = $request->file('page')->storeAs('uploads', $pagefileName, 'public');

            $page = [
                'title' => $request->title,
                'content' => $request->content,
                'title_burmese' => $request->title_burmese,
                'content_burmese' => $request->content_burmese,
                'title_chinese' => $request->title_chinese,
                'content_chinese' => $request->content_chinese,
                'url_slug' => $request->slug_url,
                'related_contents' => isset($request->category) ? json_encode($request->category) : null,
                'is_active' => ($request->active == 'on') ? true : false,
                'image' => '/storage/' . $pagefilePath,
            ];

            Page::create($page);

            return redirect()->route('page#list')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
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
        $page = Page::where('id', '=', Crypt::decryptString($id))->first();
        $category = Category::where('is_active', '=', true)->where('parent_id', '=', null)->get();

        return view('admin.page.add-edit')->with(['action' => 'update', 'category' => $category, 'page' => $page]);
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
            'page' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('edit#page', Crypt::encryptString($id))
                ->withErrors($validator)
                ->withInput();
        }

        $page = [];

        if ($request->file()) {
            $pagefileName = time() . '_' . $request->page->getClientOriginalName();
            $pagefilePath = $request->file('page')->storeAs('uploads', $pagefileName, 'public');

            $page = [
                'title' => $request->title,
                'content' => $request->content,
                'title_burmese' => $request->title_burmese,
                'content_burmese' => $request->content_burmese,
                'title_chinese' => $request->title_chinese,
                'content_chinese' => $request->content_chinese,
                'url_slug' => $request->slug_url,
                'related_contents' => isset($request->category) ? json_encode($request->category) : null,
                'is_active' => ($request->active == 'on') ? true : false,
                'image' => '/storage/' . $pagefilePath,
            ];
        } else {
            $page = [
                'title' => $request->title,
                'content' => $request->content,
                'title_burmese' => $request->title_burmese,
                'content_burmese' => $request->content_burmese,
                'title_chinese' => $request->title_chinese,
                'content_chinese' => $request->content_chinese,
                'url_slug' => $request->slug_url,
                'related_contents' => isset($request->category) ? json_encode($request->category) : null,
                'is_active' => ($request->active == 'on') ? true : false,
            ];
        }

        Page::where('id', '=', $id)->update($page);

        return redirect()->route('page#list')->with(['success_message' => 'Successfully <strong>updated!</strong>']);
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
            $page = Page::where('id', '=', Crypt::decryptString($id))->first();
            $flag = false;
            $message = 'deactivated';

            if ($page->is_active) {
                $flag = false;
                $message = 'deactivated';
            } else {
                $flag = true;
                $message = 'activated';
            }

            Page::where('id', '=', Crypt::decryptString($id))->update(['is_active' => $flag]);

            return redirect()
                ->route('page#list')
                ->with(['success_message' => 'Successfully <strong>' . $message . '!</strong>']);
        } catch (DecryptException $e) {
            abort(404, 'Decrypt Exception occured.');
        }
    }

    /*
     * API Methods
     *
     * @param  string  $locale
     * @return \Illuminate\Http\Response
     */
    public function getlist($locale = null)
    {
    }

    /**
     * API List with Page data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postList(Request $request)
    {
        // Variables
        $lang_english = 'en-us';
        $lang_chinese = 'zh-cn';
        $lang_burmese = 'my-mm';
        $localeData = [];
        $data = $request->json()->all();

        /*
         * Locale
         *
         * MM for my-MM/Burmese and EN for en-US/English
         */
        if (isset($data['locale']) and Str::lower($data['locale']) == $lang_english) {
            $page_db = DB::table('pages')
                ->select(
                    'id',
                    'title',
                    'content',
                    'image',
                    'url_slug',
                    'related_contents',
                    'is_active',
                    'created_at',
                    'updated_at',
                );

            $localeData = ['lang' => 'en-US', 'name' => 'English'];
        } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_burmese) {
            $page_db = DB::table('pages')
                ->select(
                    'id',
                    'title_burmese as title',
                    'content_burmese as content',
                    'image',
                    'url_slug',
                    'related_contents',
                    'is_active',
                    'created_at',
                    'updated_at',
                );

            $localeData = ['lang' => 'my-MM', 'name' => 'Burmese'];
        } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
            $page_db = DB::table('pages')
                ->select(
                    'id',
                    'title_chinese as title',
                    'content_chinese as content',
                    'image',
                    'url_slug',
                    'related_contents',
                    'is_active',
                    'created_at',
                    'updated_at',
                );

            $localeData = ['lang' => 'zh-CN', 'name' => 'Chinese'];
        } else {
            $page_db = DB::table('pages')
                ->select(
                    'id',
                    'title',
                    'content',
                    'title_burmese',
                    'content_burmese',
                    'title_chinese',
                    'content_chinese',
                    'image',
                    'url_slug',
                    'related_contents',
                    'is_active',
                    'created_at',
                    'updated_at',
                );

            $localeData = ['lang' => 'en-US/my-MM/zh-CN', 'name' => 'English/Burmese/Chinese'];
        }

        /***
         *
         * Retrieve pages by id
         *
         **/
        if (isset($data['id'])) {
            $page_db->where('id', '=', $data['id']);
        } //End of retreiving pages by id

        /***
         *
         * Retrieve pages by title
         *
         **/
        if (isset($data['title'])) {
            if (isset($data['locale']) and Str::lower($data['locale']) == $lang_english) {
                $page_db->where('title', '=', $data['title']);
            } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
                $page_db->where('title_chinese', '=', $data['title']);
            } else {
                $page_db->where('title_burmese', '=', $data['title']);
            }
        } //End of retreiving pages by title

        /***
         *
         * Retrieve pages by status
         *
         **/
        if (isset($data['status'])) {
            $page_db->where('is_active', '=', $data['status']);
        } //End of retreiving pages by status

        /***
         *
         * Retrieve pages by url slug
         *
         **/
        if (isset($data['url_slug'])) {
            $page_db->where('url_slug', '=', $data['url_slug']);
        } //End of retreiving pages by url slug

        /***
         *
         * Retrieve pages by title
         *
         **/
        if (isset($data['created'])) {
            $page_db->whereDate('created_at', '=', date("Y-m-d", strtotime($data['created'])));
        } //End of retreiving pages by created

        /***
         *
         * Retrieve pages ordered by
         *
         **/
        if (isset($data['order'])) {
            if (isset($data['locale']) and Str::lower($data['locale']) == $lang_english) {
                if (isset($data['order']['orderby']) and Str::lower($data['order']['orderby']) == 'desc') {
                    if (isset($data['order']['field'])) {
                        $page_db->orderByDesc(Str::lower($data['order']['field']));
                    } else {
                        $page_db->orderByDesc('title');
                    }
                } else {
                    if (isset($data['order']['field'])) {
                        $page_db->orderBy(Str::lower($data['order']['field']));
                    } else {
                        $page_db->orderBy('title');
                    }
                }
            } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
                if (isset($data['order']['orderby']) and Str::lower($data['order']['orderby']) == 'desc') {
                    if (isset($data['order']['field'])) {
                        $page_db->orderByDesc(Str::lower($data['order']['field']) . '_chinese');
                    } else {
                        $page_db->orderByDesc('title_chinese');
                    }
                } else {
                    if (isset($data['order']['field'])) {
                        $page_db->orderBy(Str::lower($data['order']['field']) . '_chinese');
                    } else {
                        $page_db->orderBy('title_chinese');
                    }
                }
            } else {
                if (isset($data['order']['orderby']) and Str::lower($data['order']['orderby']) == 'desc') {
                    if (isset($data['order']['field'])) {
                        $page_db->orderByDesc(Str::lower($data['order']['field']) . '_burmese');
                    } else {
                        $page_db->orderByDesc('title_burmese');
                    }
                } else {
                    if (isset($data['order']['field'])) {
                        $page_db->orderBy(Str::lower($data['order']['field']) . '_burmese');
                    } else {
                        $page_db->orderBy('title_burmese');
                    }
                }
            }
        } //End of retreiving pages ordered by

        /*
        * Record count
        */
        $count_db = $page_db;

        $total_count = $count_db->count();
        // End of record count

        /*
         * Limit the number of results.
         */
        if (isset($data['limit'])) {
            if (isset($data['page'])) {
                $page_db->skip($data['page'])->take($data['limit']);
            } else {
                $page_db->skip(0)->take($data['limit']);
            }
        } // End of limit the number of results.

        $pages = $page_db->get();

        if ($pages->count() > 0) {
            $response = [
                'code' => 200,
                'status' => 'success',
                'locale' => $localeData,
                'count' => $total_count,
                'data' => $pages,
            ];
        } else {
            $response = [
                'code' => 204,
                'status' => 'no content',
            ];
        }

        return response()->json($response);
    }

    private function getPages($paginate, $search_column = null, $search_operator = null, $search_value = null)
    {
        if (is_null($search_column) and is_null($search_operator) and is_null($search_value)) {
            if ($paginate > 0) {
                return Page::paginate($paginate);
            } else {
                return Page::get();
            }
        } else {
            if ($paginate > 0) {
                return Page::where($search_column, $search_operator, $search_value)->paginate($paginate);
            } else {
                return Page::where($search_column, $search_operator, $search_value)->get();
            }
        }
    }
}
