<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Schedule;

class BusSeatDailyController extends Controller
{
    protected $patterns = [
        'Phnom Penh - DN to Battambang' => [
            [
                'origin' => 'Phnom Penh - DN', 
                'destination' => 'Battambang', 
                'departure_time' => '07:00:00', 
                'arrival_time' => '13:00:00'
            ],
            [
                'origin' => 'Battambang', 
                'destination' => 'Siem Reap', 
                'departure_time' => '14:00:00', 
                'arrival_time' => '16:00:00'
            ],
            [
                'origin' => 'Siem Reap', 
                'destination' => 'Banteay Meanchey', 
                'departure_time' => '17:00:00', 
                'arrival_time' => '20:00:00'
            ],
            [
                'origin' => 'Banteay Meanchey', 
                'destination' => 'Siem Reap', 
                'departure_time' => '21:00:00', 
                'arrival_time' => '02:00:00'
            ],
        ],
        // Add more patterns as needed
    ];

    public function index(Request $request) {
        $query = Schedule::orderBy('departure_date','DESC');

        // Filter by bus_id if provided
        if ($request->has('bus_id') && !empty($request->bus_id)) {
            $query->where('bus_id', $request->bus_id);
        }

        $tbl_schedule = $query->paginate(15);

        $buses = Bus::all();

        return view('web.backend.component.bus_seat_daily.view', compact('buses', 'tbl_schedule'));
    }

    public function create() {
        
            $buses = Bus::pluck('bus_plate', 'id'); // Simplified fetching
            
            $locations = [
                "Phnom Penh - DN", "Phnom Penh - Chhouk Meas", "Siem Reap", "Sihanouk Ville",
                "Kompot", "Kep", "Battambang", "Banteay Meanchey"
            ];
            // Access the patterns
            $patterns = $this->patterns;
        
            return view('web.backend.component.bus_seat_daily.create', compact('buses', 'locations', 'patterns'));
    }

    public function store(Request $request) {
        $request->validate([
            'bus_id' => 'required|exists:tbl_bus,id',
            'origin' => 'required',
            'destination' => 'required',
        ]);
    
        // Find the selected pattern
        $patternName = $request->input('pattern');
        $patterns = $this->patterns[$patternName] ?? [];
    
        // Generate schedules
            Schedule::create([
                'bus_id' => $request->input('bus_id'),
                'origin' => $request->input('origin'),
                'departure_date' => $request->input('departure_date'),
                'departure_time' => $request->input('departure_time'),
                'destination' => $request->input('destination'),
                'arrival_date' => $request->input('arrival_date'), // Assuming same date
                'arrival_time' => $request->input('arrival_time'),
                'sold_out' => 0,
            ]);
    
        return redirect()->route('schedule.view')->with('success', 'Schedule created successfully.');
    }
    

    public function edit($id) {
        $bus = array();
        foreach (Bus::all() as $buses) {
            $bus[$buses->id] = $buses->id . ': ' . $buses->bus_plate;
        }
        $schedule = Schedule::findorFail($id);
        return view('web.backend.component.bus_seat_daily.edit', compact('bus'))->with('tbl_bus_seat_daily', $schedule);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'bus_id'=> 'required',
            'origin' => 'required',
            'departure_date' => 'required|date_format:Y-m-d',
            'departure_time' => 'required',
            'destination' => 'required',
            'arrival_date' => 'required|date_format:Y-m-d',
            'arrival_time' => 'required',
            'sold_out' => 'required',
        ]);
        $schedule = Schedule::findOrFail($id);
        $schedule->bus_id = $request->input('bus_id');
        $schedule->origin = $request->input('origin');
        $schedule->departure_date = $request->input('departure_date');
        $schedule->departure_time = $request->input('departure_time');
        $schedule->destination = $request->input('destination');
        $schedule->arrival_date = $request->input('arrival_date');
        $schedule->arrival_time = $request->input('arrival_time');
        $schedule->sold_out = $request->input('sold_out');
        $schedule->save();
        Session::flash('schedule_updated', 'Update successfully');
        return redirect()->route('schedule.view');
    }

    public function show($id) {
        $schedule = Schedule::findOrFail($id);
        return view('web.backend.component.bus_seat_daily.detail')->with('tbl_schedule', $schedule);
    }

    public function destroy($id) {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        Session::flash('schedule_deleted', 'Deleted Successfully!');
        return redirect()->route('schedule.view');
    }
}
