<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index($id) {
        try {
            $user = User::findOrFail($id);
            return view('web.frontend.page.profile.index')->with('user', $user);
        } catch(\Exception $e) {
            return response()->json(['LOOK AT THIS ERROR: ' => $e->getMessage()], 500);
        }
    }

    public function edit($id)
    { 
        try {
            $user = User::findOrFail($id);
            return view('web.frontend.page.profile.edit')->with('user', $user);
        } catch(\Exception $e) {
            return response()->json(['LOOK AT THIS ERROR: ' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, $id)
    {   
		$user = User::find($id);
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:tbl_user,email,' . $user->id, // Assuming this is an update, with unique email
            'gender' => 'in:unspecified,male,female,other', // Adjust options as needed
            'date_of_birth' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $minAge = 18;
                    if (Carbon::parse($value)->diffInYears(Carbon::now()) < $minAge) {
                        $fail('You must be at least ' . $minAge . ' years old.');
                    }
                },
            ],
            'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:60000',
            'contact' => 'required|string|max:15',
            'hometown' => 'string|max:255',
            'id_card' => 'string|max:20|unique:tbl_user,id_card,' . $user->id,
        ]);

        if ($request->validate->fails()) {
			return redirect('profile/'.$id.'/edit')
				->withInput()
				->withErrors($request->validate);
		}

        if($request->file('picture') != ""){
            $image = $request->file('picture');
            $upload = 'profile/';
            $filename = time().$image->getClientOriginalName();
            move_uploaded_file($image->getPathName(), $upload . $filename);
		} 

		$user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->date_of_birth = $request->input('date_of_birth');
        if(isset($filename)) {
            $user->picture = $request->filename;
        }
        $user->contact = $request->input('contact');
        $user->hometown = $request->input('hometown');
        $user->id_card = $request->input('id_card');

		$user->save();
		Session::flash('profile_updated','Profile has been updated.');
        return redirect('profile/'.$user->id.'/edit');
    }
    
}
