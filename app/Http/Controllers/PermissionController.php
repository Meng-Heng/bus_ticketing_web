<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permission = Permission::paginate(15);
        return view('web.backend.component.permission.view')->with('tbl_permission', $permission);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.backend.component.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'permission' => 'required|max:50|min:6|unique:tbl_permission',
            'description' => 'max:255',
        ]);
    
        // Create The Bus information
        $permission = new Permission();
        $permission->permission = $request->permission;
        $permission->description = $request->description;
        Session::flash('permission_created','New data is created.');
        $permission->save();
        return redirect()->route('permission.view');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permission = Permission::findOrFail($id);
        return view('web.backend.component.permission.detail')->with('tbl_permission', $permission);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = Permission::find($id);
        return view('web.backend.component.permission.edit')->with('tbl_permission', $permission);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
			'permission' => 'required|max:50|min:6|unique:tbl_permission',
            'description' => 'max:255',
		]);
		if ($validator->fails()) {
			return redirect()->route('permission.edit',$id)
            ->withInput()
            ->withErrors($validator);
		}
		$permission = Permission::find($id);
		$permission->permission = $request->Input('permission');
        $permission->description = $request->Input('description');
		$permission->save();
		Session::flash('permission_updated','Permission has been updated.');
		return redirect()->route('permission.view');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        Session::flash('permission_deleted','Permission information '. $permission->id . ' was deleted.');
        return redirect()->route('permission.view');
    }
}
