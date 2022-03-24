<?php

namespace App\Http\Controllers\Content;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
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
