<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * API List with Post data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateMotor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'insured_amount' => 'required|numeric|min:1',
            'type_of_vehicle' => 'required',
            'engine_displacement' => 'required|min:100',
            'windscreen' => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            $response = [
                'code' => 204,
                'status' => 'no content',
            ];

            return response()->json($response);
        }
    }
}
