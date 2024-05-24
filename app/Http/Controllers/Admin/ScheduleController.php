<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
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
            $schedule = Schedule::where('bus_id', 'LIKE', "%$keyword%")
                ->orWhere('leave', 'LIKE', "%$keyword%")
                ->orWhere('departure_date', 'LIKE', "%$keyword%")
                ->orWhere('departure_time', 'LIKE', "%$keyword%")
                ->orWhere('destination', 'LIKE', "%$keyword%")
                ->orWhere('arrival_date', 'LIKE', "%$keyword%")
                ->orWhere('arrival_time', 'LIKE', "%$keyword%")
                ->orWhere('sole_out', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $schedule = Schedule::latest()->paginate($perPage);
        }

        return view('admin.schedule.index', compact('schedule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.schedule.create');
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
        
        Schedule::create($requestData);

        return redirect('admin/schedule')->with('flash_message', 'Schedule added!');
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
        $schedule = Schedule::findOrFail($id);

        return view('admin.schedule.show', compact('schedule'));
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
        $schedule = Schedule::findOrFail($id);

        return view('admin.schedule.edit', compact('schedule'));
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
        
        $schedule = Schedule::findOrFail($id);
        $schedule->update($requestData);

        return redirect('admin/schedule')->with('flash_message', 'Schedule updated!');
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
        Schedule::destroy($id);

        return redirect('admin/schedule')->with('flash_message', 'Schedule deleted!');
    }
}
