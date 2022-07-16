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
     * GET Stamp Fee.
     *
     *
     */
    private function getStampFee($amount)
    {
        return ceil($amount / 100000) * 10;
    }

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
        $data = $request->json()->all();

        $response_code = 200;
        $errors = [];
        $flag = false;
        $result = 0;
        $info = [];

        if (!isset($data['locale'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Locale']);
        }

        if (!isset($data['insured_amount'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Insured amount']);
        }

        if (!isset($data['vehicle_type'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Vehicle Type']);
        }

        if (!isset($data['engine_displacement'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Engine Displacement']);
        }

        /*if (!isset($data['windscreen'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Windscreen']);
        }*/

        foreach (Formula::where('method', '=', 'calculateMotor')->get() as $formula) {
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
                $result = $data['insured_amount'];
                foreach (json_decode($formula->formulas) as $formula) {
                    if ($formula->operator == '==') {
                        $result =  $formula->value;
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

        $multiple = 5000;
        $start = 5000000;
        $interval = 1000000;

        if ($data['vehicle_type'] == 'commercial car') {
            $multiple = 10000;
        } else if ($data['vehicle_type'] == 'commercial truck') {
            $multiple = 10000;
        } else if ($data['vehicle_type'] == 'mobile plant') {
            $start = 20000000;
        } else if ($data['vehicle_type'] == 'motorcycle') {
            $start = 100000;
            $interval = 100000;
        }

        $product = Product::where('slug_url', '=', 'comprehensive-motor-insurance')->first();

        $result = $result + ((ceil(($data['insured_amount'] - $start) / $interval)) * $multiple);
        $premium = $result;

        if (isset($data['war'])) {
            if ($data['war'] == true) {
                $premium = $premium + ($data['insured_amount'] * 0.0005);
            }
        }

        if (isset($data['aog'])) {
            if ($data['aog'] == true) {
                $premium = $premium + ($data['insured_amount'] * 0.0005);
            }
        }

        if (isset($data['srcc'])) {
            if ($data['srcc'] == true) {
                $premium = $premium + ($data['insured_amount'] * 0.0005);
            }
        }

        if (isset($data['theft'])) {
            if ($data['theft'] == true) {
                $premium = $premium + ($result * 0.15);
            }
        }

        if (isset($data['windscreen'])) {
            $premium = $premium + ($data['windscreen'] * 0.05);
        }

        if (isset($data['nill'])) {
            if ($data['nill'] == true) {
                if ($data['vehicle_type'] == 'private car') {
                    $premium = $premium + 5000;
                } else if ($data['vehicle_type'] == 'commercial car') {
                    $premium = $premium + 10000;
                }
            }
        }

        if (isset($data['thirdparty'])) {
            if ($data['thirdparty'] == true) {
                if ($data['vehicle_type'] == 'private car') {
                    if ($data['engine_displacement'] <= 1500) {
                        $premium = $premium + 6600;
                    } else if ($data['engine_displacement'] > 1500 and $data['engine_displacement'] <= 2000) {
                        $premium = $premium + 7200;
                    } else if ($data['engine_displacement'] > 2000 and $data['engine_displacement'] <= 3000) {
                        $premium = $premium + 8100;
                    } else if ($data['engine_displacement'] > 3000 and $data['engine_displacement'] <= 4000) {
                        $premium = $premium + 9000;
                    } else if ($data['engine_displacement'] > 4000) {
                        $premium = $premium + 9900;
                    }
                } else if ($data['vehicle_type'] == 'private truck') {
                    if ($data['engine_displacement'] <= 1500) {
                        $premium = $premium + 6300;
                    } else if ($data['engine_displacement'] > 1500 and $data['engine_displacement'] <= 2000) {
                        $premium = $premium + 6900;
                    } else if ($data['engine_displacement'] > 2000 and $data['engine_displacement'] <= 3000) {
                        $premium = $premium + 7800;
                    } else if ($data['engine_displacement'] > 3000 and $data['engine_displacement'] <= 4000) {
                        $premium = $premium + 8700;
                    } else if ($data['engine_displacement'] > 4000) {
                        $premium = $premium + 10200;
                    }
                } else if ($data['vehicle_type'] == 'commercial car') {
                    if ($data['engine_displacement'] <= 1500) {
                        $premium = $premium + 10050;
                    } else if ($data['engine_displacement'] > 1500 and $data['engine_displacement'] <= 2000) {
                        $premium = $premium + 10800;
                    } else if ($data['engine_displacement'] > 2000 and $data['engine_displacement'] <= 3000) {
                        $premium = $premium + 12000;
                    } else if ($data['engine_displacement'] > 3000 and $data['engine_displacement'] <= 4000) {
                        $premium = $premium + 15900;
                    } else if ($data['engine_displacement'] > 4000) {
                        $premium = $premium + 19800;
                    }
                } else if ($data['vehicle_type'] == 'commercial truck') {
                    if ($data['engine_displacement'] <= 1500) {
                        $premium = $premium + 9300;
                    } else if ($data['engine_displacement'] > 1500 and $data['engine_displacement'] <= 2000) {
                        $premium = $premium + 9900;
                    } else if ($data['engine_displacement'] > 2000 and $data['engine_displacement'] <= 3000) {
                        $premium = $premium + 10800;
                    } else if ($data['engine_displacement'] > 3000 and $data['engine_displacement'] <= 4000) {
                        $premium = $premium + 11700;
                    } else if ($data['engine_displacement'] > 4000) {
                        $premium = $premium + 13200;
                    }
                } else if ($data['vehicle_type'] == 'fire and ambulance') {
                    if ($data['engine_displacement'] <= 1500) {
                        $premium = $premium + 6600;
                    } else if ($data['engine_displacement'] > 1500 and $data['engine_displacement'] <= 2000) {
                        $premium = $premium + 7200;
                    } else if ($data['engine_displacement'] > 2000 and $data['engine_displacement'] <= 3000) {
                        $premium = $premium + 8100;
                    } else if ($data['engine_displacement'] > 3000 and $data['engine_displacement'] <= 4000) {
                        $premium = $premium + 9000;
                    } else if ($data['engine_displacement'] > 4000) {
                        $premium = $premium + 9900;
                    }
                } else if ($data['vehicle_type'] == 'fire and ambulance truck') {
                    if ($data['engine_displacement'] <= 1500) {
                        $premium = $premium + 6300;
                    } else if ($data['engine_displacement'] > 1500 and $data['engine_displacement'] <= 2000) {
                        $premium = $premium + 6900;
                    } else if ($data['engine_displacement'] > 2000 and $data['engine_displacement'] <= 3000) {
                        $premium = $premium + 7800;
                    } else if ($data['engine_displacement'] > 3000 and $data['engine_displacement'] <= 4000) {
                        $premium = $premium + 8700;
                    } else if ($data['engine_displacement'] > 4000) {
                        $premium = $premium + 10200;
                    }
                } else if ($data['vehicle_type'] == 'mobile plant') {
                    $premium = $premium + 13800;
                } else if ($data['vehicle_type'] == 'motorcycle') {
                    $premium = $premium + 9000;
                }
            }
        }

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
                'vehicle_type' => $data['vehicle_type'],
                'engine_displacement' => $data['engine_displacement'],
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
                'result' => json_encode([]),
                'total' => $premium,
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'vehicle_type' => $data['vehicle_type'],
                'engine_displacement' => $data['engine_displacement'],
                'insured_amount' => $data['insured_amount'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
            'total' => $premium
        ];

        return response()->json($response, $response_code);
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

        if ($result['value'] <= 0) {
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
                '3' => 'Maturity Benefit',
            ]
        ];

        for ($i = 1; $i <= ($data['premium_term'] + 5); $i++) {
            $output['data'][] = [
                '2' => ($i <= $data['premium_term']) ? $result : '-',
                '3' => ($i >= $data['premium_term']) ? ($data['insured_amount'] * 0.20) : 0,
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
                'benefit' => $data['benefit'],
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
                'result' => json_encode([]),
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
                'result' => json_encode([]),
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

    /**
     * Calculate Group Life Insurance API via JSON.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateGroupLife(Request $request)
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

        if (!isset($data['insured_amount'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'insured_amount']),
                'errors' => __('validation.required', ['attribute' => 'insured_amount']),
                'olds' => $request->all(),
            ];
        }

        if (!isset($data['numberofgroup'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'Number of Group']),
                'errors' => __('validation.required', ['attribute' => 'Number of Group']),
                'olds' => $request->all(),
            ];
        }

        if (isset($data['numberofgroup'])) {
            if ($data['numberofgroup'] < 5) {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => __('validation.min', ['attribute' => 'Number of Group', 'min' => '5']),
                    'errors' => __('validation.min', ['attribute' => 'Number of Group', 'min' => '5']),
                    'olds' => $request->all(),
                ];
            }
        }

        foreach (Formula::where('method', '=', 'calculateGroupLife')->get() as $formula) {
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
        } // End of Formula table

        $result_content = '';
        $total = 0;

        if ($result <= 0) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => $this->not_eligible_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        } else {
            $total = $result * $data['numberofgroup'];

            $result_content = 'Basic Premium per Person: ' . $result;
        }

        $product = Product::where('slug_url', '=', 'group-life-insurance')->first();

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
                'result' => json_encode([$result_content]),
                'total' => $total,
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
            'total' => $total,
            'note' => $result_content,
        ];

        return response()->json($response, $response_code);
    }

    /**
     * Calculate Farmer Life Insurance API via JSON.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateFarmerLife(Request $request)
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

        if (!isset($data['insured_amount'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'insured_amount']),
                'errors' => __('validation.required', ['attribute' => 'insured_amount']),
                'olds' => $request->all(),
            ];
        }

        foreach (Formula::where('method', '=', 'calculateFarmerLife')->get() as $formula) {
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

        $product = Product::where('slug_url', '=', 'farmer-insurance')->first();

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
                'result' => json_encode([]),
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
     * Calculate Critical Illness Insurance API via JSON.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateCriticalIllness(Request $request)
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

        if (!isset($data['insured_unit'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'insured_unit']),
                'errors' => __('validation.required', ['attribute' => 'insured_unit']),
                'olds' => $request->all(),
            ];
        }

        if (!isset($data['type'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'type']),
                'errors' => __('validation.required', ['attribute' => 'type']),
                'olds' => $request->all(),
            ];
        }

        if (!isset($data['payment'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'payment']),
                'errors' => __('validation.required', ['attribute' => 'payment']),
                'olds' => $request->all(),
            ];
        }

        foreach (Formula::where('method', '=', 'calculateCriticalIllness')->get() as $formula) {
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

        $output = [$result * $data['insured_unit']];

        $product = Product::where('slug_url', '=', 'critical-illness-insurance')->first();

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
                'type' => $data['type'],
                'payment' => $data['payment'],
                'product_id' => $product->id,
                'customer' => [
                    'name' => $data['apply']['name'],
                    'email' => $data['apply']['email'],
                    'phone' => $data['apply']['phone'],
                ]
            ];

            $apply = [
                'info' => json_encode($info),
                'result' => json_encode([]),
                'total' => $data['insured_unit'] * $result,
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'insured_age' => $data['insured_age'],
                'type' => $data['type'],
                'payment' => $data['payment'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
            'total' => $data['insured_unit'] * $result,
        ];

        return response()->json($response, $response_code);
    }

    /**
     * Calculate Health Insurance API via JSON.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateHealth(Request $request)
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

        if (!isset($data['insured_unit'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'insured_unit']),
                'errors' => __('validation.required', ['attribute' => 'insured_unit']),
                'olds' => $request->all(),
            ];
        }

        if (!isset($data['coverage_1'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'coverage_1']),
                'errors' => __('validation.required', ['attribute' => 'coverage_1']),
                'olds' => $request->all(),
            ];
        }

        if (!isset($data['coverage_2'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'coverage_2']),
                'errors' => __('validation.required', ['attribute' => 'coverage_2']),
                'olds' => $request->all(),
            ];
        }

        if (!isset($data['type'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'type']),
                'errors' => __('validation.required', ['attribute' => 'type']),
                'olds' => $request->all(),
            ];
        }

        if (!isset($data['payment'])) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => __('validation.required', ['attribute' => 'payment']),
                'errors' => __('validation.required', ['attribute' => 'payment']),
                'olds' => $request->all(),
            ];
        }

        foreach (Formula::where('method', '=', 'calculateHealth')->get() as $formula) {
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
                    if ($formula->operator == '=') {
                        if ($result > 0) {
                            $result = $result + $formula->value;
                        } else {
                            $result = $formula->value;
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

        $product = Product::where('slug_url', '=', 'health-insurance')->first();

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
                'type' => $data['type'],
                'payment' => $data['payment'],
                'product_id' => $product->id,
                'customer' => [
                    'name' => $data['apply']['name'],
                    'email' => $data['apply']['email'],
                    'phone' => $data['apply']['phone'],
                ]
            ];

            $apply = [
                'info' => json_encode($info),
                'result' => json_encode([]),
                'total' => $data['insured_unit'] * $result,
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'insured_age' => $data['insured_age'],
                'type' => $data['type'],
                'payment' => $data['payment'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
            'total' => $data['insured_unit'] * $result,
        ];

        return response()->json($response, $response_code);
    }

    /**
     * Calculate Fire Insurance API via JSON.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateFireInsurance(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;
        $errors = [];
        $flag = false;
        $result = 0;
        $info = [];

        if (!isset($data['locale'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Locale']);
        }

        if (!isset($data['building']['type'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Building Type']);
        }

        if (!isset($data['building']['usage'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Usage of Building']);
        }

        if (!isset($data['building']['roof'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Roof']);
        }

        if (!isset($data['building']['wall'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Wall']);
        }

        if (!isset($data['building']['floor'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Floor']);
        }

        if (!isset($data['building']['length'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'length']);
        }

        if (!isset($data['building']['width'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'width']);
        }

        if (!isset($data['building']['age'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'age']);
        }

        if (!isset($data['building']['value'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'value']);
        }

        if (!isset($data['riot'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Riot']);
        }

        if (!isset($data['air_craft'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Air Craft Damage']);
        }

        if (!isset($data['subsidence_landslide'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Subsidence and Landslide']);
        }

        if (!isset($data['impact'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Impact Damage']);
        }

        if (!isset($data['earth-quak'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Earth-quake fire/Earth-quake shock']);
        }

        if (!isset($data['explosion'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Explosion']);
        }

        if (!isset($data['spontaneous-combustion'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Spontaneous combustion']);
        }

        if (!isset($data['war'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'War Risk']);
        }

        if (!isset($data['flood-inundation'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Flood and Inundation']);
        }

        if (!isset($data['storm'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Storm, Typhoon, Hurricane, Tempest, Cyclone']);
        }

        $risk_point = $this->getBuildingRisk($data['building']);
        $neighbor_risk_point = 0.0;

        if (isset($data['neighbor'])) {
            $neighbor_risk_point = $this->getBuildingRisk($data['neighbor']);

            $risk = ($risk_point + $neighbor_risk_point) / 2;
        } else {
            $risk = $risk_point;
        }

        if ($response_code == 400) {
            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => $errors,
                'olds' => $request->all(),
            ];
        } else {
            $risk = ($risk_point + $neighbor_risk_point) / 2;

            if ($data['riot']) {
                $risk += 0.06;
            }

            if ($data['air_craft']) {
                $risk += 0.1;
            }

            if ($data['subsidence_landslide']) {
                $risk += 0.1;
            }

            if ($data['impact']) {
                $risk += 0.1;
            }

            if ($data['earth-quak']) {
                $risk += 0.1;
            }

            if ($data['explosion']) {
                $risk += 0.1;
            }

            if ($data['spontaneous-combustion']) {
                $risk += 0.08;
            }

            if ($data['war']) {
                $risk += 0.1;
            }

            if ($data['flood-inundation']) {
                $risk += 0.1;
            }

            if ($data['storm']) {
                $risk += 0.2;
            }

            $product = Product::where('slug_url', '=', 'fire-insurance')->first();

            $premium = $data['building']['value'] * ($risk / 100);

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
                    'product_id' => $product->id,
                    'customer' => [
                        'name' => $data['apply']['name'],
                        'email' => $data['apply']['email'],
                        'phone' => $data['apply']['phone'],
                    ]
                ];

                $apply = [
                    'info' => json_encode($info),
                    'result' => json_encode([]),
                    'total' => $premium,
                ];

                ApplyProduct::create($apply);
            } else {
                $info = [
                    'locale' => $data['locale'],
                    'product_id' => $product->id,
                ];
            }
            // End of Apply

            $response = [
                'code' => $response_code,
                'status' => $this->success_eng,
                'info' => $info,
                'total' => $premium
            ];
        }

        return response()->json($response, $response_code);
    }

    private function getBuildingRisk($input)
    {
        $result = 0.0;
        if (
            Str::lower($input['roof']) == 'aluzinc' or
            Str::lower($input['roof']) == 'clay/brick tile' or
            Str::lower($input['roof']) == 'ac sheet' or
            Str::lower($input['roof']) == 'metal sheet' or
            Str::lower($input['roof']) == 'amcan'
        ) {
            if (
                Str::lower($input['wall']) == 'brick' or
                Str::lower($input['wall']) == 'brick+metal'
            ) {
                if (Str::lower($input['floor']) == 'concrete') {
                    if ($input['age'] <= 5) {
                        if (Str::lower($input['type']) == 'residential') {
                            if (
                                Str::lower($input['usage']) == 'residential/dwelling house/apartment' or
                                Str::lower($input['usage']) == 'office' or
                                Str::lower($input['usage']) == 'schools/colleges/universities' or
                                Str::lower($input['usage']) == 'religious building' or
                                Str::lower($input['usage']) == 'gymnasium'
                            ) {
                                $result = 0.2;
                            } else if (
                                Str::lower($input['usage']) == 'hotels/motels/similars as inns' or
                                Str::lower($input['usage']) == 'libraries/museums and gallery'
                            ) {
                                $result = 0.34;
                            } else if (Str::lower($input['usage']) == 'cinemas/a amusement part/airport/railway station') {
                                $result = 0.70;
                            }
                        } else {
                            $result = 0.70;
                        }
                    } else if ($input['age'] <= 10) {
                        $result = 0.28;
                    } else {
                        $result = 0.84;
                    }
                } else {
                    $result = 0.28;
                }
            } else if (
                Str::lower($input['wall']) == 'brick+timber' or
                Str::lower($input['wall']) == 'ac sheet' or
                Str::lower($input['wall']) == 'metal mesh'
            ) {
                $result = 0.28;
            } else {
                $result = 0.84;
            }
        } else {
            $result = 0.84;
        }

        return $result;
    }

    /**
     * Calculate Fire Insurance API via JSON.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateInlandTransit(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;
        $errors = [];
        $flag = false;
        $result = 0;
        $info = [];

        if (!isset($data['locale'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Locale']);
        }

        if (!isset($data['insured_amount'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Insured amount']);
        }

        if (!isset($data['from'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'From']);
        }

        if (!isset($data['to'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'To']);
        }

        if (!isset($data['goods_type'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Goods Type']);
        }

        foreach (Formula::where('method', '=', 'calculateInlandTransit')->get() as $formula) {
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
                    if (Str::lower($data[$condition->field]) == $condition->value) {
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
                    if ($formula->operator == '*') {
                        $result = ($data[$formula->field] * $formula->value) / 100;
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

        $product = Product::where('slug_url', '=', 'inland-transit-insurance')->first();

        $premium = $result + 1000;

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
                'from' => $data['from'],
                'to' => $data['to'],
                'goods_type' => $data['goods_type'],
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
                'result' => json_encode([]),
                'total' => $premium,
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'from' => $data['from'],
                'to' => $data['to'],
                'goods_type' => $data['goods_type'],
                'insured_amount' => $data['insured_amount'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
            'total' => $premium
        ];

        return response()->json($response, $response_code);
    }

    /**
     * Calculate Marine Cargo Insurance API via JSON.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateMarineCargo(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;
        $errors = [];
        $flag = false;
        $result = 0;
        $info = [];

        if (!isset($data['locale'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Locale']);
        }

        if (!isset($data['insured_amount'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Insured amount']);
        }

        if (!isset($data['from'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'From']);
        }

        if (!isset($data['to'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'To']);
        }

        if (!isset($data['cargo_type'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Cargo Type']);
        }

        if (!isset($data['conveyance'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'conveyance']);
        }

        foreach (Formula::where('method', '=', 'calculateMarineCargo')->get() as $formula) {
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
                    if (Str::lower($data[$condition->field]) == $condition->value) {
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
                    if ($formula->operator == '*') {
                        $result = ($data[$formula->field] * $formula->value);
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

        $product = Product::where('slug_url', '=', 'marine-cargo-insurance')->first();

        $premium = $result + $this->getStampFee($data['insured_amount']);

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
                'from' => $data['from'],
                'to' => $data['to'],
                'cargo_type' => $data['cargo_type'],
                'conveyance' => $data['conveyance'],
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
                'result' => json_encode([]),
                'total' => $premium,
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'from' => $data['from'],
                'to' => $data['to'],
                'cargo_type' => $data['cargo_type'],
                'conveyance' => $data['conveyance'],
                'insured_amount' => $data['insured_amount'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
            'total' => $premium
        ];

        return response()->json($response, $response_code);
    }

    /**
     * Calculate Oversea Cargo Insurance API via JSON.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateOverseaCargo(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;
        $errors = [];
        $flag = false;
        $result = 0;
        $info = [];

        if (!isset($data['locale'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Locale']);
        }

        if (!isset($data['insured_amount'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Insured amount']);
        }

        if (!isset($data['from'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'From']);
        }

        if (!isset($data['to'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'To']);
        }

        if (!isset($data['cargo_type'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Cargo Type']);
        }

        if (!isset($data['description'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'conveyance']);
        }

        foreach (Formula::where('method', '=', 'calculateOverseaCargo')->get() as $formula) {
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
                    if (Str::lower($data[$condition->field]) == $condition->value) {
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
                    if ($formula->operator == '*') {
                        $result = ($data[$formula->field] * $formula->value);
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

        $product = Product::where('slug_url', '=', 'oversea-marine-cargo-insurance')->first();

        if (isset($data['transshipment'])) {
            if ($data['transshipment'] == true) {
                $result = $result + ($data['insured_amount'] * 0.0028);
            }
        }

        if (isset($data['via'])) {
            if ($data['via'] == true) {
                $result = $result + ($data['insured_amount'] * 0.0014);
            }
        }

        if (isset($data['suez'])) {
            if ($data['suez'] == true) {
                $result = $result + ($data['insured_amount'] * 0.000375);
            }
        }

        if (isset($data['war'])) {
            if ($data['war'] == true) {
                $result = $result + ($data['insured_amount'] * 0.0005);
            }
        }

        $premium = $result + $this->getStampFee($data['insured_amount']);

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
                'from' => $data['from'],
                'to' => $data['to'],
                'cargo_type' => $data['cargo_type'],
                'description' => $data['description'],
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
                'result' => json_encode([]),
                'total' => $premium,
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'from' => $data['from'],
                'to' => $data['to'],
                'cargo_type' => $data['cargo_type'],
                'description' => $data['description'],
                'insured_amount' => $data['insured_amount'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
            'total' => $premium
        ];

        return response()->json($response, $response_code);
    }

    /**
     * Calculate Fidelity Insurance API via JSON.
     * General Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateFidelity(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;
        $errors = [];
        $flag = false;
        $result = 0;
        $info = [];

        if (!isset($data['locale'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Locale']);
        }

        if (!isset($data['insured_amount'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Insured amount']);
        }

        if (!isset($data['business_type'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Business Type']);
        }

        foreach (Formula::where('method', '=', 'calculateFidelity')->get() as $formula) {
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
                    if (Str::lower($data[$condition->field]) == $condition->value) {
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
                    if ($formula->operator == '*') {
                        $result = ($data[$formula->field] * $formula->value);
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

        $product = Product::where('slug_url', '=', 'fidelity-insurance')->first();

        if (isset($data['transshipment'])) {
            if ($data['transshipment'] == true) {
                $result = $result + ($data['insured_amount'] * 0.0028);
            }
        }

        if (isset($data['via'])) {
            if ($data['via'] == true) {
                $result = $result + ($data['insured_amount'] * 0.0014);
            }
        }

        if (isset($data['suez'])) {
            if ($data['suez'] == true) {
                $result = $result + ($data['insured_amount'] * 0.000375);
            }
        }

        if (isset($data['war'])) {
            if ($data['war'] == true) {
                $result = $result + ($data['insured_amount'] * 0.0005);
            }
        }

        $premium = $result;

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
                'business_type' => $data['business_type'],
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
                'result' => json_encode([]),
                'total' => $premium,
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'business_type' => $data['business_type'],
                'insured_amount' => $data['insured_amount'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
            'total' => $premium
        ];

        return response()->json($response, $response_code);
    }

    /**
     * Calculate Marine Hull Insurance API via JSON.
     * General Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateMarineHull(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;
        $errors = [];
        $flag = false;
        $result = 0;
        $info = [];

        if (!isset($data['locale'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Locale']);
        }

        if (!isset($data['insured_amount'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Insured amount']);
        }

        if (!isset($data['insurance_type'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Business Type']);
        }

        if (!isset($data['cargo_type'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Business Type']);
        }

        if (!isset($data['hull_type'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Business Type']);
        }

        if (!isset($data['route'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Business Type']);
        }

        if (!isset($data['month'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Business Type']);
        }

        foreach (Formula::where('method', '=', 'calculateMarineHull')->get() as $formula) {
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
                    if (Str::lower($data[$condition->field]) == $condition->value) {
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
                $result = $data['insured_amount'];
                foreach (json_decode($formula->formulas) as $formula) {
                    if ($formula->operator == '*') {
                        $result = ($result * $formula->value);
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

        $product = Product::where('slug_url', '=', 'marine-hull-insurance')->first();

        $premium = $result + $this->getStampFee($data['insured_amount']);

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
                'insurance_type' => $data['insurance_type'],
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
                'result' => json_encode([]),
                'total' => $premium,
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'insurance_type' => $data['insurance_type'],
                'insured_amount' => $data['insured_amount'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
            'total' => $premium
        ];

        return response()->json($response, $response_code);
    }

    /**
     * Calculate Cash In Transit Insurance API via form data.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateCashInTransit(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;
        $errors = [];
        $flag = false;
        $result = 0;
        $info = [];

        if (!isset($data['locale'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Locale']);
        }

        if (!isset($data['insured_amount'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Insured amount']);
        }

        if (!isset($data['mile'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Mile']);
        }

        foreach (Formula::where('method', '=', 'calculateCashInTransit')->get() as $formula) {
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
                    if (Str::lower($data[$condition->field]) == $condition->value) {
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
                $result = $data['insured_amount'];
                foreach (json_decode($formula->formulas) as $formula) {
                    if ($formula->operator == '*') {
                        $result = ($data[$formula->field] * $formula->value);
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

        $product = Product::where('slug_url', '=', 'cash-in-transit-insurance')->first();

        $premium = $result;

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
                'mile' => $data['mile'],
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
                'result' => json_encode([]),
                'total' => $premium,
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'mile' => $data['mile'],
                'insured_amount' => $data['insured_amount'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
            'total' => $premium
        ];

        return response()->json($response, $response_code);
    }

    /**
     * Calculate Cash In Safe Insurance API via form data.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateCashInSafe(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;
        $errors = [];
        $flag = false;
        $result = 0;
        $info = [];

        if (!isset($data['locale'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Locale']);
        }

        if (!isset($data['insured_amount'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Insured amount']);
        }

        $premium = ($data['insured_amount'] * 0.005) + 100;

        if ($premium <= 0) {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => $this->not_eligible_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        $product = Product::where('slug_url', '=', 'cash-in-safe-insurance')->first();

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
                'result' => json_encode([]),
                'total' => $premium,
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
            'total' => $premium
        ];

        return response()->json($response, $response_code);
    }

    /**
     * Calculate Micro Health Insurance API via form data.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateMicroHealth(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;
        $errors = [];
        $flag = false;
        $result = 0;
        $info = [];

        if (!isset($data['locale'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Locale']);
        }

        if (!isset($data['insured_unit'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Insured unit']);
        }

        if (!isset($data['age'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Age']);
        }

        if ($data['insured_unit'] >= 1 and $data['insured_unit'] <= 10) {
            if ($data['age'] >= 6 and $data['age'] <= 30) {
                $premium = $data['insured_unit'] * 5000;
            } else if ($data['age'] >= 31 and $data['age'] <= 40) {
                $premium = $data['insured_unit'] * 5500;
            } else if ($data['age'] >= 41 and $data['age'] <= 50) {
                $premium = $data['insured_unit'] * 6500;
            } else if ($data['age'] >= 51 and $data['age'] <= 60) {
                $premium = $data['insured_unit'] * 8500;
            } else if ($data['age'] >= 61 and $data['age'] <= 75) {
                $premium = $data['insured_unit'] * 13000;
            } else {
                $response_code = 400;

                $response = [
                    'code' => $response_code,
                    'status' => $this->error400status_eng,
                    'errors' => $this->not_eligible_error_eng,
                    'olds' => $request->all(),
                ];

                return response()->json($response, $response_code);
            }
        } else {
            $response_code = 400;

            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => $this->not_eligible_error_eng,
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        $product = Product::where('slug_url', '=', 'micro-health-insurance')->first();

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
                'insured_unit' => $data['insured_unit'],
                'age' => $data['age'],
                'product_id' => $product->id,
                'customer' => [
                    'name' => $data['apply']['name'],
                    'email' => $data['apply']['email'],
                    'phone' => $data['apply']['phone'],
                ]
            ];

            $apply = [
                'info' => json_encode($info),
                'result' => json_encode([]),
                'total' => $premium,
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'insured_unit' => $data['insured_unit'],
                'age' => $data['age'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
            'total' => $premium
        ];

        return response()->json($response, $response_code);
    }

    /**
     * Calculate Single Premium Credit Life Insurance API via form data.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateSinglePremiumCredit(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;
        $errors = [];
        $flag = false;
        $result = 0;
        $info = [];

        if (!isset($data['locale'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Locale']);
        }

        if (!isset($data['insured_amount'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Insured amount']);
        }

        if (!isset($data['age'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Age']);
        }

        if (!isset($data['policy_term'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Policy Term']);
        }

        foreach (Formula::where('method', '=', 'calculateSinglePremiumCredit')->get() as $formula) {
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
                    if (Str::lower($data[$condition->field]) == $condition->value) {
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
                $result = $data['insured_amount'];
                foreach (json_decode($formula->formulas) as $formula) {
                    if ($formula->operator == '*') {
                        $result = ($data[$formula->field] * $formula->value);
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

        $product = Product::where('slug_url', '=', 'single-premium-credit-life')->first();

        $premium = $result;

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
                'age' => $data['age'],
                'policy_term' => $data['policy_term'],
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
                'result' => json_encode([]),
                'total' => $premium,
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'age' => $data['age'],
                'policy_term' => $data['policy_term'],
                'insured_amount' => $data['insured_amount'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
            'total' => $premium
        ];

        return response()->json($response, $response_code);
    }

    /**
     * Calculate Short Term Single Premium Credit Life Insurance API via form data.
     * Life Insurance
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculateShortTermSinglePremiumCredit(Request $request)
    {
        $data = $request->json()->all();

        $response_code = 200;
        $errors = [];
        $flag = false;
        $result = 0;
        $info = [];

        if (!isset($data['locale'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Locale']);
        }

        if (!isset($data['insured_amount'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Insured amount']);
        }

        if (!isset($data['age'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Age']);
        }

        if (!isset($data['policy_term'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Policy Term']);
        }

        if (!isset($data['policy_type'])) {
            $response_code = 400;

            $errors[] = __('validation.required', ['attribute' => 'Policy Type']);
        }

        if ($response_code == 400) {
            $response = [
                'code' => $response_code,
                'status' => $this->error400status_eng,
                'errors' => $errors,
                'olds' => $request->all(),
            ];

            return response()->json($response, $response_code);
        }

        foreach (Formula::where('method', '=', 'calculateShortTermSinglePremiumCredit')->get() as $formula) {
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
                    if (Str::lower($data[$condition->field]) == $condition->value) {
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
                $result = $data['insured_amount'];

                foreach (json_decode($formula->formulas) as $formula) {
                    if ($formula->operator == '*') {
                        $result = ($data[$formula->field] * $formula->value);
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

        $product = Product::where('slug_url', '=', 'short-term-single-premium-credit-life-insurance')->first();

        $premium = $result;

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
                'age' => $data['age'],
                'policy_term' => $data['policy_term'],
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
                'result' => json_encode([]),
                'total' => $premium,
            ];

            ApplyProduct::create($apply);
        } else {
            $info = [
                'locale' => $data['locale'],
                'age' => $data['age'],
                'policy_term' => $data['policy_term'],
                'insured_amount' => $data['insured_amount'],
                'product_id' => $product->id,
            ];
        }
        // End of Apply

        $response = [
            'code' => $response_code,
            'status' => $this->success_eng,
            'info' => $info,
            'total' => $premium
        ];

        return response()->json($response, $response_code);
    }
}
