<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Bus;
use App\Models\Price;
use App\Models\User;
use App\Models\Storage;
use App\Models\Bus_seat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class BusTicketingController extends Controller
{
    public $location = ["Phnom Penh", "Siem Reap", "Sihanouk Ville", "Kompot", "Kep", "Battambang", "Prey Veng"];

    public function departureSchedule(Request $request)
    {
        Session::put('schedule_url', $request->fullUrl());

        $location = ["Phnom Penh", "Siem Reap", "Sihanouk Ville", "Kompot", "Kep", "Battambang", "Prey Veng"];
        $request->validate([
            'origin' => 'required',
            'arrival' => 'required|different:origin',
            'departure-date' => 'required|date',
            'return-date' => 'nullable|date|after_or_equal:departure-date',
        ]);

        $origin = $request->input('origin');
        $origin_date = $request->input('departure-date');
        $arrived = $request->input('arrival');
        $return_date = $request->input('return-date');
        $price = Price::all()->last();
        
        $result = Schedule::where('origin', 'like', "%$origin%")
            ->where('departure_date', 'like', "%$origin_date%")
            ->where('destination', 'like', "%$arrived%")->paginate(10)->withQueryString();

        $data = [
            'result' => $result,
            'origin' => $origin,
            'arrived' => $arrived,
            'origin_date' => $origin_date,
            'return_date' => $return_date,
            'price' => $price,
        ];

        Session::put('departure-data', $data);
        return view('web.frontend.page.schedule.index', $data, ['location' => $location]);
    }

    public function departureSeat($id)
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
                'price' => $price,
            ];

            Session::put('departure-seat', $data);
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function returnSchedule(Request $request) {
        try {
            $location = ["Phnom Penh", "Siem Reap", "Sihanouk Ville", "Kompot", "Kep", "Battambang", "Prey Veng"];
            $departureData = session()->get('departure-data');

            $return_date = $departureData['return_date'];
            $destination = $departureData['origin'];
            $origin = $departureData['arrived'];
            
            if (!$return_date) {
                return redirect()->route('ticket');
            } else {
                $data = [
                    'return_date' => $return_date,
                    'origin' => $origin,
                    'arrived' => $destination,
                ];
    
                $assignSeats = Session::get('departure-seat', []);
                $departureSeatData = [
                    'departureSeatCount' => $request->input('departureSeatCount'),
                    'departureSeatNumber' => explode(',', $request->input('departureSeatNumber')),
                ];
                $newMerged = array_merge($assignSeats, $departureSeatData);
                Session::put('departure-seat', $newMerged);
    
                $result = Schedule::where('origin', 'like', "%$destination%")
                ->where('departure_date', 'like', "%$return_date%")
                ->where('destination', 'like', "%$origin%")->paginate(10)->withQueryString();
    
                Session::put('return-data', $data);
    
                return view('web.frontend.page.return.index', ['departureData' => $departureData, 'result' => $result, 'location' => $location]);
            }

            } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function returnSeat($id) {
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

            Session::put('return-seat', $data);

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function ticketConfirmation(Request $request) {
        // Allow clean array format
        if(session()->has('return-data') && session()->has('return-seat')) {
            $assignSeats = Session::get('return-seat', []);
            $returnSeat = [
                'returnSeatCount' => $request->input('returnSeatCount'),
                'returnSeatNumber' => explode(',', $request->input('returnSeatNumber')),
            ];
            $newMerged = array_merge($assignSeats, $returnSeat);
            Session::put('return-seat', $newMerged);
        }
        // Fetch all the required data
        // $allSession = [
        //     'departure-data' =>  session()->get('departure-data'),
        //     'departure-seat' =>  session()->get('departure-seat'),
        //     'return-data' =>  session()->get('return-data'),
        //     'return-seat' =>  session()->get('return-seat'),
        // ];

        // dd($allSession);

        $user_id = Auth::user()->id;
        $schedule_id = $request->input('schedule');
        $storage_id = $request->input('storage');
        $price_id = $request->input('price');
        
        $userInfo = User::find($user_id);
        $scheduleInfo = Schedule::find($schedule_id);
        $storageInfo = Storage::find($storage_id);
        $priceInfo = Price::find($price_id);
        $seat = $request->input('seat');
        $seatcount = $request->input('seat_count');
        $current = Carbon::now()->format('l, F-d-Y');

        $schedule = Schedule::with('bus.seat')->find($schedule_id);
        // $bus = $schedule->bus; // Access the related bus

        $data = [
            'users' => $userInfo,
            'schedules' => $scheduleInfo,
            'storages' => $storageInfo,
            'prices' => $priceInfo,
            'seats' => $seat,
            'seat_count' => $seatcount,
            'current_time' => $current
        ];
        
        return view('web.frontend.page.payment.index', with($data));
    }

    public function backToSchedule() {
        if(session('schedule_url')) {
            return redirect(session('schedule_url'));
        } 
        return redirect('/');
    }
}
