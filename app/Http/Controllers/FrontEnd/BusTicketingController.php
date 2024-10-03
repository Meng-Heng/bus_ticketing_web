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

    public function index(Request $request)
    {
        Session::put('schedule_url', $request->fullUrl());

        $location = ["Phnom Penh", "Siem Reap", "Sihanouk Ville", "Kompot", "Kep", "Battambang", "Prey Veng"];
        $origin = $request->input('origin');
        $origin_date = $request->input('departure-date');
        $arrived = $request->input('arrival');
        $return_date = $request->input('return-date');
        $price = Price::all()->last();
        
        $result = Schedule::where('origin', 'like', "%$origin%")
            ->where('departure_date', 'like', "%$origin_date%")
            ->where('destination', 'like', "%$arrived%")->paginate(10)->withQueryString();

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
                'return_date' => $return_date,
                'price' => $price,
                'location' => $location
            ]);
        }
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

    public function scheduleReturn(Request $request) {
        $return_date = $request->input('return-date');
        $origin = $request->input('origin');
        $arrival = $request->input('arrival');
        $price = Price::all()->last();
        
        // $result = Schedule::where('origin', 'like', "%$origin%")
        //     ->where('arrival_date', 'like', "%$origin_date%")
        //     ->where('destination', 'like', "%$arrived%")->paginate(10)->withQueryString();

        if(!$return_date) {
            return view('web.frontend.page.payment.index');
        }
        return view('web.frontend.page.return.index', [
            'origin' => $origin,
            'arrival' => $arrival,
            'return_date' => $return_date,
            'price' => $price,
        ]);
    }

    public function scheduleSeatReturn($id) {
        
    }

    public function ticketConfirmation(Request $request) {
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

        if(!$seat) {
            return redirect('back');
        }

        $schedule = Schedule::with('bus.seat')->find($schedule_id);
        $bus = $schedule->bus; // Access the related bus

        $data = [
            'users' => $userInfo,
            'schedules' => $scheduleInfo,
            'storages' => $storageInfo,
            'prices' => $priceInfo,
            'buses' => $bus,
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
