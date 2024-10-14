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
use App\Models\Ticket;
use App\Models\Payment;
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

        Session::put('departure_data', $data);
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

            Session::put('departure_seat', $data);
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function returnSchedule(Request $request) {
        try {
            $location = ["Phnom Penh", "Siem Reap", "Sihanouk Ville", "Kompot", "Kep", "Battambang", "Prey Veng"];
            $departureData = session()->get('departure_data');

            $return_date = $departureData['return_date'];
            $destination = $departureData['origin'];
            $origin = $departureData['arrived'];
            
            if (!$return_date) {
                return view('web.frontend.page.payment.index');
            } 
            else {
                $data = [
                    'return_date' => $return_date,
                    'origin' => $origin,
                    'arrived' => $destination,
                ];
    
                $assignSeats = Session::get('departure_seat', []);
                $departureSeatData = [
                    'departureSeatCount' => $request->input('departureSeatCount'),
                    'departureSeatNumber' => explode(',', $request->input('departureSeatNumber')),
                ];
                $newMerged = array_merge($assignSeats, $departureSeatData);
                Session::put('departure_seat', $newMerged);
    
                $result = Schedule::where('origin', 'like', "%$destination%")
                ->where('departure_date', 'like', "%$return_date%")
                ->where('destination', 'like', "%$origin%")->paginate(10)->withQueryString();
    
                Session::put('return_data', $data);
    
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

            Session::put('return_seat', $data);

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function ticketConfirmation(Request $request) {
        // Allow clean array format
        if(session()->has('return_data') && session()->has('return_seat')) {
            $assignSeats = Session::get('return_seat', []);
            $returnSeat = [
                'returnSeatCount' => $request->input('returnSeatCount'),
                'returnSeatNumber' => explode(',', $request->input('returnSeatNumber')),
            ];
            $newMerged = array_merge($assignSeats, $returnSeat);
            Session::put('return_seat', $newMerged);
        }
        $user_id = Auth::user()->id;
        
        $userInfo = User::find($user_id);
        $current = Carbon::now()->format('l, F-d-Y');

        // Fetch all the required data
        $data = [
            'departure_data' =>  session()->get('departure_data'),
            'departure_seat' =>  session()->get('departure_seat'),
            'return_data' =>  session()->get('return_data'),
            'return_seat' =>  session()->get('return_seat'),
            'users' => $userInfo,
            'current_time' => $current
        ];

        // dd($data);
        
        return view('web.frontend.page.payment.index', with($data));
    }

    public function backToSchedule() {
        if(session('schedule_url')) {
            return redirect(session('schedule_url'));
        } 
        return redirect('/');
    }

    public function backToReturn() {
        if(session('return_data')) {
            return redirect(session('return_data'));
        } 
        return redirect('/');
    }

    public function generateKhQR() {
        $user_id = Auth::user()->id;
        
        $userInfo = User::find($user_id);
        $current = Carbon::now()->format('l, F-d-Y');
        $data = [
            'departure_data' =>  session()->get('departure_data'),
            'departure_seat' =>  session()->get('departure_seat'),
            'return_data' =>  session()->get('return_data'),
            'return_seat' =>  session()->get('return_seat'),
            'users' => $userInfo,
            'current_time' => $current
        ];

        return view('web.frontend.page.payment.index', $data);
    }
}
