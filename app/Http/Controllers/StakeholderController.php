<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Models\Stakeholders;
use Illuminate\Http\Request;

class StakeholderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stakeholders = Stakeholders::get();

        return view('admin.blocks.stakeholder.list')->with(['stakeholders' => $stakeholders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blocks.stakeholder.add-edit')->with(['action' => 'new']);
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
            'name' => 'required|max:255',
            'name_burmese' => 'required|max:255',
            'name_chinese' => 'required|max:255',
            'description_english' => 'required',
            'description_burmese' => 'required',
            'description_chinese' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('stakeholder#block')
                ->withErrors($validator)
                ->withInput();
        }

        Stakeholders::create([
            'name' => json_encode([
                'en-us' => $request->name,
                'my-mm' => $request->name_burmese,
                'zh-cn' => $request->name_chinese
            ]),
            'description' => json_encode([
                'en-us' => $request->description_english,
                'my-mm' => $request->description_burmese,
                'zh-cn' => $request->description_chinese
            ]),
            'image' => $request->image,
            'is_active' => ($request->is_active == 'on' ? true : false),
        ]);

        $key = config('efi.api_key');

        $data = [
            'type' => 'careers-efi-l-page-updated',
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

        return redirect()->route('stakeholder#list')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
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
        $stakeholder = Stakeholders::where('id', '=', Crypt::decryptString($id))->first();

        return view('admin.blocks.stakeholder.add-edit')->with(['action' => 'update', 'stakeholder' => $stakeholder]);
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
