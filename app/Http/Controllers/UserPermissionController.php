<?php

namespace App\Http\Controllers;

use App\Models\igrate;
use App\Models\Permission;
use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class UserPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_permission = UserPermission::paginate(15);
        return view('web.backend.component.user_permission.view')->with('tbl_user_permission', $user_permission);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = array();
        $user = array();

        foreach (Permission::all() as $permissions) {
            $permission[$permissions->id] = $permissions->permission;
        }
        foreach (User::all() as $users) {
            $user[$users->id] = $users->id . ': ' . $users->username;
        }
        return view('web.backend.component.user_permission.create', compact('permission', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'permission_id' => 'required|exists:tbl_permission,id',
            'user_id' => 'required|exists:tbl_user,id',
        ]);
    
        // Create The Bus information
        $user_permission = new UserPermission();
        $user_permission->permission_id = $request->permission_id;
        $user_permission->user_id = $request->user_id;
        Session::flash('permission_created','New data is created.');
        $user_permission->save();
        return redirect()->route('userpermission.view');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user_permission = UserPermission::findOrFail($id);
        return view('web.backend.component.user_permission.detail')->with('tbl_user_permission', $user_permission);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = array();
        $user = array();

        foreach (Permission::all() as $permissions) {
            $permission[$permissions->id] = $permissions->permission;
        }   
        foreach (User::all() as $users) {
            $user[$users->id] = $users->id . ': ' . $users->username;
        }

        $user_permission = UserPermission::find($id);
        return view('web.backend.component.user_permission.edit', compact('permission', 'user'))->with('tbl_user_permission', $user_permission);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
			'permission_id' => 'required|exists:tbl_permission,id',
            'user_id' => 'required|exists:tbl_user,id',
		]);
		if ($validator->fails()) {
			return redirect()->route('userpermission.edit',$id)
            ->withInput()
            ->withErrors($validator);
		}
		$user_permission = UserPermission::find($id);
		$user_permission->permission_id = $request->Input('permission_id');
        $user_permission->user_id = $request->Input('user_id');
		$user_permission->save();
		Session::flash('userpermission_updated','User\'s Permission has been updated.');
		return redirect()->route('userpermission.view');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user_permission = UserPermission::find($id);
        $user_permission->delete();
        Session::flash('user_permission_deleted','User\'s Permission '. $user_permission->id . ' was deleted.');
        return redirect()->route('userpermission.view');
    }
}
