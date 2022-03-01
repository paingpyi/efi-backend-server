<?php

namespace App\Http\Controllers\User;

use Illuminate\Contracts\Encryption\DecryptException;
use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\Jetstream;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\User;

class UserController extends Controller
{
    use PasswordValidationRules;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->getUsers(0, 'users.is_active', '=', true);

        return view('admin.user.list')->with(['users' => $users]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deactivated()
    {
        $users = $this->getUsers(0, 'users.is_active', '=', false);

        return view('admin.user.list')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::where('is_active', '=', true)->get();

        return view('admin.user.add-edit')->with(['action' => 'new', 'teams' => $teams]);
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            'file' => ['nullable', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'team' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('new#user')
                ->withErrors($validator)
                ->withInput();
        }

        $user = [];

        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $user = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'current_team_id' => $request->team,
                'profile_photo_path' => '/storage/' . $filePath,
                'is_active' => ($request->is_active == 'on') ? true : false,
            ];
        } else {
            $user = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'current_team_id' => $request->team,
                'is_active' => ($request->is_active == 'on') ? true : false,
            ];
        }

        User::create($user);

        return redirect()->route('user#list')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', '=', Crypt::decryptString($id))->first();

        $teams = Team::where('is_active', '=', true)->get();

        return view('admin.user.add-edit')->with(['user' => $user, 'teams' => $teams, 'action' => 'update']);
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
        if (is_null($request->password)) {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
                'file' => ['nullable', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
                'team' => ['required'],
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => $this->passwordRules(),
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
                'file' => ['nullable', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
                'team' => ['required'],
            ]);
        }

        if ($validator->fails()) {
            return redirect()
                ->route('edit#user')
                ->withErrors($validator)
                ->withInput();
        }

        $user = [];

        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            if (is_null($request->password)) {
                $user = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'current_team_id' => $request->team,
                    'profile_photo_path' => '/storage/' . $filePath,
                    'is_active' => ($request->is_active == 'on') ? true : false,
                ];
            } else {
                $user = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'current_team_id' => $request->team,
                    'profile_photo_path' => '/storage/' . $filePath,
                    'is_active' => ($request->is_active == 'on') ? true : false,
                ];
            }
        } else {
            if (is_null($request->password)) {
                $user = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'current_team_id' => $request->team,
                    'is_active' => ($request->is_active == 'on') ? true : false,
                ];
            } else {
                $user = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'current_team_id' => $request->team,
                    'is_active' => ($request->is_active == 'on') ? true : false,
                ];
            }
        }

        User::where('id', '=', $id)->update($user);

        return redirect()->route('user#list')->with(['success_message' => 'Successfully <strong>updated!</strong>']);
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
            $user = User::where('id', '=', Crypt::decryptString($id))->first();
            $flag = false;
            $message = 'deactivated';

            if ($user->is_active) {
                $flag = false;
                $message = 'deactivated';
            } else {
                $flag = true;
                $message = 'activated';
            }

            User::where('id', '=', Crypt::decryptString($id))->update(['is_active' => $flag]);

            return redirect()
                ->route('user#list')
                ->with(['success_message' => 'Successfully <strong>' . $message . '!</strong>']);
        } catch (DecryptException $e) {
            abort(404, 'Decrypt Exception occured.');
        }
    }

    private function getUsers($paginate, $search_column = null, $search_operator = null, $search_value = null)
    {
        $users = DB::table('users')
            ->join('teams', 'users.current_team_id', '=', 'teams.id')
            ->select('users.*', 'teams.name as team_name');

        if (is_null($search_column) and is_null($search_operator) and is_null($search_value)) {
            if ($paginate > 0) {
                return $users->paginate($paginate);
            } else {
                return $users->get();
            }
        } else {
            if ($paginate > 0) {
                return $users->where($search_column, $search_operator, $search_value)->paginate($paginate);
            } else {
                return $users->where($search_column, $search_operator, $search_value)->get();
            }
        }
    }
}
