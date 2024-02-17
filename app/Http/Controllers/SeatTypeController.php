<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Models\Seat_type;

class SeatTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seat_types = Seat_type::all();
        return view('seattype.index')->with('seat_types', $seat_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = array();
    	foreach (Category::all() as $category) {
    		$categories[$category->id] = $category->name;
    	}
    	return view('product.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20|min:3',
            'category_id' => 'required|integer',
            'price' => 'required|max:20|min:3',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'description' => 'required|max:1000|min:10',
        ]);
          
        if ($validator->fails()) {
            return redirect('product/create')
                ->withInput()
                ->withErrors($validator);
        }
    
        // Create The product
        $image = $request->file('image');
        $upload = 'product/';
        $filename = time().$image->getClientOriginalName();
        move_uploaded_file($image->getPathName(), $upload. $filename);
    
        $product = new Product();
        $product->name = $request->name;
	    $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->image = $filename;
        $product->description = $request->description;
        $product->save();
        Session::flash('product_create','New data is created.');
        return redirect('product/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = array();
        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }
        $product = Product::findOrFail($id);
        return view('product.edit')->with('product', $product)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
			'name' => 'required|max:20|min:3',
			'price' => 'required|max:20|min:3',
            'category_id' => 'required|integer',
			'image' => 'mimes:jpg,jpeg,png,gif',
			'description' => 'required|max:1000|min:10',
		]);

		if ($validator->fails()) {
			return redirect('product/'.$id.'/edit')
				->withInput()
				->withErrors($validator);
		}
        $product = Product::find($id);
		// Create The Post
		if($request->file('image') != ""){
            $image = $request->file('image');
            $upload = 'product/';
            $filename = time().$image->getClientOriginalName();
            move_uploaded_file($image->getPathName(), $upload . $filename);
		} 
		
		$product->name = $request->Input('name');
		$product->price = $request->Input('price');
        $product->category_id = $request->Input('category_id');
		if(isset($filename)){
		    $product->image = $filename;
		}
		$product->description = $request->Input('description');
		$product->save();

		Session::flash('product_update','Data is updated');
		return redirect('product/'.$product->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
       
        $product = Product::find($id);
    	$image_path = 'product/'.$product->image;
    	File::delete($image_path);
    	$product->delete();
    	Session::flash('product_delete','Data is deleted.');
    	return redirect('products');
    }
}
