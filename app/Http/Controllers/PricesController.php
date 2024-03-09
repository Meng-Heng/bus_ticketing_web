<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prices = Price::all();
        return view('admin.price.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return views('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required'
        ]);
        Price::create($request->all());
        return redirect()->route('prices.index')->with('success', 'Price created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Price $prices)
    {
        return views('prices.show', compact('prices'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Price $prices)
    {
        return views('prices.edit', compact('prices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Price $prices)
    {
        $request->validate([
            'price' => 'required'
        ]);
        $prices->update($request->all());
        return redirect()->route('prices.index')->with('success', 'Price updated successfully');
       }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Price $prices)
    {
        $prices->delete();
        return redirect()->route('prices.index')->with('success', 'Price deleted successfully');
    }
}
