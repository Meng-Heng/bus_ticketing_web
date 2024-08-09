<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Bus;
use App\Models\Price;
use App\Models\Bus_seat;
use App\Models\Storage;
use DB;
use PhpParser\Node\Stmt\TryCatch;

class ScheduleFormController extends Controller
{
    public $location = ["Phnom Penh", "Siem Reap", "Sihanouk Ville", "Kompot", "Kep", "Battambang", "Prey Veng"];

    public function index(Request $request)
    {
        $origin = $request->input('origin');
        $origin_date = $request->input('departure-date');
        $arrived = $request->input('arrival');
        $price = Price::all()->last();

        $result = Schedule::where('origin', 'like', "%$origin%")
            ->where('departure_date', 'like', "%$origin_date%")
            ->where('destination', 'like', "%$arrived%")->paginate(10)->withQueryString();

        // $yesterday = date('Y-m-d', strtotime('yesterday')); 

        if (!$origin_date) {
            return redirect('/')->with('fail', "Invalid date");
        } else if ($origin == $arrived) {
            return redirect('/')->with('fail', "Origin and Destination must be different!");
        } else {
            return view('web.frontend.page.schedule.index', [
                'result' => $result,
                'origin' => $origin,
                'arrived' => $arrived,
                'origin_date' => $origin_date,
                'price' => $price
            ]);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function schedule(Request $request)
    {
    }
    public function seat($id)
    {
        try {
            $schedule = Schedule::find($id);
            if(!$schedule){
                return response()->json(['error' => 'Schedule not found'], 404);
            }
            $seat = Bus::whereHas('bus_schedule', function ($q) use ($schedule) {
                $q->where('id', $schedule->id);
            })->first();

            if(!$seat) {
                return response()->json(['error' => 'Schedule not found'], 404);
            }

            $storage = Storage::all()->last();
            $price = Price::all()->last();
            
            $data = [
                'schedule' => $schedule,
                'seat' => $seat->total_seat,
                'bus_plate' => $seat->bus_plate,
                'storage' => $storage,
                'price' => $price
            ];

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
