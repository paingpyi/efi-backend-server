<?php

namespace App\Http\Controllers;

use App\Models\Formula;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /***
     * English
     */
    private $error400status_eng = 'Bad Request';
    private $error_operators_eng = 'Condition operator is not valid. The operator must be "<, >, <=, >=, ==".';
    private $error_arithmetic_eng = 'Arithmetic operator is not valid. The operator must be "+, -, *, /".';
    private $required_error_eng = ' field is required to fill.';
    private $numeric_error_eng = ' field must be numeric.';
    private $not_eligible_error_eng = 'You are not eligible to buy this premium.';
    private $success_eng = 'success';
    // End of English

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
                'status' => $this->error400status_eng,
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
        $data = $request->json()->all();

        if (!isset($data['insured_amount'])) {
            $response = [
                'code' => 400,
                'status' => $this->error400status_eng,
                'errors' => 'insured_amount' . $this->required_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response);
        }

        if (!isset($data['insured_age'])) {
            $response = [
                'code' => 400,
                'status' => $this->error400status_eng,
                'errors' => 'insured_age' . $this->required_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response);
        }

        if (!isset($data['term'])) {
            $response = [
                'code' => 400,
                'status' => $this->error400status_eng,
                'errors' => 'term' . $this->required_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response);
        }

        if (!is_numeric($data['insured_amount'])) {
            $response = [
                'code' => 400,
                'status' => $this->error400status_eng,
                'errors' => 'insured_amount' . $this->numeric_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response);
        }

        if (!is_numeric($data['insured_age'])) {
            $response = [
                'code' => 400,
                'status' => $this->error400status_eng,
                'errors' => 'insured_age' . $this->numeric_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response);
        }

        if (!is_numeric($data['term'])) {
            $response = [
                'code' => 400,
                'status' => $this->error400status_eng,
                'errors' => 'term' . $this->numeric_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response);
        }

        $flag = false;
        $result = 0;

        foreach(Formula::where('method', '=', 'calculateShortTermEndowment')->get() as $formula) {
            foreach(json_decode($formula->conditions) as $condition) {
                if($condition->operator == '<') {
                    if($data[$condition->field] < $condition->value) {
                        $flag = true;
                    } else {
                        $flag = false;break;
                    }
                } else if($condition->operator == '>') {
                    if($data[$condition->field] > $condition->value) {
                        $flag = true;
                    } else {
                        $flag = false;break;
                    }
                } else if($condition->operator == '<=') {
                    if($data[$condition->field] <= $condition->value) {
                        $flag = true;
                    } else {
                        $flag = false;break;
                    }
                } else if($condition->operator == '>=') {
                    if($data[$condition->field] >= $condition->value) {
                        $flag = true;
                    } else {
                        $flag = false;break;
                    }
                } else if($condition->operator == '==') {
                    if($data[$condition->field] == $condition->value) {
                        $flag = true;
                    } else {
                        $flag = false;break;
                    }
                } else {
                    $response = [
                        'code' => 400,
                        'status' => $this->error400status_eng,
                        'errors' => $this->error_operators_eng,
                        'olds' => $condition->field.' '.$condition->operator.' ' .$condition->value,
                    ];

                    return response()->json($response);
                }
            } // End of conditions

            if($flag) {
                foreach(json_decode($formula->formulas) as $formula) {
                    if($formula == '+') {
                        if($result == 0) {
                            $result = $data[$formula->field] + $formula->value;
                        } else {
                            $result = $result + $formula->value;
                        }
                    } else if($formula->operator == '-') {
                        if($result == 0) {
                            $result = $data[$formula->field] - $formula->value;
                        } else {
                            $result = $result - $formula->value;
                        }
                    } else if($formula->operator == '*') {
                        if($result == 0) {
                            $result = $data[$formula->field] * $formula->value;
                        } else {
                            $result = $result * $formula->value;
                        }
                    } else if($formula->operator == '/') {
                        if($result == 0) {
                            $result = $data[$formula->field] / $formula->value;
                        } else {
                            $result = $result / $formula->value;
                        }
                    } else {
                        $response = [
                            'code' => 400,
                            'status' => $this->error400status_eng,
                            'errors' => $this->error_arithmetic_eng,
                            'olds' => $formula->field.': Formula - '.$formula->value,
                        ];

                        return response()->json($response);
                    }
                } // End of formula
            }
        } // End of Formula Table

        if($result < 0) {
            $response = [
                'code' => 400,
                'status' => $this->error400status_eng,
                'errors' => $this->not_eligible_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response);
        }

        $output = [];

        for($i = 1; $i <= $request->term; $i++) {
            $output[] = [
                $i => $result,
            ];
        }

        $response = [
            'code' => 200,
            'status' => $this->success_eng,
            'result' => $output,
            'total' => $result * $request->term,
        ];

        return response()->json($response);
    }
}
