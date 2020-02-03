<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Group;
use App\Role;
use App\Region_point;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        //$u=$u->setRelation('group_id', $u->group->name);
      //

        $county_id=Auth::user()->region_point->region_center->county_id;
        if (Gate::allows('isOstan')){
            return   $us = User::with('group','role','region_point')->paginate(10);
        }
        else{
            return    User::with(['group','role','region_point'])
                ->whereHas('Region_point.Region_center', function($q) use($county_id) {
                    // Query the name field in status table
                    $q->where('county_id', '=', $county_id); // '=' is optional
                })
                ->paginate(10);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'username' => 'required|string|max:50|unique:users',
            'role_id' => 'required|numeric|max:30',
            'group_id' => 'required|numeric|max:99',
            'point_id' => 'required|numeric|max:2000',
            'password' => 'required|string|min:8',

        ]);
        return User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['role_id'],
            'group_id' => $request['group_id'],
            'point_id' => $request['point_id'],
        ]);
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
     * Update the specified resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * param  int  $id
     * return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'username' => 'string|max:50|unique:users,username,'.$user->id,
            'role_id' => 'required|numeric|max:30',
            'group_id' => 'required|numeric|max:99',
            'point_id' => 'required|numeric|max:2000',
            'password' => 'sometimes|min:8',

        ]);
        if(!empty($request->password)){
            $request->merge(['password' => Hash::make($request['password'])]);
        }
        $user->update($request->all());
        return ['message' => 'Updated the user info'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * param  int  $id
     * return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('isAdmin');

        $user = User::findOrFail($id);
        // delete the user

        $user->delete();

        return ['message' => 'User Deleted'];
    }
    public function search(){
        $county_id=Auth::user()->region_point->region_center->county_id;
        if (Gate::allows('isOstan')){
            if ($search = \Request::get('q')) {
                $us = User::where(function($query) use ($search){
                    $query->where('name','LIKE',"%$search%")
                        ->orWhere('username','LIKE',"%$search%");
                })->paginate(20);
                foreach ($us as $u ) {
                    $us->gname= ($u->group->name);
                    $us->rname= ($u->role->name);
                }
            }else{
                $us = User::latest()->paginate(5);
                foreach ($us as $u ) {
                    $us->gname= ($u->group->name);
                    $us->rname= ($u->role->name);
                }
                return $us;
            }
        }
        else{
            if ($search = \Request::get('q')) {
                $us = User::with(['group','role','region_point'])
                    ->whereHas('Region_point.Region_center', function ($qe) use ($county_id) {
                        // Query the name field in status table
                        $qe->where('county_id', '=', $county_id); // '=' is optional
                    })->where(function($query) use ($search){
                        $query->where('name','LIKE',"%$search%")
                            ->orWhere('username','LIKE',"%$search%");
                    })->paginate(20);

                foreach ($us as $u ) {
                    $us->gname= ($u->group->name);
                    $us->rname= ($u->role->name);
                }
            }else{
                return User::with(['group','role','region_point'])
                    ->whereHas('Region_point.Region_center', function($q) use($county_id) {
                        // Query the name field in status table
                        $q->where('county_id', '=', $county_id); // '=' is optional
                    })
                    ->paginate(10);
            }
        }


        return $us;

    }
    public function groupList()
    {
        $us = Group::all();
        return $us;
    }
    public function roleList()
    {
        $us = Role::all();
        return $us;
    }

    public function changePassword(Request $request)
    {
        $user_id=Auth::user()->id;
        $user = User::findOrFail($user_id);
        $this->validate($request,[
            'password' => 'password:api',
            'new_password' => 'bail|string|min:8',
            'confirm_password' => 'bail|required_with:new_password|same:new_password|string|min:8'
        ]);
        if(!empty($request->password)){
            $request->merge(['password' => Hash::make($request['new_password'])]);
            $request->merge(['id' => $user_id]);
        }
        $user->update($request->all());
        return ['message' => 'Updated the user info'];
    }
}
