<?php

namespace App\Http\Controllers;

use App\Models\ApplyProduct;
use App\Models\Formula;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuoteController extends Controller
{
    /***
     * English
     */
    private $error400status_eng = 'Bad Request';
    private $error404status_eng = 'Product Not Found';
    private $error_operators_eng = 'Condition operator is not valid. The operator must be "<, >, <=, >=, ==".';
    private $error_arithmetic_eng = 'Arithmetic operator is not valid. The operator must be "+, -, *, /".';
    private $required_error_eng = ' field is required to fill.';
    private $numeric_error_eng = ' field must be numeric.';
    private $not_found_error_eng = 'Product is not found.';
    private $not_eligible_error_eng = 'You are not eligible to buy this premium.';
    private $success_eng = 'success';
    // End of English

    /**
     * GET PREMIUM TYPE API via JSON.
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
                'errors' => __('validation.required', ['attribute' => 'Locale']),
                'olds' => $request->all(),
            ];
        } else if (Str::lower($data['locale']) == 'en-us') {
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
        } else if (Str::lower($data['locale']) == 'zh-cn') {
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
        } else if (Str::lower($data['locale']) == 'my-mm') {
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
     * GET TRAVEL TYPE API via JSON.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTravelType(Request $request)
    {
        $response_code = 200;
        $data = $request->json()->all();

        if (!isset($data['locale'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => __('validation.required', ['attribute' => 'Locale']),
                'olds' => $request->all(),
            ];
        } else if (Str::lower($data['locale']) == 'en-us') {
            $response = [
                'code' => $response_code,
                'status' => $this->success_eng,
                'data' => [
                    [
                        'name' => 'Local',
                        'value' => 'local',
                    ],
                    [
                        'name' => 'Foreign',
                        'value' => 'foreign',
                    ],
                    [
                        'name' => 'Below 100 miles',
                        'value' => 'below 100 miles',
                    ],
                ]
            ];
        } else if (Str::lower($data['locale']) == 'zh-cn') {
            $response = [
                'code' => $response_code,
                'status' => $this->success_eng,
                'data' => [
                    [
                        'name' => 'Local',
                        'value' => 'local',
                    ],
                    [
                        'name' => 'Foreign',
                        'value' => 'foreign',
                    ],
                    [
                        'name' => 'Below 100 miles',
                        'value' => 'below 100 miles',
                    ],
                ]
            ];
        } else if (Str::lower($data['locale']) == 'my-mm') {
            $response = [
                'code' => $response_code,
                'status' => $this->success_eng,
                'data' => [
                    [
                        'name' => 'ပြည်တွင်း ခရီးသွား အာမခံ',
                        'value' => 'local',
                    ],
                    [
                        'name' => 'ပြည်ပ ခရီးသွား အာမခံ',
                        'value' => 'foreign',
                    ],
                    [
                        'name' => 'မိုင် ၁၀၀ အောက် ခရီးသွား အာမခံ',
                        'value' => 'below 100 miles',
                    ],
                ]
            ];
        }


        return response()->json($response, $response_code);
    }

    /**
     * GET TRAVEL DURATION API via JSON.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTravelDuration(Request $request)
    {
        $response_code = 200;
        $data = $request->json()->all();

        if (!isset($data['locale'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => __('validation.required', ['attribute' => 'Locale']),
                'olds' => $request->all(),
            ];
        } else if (Str::lower($data['locale']) == 'en-us') {
            $response = [
                'code' => $response_code,
                'status' => $this->success_eng,
                'data' => [
                    [
                        'name' => '1 day',
                        'value' => '1 day',
                    ],
                    [
                        'name' => '3 days',
                        'value' => '3 days',
                    ],
                    [
                        'name' => '1 week',
                        'value' => '1 week',
                    ],
                    [
                        'name' => '2 weeks',
                        'value' => '2 weeks',
                    ],
                    [
                        'name' => '1 month',
                        'value' => '1 month',
                    ],
                    [
                        'name' => '1.5 months',
                        'value' => '1.5 months',
                    ],
                    [
                        'name' => '2 months',
                        'value' => '2 months',
                    ],
                    [
                        'name' => '2.5 months',
                        'value' => '2.5 months',
                    ],
                    [
                        'name' => '3 months',
                        'value' => '3 months',
                    ],
                ]
            ];
        } else if (Str::lower($data['locale']) == 'zh-cn') {
            $response = [
                'code' => $response_code,
                'status' => $this->success_eng,
                'data' => [
                    [
                        'name' => '1 day',
                        'value' => '1 day',
                    ],
                    [
                        'name' => '3 days',
                        'value' => '3 days',
                    ],
                    [
                        'name' => '1 week',
                        'value' => '1 week',
                    ],
                    [
                        'name' => '2 weeks',
                        'value' => '2 weeks',
                    ],
                    [
                        'name' => '1 month',
                        'value' => '1 month',
                    ],
                    [
                        'name' => '1.5 months',
                        'value' => '1.5 months',
                    ],
                    [
                        'name' => '2 months',
                        'value' => '2 months',
                    ],
                    [
                        'name' => '2.5 months',
                        'value' => '2.5 months',
                    ],
                    [
                        'name' => '3 months',
                        'value' => '3 months',
                    ],
                ]
            ];
        } else if (Str::lower($data['locale']) == 'my-mm') {
            $response = [
                'code' => $response_code,
                'status' => $this->success_eng,
                'data' => [
                    [
                        'name' => '၁ ရက်',
                        'value' => '1 day',
                    ],
                    [
                        'name' => '၃ ရက်',
                        'value' => '3 days',
                    ],
                    [
                        'name' => '၁ ပတ်',
                        'value' => '1 week',
                    ],
                    [
                        'name' => 'နှစ်ပတ်',
                        'value' => '2 weeks',
                    ],
                    [
                        'name' => '၁ လ',
                        'value' => '1 month',
                    ],
                    [
                        'name' => '၁လခွဲ',
                        'value' => '1.5 months',
                    ],
                    [
                        'name' => 'နှစ်လ',
                        'value' => '2 months',
                    ],
                    [
                        'name' => 'နှစ်လခွဲ',
                        'value' => '2.5 months',
                    ],
                    [
                        'name' => '၃လ',
                        'value' => '3 months',
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
    public function directApplication(Request $request)
    {
        $data = $request->json()->all();
        $response_code = 200;

        if (!isset($data['locale'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => __('validation.required', ['attribute' => 'Locale']),
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        if (!isset($data['name'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => __('validation.required', ['attribute' => 'Name']),
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        if (!isset($data['phone'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => __('validation.required', ['attribute' => 'Phone']),
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        if (!isset($data['email'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => __('validation.required', ['attribute' => 'Email']),
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        if (!isset($data['quote_machine_name'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => __('validation.required', ['attribute' => 'Quote machine name']),
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        $product = Product::where('quote_machine_name', '=', $data['quote_machine_name'])->first();

        if (isset($product)) {
            $info = [
                'locale' => $data['locale'],
                'product_id' => $product->id,
                'customer' => [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                ]
            ];

            $apply = [
                'info' => json_encode($info),
                'result' => json_encode([]),
                'total' => 0,
            ];

            ApplyProduct::create($apply);

            $response = [
                'code' => $response_code,
                'status' => $this->success_eng,
                'info' => $info,
                'result' => [],
                'total' => 0,
            ];
        } else {
            $response_code = 404;

            $response = [
                'code' => $response_code,
                'status' => $this->error404status_eng,
                'errors' => $this->not_found_error_eng,
                'olds' => $request->all(),
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
        // Code Here...
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

        if (!isset($data['locale'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => 'Locale' . $this->required_error_eng,
                'olds' => $request->all(),
            ];
        }

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
        $info = [];

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

        $output = [
            'labels' => [
                'year' => 'Policy Year',
                '2' => 'Annual Premium',
                '3' => 'Death Benefit',
                '4' => 'Maturity Benefit',
            ]
        ];

        for ($i = 1; $i <= $data['term']; $i++) {
            $output['data'][] = [
                '2' => $result,
                '3' => $data['insured_amount'],
                '4' => ($i == $data['term']) ? $data['insured_amount'] : 0,
            ];
        }

        $product = Product::where('slug_url', '=', 'short-term-endowment-insurance')->first();

        /**
         * Apply this calculation
         */
        if (isset($data['apply'])) {
            if (!isset($data['apply']['name'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, name' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            if (!isset($data['apply']['phone'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, phone' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            if (!isset($data['apply']['email'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, email' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            $info = [
                'locale' => $data['locale'],
                'insured_amount' => $data['insured_amount'],
                'insured_age' => $data['insured_age'],
                'term' => $data['term'],
                'product_id' => $product->id,
                'customer' => [
                    'name' => $data['apply']['name'],
                    'email' => $data['apply']['email'],
                    'phone' => $data['apply']['phone'],
                ]
            ];

            $apply = [
                'info' => json_encode($info),
                'result' => json_encode($output),
                'total' => $result * $request->term,
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'insured_amount' => $data['insured_amount'],
                'insured_age' => $data['insured_age'],
                'term' => $data['term'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
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
        $info = [];

        if (!isset($data['locale'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => 'Locale' . $this->required_error_eng,
                'olds' => $request->all(),
            ];
        }

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

        $output = [
            'labels' => [
                'year' => 'Policy Year',
                '2' => 'Annual Premium',
                '3' => 'Death Benefit',
                '4' => 'Maturity Benefit',
            ]
        ];

        for ($i = 1; $i <= $result['policy_term']; $i++) {
            $output['data'][] = [
                '2' => ($i <= $result['premium_term']) ? $result['value'] : '-',
                '3' => $data['insured_amount'],
                '4' => ($i >= $result['premium_term']) ? ($data['insured_amount'] * 0.25) : 0,
            ];
        }

        $product = Product::where('slug_url', '=', 'student-life-insurance')->first();

        /**
         * Apply this calculation
         */
        if (isset($data['apply'])) {
            if (!isset($data['apply']['name'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, name' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            if (!isset($data['apply']['phone'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, phone' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            if (!isset($data['apply']['email'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, email' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            $info = [
                'locale' => $data['locale'],
                'insured_age' => $data['insured_age'],
                'insured_amount' => $data['insured_amount'],
                'premium_type' => $data['premium_type'],
                'policy_term' => $result['policy_term'],
                'premium_term' => $result['premium_term'],
                'product_id' => $product->id,
                'customer' => [
                    'name' => $data['apply']['name'],
                    'email' => $data['apply']['email'],
                    'phone' => $data['apply']['phone'],
                ]
            ];

            $apply = [
                'info' => json_encode($info),
                'result' => json_encode($output),
                'total' => $result['value'] * $result['premium_term'],
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'insured_age' => $data['insured_age'],
                'insured_amount' => $data['insured_amount'],
                'premium_type' => $data['premium_type'],
                'policy_term' => $result['policy_term'],
                'premium_term' => $result['premium_term'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
            'result' => $output,
            'total' => $result['value'] * $result['premium_term'],
        ];

        return response()->json($response, $response_code);
    }

    /**
     * Calculate Travel Insurance API via JSON.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateTravelInsurance(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;
        $flag = false;
        $result = 0;
        $info = [];

        if (!isset($data['locale'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => 'Locale' . $this->required_error_eng,
                'olds' => $request->all(),
            ];
        }

        if (!isset($data['travel_type'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => 'travel_type' . $this->required_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        if (!isset($data['duration'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => 'duration' . $this->required_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }
        $log = [];

        foreach (Formula::where('method', '=', 'calculateTravelInsurance')->get() as $formula) {
            foreach (json_decode($formula->conditions) as $condition) {
                if ($condition->operator == '==') {
                    if ($data[$condition->field] == $condition->value) {
                        $log[] = [$data[$condition->field], $condition, 'TRUE'];
                        $flag = true;
                    } else {
                        $log[] = [$data[$condition->field], $condition, 'FALSE'];
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
                    if ($formula->operator == '=') {
                        $result = $formula->value;
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
        } // End of method

        $product = Product::where('slug_url', '=', 'travel-insurance')->first();

        /**
         * Apply this calculation
         */
        if (isset($data['apply'])) {

            if (!isset($data['apply']['name'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, name' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            if (!isset($data['apply']['phone'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, phone' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            if (!isset($data['apply']['email'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, email' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            $info = [
                'locale' => $data['locale'],
                'travel_type' => $data['travel_type'],
                'duration' => $data['duration'],
                'product_id' => $product->id,
                'customer' => [
                    'name' => $data['apply']['name'],
                    'email' => $data['apply']['email'],
                    'phone' => $data['apply']['phone'],
                ]
            ];

            $apply = [
                'info' => json_encode($info),
                'result' => json_encode($result),
                'total' => $result,
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'travel_type' => $data['travel_type'],
                'duration' => $data['duration'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
            'total' => $result,
        ];

        return response()->json($response, $response_code);
    }

    /**
     * Calculate Snake Bite Insurance API via JSON.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateSnakeInsurance(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;
        $result = 0;
        $info = [];

        if (!isset($data['locale'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'Locale']),
                'errors' => 'Locale' . $this->required_error_eng,
                'olds' => $request->all(),
            ];
        }

        if (!isset($data['insured_amount'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'insured_amount']),
                'errors' => 'insured_amount' . $this->required_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        foreach (Formula::where('method', '=', 'calculateSnakeInsurance')->get() as $formula) {
            foreach (json_decode($formula->formulas) as $formula) {
                if ($formula->operator == '*') {
                    if ($result == 0) {
                        $result = $data[$formula->field] * $formula->value;
                    } else {
                        $result = $result * $formula->value;
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
        } // End of methods

        $product = Product::where('slug_url', '=', 'snake-bite-life-insurance')->first();

        /**
         * Apply this calculation
         */
        if (isset($data['apply'])) {
            if (!isset($data['apply']['name'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, name' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            if (!isset($data['apply']['phone'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, phone' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            if (!isset($data['apply']['email'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, email' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            $info = [
                'locale' => $data['locale'],
                'insured_amount' => $data['insured_amount'],
                'product_id' => $product->id,
                'customer' => [
                    'name' => $data['apply']['name'],
                    'email' => $data['apply']['email'],
                    'phone' => $data['apply']['phone'],
                ]
            ];

            $apply = [
                'info' => json_encode($info),
                'result' => json_encode($result),
                'total' => $result,
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'insured_amount' => $data['insured_amount'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
            'total' => $result,
        ];

        return response()->json($response, $response_code);
    }

    /**
     * Calculate Education Life Insurance API via JSON.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateEducationInsurance(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;
        $flag = false;
        $result = 0;
        $info = [];

        if (!isset($data['locale'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'Locale']),
                'errors' => __('validation.required', ['attribute' => 'Locale']),
                'olds' => $request->all(),
            ];
        }

        if (!isset($data['insured_age'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'insured age']),
                'errors' => __('validation.required', ['attribute' => 'insured age']),
                'olds' => $request->all(),
            ];
        }

        if (!isset($data['premium_term'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'premium_term']),
                'errors' => __('validation.required', ['attribute' => 'premium_term']),
                'olds' => $request->all(),
            ];
        }

        if (!isset($data['benefit'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'benefit']),
                'errors' => __('validation.required', ['attribute' => 'benefit']),
                'olds' => $request->all(),
            ];
        }

        if (!isset($data['insured_amount'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'insured_amount']),
                'errors' => __('validation.required', ['attribute' => 'insured_amount']),
                'olds' => $request->all(),
            ];
        }

        foreach (Formula::where('method', '=', 'calculateEducationInsurance')->get() as $formula) {
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
        } // End of Formula table

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

        $output = [
            'labels' => [
                'year' => 'Policy Year',
                '2' => 'Annual Premium',
                '3' => 'Death Benefit',
                '4' => 'Maturity Benefit',
            ]
        ];

        for ($i = 1; $i <= $result['insured_age']; $i++) {
            $output['data'][] = [
                '2' => ($i <= $result['premium_term']) ? $result['value'] : '-',
                '3' => $data['insured_amount'],
                '4' => ($i >= $result['premium_term']) ? ($data['insured_amount'] * 0.20) : 0,
            ];
        }

        $product = Product::where('slug_url', '=', 'educational-life-insurance')->first();

        /**
         * Apply this calculation
         */
        if (isset($data['apply'])) {
            if (!isset($data['apply']['name'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, name' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            if (!isset($data['apply']['phone'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, phone' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            if (!isset($data['apply']['email'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, email' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            $info = [
                'locale' => $data['locale'],
                'insured_age' => $data['insured_age'],
                'insured_amount' => $data['insured_amount'],
                'premium_term' => $data['premium_term'],
                'benefit' => $data['benefit'],
                'product_id' => $product->id,
                'customer' => [
                    'name' => $data['apply']['name'],
                    'email' => $data['apply']['email'],
                    'phone' => $data['apply']['phone'],
                ]
            ];

            $apply = [
                'info' => json_encode($info),
                'result' => json_encode($output),
                'total' => $result * $data['premium_term'],
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'insured_age' => $data['insured_age'],
                'insured_amount' => $data['insured_amount'],
                'premium_term' => $data['premium_term'],
                'benefit' => $result['benefit'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
            'result' => $output,
            'total' => $result * $data['premium_term'],
        ];

        return response()->json($response, $response_code);
    }

    /**
     * Calculate Public Term Life Insurance API via JSON.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculatePublicTerm(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;
        $flag = false;
        $result = 0;
        $info = [];

        if (!isset($data['locale'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'Locale']),
                'errors' => __('validation.required', ['attribute' => 'Locale']),
                'olds' => $request->all(),
            ];
        }

        if (!isset($data['insured_age'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'insured age']),
                'errors' => __('validation.required', ['attribute' => 'insured age']),
                'olds' => $request->all(),
            ];
        }

        if (!isset($data['insured_amount'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'insured_amount']),
                'errors' => __('validation.required', ['attribute' => 'insured_amount']),
                'olds' => $request->all(),
            ];
        }

        foreach (Formula::where('method', '=', 'calculatePublicTerm')->get() as $formula) {
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
        } // End of Formula table

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

        $output = [$result];

        $product = Product::where('slug_url', '=', 'public-terms-life-insurnace')->first();

        /**
         * Apply this calculation
         */
        if (isset($data['apply'])) {
            if (!isset($data['apply']['name'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, name' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            if (!isset($data['apply']['phone'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, phone' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            if (!isset($data['apply']['email'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, email' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            $info = [
                'locale' => $data['locale'],
                'insured_age' => $data['insured_age'],
                'insured_amount' => $data['insured_amount'],
                'product_id' => $product->id,
                'customer' => [
                    'name' => $data['apply']['name'],
                    'email' => $data['apply']['email'],
                    'phone' => $data['apply']['phone'],
                ]
            ];

            $apply = [
                'info' => json_encode($info),
                'total' => $result,
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'insured_age' => $data['insured_age'],
                'insured_amount' => $data['insured_amount'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
            'total' => $result,
        ];

        return response()->json($response, $response_code);
    }

    /**
     * Calculate Personal Accident Insurance API via JSON.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculatePersonalAccident(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;
        $flag = false;
        $result = 0;
        $info = [];

        if (!isset($data['locale'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'Locale']),
                'errors' => __('validation.required', ['attribute' => 'Locale']),
                'olds' => $request->all(),
            ];
        }

        if (!isset($data['insured_age'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'insured age']),
                'errors' => __('validation.required', ['attribute' => 'insured age']),
                'olds' => $request->all(),
            ];
        }

        if (!isset($data['insured_amount'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'insured_amount']),
                'errors' => __('validation.required', ['attribute' => 'insured_amount']),
                'olds' => $request->all(),
            ];
        }

        if (!isset($data['is_risk_work'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'is_risk_work']),
                'errors' => __('validation.required', ['attribute' => 'is_risk_work']),
                'olds' => $request->all(),
            ];
        }

        foreach (Formula::where('method', '=', 'calculatePersonalAccident')->get() as $formula) {
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
        } // End of Formula table

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

        $output = [$result];

        $product = Product::where('slug_url', '=', 'personal-accident-life-insurance')->first();

        /**
         * Apply this calculation
         */
        if (isset($data['apply'])) {
            if (!isset($data['apply']['name'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, name' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            if (!isset($data['apply']['phone'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, phone' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            if (!isset($data['apply']['email'])) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => 'For appling this product, email' . $this->required_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }

            $info = [
                'locale' => $data['locale'],
                'insured_age' => $data['insured_age'],
                'insured_amount' => $data['insured_amount'],
                'is_risk_work' => $data['is_risk_work'],
                'product_id' => $product->id,
                'customer' => [
                    'name' => $data['apply']['name'],
                    'email' => $data['apply']['email'],
                    'phone' => $data['apply']['phone'],
                ]
            ];

            $apply = [
                'info' => json_encode($info),
                'total' => $result,
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'insured_age' => $data['insured_age'],
                'insured_amount' => $data['insured_amount'],
                'is_risk_work' => $data['is_risk_work'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
            'total' => $result,
        ];

        return response()->json($response, $response_code);
    }
}
