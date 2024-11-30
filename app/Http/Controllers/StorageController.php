<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class StorageController extends Controller
{
    public function index() {
        $storage = Storage::paginate(15);
        return view('web.backend.component.storage.view')->with('tbl_storage', $storage);
    }

    public function create() {
    	return view('web.backend.component.storage.create');
    }

    public function store(Request $request) {
        $request->validate([
            'luggage' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    if ($value <= 19 || $value >= 45) {
                        $fail("The $attribute must be more than 19 KG and below 45 KG.");
                    }
                }
            ],
            'measurement' => 'required',
        ]);
    
        // Create The storage information
    
        $storage = new Storage();
        $storage->luggage = $request->luggage;
        $storage->measurement = $request->measurement;
        $storage->start_date = now();
        Session::flash('storage_created','New data has been created.');
        $storage->save();
        return redirect()->route('storage.view');
    }

    public function edit($id)
    {
        $storage = Storage::find($id);
        return view('web.backend.component.storage.edit')->with('tbl_storage', $storage);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
			'luggage' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    if ($value <= 19 || $value >= 45) {
                        $fail("The $attribute must be more than 19 KG and below 45 KG.");
                    }
                }
            ],
            'measurement' => 'required',
		]);
		if ($validator->fails()) {
			return redirect()->route('storage.edit',$id)
            ->withInput()
            ->withErrors($validator);
		}

		$storage = Storage::find($id);
		$storage->luggage = $request->luggage;
        $storage->measurement = $request->measurement;
        $storage->start_date = now();
		$storage->save();
		Session::flash('storage_updated','Storage has been updated.');
		return redirect()->route('storage.view');
    }

    public function show($id) {
        $storage = Storage::findOrFail($id);
        return view('web.backend.component.storage.detail')->with('tbl_storage', $storage);
    }
}
