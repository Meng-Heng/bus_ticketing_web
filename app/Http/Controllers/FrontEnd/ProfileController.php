<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function edit($id)
    { 
        try {
            $user = User::findOrFail($id);
            return view('web.frontend.page.profile.profile')->with('tbl_user', $user);
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
		$user->username = $request->Input('username');
        $user->email = $request->Input('email');
        $user->gender = $request->Input('gender');
        $user->date_of_birth = $request->Input('date_of_birth');
        $user->contact = $request->Input('contact');
        $user->hometown = $request->Input('hometown');
        $user->id_card = $request->Input('id_card');
        
        // $user->picture = $request->Input('picture');
		$user->save();
		Session::flash('profile_updated','Profile has been updated.');
        return redirect('profile/'.$id.'/edit');
    }
    
}
