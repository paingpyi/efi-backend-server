<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Calculate Comprehensive Motor Insurance API via form data.
     * General Insurance
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
                'code' => 400,
                'status' => 'Bad Request',
                'error' => $validator->errors(),
                'old' => $request->all(),
            ];

            return response()->json($response);
        }
    }

    /**
     * Calculate Short Term Endowment Insurance API via form data.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateShortTermEndowment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'insured_amount' => 'required|numeric|min:1',
            'insured_age' => 'required',
            'term' => 'required|min:100',
        ]);

        if ($validator->fails()) {
            $response = [
                'code' => 400,
                'status' => 'Bad Request',
                'error' => $validator->errors(),
                'old' => $request->all(),
            ];

            return response()->json($response);
        }
    }
}
