<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bus_seat_daily;
use DB;

class ScheduleFormController extends Controller
{
    public function index() {
        $schedule = Bus_seat_daily::all();
        return view('web.frontend.section.home.index', ['schedule' => $schedule]);
    }

    public function find_time(Request $request) {
        $schedule = Bus_seat_daily::all();
        $origin = $request->input('origin');
        $origin_date = $request->input('departure-date');
        $arrived = $request->input('arrival');

        $result = Bus_seat_daily::where('start_point', 'like' , "%$origin%")
                                ->where('departure_date', 'like' ,"%$origin_date%")
                                ->where('destination', 'like' , "%$arrived%")->get();
        
        // if(empty($origin_date)) {
        //     echo "<h1>No schedule on this date $origin_date</h1>";
        // } else {
            foreach($result as $results) {
                return view('web.frontend.section.schedule.index', ['result' => $result, 'origin' => $origin, 'arrived' => $arrived, 'origin_date' => $origin_date]);
        //     }
        }
    }
}
