<?php

namespace App\Http\Controllers\Content;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::where('is_vacant', '=', true)->get();

        return view('admin.job.list')->with(['jobs' => $jobs]);
    }

    /**
     * Display a closed job listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function closed()
    {
        $jobs = Job::where('is_vacant', '=', false)->get();

        return view('admin.job.list')->with(['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.job.add-edit')->with(['action' => 'new']);
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
            'position' => 'required|max:255',
            'department' => 'required|max:255',
            'jd' => 'required',
            'position_burmese' => 'required|max:255',
            'department_burmese' => 'required|max:255',
            'jd_burmese' => 'required',
            'position_chinese' => 'required|max:255',
            'department_chinese' => 'required|max:255',
            'jd_chinese' => 'required',
            'slug_url' => 'required|unique:news,url_slug',
            'due' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('new#job')
                ->withErrors($validator)
                ->withInput();
        }

        $job = [
            'position' => $request->position,
            'department' => $request->department,
            'description' => $request->jd,
            'due' => isset($request->due) ? 'Closing at ' . strtotime('F d, Y', $request->due) : 'Open until candidate identified',
            'position_burmese' => $request->position_burmese,
            'department_burmese' => $request->department_burmese,
            'description_burmese' => $request->jd_burmese,
            'due_burmese' => isset($request->due) ? strtotime('F d, Y', $request->due) . ' နေ့တွင် စာရင်းပိတ်မည်' : 'သင့်တော်သူရသည့် အထိ ဖွင့်ထားပါသည်',
            'position_chinese' => $request->position_chinese,
            'department_chinese' => $request->department_chinese,
            'description_chinese' => $request->jd_chinese,
            'due_chinese' =>  isset($request->due) ? 'Closing at ' . strtotime('F d, Y', $request->due) : 'Open until candidate identified',
            'due_date' =>  isset($request->due) ? strtotime('Y-m-d', $request->due) : NULL,
            'slug_url' => $request->slug_url,
            'is_vacant' => $request->active == 'on' ? TRUE : FALSE,
        ];

        Job::create($job);

        return redirect()->route('job#list')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::where('id', '=', Crypt::decryptString($id))->first();

        return view('admin.job.add-edit')->with(['action' => 'update', 'job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'position' => 'required|max:255',
            'department' => 'required|max:255',
            'jd' => 'required',
            'position_burmese' => 'required|max:255',
            'department_burmese' => 'required|max:255',
            'jd_burmese' => 'required',
            'position_chinese' => 'required|max:255',
            'department_chinese' => 'required|max:255',
            'jd_chinese' => 'required',
            'slug_url' => 'required|unique:news,url_slug',
            'due' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('edit#job')
                ->withErrors($validator)
                ->withInput();
        }

        $job = [
            'position' => $request->position,
            'department' => $request->department,
            'description' => $request->jd,
            'due' => isset($request->due) ? 'Closing at ' . date('F d, Y', strtotime($request->due)) : 'Open until candidate identified',
            'position_burmese' => $request->position_burmese,
            'department_burmese' => $request->department_burmese,
            'description_burmese' => $request->jd_burmese,
            'due_burmese' => isset($request->due) ? date('F d, Y', strtotime($request->due)) . ' နေ့တွင် စာရင်းပိတ်မည်' : 'သင့်တော်သူရသည့် အထိ ဖွင့်ထားပါသည်',
            'position_chinese' => $request->position_chinese,
            'department_chinese' => $request->department_chinese,
            'description_chinese' => $request->jd_chinese,
            'due_chinese' =>  isset($request->due) ? 'Closing at ' . date('F d, Y', strtotime($request->due)) : 'Open until candidate identified',
            'due_date' =>  isset($request->due) ? date('Y-m-d', strtotime($request->due)) : NULL,
            'slug_url' => $request->slug_url,
            'is_vacant' => $request->active == 'on' ? TRUE : FALSE,
        ];

        Job::where('id', '=', $id)->update($job);

        return redirect()->route('job#list')->with(['success_message' => 'Successfully <strong>updated!</strong>']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $job = Job::where('id', '=', Crypt::decryptString($id))->first();
            $flag = false;
            $message = 'closed';

            if ($job->is_vacant) {
                $flag = false;
                $message = 'closed';
            } else {
                $flag = true;
                $message = 'open';
            }

            Job::where('id', '=', Crypt::decryptString($id))->update(['is_vacant' => $flag]);

            return redirect()
                ->route('job#list')
                ->with(['success_message' => 'Successfully <strong>' . $message . '!</strong>']);
        } catch (DecryptException $e) {
            abort(404, 'Decrypt Exception occured.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getlist($para = null)
    {
        // Variables
        $localeData = [];
        $lang_english = 'en-us';
        $lang_chinese = 'zh-cn';
        $lang_burmese = 'my-mm';

        $parameters = explode('&', $para);
        $locale = '';
        $conditions = [];

        foreach ($parameters as $check) {
            $value = explode('=', $check);

            if (Str::lower($value[0]) == 'locale') {
                if (isset($value[1])) {
                    $locale = $value[1];
                }
            } else {
                $conditions[] = [
                    'key' => Str::lower($value[0]),
                    'value' => isset($value[1]) ? $value[1] : null,
                ];
            }
        }

        if (Str::lower($locale) == $lang_english) {
            $job_db = DB::table('jobs')
                ->select(
                    'id',
                    'position',
                    'department',
                    'description',
                    'due',
                    'due_date',
                    'slug_url',
                    'is_vacant',
                    'created_at',
                    'updated_at'
                );

            $localeData = ['lang' => 'en-US', 'name' => 'English'];
        } else if (Str::lower($locale) == $lang_burmese) {
            $job_db = DB::table('jobs')
                ->select(
                    'id',
                    'position_burmese',
                    'department_burmese',
                    'description_burmese',
                    'due_burmese',
                    'due_date',
                    'slug_url',
                    'is_vacant',
                    'created_at',
                    'updated_at'
                );

            $localeData = ['lang' => 'my-MM', 'name' => 'Burmese'];
        } else if (Str::lower($locale) == $lang_chinese) {
            $job_db = DB::table('jobs')
                ->select(
                    'id',
                    'position_chinese',
                    'department_chinese',
                    'description_chinese',
                    'due_chinese',
                    'due_date',
                    'slug_url',
                    'is_vacant',
                    'created_at',
                    'updated_at'
                );

            $localeData = ['lang' => 'zh-CN', 'name' => 'Chinese'];
        } else {
            $job_db = DB::table('jobs')
                ->select(
                    'id',
                    'position',
                    'department',
                    'description',
                    'due',
                    'position_burmese',
                    'department_burmese',
                    'description_burmese',
                    'due_burmese',
                    'position_chinese',
                    'department_chinese',
                    'description_chinese',
                    'due_chinese',
                    'due_date',
                    'slug_url',
                    'is_vacant',
                    'created_at',
                    'updated_at'
                );

            $localeData = ['lang' => 'en-US/my-MM/zh-CN', 'name' => 'English/Burmese/Chinese'];
        }

        /***
         *
         * Parameters for conditions to retrieve the products
         *
         */
        foreach ($conditions as $con) {
            /***
             *
             * Retrieve Job Vacancy by category name
             *
             **/
            if ($con['key'] == 'dep') {
                if (Str::lower($locale) == $lang_burmese) {
                    $job_db->where('department_burmese', '=', Str::replace('+', ' ', $con['value']));
                } else if (Str::lower($locale) == $lang_chinese) {
                    $job_db->where('department_chinese', '=', Str::replace('+', ' ', $con['value']));
                } else {
                    $job_db->where('department', '=', Str::replace('+', ' ', $con['value']));
                }
            } //End of retreiving Job Vacancy by category name
            /***
             *
             * Retrieve Job Vacancy by title
             *
             **/
            else if ($con['key'] == 'post') {
                if (Str::lower($locale) == $lang_burmese) {
                    $job_db->where('position_burmese', '=', Str::replace('+', ' ', $con['value']));
                } else if (Str::lower($locale) == $lang_chinese) {
                    $job_db->where('position_chinese', '=', Str::replace('+', ' ', $con['value']));
                } else {
                    $job_db->where('position', '=', Str::replace('+', ' ', $con['value']));
                }
            } //End of retreiving Job Vacancy by title
            /***
             *
             * Retrieve Job Vacancy by author
             *
             **/
            else if ($con['key'] == 'vacant') {
                $job_db->where('is_vacant', '=', $con['value'] == 'open' ? true : false);
            } //End of retreiving Job Vacancy by status

            /***
             *
             * Retrieve Job Vacancy with order by
             *
             **/
            else if ($con['key'] == 'order') {
                if (isset($con['value'])) {
                    $orderBy = explode(',', $con['value']);

                    if ($orderBy[0] == 'desc') {
                        if (isset($orderBy[1])) {
                            if ($orderBy[1] == 'post') {
                                if (Str::lower($locale) == $lang_burmese) {
                                    $job_db->orderByDesc('position_burmese');
                                } else if (Str::lower($locale) == $lang_chinese) {
                                    $job_db->orderByDesc('position_chinese');
                                } else {
                                    $job_db->orderByDesc('position');
                                }
                            } else if ($orderBy[1] == 'dep') {
                                if (Str::lower($locale) == $lang_burmese) {
                                    $job_db->orderByDesc('department_burmese');
                                } else if (Str::lower($locale) == $lang_chinese) {
                                    $job_db->orderByDesc('department_chinese');
                                } else {
                                    $job_db->orderByDesc('department');
                                }
                            } else if ($orderBy[1] == 'created') {
                                $job_db->orderByDesc('created_at');
                            } else if ($orderBy[1] == 'updated') {
                                $job_db->orderByDesc('updated_at');
                            } else {
                                $job_db->orderByDesc('created_at');
                            }
                        } else {
                            $job_db->orderByDesc('created_at');
                        }
                    } else if ($orderBy[0] == 'asc') {
                        if (isset($orderBy[1])) {
                            if ($orderBy[1] == 'post') {
                                if (Str::lower($locale) == $lang_burmese) {
                                    $job_db->orderBy('position_burmese');
                                } else if (Str::lower($locale) == $lang_chinese) {
                                    $job_db->orderBy('position_chinese');
                                } else {
                                    $job_db->orderBy('position');
                                }
                            } else if ($orderBy[1] == 'dep') {
                                if (Str::lower($locale) == $lang_burmese) {
                                    $job_db->orderBy('department_burmese');
                                } else if (Str::lower($locale) == $lang_burmese) {
                                    $job_db->orderBy('department_chinese');
                                } else {
                                    $job_db->orderBy('department');
                                }
                            } else if ($orderBy[1] == 'created') {
                                $job_db->orderBy('created_at');
                            } else if ($orderBy[1] == 'updated') {
                                $job_db->orderBy('updated_at');
                            } else {
                                $job_db->orderBy('created_at');
                            }
                        } else {
                            $job_db->orderBy('created_at');
                        }
                    } else {
                        $response = [
                            'code' => 400,
                            'status' => 'Order by key has been mismatched.',
                        ];

                        return response()->json($response);
                    }
                } else {
                    $job_db->orderByDesc('created_at');
                }
            } //End of order by
        } //End of conditions

        $jobs = $job_db->get();

        if ($jobs->count() > 0) {
            $response = [
                'code' => 200,
                'status' => 'success',
                'locale' => $localeData,
                'data' => $jobs,
            ];
        } else {
            $response = [
                'code' => 204,
                'status' => 'no content',
            ];
        }

        return response()->json($response);
    }

    /**
     * API List with Job Vacancy data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postList(Request $request)
    {
        $data = $request->json()->all();

        // Variables
        $lang_english = 'en-us';
        $lang_chinese = 'zh-cn';
        $lang_burmese = 'my-mm';
        $localeData = [];

        /*
         * Locale
         *
         * MM for my-MM/Burmese and EN for en-US/English
         */
        if (isset($data['locale']) and Str::lower($data['locale']) == $lang_english) {
            $job_db = DB::table('jobs')
                ->select(
                    'id',
                    'position',
                    'department',
                    'description',
                    'due',
                    'due_date',
                    'slug_url',
                    'is_vacant',
                    'created_at',
                    'updated_at'
                );

            $localeData = ['lang' => 'en-US', 'name' => 'English'];
        } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_burmese) {
            $job_db = DB::table('jobs')
                ->select(
                    'id',
                    'position_burmese as position',
                    'department_burmese as department',
                    'description_burmese as description',
                    'due_burmese as due',
                    'due_date',
                    'slug_url',
                    'is_vacant',
                    'created_at',
                    'updated_at'
                );

            $localeData = ['lang' => 'my-MM', 'name' => 'Burmese'];
        } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
            $job_db = DB::table('jobs')
                ->select(
                    'id',
                    'position_chinese as position',
                    'department_chinese as department',
                    'description_chinese as description',
                    'due_chinese as due',
                    'due_date',
                    'slug_url',
                    'is_vacant',
                    'created_at',
                    'updated_at'
                );

            $localeData = ['lang' => 'zh-CN', 'name' => 'Chinese'];
        } else {
            $job_db = DB::table('jobs')
                ->select(
                    'id',
                    'position',
                    'department',
                    'description',
                    'due',
                    'position_burmese',
                    'department_burmese',
                    'description_burmese',
                    'due_burmese',
                    'position_chinese',
                    'department_chinese',
                    'description_chinese',
                    'due_chinese',
                    'due_date',
                    'slug_url',
                    'is_vacant',
                    'created_at',
                    'updated_at'
                );

            $localeData = ['lang' => 'en-US/my-MM/zh-CN', 'name' => 'English/Burmese/Chinese'];
        }

        /***
         *
         * Retrieve products by id
         *
         **/
        if (isset($data['id'])) {
            $job_db->where('id', '=', $data['id']);
        } //End of retreiving products by id

        /***
         *
         * Retrieve products by slug
         *
         **/
        if (isset($data['slug'])) {
            $job_db->where('slug_url', '=', $data['slug']);
        } //End of retreiving products by slug

        /***
         *
         * Retrieve Job Vacancy by position
         *
         **/
        if (isset($data['post'])) {
            if (isset($data['locale']) and Str::lower($data['locale']) == $lang_english) {
                $job_db->where('position', '=', $data['post']);
            } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_burmese) {
                $job_db->where('position_burmese', '=', $data['post']);
            } else {
                $job_db->where('position_chinese', '=', $data['post']);
            }
        } //End of retreiving Job Vacancy by position

        /***
         *
         * Retrieve Job Vacancy by department
         *
         **/
        if (isset($data['depart'])) {
            if (isset($data['locale']) and Str::lower($data['locale']) == $lang_english) {
                $job_db->where('department', '=', $data['depart']);
            } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_burmese) {
                $job_db->where('department_burmese', '=', $data['depart']);
            } else {
                $job_db->where('department_chinese', '=', $data['depart']);
            }
        } //End of retreiving Job Vacancy by department

        /***
         *
         * Retrieve Job Vacancy by status
         *
         **/
        if (isset($data['status'])) {
            $job_db->where('is_vacant', '=', Str::lower($data['status']) == 'open' ? true : false);
        } //End of retreiving Job Vacancy by status

        /***
         *
         * Retrieve Job Vacancy by created
         *
         **/
        if (isset($data['created'])) {
            $job_db->where('created_at', '=', date('Y-m-d', strtotime($data['created'])));
        } //End of retreiving Job Vacancy by created

        /***
         *
         * Retrieve Job Vacancy ordered by
         *
         **/
        if (isset($data['order'])) {
            if (isset($data['locale']) and Str::lower($data['locale']) == $lang_english) {
                if (isset($data['order']['orderby']) and Str::lower($data['order']['orderby']) == 'desc') {
                    if (isset($data['order']['field'])) {
                        $job_db->orderByDesc(Str::lower($data['order']['field']));
                    } else {
                        $job_db->orderByDesc('position');
                    }
                } else {
                    if (isset($data['order']['field'])) {
                        $job_db->orderBy(Str::lower($data['order']['field']));
                    } else {
                        $job_db->orderBy('position');
                    }
                }
            } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
                if (isset($data['order']['orderby']) and Str::lower($data['order']['orderby']) == 'desc') {
                    if (isset($data['order']['field'])) {
                        $job_db->orderByDesc(Str::lower($data['order']['field']) . '_chinese');
                    } else {
                        $job_db->orderByDesc('position_chinese');
                    }
                } else {
                    if (isset($data['order']['field'])) {
                        $job_db->orderBy(Str::lower($data['order']['field']) . '_chinese');
                    } else {
                        $job_db->orderBy('position_chinese');
                    }
                }
            } else {
                if (isset($data['order']['orderby']) and Str::lower($data['order']['orderby']) == 'desc') {
                    if (isset($data['order']['field'])) {
                        $job_db->orderByDesc(Str::lower($data['order']['field']) . '_burmese');
                    } else {
                        $job_db->orderByDesc('position_burmese');
                    }
                } else {
                    if (isset($data['order']['field'])) {
                        $job_db->orderBy(Str::lower($data['order']['field']) . '_burmese');
                    } else {
                        $job_db->orderBy('position_burmese');
                    }
                }
            }
        } //End of retreiving products ordered by

        /*
        * Record count
        */
        $count_db = $job_db;

        $total_count = $count_db->count();
        // End of record count

        /*
         * Limit the number of results.
         */
        if (isset($data['limit'])) {
            if (isset($data['page'])) {
                $job_db->skip($data['page'])->take($data['limit']);
            } else {
                $job_db->skip(0)->take($data['limit']);
            }
        } // End of limit the number of results.

        $products = $job_db->get();

        if ($products->count() > 0) {
            $response = [
                'code' => 200,
                'status' => 'success',
                'locale' => $localeData,
                'count' => $total_count,
                'data' => $products,
            ];
        } else {
            $response = [
                'code' => 204,
                'status' => 'no content',
            ];
        }

        return response()->json($response);
    }
}
