<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
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
        //
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
