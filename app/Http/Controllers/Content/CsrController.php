<?php

namespace App\Http\Controllers\Content;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\CSR;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CsrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $csrs = $this->getCSR(0, 'c_s_r_s.status', '=', 'published');

        return view('admin.csr.list')->with(['csrs' => $csrs]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unpublished()
    {
        $csrs = $this->getCSR(0, 'c_s_r_s.status', '=', 'unpublished');

        return view('admin.csr.list')->with(['csrs' => $csrs]);
    }

    /**
     * Display a drafted blog list.
     *
     * @return \Illuminate\Http\Response
     */
    public function drafted()
    {
        $csrs = $this->getCSR(0, 'c_s_r_s.status', '=', 'draft');

        return view('admin.csr.list')->with(['csrs' => $csrs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.csr.add-edit')->with(['action' => 'new']);
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
            'title' => 'required|unique:c_s_r_s|max:255',
            'content' => 'required',
            'title_burmese' => 'required|unique:c_s_r_s|max:255',
            'content_burmese' => 'required',
            'title_chinese' => 'required|unique:c_s_r_s|max:255',
            'content_chinese' => 'required',
            'slug_url' => 'required|unique:c_s_r_s,url_slug',
            'csr1' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            'csr2' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
            'csr3' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
            'csr4' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
            'csr5' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('new#csr')
                ->withErrors($validator)
                ->withInput();
        }

        $csr = [];
        $i = 0;
        $images = [];

        if ($request->file()) {
            $csr1fileName = time() . '_' . $request->csr1->getClientOriginalName();
            $csr1filePath = $request->file('csr1')->storeAs('uploads', $csr1fileName, 'public');

            $images[$i++] = '/storage/' . $csr1filePath;

            if (isset($request->csr2)) {
                $csr2fileName = time() . '_' . $request->csr2->getClientOriginalName();
                $csr2filePath = $request->file('csr2')->storeAs('uploads', $csr2fileName, 'public');

                $images[$i++] = '/storage/' . $csr2filePath;
            }

            if (isset($request->csr3)) {
                $csr3fileName = time() . '_' . $request->csr3->getClientOriginalName();
                $csr3filePath = $request->file('csr3')->storeAs('uploads', $csr3fileName, 'public');

                $images[$i++] = '/storage/' . $csr3filePath;
            }

            if (isset($request->csr4)) {
                $csr4fileName = time() . '_' . $request->csr4->getClientOriginalName();
                $csr4filePath = $request->file('csr4')->storeAs('uploads', $csr4fileName, 'public');

                $images[$i++] = '/storage/' . $csr4filePath;
            }

            if (isset($request->csr5)) {
                $csr5fileName = time() . '_' . $request->csr5->getClientOriginalName();
                $csr5filePath = $request->file('csr5')->storeAs('uploads', $csr5fileName, 'public');

                $images[$i++] = '/storage/' . $csr5filePath;
            }

            $csr = [
                'title' => $request->title,
                'location' => $request->location,
                'content' => $request->content,
                'title_burmese' => $request->title_burmese,
                'location_burmese' => $request->location_burmese,
                'content_burmese' => $request->content_burmese,
                'title_chinese' => $request->title_chinese,
                'location_chinese' => $request->location_chinese,
                'content_chinese' => $request->content_chinese,
                'url_slug' => $request->slug_url,
                'featured' => ($request->featured == 'on') ? true : false,
                'images' => json_encode($images),
                'status' => $request->status,
                'author_id' => Auth::id(),
            ];

            CSR::create($csr);

            return redirect()->route('csr#list')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
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
        $csr = CSR::where('id', '=', Crypt::decryptString($id))->first();

        return view('admin.csr.add-edit')->with(['action' => 'update', 'csr' => $csr]);
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
            'csr1' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
            'csr2' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
            'csr3' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
            'csr4' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
            'csr5' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('edit#csr', Crypt::encryptString($id))
                ->withErrors($validator)
                ->withInput();
        }

        $csr = [];
        $images = [];
        $old_csr = CSR::where('id', '=', $id)->first();
        $old_images = json_decode($old_csr->images);

        if ($request->file()) {
            if (isset($request->csr1)) {
                $csr1fileName = time() . '_' . $request->csr1->getClientOriginalName();
                $csr1filePath = $request->file('csr1')->storeAs('uploads', $csr1fileName, 'public');

                $images[0] = '/storage/' . $csr1filePath;
            } else if (isset($old_images[0])) {
                $images[0] = $old_images[0];
            }

            if (isset($request->csr2)) {
                $csr2fileName = time() . '_' . $request->csr2->getClientOriginalName();
                $csr2filePath = $request->file('csr2')->storeAs('uploads', $csr2fileName, 'public');

                $images[1] = '/storage/' . $csr2filePath;
            } else if (isset($old_images[1])) {
                $images[1] = $old_images[1];
            }

            if (isset($request->csr3)) {
                $csr3fileName = time() . '_' . $request->csr3->getClientOriginalName();
                $csr3filePath = $request->file('csr3')->storeAs('uploads', $csr3fileName, 'public');

                $images[2] = '/storage/' . $csr3filePath;
            } else if (isset($old_images[2])) {
                $images[2] = $old_images[2];
            }

            if (isset($request->csr4)) {
                $csr4fileName = time() . '_' . $request->csr4->getClientOriginalName();
                $csr4filePath = $request->file('csr4')->storeAs('uploads', $csr4fileName, 'public');

                $images[3] = '/storage/' . $csr4filePath;
            } else if (isset($old_images[3])) {
                $images[3] = $old_images[3];
            }

            if (isset($request->csr5)) {
                $csr5fileName = time() . '_' . $request->csr5->getClientOriginalName();
                $csr5filePath = $request->file('csr5')->storeAs('uploads', $csr5fileName, 'public');

                $images[4] = '/storage/' . $csr5filePath;
            } else if (isset($old_images[4])) {
                $images[4] = $old_images[4];
            }

            $csr = [
                'title' => $request->title,
                'location' => $request->location,
                'content' => $request->content,
                'title_burmese' => $request->title_burmese,
                'location_burmese' => $request->location_burmese,
                'content_burmese' => $request->content_burmese,
                'title_chinese' => $request->title_chinese,
                'location_chinese' => $request->location_chinese,
                'content_chinese' => $request->content_chinese,
                'url_slug' => $request->slug_url,
                'featured' => ($request->featured == 'on') ? true : false,
                'images' => json_encode($images),
                'status' => $request->status,
                'author_id' => Auth::id(),
            ];
        } else {
            $csr = [
                'title' => $request->title,
                'location' => $request->location,
                'content' => $request->content,
                'title_burmese' => $request->title_burmese,
                'location_burmese' => $request->location_burmese,
                'content_burmese' => $request->content_burmese,
                'title_chinese' => $request->title_chinese,
                'location_chinese' => $request->location_chinese,
                'content_chinese' => $request->content_chinese,
                'url_slug' => $request->slug_url,
                'featured' => ($request->featured == 'on') ? true : false,
                'status' => $request->status,
                'author_id' => Auth::id(),
            ];
        }

        CSR::where('id', '=', $id)->update($csr);

        return redirect()->route('csr#list')->with(['success_message' => 'Successfully <strong>updated!</strong>']);
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
            $csr = CSR::where('id', '=', Crypt::decryptString($id))->first();
            $flag = 'unpublished';

            if ($csr->status == 'published') {
                $flag = 'unpublished';
            } else {
                $flag = 'published';
            }

            CSR::where('id', '=', Crypt::decryptString($id))->update(['status' => $flag]);

            return redirect()
                ->route('csr#list')
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
            CSR::where('id', '=', Crypt::decryptString($id))->update(['status' => 'draft']);

            return redirect()
                ->route('csr#list')
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
            $csr_db = DB::table('c_s_r_s')
                ->join('users', 'users.id', '=', 'c_s_r_s.author_id')
                ->select(
                    'c_s_r_s.id as id',
                    'c_s_r_s.title as title',
                    'c_s_r_s.content as content',
                    'c_s_r_s.status as status',
                    'c_s_r_s.created_at as created_at',
                    'c_s_r_s.updated_at as updated_at',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );

            $localeData = ['lang' => 'en-US', 'name' => 'English'];
        } else if (Str::lower($locale) == $lang_burmese) {
            $csr_db = DB::table('c_s_r_s')
                ->join('users', 'users.id', '=', 'c_s_r_s.author_id')
                ->select(
                    'c_s_r_s.id as id',
                    'c_s_r_s.title_burmese as title',
                    'c_s_r_s.content_burmese as content',
                    'c_s_r_s.status as status',
                    'c_s_r_s.created_at as created_at',
                    'c_s_r_s.updated_at as updated_at',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );

            $localeData = ['lang' => 'my-MM', 'name' => 'Burmese'];
        } else if (Str::lower($locale) == $lang_chinese) {
            $csr_db = DB::table('c_s_r_s')
                ->join('users', 'users.id', '=', 'c_s_r_s.author_id')
                ->select(
                    'c_s_r_s.id as id',
                    'c_s_r_s.title_chinese as title',
                    'c_s_r_s.content_chinese as content',
                    'c_s_r_s.status as status',
                    'c_s_r_s.created_at as created_at',
                    'c_s_r_s.updated_at as updated_at',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );

            $localeData = ['lang' => 'zh-CN', 'name' => 'Chinese'];
        } else {
            $csr_db = DB::table('c_s_r_s')
                ->join('users', 'users.id', '=', 'c_s_r_s.author_id')
                ->select(
                    'c_s_r_s.id as id',
                    'c_s_r_s.title as title',
                    'c_s_r_s.content as content',
                    'c_s_r_s.title_burmese as title_burmese',
                    'c_s_r_s.content_burmese as content_burmese',
                    'c_s_r_s.title_chinese as title_chinese',
                    'c_s_r_s.content_chinese as content_chinese',
                    'c_s_r_s.status as status',
                    'c_s_r_s.created_at as created_at',
                    'c_s_r_s.updated_at as updated_at',
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
             * Retrieve c_s_r_s by title
             *
             **/
            if ($con['key'] == 'title') {
                if (Str::lower($locale) == $lang_burmese) {
                    $csr_db->where('c_s_r_s.title_burmese', '=', Str::replace('+', ' ', $con['value']));
                } else if (Str::lower($locale) == $lang_chinese) {
                    $csr_db->where('c_s_r_s.title_chinese', '=', Str::replace('+', ' ', $con['value']));
                } else {
                    $csr_db->where('c_s_r_s.title', '=', Str::replace('+', ' ', $con['value']));
                }
            } //End of retreiving c_s_r_s by title
            /***
             *
             * Retrieve c_s_r_s by author
             *
             **/
            else if ($con['key'] == 'author') {
                $csr_db->where('users.name', '=', Str::replace('+', ' ', $con['value']));
            } //End of retreiving c_s_r_s by author

            /***
             *
             * Retrieve c_s_r_s with order by
             *
             **/
            else if ($con['key'] == 'order') {
                if (isset($con['value'])) {
                    $orderBy = explode(',', $con['value']);

                    if ($orderBy[0] == 'desc') {
                        if (isset($orderBy[1])) {
                            if ($orderBy[1] == 'title') {
                                if (Str::lower($locale) == $lang_burmese) {
                                    $csr_db->orderByDesc('c_s_r_s.title_burmese');
                                } else if (Str::lower($locale) == $lang_chinese) {
                                    $csr_db->orderByDesc('c_s_r_s.title_chinese');
                                } else {
                                    $csr_db->orderByDesc('c_s_r_s.title');
                                }
                            } else if ($orderBy[1] == 'author') {
                                $csr_db->orderByDesc('users.name');
                            } else if ($orderBy[1] == 'created') {
                                $csr_db->orderByDesc('c_s_r_s.created_at');
                            } else if ($orderBy[1] == 'updated') {
                                $csr_db->orderByDesc('c_s_r_s.updated_at');
                            } else {
                                $csr_db->orderByDesc('c_s_r_s.created_at');
                            }
                        } else {
                            $csr_db->orderByDesc('c_s_r_s.created_at');
                        }
                    } else if ($orderBy[0] == 'asc') {
                        if (isset($orderBy[1])) {
                            if ($orderBy[1] == 'title') {
                                if (Str::lower($locale) == $lang_burmese) {
                                    $csr_db->orderBy('c_s_r_s.title_burmese');
                                } else if (Str::lower($locale) == $lang_chinese) {
                                    $csr_db->orderBy('c_s_r_s.title_chinese');
                                } else {
                                    $csr_db->orderBy('c_s_r_s.title');
                                }
                            } else if ($orderBy[1] == 'author') {
                                $csr_db->orderByDesc('users.name');
                            } else if ($orderBy[1] == 'created') {
                                $csr_db->orderBy('c_s_r_s.created_at');
                            } else if ($orderBy[1] == 'updated') {
                                $csr_db->orderBy('c_s_r_s.updated_at');
                            } else {
                                $csr_db->orderBy('c_s_r_s.created_at');
                            }
                        } else {
                            $csr_db->orderBy('c_s_r_s.created_at');
                        }
                    } else {
                        $response = [
                            'code' => 400,
                            'status' => 'Order by key has been mismatched.',
                        ];

                        return response()->json($response);
                    }
                } else {
                    $csr_db->orderByDesc('c_s_r_s.created_at');
                }
            } //End of order by
        } //End of conditions

        $c_s_r_s = $csr_db->get();

        if ($c_s_r_s->count() > 0) {
            $response = [
                'code' => 200,
                'status' => 'success',
                'locale' => $localeData,
                'data' => $c_s_r_s,
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
            $csr_db = DB::table('c_s_r_s')
                ->join('users', 'users.id', '=', 'c_s_r_s.author_id')
                ->select(
                    'c_s_r_s.id as id',
                    'c_s_r_s.title as title',
                    'c_s_r_s.content as content',
                    'c_s_r_s.status as status',
                    'c_s_r_s.created_at as created_at',
                    'c_s_r_s.updated_at as updated_at',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );

            $localeData = ['lang' => 'en-US', 'name' => 'English'];
        } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_burmese) {
            $csr_db = DB::table('c_s_r_s')
                ->join('users', 'users.id', '=', 'c_s_r_s.author_id')
                ->select(
                    'c_s_r_s.id as id',
                    'c_s_r_s.title_burmese as title',
                    'c_s_r_s.content_burmese as content',
                    'c_s_r_s.status as status',
                    'c_s_r_s.created_at as created_at',
                    'c_s_r_s.updated_at as updated_at',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );

            $localeData = ['lang' => 'my-MM', 'name' => 'Burmese'];
        } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
            $csr_db = DB::table('c_s_r_s')
                ->join('users', 'users.id', '=', 'c_s_r_s.author_id')
                ->select(
                    'c_s_r_s.id as id',
                    'c_s_r_s.title_chinese as title_chinese',
                    'c_s_r_s.content_chinese as content_chinese',
                    'c_s_r_s.status as status',
                    'c_s_r_s.created_at as created_at',
                    'c_s_r_s.updated_at as updated_at',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );

            $localeData = ['lang' => 'zh-CN', 'name' => 'Chinese'];
        } else {
            $csr_db = DB::table('c_s_r_s')
                ->join('users', 'users.id', '=', 'c_s_r_s.author_id')
                ->select(
                    'c_s_r_s.id as id',
                    'c_s_r_s.title as title',
                    'c_s_r_s.content as content',
                    'c_s_r_s.title_burmese as title_burmese',
                    'c_s_r_s.content_burmese as content_burmese',
                    'c_s_r_s.title_chinese as title_chinese',
                    'c_s_r_s.content_chinese as content_chinese',
                    'c_s_r_s.status as status',
                    'c_s_r_s.created_at as created_at',
                    'c_s_r_s.updated_at as updated_at',
                    'users.name as author_name',
                    'users.email as author_email',
                    'users.profile_photo_path as author_photo'
                );

            $localeData = ['lang' => 'en-US/my-MM/zh-CN', 'name' => 'English/Burmese/Chinese'];
        }

        /***
         *
         * Retrieve c_s_r_s by id
         *
         **/
        if (isset($data['id'])) {
            $csr_db->where('c_s_r_s.id', '=', $data['id']);
        } //End of retreiving c_s_r_s by id

        /***
         *
         * Retrieve c_s_r_s by title
         *
         **/
        if (isset($data['title'])) {
            if (isset($data['locale']) and Str::lower($data['locale']) == $lang_english) {
                $csr_db->where('c_s_r_s.title', '=', $data['title']);
            } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
                $csr_db->where('c_s_r_s.title_chinese', '=', $data['title']);
            } else {
                $csr_db->where('c_s_r_s.title_burmese', '=', $data['title']);
            }
        } //End of retreiving c_s_r_s by title

        /***
         *
         * Retrieve c_s_r_s by status
         *
         **/
        if (isset($data['status'])) {
            $csr_db->where('c_s_r_s.status', '=', $data['status']);
        } //End of retreiving c_s_r_s by status

        /***
         *
         * Retrieve pages by title
         *
         **/
        if (isset($data['created'])) {
            $csr_db->whereDate('c_s_r_s.created_at', '=', date("Y-m-d", strtotime($data['created'])));
        } //End of retreiving pages by created

        /***
         *
         * Retrieve c_s_r_s ordered by
         *
         **/
        if (isset($data['order'])) {
            if (isset($data['locale']) and Str::lower($data['locale']) == $lang_english) {
                if (isset($data['order']['orderby']) and Str::lower($data['order']['orderby']) == 'desc') {
                    if (isset($data['order']['field'])) {
                        $csr_db->orderByDesc(Str::lower($data['order']['field']));
                    } else {
                        $csr_db->orderByDesc('c_s_r_s.title');
                    }
                } else {
                    if (isset($data['order']['field'])) {
                        $csr_db->orderBy(Str::lower($data['order']['field']));
                    } else {
                        $csr_db->orderBy('c_s_r_s.title');
                    }
                }
            } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
                if (isset($data['order']['orderby']) and Str::lower($data['order']['orderby']) == 'desc') {
                    if (isset($data['order']['field'])) {
                        $csr_db->orderByDesc(Str::lower($data['order']['field']) . '_chinese');
                    } else {
                        $csr_db->orderByDesc('c_s_r_s.title_chinese');
                    }
                } else {
                    if (isset($data['order']['field'])) {
                        $csr_db->orderBy(Str::lower($data['order']['field']) . '_chinese');
                    } else {
                        $csr_db->orderBy('c_s_r_s.title_chinese');
                    }
                }
            } else {
                if (isset($data['order']['orderby']) and Str::lower($data['order']['orderby']) == 'desc') {
                    if (isset($data['order']['field'])) {
                        $csr_db->orderByDesc(Str::lower($data['order']['field']) . '_burmese');
                    } else {
                        $csr_db->orderByDesc('c_s_r_s.title_burmese');
                    }
                } else {
                    if (isset($data['order']['field'])) {
                        $csr_db->orderBy(Str::lower($data['order']['field']) . '_burmese');
                    } else {
                        $csr_db->orderBy('c_s_r_s.title_burmese');
                    }
                }
            }
        } //End of retreiving c_s_r_s ordered by

        /*
        * Record count
        */
        $count_db = $csr_db;

        $total_count = $count_db->count();
        // End of record count

        /*
         * Limit the number of results.
         */
        if (isset($data['limit'])) {
            if (isset($data['page'])) {
                $csr_db->skip($data['page'])->take($data['limit']);
            } else {
                $csr_db->skip(0)->take($data['limit']);
            }
        } // End of limit the number of results.

        $c_s_r_s = $csr_db->get();

        if ($c_s_r_s->count() > 0) {
            $response = [
                'code' => 200,
                'status' => 'success',
                'locale' => $localeData,
                'count' => $total_count,
                'data' => $c_s_r_s,
            ];
        } else {
            $response = [
                'code' => 204,
                'status' => 'no content',
            ];
        }

        return response()->json($response);
    }

    private function getCSR($paginate, $search_column = null, $search_operator = null, $search_value = null)
    {
        $csr_db = DB::table('c_s_r_s')
            ->join('users', 'users.id', '=', 'c_s_r_s.author_id')
            ->select(
                'c_s_r_s.id as id',
                'c_s_r_s.title as title',
                'c_s_r_s.content as content',
                'c_s_r_s.featured as featured',
                'c_s_r_s.title_burmese as title_burmese',
                'c_s_r_s.content_burmese as content_burmese',
                'c_s_r_s.title_chinese as title_chinese',
                'c_s_r_s.content_chinese as content_chinese',
                'c_s_r_s.images as images',
                'c_s_r_s.url_slug as slug_url',
                'c_s_r_s.status as status',
                'c_s_r_s.created_at as created_at',
                'c_s_r_s.updated_at as updated_at',
                'c_s_r_s.author_id as author_id',
                'users.name as author_name',
                'users.email as author_email',
                'users.profile_photo_path as author_photo',
                'users.name as author_name',
                'users.email as author_email',
                'users.profile_photo_path as author_photo'
            );

        if (is_null($search_column) and is_null($search_operator) and is_null($search_value)) {
            if ($paginate > 0) {
                return $csr_db->paginate($paginate);
            } else {
                return $csr_db->get();
            }
        } else {
            if ($paginate > 0) {
                return $csr_db->where($search_column, $search_operator, $search_value)->paginate($paginate);
            } else {
                return $csr_db->where($search_column, $search_operator, $search_value)->get();
            }
        }
    }
}
