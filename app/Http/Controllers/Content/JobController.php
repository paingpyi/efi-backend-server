<?php

namespace App\Http\Controllers\Content;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        }//dd($request->all());

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
