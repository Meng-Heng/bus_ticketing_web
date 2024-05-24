<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\BusSeat;
use Illuminate\Http\Request;

class BusSeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $busseat = BusSeat::where('bus_id', 'LIKE', "%$keyword%")
                ->orWhere('seat_number', 'LIKE', "%$keyword%")
                ->orWhere('seat_type', 'LIKE', "%$keyword%")
                ->orWhere('storage_id', 'LIKE', "%$keyword%")
                ->orWhere('price_id', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $busseat = BusSeat::latest()->paginate($perPage);
        }

        return view('admin.busseat.index', compact('busseat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.busseat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        BusSeat::create($requestData);

        return redirect('admin/busseat')->with('flash_message', 'BusSeat added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $busseat = BusSeat::findOrFail($id);

        return view('admin.busseat.show', compact('busseat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $busseat = BusSeat::findOrFail($id);

        return view('admin.busseat.edit', compact('busseat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $busseat = BusSeat::findOrFail($id);
        $busseat->update($requestData);

        return redirect('admin/busseat')->with('flash_message', 'BusSeat updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        BusSeat::destroy($id);

        return redirect('admin/busseat')->with('flash_message', 'BusSeat deleted!');
    }
}
