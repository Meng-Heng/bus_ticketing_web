<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();
        return view('review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('review.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'star' => 'required',
            'feedback' => 'required',
        ]);
        Review::create($request->all());
        return redirect()->route('review.index')->with('success', 'Reviews created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $reviews)
    {
        return view('review.show',compact('reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $reviews)
    {
        return view('review.edit', compact('reviews'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $reviews)
    {
        $request->validate([
            'user_id' => 'required',
            'star' => 'required',
            'feedback' => 'required',
        ]);
        $reviews->update($request->all());
        return redirect()->route('review.index')->with('success', 'Review updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $reviews)
    {
        $reviews->delete();
        return redirect()->route('review.index')->with('success', 'Review deleted successfully');
    }
}
