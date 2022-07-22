<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\AboutEfigPage;

class AboutEfigPageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cover()
    {
        $about = AboutEfigPage::where('id', '=', 1)->first();

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

        return view('admin.blocks.aboutefig.edit')->with($data);
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
                ->route('efig#cover#block')
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

        AboutEfigPage::where('id', '=', 1)->update($aboutefig);

        //Revalidate Frontend

        return redirect()->route('efig#cover#block')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
    }
}
