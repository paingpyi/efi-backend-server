<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sliderAPI(Request $request)
    {
        $data = $request->json()->all();

        $slider = DB::table('slider_blocks')
            ->select(
                'id',
                DB::raw('JSON_EXTRACT(title, \'$."' . Str::lower($data['locale']) . '"\') as title'),
                'image',
                'kind'
            )->get();

        if (isset($slider)) {
            $result = [];
            foreach ($slider as $row) {
                $result[] = [
                    'id' => $row->id,
                    'title' => Str::replace('"', '', $row->title),
                    'image' => $row->image,
                    'kind' => $row->kind
                ];
            }
            $response = [
                'code' => 200,
                'status' => 'success',
                'locale' => $this->getLang($data),
                'count' => $slider->count(),
                'data' => $result,
            ];
        } else {
            $response = [
                'code' => 200,
                'status' => 'no content',
                'locale' => $this->getLang($data),
                'count' => 0,
                'data' => [],
            ];
        }

        return response()->json($response, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contactAPI(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;

        if (!isset($folder)) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => 'folder' . $this->required_error_eng,
                'olds' => $request->all(),
            ];
        }
    }

    private function getLang($data)
    {
        $lang_english = 'en-us';
        $lang_chinese = 'zh-cn';
        $lang_burmese = 'my-mm';

        if (isset($data['locale']) and Str::lower($data['locale']) == $lang_english) {
            return ['lang' => 'en-US', 'name' => 'English'];
        } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
            return ['lang' => 'zh-CN', 'name' => 'Chinese'];
        } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_burmese) {
            return ['lang' => 'my-MM', 'name' => 'Burmese'];
        } else {
            return ['lang' => 'en-US/my-MM/zh-CN', 'name' => 'English/Burmese/Chinese'];
        }
    }
}
