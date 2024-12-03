<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Ticket;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index() {
        $reviewedPaymentIds = Review::where('user_id', Auth::id())->pluck('payment_id');

        $tickets = Ticket::whereHas('payment', function ($query) {
            $query->where('user_id', Auth::id());
        })->whereNotIn('payment_id', $reviewedPaymentIds)
        ->with('schedule')
        ->get();

        $tickets = $tickets->toArray();
        $user_id = Auth::id();

        $reviews = Review::with('user')->paginate(10);

        // dd($payments);
        
        return view('web.frontend.page.review.index', compact('tickets','reviews'));
    }
    public function store(Request $request) {

        $request->validate([
            'star' => 'required|integer|between:1,5',
            'feedback' => 'required|string|min:25|max:255|regex:/^[\pL\pN\s.,!?\'"-]+$/u',
        ]);

        // Save the review to tbl_review
        Review::create([
            'star' => $request->star,
            'feedback' => $request->feedback,
            'posted_time' => now(),
            'user_id' => Auth::id(),  // assuming the user is authenticated
            'payment_id' => $request->payment,  // Adjust if needed based on your payment system
        ]);

        return redirect()->route('review')->with('success', 'Thank you for your review!');
    }
}
