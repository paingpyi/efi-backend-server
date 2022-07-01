<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\EmailSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $email = EmailSetting::where('id', '=', 1)->first();

        return view('admin.email.add-edit')->with(['email'=>$email]);
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
            'jobapply' => 'required|email',
            'contact' => 'required|email',
            'quote' => 'required|email',
            'claim' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('email#setting')
                ->withErrors($validator)
                ->withInput();
        }

        EmailSetting::where('id', '=', 1)->update([
            'job_apply' => $request->jobapply,
            'contact' => $request->contact,
            'quotes' => $request->quote,
            'claims' => $request->claim,
        ]);

        return redirect()->route('admin#dashboard')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
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
