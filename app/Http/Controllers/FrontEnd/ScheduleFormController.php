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

class ScheduleFormController extends Controller
{
    public $location = ["Phnom Penh", "Siem Reap", "Sihanouk Ville", "Kompot", "Kep", "Battambang", "Prey Veng"];

    public function index()
    {
        return view('web.frontend.page.home.index', ['location' => $this->location]);
    }

    public function schedule(Request $request)
    {
        $schedule = Schedule::all();

        $bus = Bus::all();
        $bus_seat = Bus_seat::all();

        $origin = $request->input('origin');
        $origin_date = $request->input('departure-date');
        $arrived = $request->input('arrival');

        $result = Schedule::where('origin', 'like', "%$origin%")
            ->where('departure_date', 'like', "%$origin_date%")
            ->where('destination', 'like', "%$arrived%")->paginate(10)->withQueryString();;

        // $yesterday = date('Y-m-d', strtotime('yesterday')); 

        if (!$origin_date) {
            return redirect('/');
        } else if ($origin == $arrived) {
            return redirect('/');
        } else {
            return view('web.frontend.page.schedule.index', [
                'result' => $result,
                'origin' => $origin,
                'arrived' => $arrived,
                'origin_date' => $origin_date,
                'storage' => Storage::orderBy('id', 'DESC')->first(),
                'price' => Price::orderBy('id', 'DESC')->first()
            ]);
        }
    }
}
