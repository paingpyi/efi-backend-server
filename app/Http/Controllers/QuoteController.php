<?php

namespace App\Http\Controllers;

use App\Models\Formula;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
     * Calculate Comprehensive Motor Insurance API via JSON.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getPremiumType(Request $request)
    {
        $response_code = 200;
        $data = $request->json()->all();

        if (!isset($data['locale'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => 'insured_amount' . $this->required_error_eng,
                'olds' => $request->all(),
            ];
        } else if(Str::lower($data['locale'])=='en-us') {
            $response = [
                'code' => $response_code,
                'status' => $this->success_eng,
                'data' => [
                    [
                        'name' => 'Annual',
                        'value' => 'annual',
                    ],
                    [
                        'name' => 'Semi-annual',
                        'value' => 'semi-annual',
                    ],
                    [
                        'name' => 'Quarterly',
                        'value' => 'quarterly',
                    ],
                ]
            ];
        } else if(Str::lower($data['locale'])=='zh-cn') {
            $response = [
                'code' => $response_code,
                'status' => $this->success_eng,
                'data' => [
                    [
                        'name' => 'Annual',
                        'value' => 'annual',
                    ],
                    [
                        'name' => 'Semi-annual',
                        'value' => 'semi-annual',
                    ],
                    [
                        'name' => 'Quarterly',
                        'value' => 'quarterly',
                    ],
                ]
            ];
        } else if(Str::lower($data['locale'])=='my-mm') {
            $response = [
                'code' => $response_code,
                'status' => $this->success_eng,
                'data' => [
                    [
                        'name' => 'Annual',
                        'value' => 'annual',
                    ],
                    [
                        'name' => 'Semi-annual',
                        'value' => 'semi-annual',
                    ],
                    [
                        'name' => 'Quarterly',
                        'value' => 'quarterly',
                    ],
                ]
            ];
        }


            return response()->json($response, $response_code);
    }

    /**
     * Calculate Comprehensive Motor Insurance API via JSON.
     * Life Insurance
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
        $response_code = 200;

        if (!isset($data['insured_amount'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => 'insured_amount' . $this->required_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        if (!isset($data['insured_age'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => 'insured_age' . $this->required_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        if (!isset($data['term'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => 'term' . $this->required_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        if (!is_numeric($data['insured_amount'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => 'insured_amount' . $this->numeric_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        if (!is_numeric($data['insured_age'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => 'insured_age' . $this->numeric_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        if (!is_numeric($data['term'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => 'term' . $this->numeric_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        $flag = false;
        $result = 0;

        foreach (Formula::where('method', '=', 'calculateShortTermEndowment')->get() as $formula) {
            foreach (json_decode($formula->conditions) as $condition) {
                if ($condition->operator == '<') {
                    if ($data[$condition->field] < $condition->value) {
                        $flag = true;
                    } else {
                        $flag = false;
                        break;
                    }
                } else if ($condition->operator == '>') {
                    if ($data[$condition->field] > $condition->value) {
                        $flag = true;
                    } else {
                        $flag = false;
                        break;
                    }
                } else if ($condition->operator == '<=') {
                    if ($data[$condition->field] <= $condition->value) {
                        $flag = true;
                    } else {
                        $flag = false;
                        break;
                    }
                } else if ($condition->operator == '>=') {
                    if ($data[$condition->field] >= $condition->value) {
                        $flag = true;
                    } else {
                        $flag = false;
                        break;
                    }
                } else if ($condition->operator == '==') {
                    if ($data[$condition->field] == $condition->value) {
                        $flag = true;
                    } else {
                        $flag = false;
                        break;
                    }
                } else {
                    $response_code = 400;

                    $response = [
                        'code' => $response_code,
                        'status' => $this->error400status_eng,
                        'errors' => $this->error_operators_eng,
                        'olds' => $condition->field . ' ' . $condition->operator . ' ' . $condition->value,
                    ];

                    return response()->json($response, $response_code);
                }
            } // End of conditions

            if ($flag) {
                foreach (json_decode($formula->formulas) as $formula) {
                    if ($formula == '+') {
                        if ($result == 0) {
                            $result = $data[$formula->field] + $formula->value;
                        } else {
                            $result = $result + $formula->value;
                        }
                    } else if ($formula->operator == '-') {
                        if ($result == 0) {
                            $result = $data[$formula->field] - $formula->value;
                        } else {
                            $result = $result - $formula->value;
                        }
                    } else if ($formula->operator == '*') {
                        if ($result == 0) {
                            $result = $data[$formula->field] * $formula->value;
                        } else {
                            $result = $result * $formula->value;
                        }
                    } else if ($formula->operator == '/') {
                        if ($result == 0) {
                            $result = $data[$formula->field] / $formula->value;
                        } else {
                            $result = $result / $formula->value;
                        }
                    } else {
                        $response_code = 400;

                        $response = [
                            'code' => $response_code,
                            'status' => $this->error400status_eng,
                            'errors' => $this->error_arithmetic_eng,
                            'olds' => $formula->field . ': Formula - ' . $formula->value,
                        ];

                        return response()->json($response, $response_code);
                    }
                } // End of formula
            }
        } // End of Formula Table

        if ($result <= 0) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => $this->not_eligible_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        $output = [];

        for ($i = 1; $i <= $request->term; $i++) {
            $output[] = [
                $i => $result,
            ];
        }

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'result' => $output,
            'total' => $result * $request->term,
        ];

        return response()->json($response, $response_code);
    }

    /**
     * Calculate Student Life Insurance API via JSON.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateStudentLife(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;
        $flag = false;
        $result = [
            'policy_term' => 0,
            'premium_term' => 0,
            'value' => 0
        ];

        if (!isset($data['insured_amount'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => 'insured_amount' . $this->required_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        if (!isset($data['insured_age'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => 'insured_age' . $this->required_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        if (!isset($data['premium_type'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => 'premium_type' . $this->required_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        foreach (Formula::where('method', '=', 'calculateStudentLife')->get() as $formula) {
            foreach (json_decode($formula->conditions) as $condition) {
                if ($condition->operator == '==') {
                    if ($data[$condition->field] == $condition->value) {
                        $flag = true;
                    } else {
                        $flag = false;
                        break;
                    }
                } else {
                    $response_code = 400;

                    $response = [
                        'code' => $response_code,
                        'status' => $this->error400status_eng,
                        'errors' => $this->error_operators_eng,
                        'olds' => $condition->field . ' ' . $condition->operator . ' ' . $condition->value,
                    ];

                    return response()->json($response, $response_code);
                }
            } // End of condition

            if ($flag) {
                foreach (json_decode($formula->formulas) as $formula) {
                    if ($formula == '+') {
                        if ($result['value'] == 0) {
                            $result['value'] = $data[$formula->field] + $formula->value;
                        } else {
                            $result['value'] = $result['value'] + $formula->value;
                        }
                    } else if ($formula->operator == '-') {
                        if ($result['value'] == 0) {
                            $result['value'] = $data[$formula->field] - $formula->value;
                        } else {
                            $result['value'] = $result['value'] - $formula->value;
                        }
                    } else if ($formula->operator == '*') {
                        if ($result['value'] == 0) {
                            $result['value'] = $data[$formula->field] * $formula->value;
                        } else {
                            $result['value'] = $result['value'] * $formula->value;
                        }
                    } else if ($formula->operator == '/') {
                        if ($result['value'] == 0) {
                            $result['value'] = $data[$formula->field] / $formula->value;
                        } else {
                            $result['value'] = $result['value'] / $formula->value;
                        }
                    } else if ($formula->operator == '=') {
                        $result[$formula->field] = $formula->value;
                    } else {
                        $response_code = 400;

                        $response = [
                            'code' => $response_code,
                            'status' => $this->error400status_eng,
                            'errors' => $this->error_arithmetic_eng,
                            'olds' => $formula->field . ': Formula - ' . $formula->value,
                        ];

                        return response()->json($response, $response_code);
                    }
                } // End of formula
            }
        }

        if ($result <= 0) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => $this->not_eligible_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        $output = [];

        for ($i = 1; $i <= $result['premium_term']; $i++) {
            $output[] = [
                $i => $result['value'],
            ];
        }

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'insured_age' => $data['insured_age'],
            'insured_amount' => $data['insured_amount'],
            'premium_type' => $data['premium_type'],
            'policy_term' => $result['policy_term'],
            'premium_term' => $result['premium_term'],
            'result' => $output,
            'total' => $result['value'] * $result['premium_term'],
        ];

        return response()->json($response, $response_code);
    }
}
