<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\SliderBlock;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = DB::table('slider_blocks')
            ->select(
                'id',
                DB::raw('JSON_EXTRACT(title, \'$."en-us"\') as title'),
                'image',
                'kind'
            )->get();

        return view('admin.blocks.slider.list')->with(['sliders' => $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blocks.slider.add-edit')->with(['action' => 'new']);
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
            'title_burmese' => 'required|max:255',
            'title_chinese' => 'required|max:255',
            'kind' => 'required|max:255',
            'cover_image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('new#slider')
                ->withErrors($validator)
                ->withInput();
        }

        SliderBlock::create([
            'title' => json_encode([
                'en-us' => $request->title,
                'my-mm' => $request->title_burmese,
                'zh-cn' => $request->title_chinese
            ]),
            'image' => $request->cover_image,
            'kind' => $request->kind,
        ]);

        return redirect()->route('slider#list')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
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
        $sliders_en = DB::table('slider_blocks')
            ->select(
                'id',
                DB::raw('JSON_EXTRACT(title, \'$."en-us"\') as title'),
                'image',
                'kind'
            )->where('id', '=', Crypt::decryptString($id))->first();
        $sliders_zh = DB::table('slider_blocks')
            ->select(
                'id',
                DB::raw('JSON_EXTRACT(title, \'$."zh-cn"\') as title'),
                'image',
                'kind'
            )->where('id', '=', Crypt::decryptString($id))->first();
        $sliders_mm = DB::table('slider_blocks')
            ->select(
                'id',
                DB::raw('JSON_EXTRACT(title, \'$."my-mm"\') as title'),
                'image',
                'kind'
            )->where('id', '=', Crypt::decryptString($id))->first();

        return view('admin.blocks.slider.add-edit')->with(['action' => 'update', 'sliders_en' => $sliders_en, 'sliders_zh' => $sliders_zh, 'sliders_mm' => $sliders_mm]);
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
            'title_burmese' => 'required|max:255',
            'title_chinese' => 'required|max:255',
            'kind' => 'required|max:255',
            'cover_image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('edit#slider')
                ->withErrors($validator)
                ->withInput();
        }

        SliderBlock::where('id', '=', $id)->update([
            'title' => json_encode([
                'en-us' => $request->title,
                'my-mm' => $request->title_burmese,
                'zh-cn' => $request->title_chinese
            ]),
            'image' => $request->cover_image,
            'kind' => $request->kind,
        ]);

        return redirect()->route('slider#list')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
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
}
