<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use DB;

class ScheduleFormController extends Controller
{
    
    public function index() {
        $location = ["Phnom Penh", "Siem Reap", "Sihaknouk Ville", "Kompot", "Kep", "Battambang","Prey Veng"];
        return view('web.frontend.section.home.index', ['location' => $location]);
    }

    public function find_time(Request $request) {
        $schedule = Schedule::all();
        $location = ["Phnom Penh", "Siem Reap", "Sihaknouk Ville", "Kompot", "Kep", "Battambang","Prey Veng"];
        $origin = $request->input('origin');
        $origin_date = $request->input('departure-date');
        $arrived = $request->input('arrival');

        $result = Schedule::where('origin', 'like' , "%$origin%")
                                ->where('departure_date', 'like' ,"%$origin_date%")
                                ->where('destination', 'like' , "%$arrived%")->paginate(10);
        
        if(empty($origin_date)) {
            return redirect('/');
        }  else if ($origin == $arrived) {
            return redirect('/');
        }
        else {
            foreach($result as $results) {
                return view('web.frontend.section.schedule.index', ['result' => $result, 'origin' => $origin, 'arrived' => $arrived, 'origin_date' => $origin_date]);
            }
        }
    }
}
