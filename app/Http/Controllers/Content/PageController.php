<?php

namespace App\Http\Controllers\Content;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
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
        $category = Category::where('is_active', '=', true)->get();

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
            'title' => 'required|unique:blogs|max:255',
            'content' => 'required',
            'title_burmese' => 'required|unique:blogs|max:255',
            'content_burmese' => 'required',
            'slug_url' => 'required|unique:blogs,url_slug',
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
                'url_slug' => $request->slug_url,
                'related_contents' => isset($request->products) ? json_encode($request->products) : null,
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
