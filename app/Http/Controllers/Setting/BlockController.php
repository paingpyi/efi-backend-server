<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sliderAPI()
    {
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
}
