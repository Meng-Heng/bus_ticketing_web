<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class PriceController extends Controller
{
    public function index() {
        $price = Price::paginate(15);
        return view('web.backend.component.price.view')->with('tbl_price', $price);
    }

    public function create() {
    	return view('web.backend.component.price.create');
    }

    public function store(Request $request) {
        $request->validate([
            'price' => [
                'required',
                'regex:/^(1[0-9](\.\d{2})?|10\.\d{2})$/', // Matches 1.00 - 19.99
                function ($attribute, $value, $fail) {
                    if ($value <= 10 || $value >= 20) {
                        $fail("The $attribute must be more than $10 and below $20.");
                    }
                },
            ],
            'currency' => 'required',
        ]);
    
        // Create The price information
    
        $price = new Price();
        $price->price = $request->price;
        $price->currency = $request->currency;
        $price->start_date = now();
        Session::flash('price_created','New data has been created.');
        $price->save();
        return redirect()->route('price.view');
    }

    public function edit($id)
    {
        $price = Price::find($id);
        return view('web.backend.component.price.edit')->with('tbl_price', $price);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
			'price' => [
                'required',
                'regex:/^(1[0-9](\.\d{2})?|10\.\d{2})$/', // Matches 1.00 - 19.99
                function ($attribute, $value, $fail) {
                    if ($value <= 10 || $value >= 20) {
                        $fail("The $attribute must be more than $10 and below $20.");
                    }
                },
            ],
            'currency' => 'required',
		]);
		if ($validator->fails()) {
			return redirect()->route('price.edit',$id)
            ->withInput()
            ->withErrors($validator);
		}

		$price = Price::find($id);
		$price->price = $request->Input('price');
        $price->currency = $request->Input('currency');
        $price->start_date = now();
		$price->save();
		Session::flash('price_updated','Price has been updated.');
		return redirect()->route('price.view');
    }

    public function show($id) {
        $price = Price::findOrFail($id);
        return view('web.backend.component.price.detail')->with('tbl_price', $price);
    }
}
