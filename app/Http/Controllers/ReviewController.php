<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $review = Review::paginate(15);
        return view('web.backend.component.review.view')->with('tbl_review', $review);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $review = Review::findOrFail($id);
        return view('web.backend.component.review.detail')->with('tbl_review', $review);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = array();
        $user = array();

        foreach (Payment::all() as $payments) {
            $payment[$payments->id] = $payments->payment;
        }   
        foreach (User::all() as $users) {
            $user[$users->id] = $users->id . ': ' . $users->username;
        }

        $review = Review::find($id);
        return view('web.backend.component.review.edit', compact('payment', 'user'))->with('tbl_review', $review);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
			'feedback' => 'required',
		]);
		if ($validator->fails()) {
			return redirect()->route('feedback.edit',$id)
            ->withInput()
            ->withErrors($validator);
		}
		$review = Review::find($id);
		$review->feedback = $request->Input('feedback');
		$review->save();
		Session::flash('feedback_updated','Feedback has been updated.');
		return redirect()->route('feedback.view');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::find($id);
        $review->delete();
        Session::flash('feedback_deleted','Feedback: '. $review->id . ' was deleted.');
        return redirect()->route('feedback.view');
    }
}
