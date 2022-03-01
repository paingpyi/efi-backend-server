<?php

namespace App\Http\Controllers\User;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = $this->getTeams(0, 'teams.is_active', '=', true);

        return view('admin.team.list')->with(['teams' => $teams]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deactivated()
    {
        $teams = $this->getTeams(0, 'teams.is_active', '=', false);

        return view('admin.team.list')->with(['teams' => $teams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.add-edit')->with(['action' => 'new']);
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
            'name' => 'required|unique:teams|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('new#team')
                ->withErrors($validator)
                ->withInput();
        }

        $team = [
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'permissions' => (is_null($request->modules) ? null : json_encode($request->modules)),
            'personal_team' => false,
            'is_active' => ($request->is_active == 'on') ? true : false,
        ];

        Team::create($team);

        return redirect()->route('team#list')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::where('id', '=', Crypt::decryptString($id))->first();

        return view('admin.team.add-edit')->with(['team' => $team, 'action' => 'update']);
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
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('edit#team')
                ->withErrors($validator)
                ->withInput();
        }

        $team = [
            'name' => $request->name,
            'permissions' => (is_null($request->modules) ? null : json_encode($request->modules)),
            'is_active' => ($request->is_active == 'on') ? true : false,
        ];

        Team::where('id', '=', $id)->update($team);

        return redirect()->route('team#list')->with(['success_message' => 'Successfully <strong>updated!</strong>']);
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
            $team = Team::where('id', '=', Crypt::decryptString($id))->first();
            $flag = false;
            $message = 'deactivated';

            if($team->is_active)
            {
                $flag = false;
                $message = 'deactivated';
            }
            else
            {
                $flag = true;
                $message = 'activated';
            }

            Team::where('id', '=', Crypt::decryptString($id))->update(['is_active' => $flag]);

            return redirect()
                ->route('team#list')
                ->with(['success_message' => 'Successfully <strong>' . $message . '!</strong>']);
        } catch (DecryptException $e) {
            abort(404, 'Decrypt Exception occured.');
        }
    }

    private function getTeams($paginate, $search_column = null, $search_operator = null, $search_value = null)
    {
        $teams = DB::table('teams')
            ->join('users', 'users.id', '=', 'teams.user_id')
            ->select('teams.*', 'users.name as user_name', 'users.email as user_email');

        if (is_null($search_column) and is_null($search_operator) and is_null($search_value)) {
            if ($paginate > 0) {
                return $teams->paginate($paginate);
            } else {
                return $teams->get();
            }
        } else {
            if ($paginate > 0) {
                return $teams->where($search_column, $search_operator, $search_value)->paginate($paginate);
            } else {
                return $teams->where($search_column, $search_operator, $search_value)->get();
            }
        }
    }
}
