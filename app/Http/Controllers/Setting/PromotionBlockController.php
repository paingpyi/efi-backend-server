<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PromotionBlock;

class PromotionBlockController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promotion = PromotionBlock::where('id', '=', 1)->first();

        return view('admin.blocks.promotion.add-edit')->with(['promotion' => $promotion]);
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

        PromotionBlock::where('id', '=', 1)->update([
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

        return redirect()->route('promotion#block')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
    }
}
