<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlockController extends Controller
{
    /***
     * English
     */
    private $error400status_eng = 'Bad Request';
    private $success_eng = 'success';
    // End of English

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sliderAPI(Request $request)
    {
        $data = $request->json()->all();

        if (!isset($data['locale'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => 'Locale' . $this->required_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response, 400);
        }

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
                    'image' => config('app.url') . $row->image,
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
     * Contact API.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contactAPI(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;
        $status_message = $this->success_eng;
        $errors = [];

        if (!isset($data['locale'])) {
            $response_code = 400;
            $status_message = $this->error400status_eng;
            $errors[] = __('validation.required', ['attribute' => 'locale']);
        }

        if (!isset($data['name'])) {
            $response_code = 400;
            $status_message = $this->error400status_eng;
            $errors[] = __('validation.required', ['attribute' => 'name']);
        }

        if (!isset($data['email'])) {
            $response_code = 400;
            $status_message = $this->error400status_eng;
            $errors[] = __('validation.required', ['attribute' => 'email']);
        }

        if (!isset($data['phone'])) {
            $response_code = 400;
            $status_message = $this->error400status_eng;
            $errors[] = __('validation.required', ['attribute' => 'phone']);
        }

        if ($response_code == 200) {
            Contact::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'message' => $data['message']
            ]);

            $response = [
                'code' => $response_code,
                'status' => $status_message,
                'locale' => $this->getLang($data),
                'data' => [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'message' => $data['message']
                ],
            ];
        } else {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $status_message,
                'errors' => $errors,
                'olds' => $request->all(),
            ];
        }

        return response()->json($response, $response_code);
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
