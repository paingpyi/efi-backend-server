<?php

namespace App\Http\Controllers;

use App\Models\HomeWhyEFIBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class HomeBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function whyEFI()
    {
        $why = HomeWhyEFIBlock::where('id', '=', 1)->first();

        if(Session::has('success_message')) {
            $data = [
                'why' => $why,
                'success_message' =>Session::get('success_message')
            ];
        } else {
            $data = [
                'why' => $why,
            ];
        }

        return view('admin.blocks.whyblock.add-edit')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'text' => 'required',
            'text_burmese' => 'required',
            'text_chinese' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('why#efi#block')
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'text' => json_encode([
                'en-us' => $request->text,
                'my-mm' => $request->text_burmese,
                'zh-cn' => $request->text_chinese
            ]),
            'image' => Str::replace(config('app.url'), '', $request->image),
        ];

        HomeWhyEFIBlock::where('id', '=', 1)->update($data);

        $key = config('efi.api_key');

        $data = [
            'type' => 'home-page-updated',
            'locales' => ["en-US", "my-MM", "zh-CN"],
        ];

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$key}"
        ])->post('https://efigmm.com/api/revalidate', $data);

        Log::info('Log message', array([
            'context' => [
                'response code' => $response->status(),
                'response reason' => $response->body(),
                'data' => $data
            ]
        ]));

        return redirect()->route('why#efi#block')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
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
}
