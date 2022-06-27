<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PromotionBlock;

class PromotionBlockController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = PromotionBlock::get();

        return view('admin.blocks.promotion.list')->with(['promotions' => $promotions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blocks.promotion.add-edit')->with(['action' => 'new']);
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
            'description_english' => 'required',
            'description_burmese' => 'required',
            'description_chinese' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('promotion#block')
                ->withErrors($validator)
                ->withInput();
        }

        PromotionBlock::create([
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
            'image' => $request->image,
            'is_active' => ($request->is_active == 'on' ? true : false),
        ]);

        $key = config('efi.api_key');

        $data = [
            'type' => 'promotions-updated',
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

        return redirect()->route('promotion#list')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotion = PromotionBlock::where('id', '=', Crypt::decryptString($id))->first();

        return view('admin.blocks.promotion.add-edit')->with(['action' => 'update','promotion' => $promotion]);
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
            'description_english' => 'required',
            'description_burmese' => 'required',
            'description_chinese' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('promotion#block')
                ->withErrors($validator)
                ->withInput();
        }

        PromotionBlock::where('id', '=', $id)->update([
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
            'image' => $request->image,
            'is_active' => ($request->is_active == 'on' ? true : false),
        ]);

        $key = config('efi.api_key');

        $data = [
            'type' => 'promotions-updated',
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

        return redirect()->route('promotion#list')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
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
            $team = PromotionBlock::where('id', '=', Crypt::decryptString($id))->first();
            $flag = false;
            $message = 'disabled';

            if ($team->is_active) {
                $flag = false;
                $message = 'disabled';
            } else {
                $flag = true;
                $message = 'enabled';
            }

            PromotionBlock::where('id', '=', Crypt::decryptString($id))->update(['is_active' => $flag]);

            return redirect()
                ->route('promotion#list')
                ->with(['success_message' => 'Successfully <strong>' . $message . '!</strong>']);
        } catch (DecryptException $e) {
            abort(404, 'Decrypt Exception occured.');
        }
    }
}
