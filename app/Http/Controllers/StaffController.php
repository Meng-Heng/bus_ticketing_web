<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function index() {
        $staff = Staff::paginate(15);
        return view('web.backend.component.staff.view')->with('tbl_staff', $staff);
    }

    public function create() {
        $user = Auth::user()->id;

        return view('web.backend.component.staff.create', compact('user'));
    }

    public function store(Request $request) {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'user_id' => 'required',
            'hometown' => 'string|max:255',
            'identification' => 'string|max:20|unique:tbl_staff,identification',
            'residency' => 'string|max:255',
            'contact' => [
                'required','string','regex:/^0\d{2}-\d{3}-\d{3,4}$/',
                function($attribute, $value, $fail) {
                    if(!$value) {
                        $fail('The contact number must be in the format 012-345-678 or 012-345-6789.');
                    }
                }
            ],
            'position' => 'required|max:20',
        ]);
    
        // Create The Bus information
    
        $staff = new Staff();
        $staff->fname = $request->input('fname');
        $staff->lname = $request->input('lname');
        $staff->user_id = $request->input('user_id');
        $staff->hometown = $request->input('hometown');
        $staff->identification = $request->input('identification');
        $staff->contact = $request->input('contact');
        $staff->residency = $request->input('residency');
        $staff->is_active = $request->input('is_active');
        $staff->position = $request->input('position');
        Session::flash('staff_created','New data is created.');
        $staff->save();
        return redirect()->route('staff.view');
    }

    public function edit($id)
    {
        $staff = Staff::find($id);
        
        return view('web.backend.component.staff.edit')->with('tbl_staff', $staff);
    }

    public function update(Request $request, $id) {
        $staff = Staff::find($id);
        $validator = Validator::make($request->all(), [
			'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'hometown' => 'string|max:255',
            'identification' => 'string|max:20|unique:tbl_staff,identification,' . $staff->id,
            'residency' => 'string|max:255',
            'contact' => [
                'required','string','regex:/^0\d{2}-\d{3}-\d{3,4}$/',
                function($attribute, $value, $fail) {
                    if(!$value) {
                        $fail('The contact number must be in the format 012-345-678 or 012-345-6789.');
                    }
                }
            ],
            'position' => 'required|max:20',
		]);
		if ($validator->fails()) {
			return redirect()->route('staff.edit',$id)
            ->withInput()
            ->withErrors($validator);
		}

		$staff->fname = $request->input('fname');
        $staff->lname = $request->input('lname');
        $staff->hometown = $request->input('hometown');
        $staff->identification = $request->input('identification');
        $staff->contact = $request->input('contact');
        $staff->residency = $request->input('residency');
        $staff->position = $request->input('position');

		$staff->save();
		Session::flash('staff_updated','user has been updated.');
		return redirect()->route('staff.view');
    }

    public function show($id) {
        $staff = Staff::findOrFail($id);
        return view('web.backend.component.staff.detail')->with('tbl_staff', $staff);
    }

    public function destroy(string $id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        Session::flash('staff_deleted','Staff: '. $staff->id . ' was deleted.');
        return redirect()->route('staff.view');
    }
}
