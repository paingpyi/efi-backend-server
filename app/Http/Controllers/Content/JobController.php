<?php

namespace App\Http\Controllers\Content;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ApplyJob;
use App\Models\Category;
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
        $jobs = $this->getJobsAPI(['vacant' => true, 'locale' => 'en-us'])->get();

        return view('admin.job.list')->with(['jobs' => $jobs]);
    }

    /**
     * Display a closed job listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function closed()
    {
        $jobs = $this->getJobsAPI(['vacant' => false, 'locale' => 'en-us'])->get();

        return view('admin.job.list')->with(['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('parent_id', '=', 9)->get();
        return view('admin.job.add-edit')->with(['action' => 'new', 'category' => $category]);
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

        $category = explode(',', $request->main_category);

        $job = [
            'position' => json_encode([
                'en-us' => $request->position,
                'my-mm' => $request->position_burmese,
                'zh-cn' => $request->position_chinese
            ]),
            'department' => json_encode([
                'en-us' => $request->department,
                'my-mm' => $request->department_burmese,
                'zh-cn' => $request->department_chinese
            ]),
            'description' => json_encode([
                'en-us' => $request->jd,
                'my-mm' => $request->jd_burmese,
                'zh-cn' => $request->jd_chinese,
            ]),
            'due_text' => json_encode([
                'en-us' => isset($request->due) ? 'Closing at ' . date('F d, Y', strtotime($request->due)) : 'Open until candidate identified',
                'my-mm' => isset($request->due) ? 'Closing at ' . date('F d, Y', strtotime($request->due)) : 'Open until candidate identified',
                'zh-cn' => isset($request->due) ? 'Closing at ' . date('F d, Y', strtotime($request->due)) : 'Open until candidate identified'
            ]),
            'category' => $category[0],
            'due_date' => isset($request->due) ? date('Y-m-d', strtotime($request->due)) : NULL,
            'slug_url' => $request->slug_url,
            'is_vacant' => $request->active == 'on' ? TRUE : FALSE,
            'instant' => $request->instant == 'on' ? TRUE : FALSE
        ];

        Job::create($job);

        /*
        * Career Updates
        */
        $response = Http::post('https://deploy-preview-27--efimm.netlify.app/api/revalidate', [
            'type' => 'career-detail-updated',
            'data' => [
                'category_machine_name' => $category[1],
                'slug' => $request->slug_url
            ]
        ]);
        // End of Career Updates

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
        $category = Category::where('parent_id', '=', 9)->get();
        $job_en = $this->getJobsAPI(['id' => Crypt::decryptString($id), 'locale' => 'en-us'])->first();
        $job_mm = $this->getJobsAPI(['id' => Crypt::decryptString($id), 'locale' => 'my-mm'])->first();
        $job_zh = $this->getJobsAPI(['id' => Crypt::decryptString($id), 'locale' => 'zh-cn'])->first();

        return view('admin.job.add-edit')->with(['action' => 'update', 'category' => $category, 'job_en' => $job_en, 'job_mm' => $job_mm, 'job_zh' => $job_zh]);
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
        // Variables
        $response_code = 200;
        $data = $request->json()->all();
        $result = [];

        $job_db = $this->getJobsAPI($data);

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
                $jobs = $job_db->paginate($data['limit'], $data['page']);
            } else {
                $jobs = $job_db->paginate($data['limit']);
            }
        } else {
            $jobs = $job_db->get();
        } // End of limit the number of results.

        $result = [];

        foreach ($jobs as $row) {
            $result[] = [
                'id' => $row->id,
                'position' => json_decode($row->position),
                'department' => json_decode($row->department),
                'description' => json_decode($row->description),
                'category_id' => $row->category_id,
                'category_name' => $row->category_name,
                'category_description' => $row->category_description,
                'category_machine_name' => $row->category_machine_name,
                'category_is_active' => $row->category_is_active,
                'due_text' => json_decode($row->due_text),
                'due_date' => $row->due_date,
                'slug_url' => $row->slug_url,
                'is_vacant' => $row->is_vacant,
                'instant' => $row->instant,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at
            ];
        }

        if ($total_count > 0) {
            $response = [
                'code' => 200,
                'status' => 'success',
                'locale' => $this->getLang($data),
                'count' => $total_count,
                'data' => $result,
            ];
        } else {
            $response = [
                'code' => 200,
                'status' => 'no content',
                'count' => $total_count,
                'data' => []
            ];

            $response_code = 200;
        }

        return response()->json($response, $response_code);
    }

    /**
     * API Detail of Job Vacancy data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postDetail(Request $request)
    {
        // Variables
        $response_code = 200;
        $data = $request->json()->all();
        $result = [];

        if ((isset($data['slug_url']) or isset($data['id'])) and isset($data['locale'])) {
            $job_db = $this->getJobsAPI($data);

            $jobs = $job_db->first();

            if (isset($jobs)) {
                $response = [
                    'code' => 200,
                    'status' => 'success',
                    'locale' => $this->getLang($data),
                    'id' => $jobs->id,
                    'position' => json_decode($jobs->position),
                    'department' => json_decode($jobs->department),
                    'description' => json_decode($jobs->description),
                    'category_id' => $jobs->category_id,
                    'category_name' => $jobs->category_name,
                    'category_description' => $jobs->category_description,
                    'category_machine_name' => $jobs->category_machine_name,
                    'category_is_active' => $jobs->category_is_active,
                    'due_text' => json_decode($jobs->due_text),
                    'due_date' => $jobs->due_date,
                    'slug_url' => $jobs->slug_url,
                    'is_vacant' => $jobs->is_vacant,
                    'instant' => $jobs->instant,
                    'created_at' => $jobs->created_at,
                    'updated_at' => $jobs->updated_at
                ];
            } else {
                $response = [
                    'code' => 404,
                    'status' => 'no content',
                    'count' => 0,
                    'data' => []
                ];

                $response_code = 404;
            }
        } else {
            $response = [
                'code' => 400,
                'status' => 'Input JSON must have "locale" and ("id" or "slug_url").',
            ];

            $response_code = 400;
        }

        return response()->json($response, $response_code);
    }

    /**
     * API Apply Job.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function applyJob(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_id' => 'required|numeric',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
            'cv' => 'required|mimes:pdf,doc,docx',
        ]);

        if ($validator->fails()) {
            $response = [
                'code' => 400,
                'status' => 'Input JSON must have "locale" and ("id" or "slug_url").',
                'errors' => $validator->errors()
            ];

            $response_code = 400;

            return response()->json($response, $response_code);
        }

        if ($request->file()) {
            $CVfileName = time() . '_' . $request->cv->getClientOriginalName();
            $CVfilePath = $request->file('cv')->storeAs('uploads/cv', $CVfileName, 'public');

            $ApplyJob = [
                'job_id' => $request->job_id,
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
                'cv' => '/storage/' . $CVfilePath,
            ];

            ApplyJob::create($ApplyJob);

            $response = [
                'code' => 200,
                'status' => 'Successfully saved',
                'job_id' => $request->job_id,
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
                'cv' => config('app.url') . '/storage/' . $CVfilePath,
            ];

            $response_code = 200;

            return response()->json($response, $response_code);
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

    private function getJobsAPI($data)
    {
        $job_db = DB::table('jobs')
            ->join('categories', 'categories.id', '=', 'jobs.category')
            ->select(
                'jobs.id',
                DB::raw('JSON_EXTRACT(jobs.position, \'$."' . Str::lower($data['locale']) . '"\') as position'),
                DB::raw('JSON_EXTRACT(jobs.department, \'$."' . Str::lower($data['locale']) . '"\') as department'),
                DB::raw('JSON_EXTRACT(jobs.description, \'$."' . Str::lower($data['locale']) . '"\') as description'),
                DB::raw('JSON_EXTRACT(jobs.due_text, \'$."' . Str::lower($data['locale']) . '"\') as due_text'),
                'jobs.category as category_id',
                'categories.name as category_name',
                'categories.description as category_description',
                'categories.machine as category_machine_name',
                'categories.is_active as category_is_active',
                'jobs.due_date',
                'jobs.slug_url',
                'jobs.is_vacant',
                'jobs.instant',
                'jobs.created_at',
                'jobs.updated_at'
            );

        /***
         *
         * Retrieve jobs by id
         *
         **/
        if (isset($data['id'])) {
            $job_db->where('jobs.id', '=', $data['id']);
        } //End of retreiving jobs by id

        /***
         *
         * Retrieve jobs by keyword
         *
         **/
        if (isset($data['keyword'])) {
            $keyword = Str::lower($data['keyword']);

            $job_db
                ->Where(DB::raw('LOWER(JSON_EXTRACT(jobs.position, \'$."' . Str::lower($data['locale']) . '"\'))'), 'LIKE', "%{$keyword}%")
                ->orWhere(DB::raw('LOWER(JSON_EXTRACT(jobs.department, \'$."' . Str::lower($data['locale']) . '"\'))'), 'LIKE', "%{$keyword}%");
        } //End of retreiving jobs by keyword

        /***
         *
         * Retrieve jobs by vacant
         *
         **/
        if (isset($data['vacant'])) {
            $job_db->where('jobs.is_vacant', '=', $data['vacant']);
        } //End of retreiving jobs by vacant

        /***
         *
         * Retrieve jobs by instant
         *
         **/
        if (isset($data['instant'])) {
            $job_db->where('jobs.instant', '=', $data['instant']);
        } //End of retreiving jobs by instant

        /***
         *
         * Retrieve jobs by category_machine_name
         *
         **/
        if (isset($data['category_machine_name'])) {
            $job_db->where('categories.machine', '=', $data['category_machine_name']);
        } //End of retreiving jobs by category_machine_name

        /***
         *
         * Retrieve jobs by slug url
         *
         **/
        if (isset($data['slug_url'])) {
            $job_db->where('jobs.slug_url', '=', $data['slug_url']);
        } //End of retreiving jobs by slug url

        /***
         *
         * Retrieve jobs by due date
         *
         **/
        if (isset($data['due'])) {
            $job_db->whereDate('jobs.due_date', '=', date("Y-m-d", strtotime($data['due'])));
        } //End of retreiving jobs by due date

        /***
         *
         * Retrieve products ordered by
         *
         **/
        if (isset($data['order'])) {
            if (isset($data['order']['orderby']) and Str::lower($data['order']['orderby']) == 'desc') {
                $job_db->orderByDesc(Str::lower($data['order']['field']));
            } else {
                $job_db->orderBy(Str::lower($data['order']['field']));
            }
        } //End of retreiving products ordered by

        return $job_db;
    }
}
