<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\AboutEfilBlock;
use App\Models\AboutEfilPage;

class AboutEfilPageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cover()
    {
        $about = AboutEfilPage::where('id', '=', 1)->first();

        if(Session::has('success_message')) {
            $data = [
                'about' => $about,
                'success_message' =>Session::get('success_message')
            ];
        } else {
            $data = [
                'about' => $about,
            ];
        }

        return view('admin.blocks.aboutefil.edit')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCover(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'title_burmese' => 'required|max:255',
            'title_chinese' => 'required|max:255',
            'cover' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('efil#cover#block')
                ->withErrors($validator)
                ->withInput();
        }

        $aboutefig = [
            'title' => json_encode([
                'en-us' => $request->title,
                'my-mm' => $request->title_burmese,
                'zh-cn' => $request->title_chinese
            ]),
            'cover' => Str::replace(config('app.url'), '', $request->cover)
        ];

        AboutEfilPage::where('id', '=', 1)->update($aboutefig);

        //Revalidate Frontend

        return redirect()->route('efil#cover#block')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $blocks = AboutEfilBlock::where('is_active', '=', true)->get();

        return view('admin.blocks.aboutefil.blocks')->with(['blocks' => $blocks]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dlist()
    {
        $blocks = AboutEfilBlock::where('is_active', '=', false)->get();

        return view('admin.blocks.aboutefil.blocks')->with(['blocks' => $blocks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blocks.aboutefil.add-edit')->with(['action' => 'new']);
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
            'image' => 'required',
        ]);

        if ($validator->fails()) {dd($validator);
            return redirect()
                ->route('new#efig#block')
                ->withErrors($validator)
                ->withInput();
        }

        $aboutefig = [
            'title' => json_encode([
                'en-us' => $request->title,
                'my-mm' => $request->title_burmese,
                'zh-cn' => $request->title_chinese
            ]),
            'description' => json_encode([
                'en-us' => $request->description_english,
                'my-mm' => $request->description_burmese,
                'zh-cn' => $request->description_chinese
            ]),
            'image' => Str::replace(config('app.url'), '', $request->image),
            'is_active' => ($request->is_active == 'on') ? TRUE : FALSE,
        ];

        AboutEfilBlock::create($aboutefig);

        //Revalidate Frontend

        return redirect()->route('efil#block')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $block = AboutEfilBlock::where('id', '=', Crypt::decryptString($id))->first();

        return view('admin.blocks.aboutefil.add-edit')->with(['action' => 'update', 'block' => $block]);
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
            'image' => 'required',
        ]);

        if ($validator->fails()) {dd($validator);
            return redirect()
                ->route('new#efil#block')
                ->withErrors($validator)
                ->withInput();
        }

        $aboutefig = [
            'title' => json_encode([
                'en-us' => $request->title,
                'my-mm' => $request->title_burmese,
                'zh-cn' => $request->title_chinese
            ]),
            'description' => json_encode([
                'en-us' => $request->description_english,
                'my-mm' => $request->description_burmese,
                'zh-cn' => $request->description_chinese
            ]),
            'image' => Str::replace(config('app.url'), '', $request->image),
            'is_active' => ($request->is_active == 'on') ? TRUE : FALSE,
        ];

        AboutEfilBlock::where('id', '=', $id)->update($aboutefig);

        //Revalidate Frontend

        return redirect()->route('efil#block')->with(['success_message' => 'Successfully <strong>updated!</strong>']);
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
            $block = AboutEfilBlock::where('id', '=', Crypt::decryptString($id))->first();
            $flag = false;
            $message = 'deactivated';

            if ($block->is_active) {
                $flag = false;
                $message = 'deactivated';
            } else {
                $flag = true;
                $message = 'activated';
            }

            AboutEfilBlock::where('id', '=', Crypt::decryptString($id))->update(['is_active' => $flag]);

            return redirect()
                ->route('efil#block')
                ->with(['success_message' => 'Successfully <strong>' . $message . '!</strong>']);
        } catch (DecryptException $e) {
            abort(404, 'Decrypt Exception occured.');
        }
    }
}
