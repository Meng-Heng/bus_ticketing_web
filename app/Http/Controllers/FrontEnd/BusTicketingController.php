<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Bus;
use App\Models\Price;
use App\Models\User;
use App\Models\Storage;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Services\PayWayService;
use Carbon\Carbon;

class BusTicketingController extends Controller
{
    // Calling a class
    protected $payWayService;

    public function __construct(PayWayService $payWayService) {
        $this->payWayService = $payWayService;
    }

    // Populate dropdown Ticket search in Homepage
    public $location = ["Phnom Penh - DN", "Phnom Penh - Chhouk Meas", "Siem Reap", "Sihanouk Ville", "Kompot", "Kep", "Battambang", "Banteay Meanchey"];

    // Get Schedule for Departure
    public function departureSchedule(Request $request)
    {
        // Store URL Inputs for Schedule Search
        Session::put('schedule_url', $request->fullUrl());
        
        $location = ["Phnom Penh - DN", "Phnom Penh - Chhouk Meas", "Siem Reap", "Sihanouk Ville", "Kompot", "Kep", "Battambang", "Banteay Meanchey"];
        // Fetch data from Views/Blades
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
        
        // Search for the Schedule using the Inputed "%$origin%", "%$arrived%", and "%$origin_date%"
        $result = Schedule::where('origin', 'like', "%$origin%")
            ->where('departure_date', 'like', "%$origin_date%")
            ->where('destination', 'like', "%$arrived%")->paginate(10)->withQueryString();

        // Prepare data for Session::departure_data & Return
        $data = [
            'result' => $result,
            'origin' => $origin,
            'arrived' => $arrived,
            'origin_date' => $origin_date,
            'return_date' => $return_date,
            'price' => $price,
        ];

        // Store Departure Schedule Data to Session
        Session::put('departure_data', $data);

        // Return all the required Data to Views/Blades
        return view('web.frontend.page.schedule.index', $data, ['location' => $location]);
    }

    // Get Seat for Departure
    public function departureSeat($id)
    {
        try {
            // Locate the right schedule (From DB) with the selected schedule id from Views/Blades
            $schedule = Schedule::find($id);

            // Condition
            if(!$schedule){
                return response()->json(['error' => 'Schedule not found'], 404);
            }
            // Counting how many Seat does the Bus have using the assigned Schedule ID in the Database?
            $seat = Bus::whereHas('bus_schedule', function ($q) use ($schedule) {
                $q->where('id', $schedule->id);
            })->first();
            
            // Condition
            if(!$seat) {
                return response()->json(['error' => 'Schedule not found'], 404);
            }

            // Get the latest data from Storage & Price
            $storage = Storage::all()->last();
            $price = Price::all()->last();
            
            // Prepare data for Session::departure_seat & Return
            $data = [
                'schedule' => $schedule,
                'seat' => $seat->total_seat,
                'bus_plate' => $seat->bus_plate,
                'storage' => $storage,
                'price' => $price,
            ];

            // Store Departure Seat to Session
            Session::put('departure_seat', $data);
            
            // Return all the required Data to JQuery in Views/Blades
            return response()->json($data);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Get Schedule for Return
    public function returnSchedule(Request $request) {
        try {
            $location = ["Phnom Penh - DN", "Phnom Penh - Chhouk Meas", "Siem Reap", "Sihanouk Ville", "Kompot", "Kep", "Battambang", "Banteay Meanchey"];
            // Fetch Departure Schedule
            $departureData = session()->get('departure_data');

            // Assigned them to New Variables
            $return_date = $departureData['return_date'];
            $destination = $departureData['origin'];
            $origin = $departureData['arrived'];
            
            // Prepare data for Session::return_seat & Return
            $data = [
                'return_date' => $return_date,
                'origin' => $origin,
                'arrived' => $destination,
            ];
            
            // Update Session::departure_seat
            $assignSeats = Session::get('departure_seat', []);
            // Get The Amount of Selected seat & Seat labels from Interface
            // Clean the Data & Store them to a Variable
            $departureSeatData = [
                'departureSeatCount' => $request->input('departureSeatCount'),
                'departureSeatNumber' => explode(',', $request->input('departureSeatNumber')),
            ];
            // Merge Seat information with Departure Seat
            $newMerged = array_merge($assignSeats, $departureSeatData);
            // Store Departure Seat to its Original Session
            Session::put('departure_seat', $newMerged);

            // Search for the Schedule using the Inputed "%$destination%", "%$origin%", and "%$return_date%"
            $result = Schedule::where('origin', 'like', "%$origin%")
            ->where('departure_date', 'like', "%$return_date%")
            ->where('destination', 'like', "%$destination%")->paginate(10)->withQueryString();
            // dd($data, $result, $destination, "Origin $origin", $departureData);
            // Store Return Schedule to Session
            Session::put('return_data', $data);

            // Return all the required Data to Views/Blades
            return view('web.frontend.page.return.index', ['departureData' => $departureData, 'result' => $result, 'location' => $location]);
            
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Get Seat for Return
    public function returnSeat($id) {
        try {
            /*
                    This repeats the DepartureSeat function.
                    Once the search for Return Schedule is correct, the seat will showup accordingly with the \
                    seat numbers and schedule id for the assigned date/time from the Database
            */

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

    // Confirm ticket information
    public function ticketConfirmation(Request $request) {
        // Allow clean array format
        // This section is the flow of updating the return_seat session (The same as departure_seat session)
        if(session()->has('return_data') && session()->has('return_seat')) {
            $assignSeats = Session::get('return_seat', []);
            $returnSeat = [
                'returnSeatCount' => $request->input('returnSeatCount'),
                'returnSeatNumber' => explode(',', $request->input('returnSeatNumber')),
            ];
            $newMerged = array_merge($assignSeats, $returnSeat);
            Session::put('return_seat', $newMerged);
        }

        // Get User information for Bus Ticket
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

        // Calculating the total price
        $totalDeparturePrice = $data['departure_seat']['price']->price;
        $totalReturnPrice = $data['return_seat']['price']->price;
        $totalDepartureSeat = $data['departure_seat']['departureSeatCount'];
        $totalReturnSeat = $data['return_seat']['returnSeatCount'];

        $totalAmount = ($totalDeparturePrice * $totalDepartureSeat) + ($totalReturnPrice * $totalReturnSeat);

        // dd($totalAmount);

        // Populating the required ABA PayWay data
        $item = [
            'name' => Auth::user()->username . '\'s Bus Ticket', 
            'quantity' => $totalDepartureSeat + $totalReturnSeat,
            'price' => $totalAmount
        ];

        $req_time = time();
        $merchant_id = config('payway.merchant_id');
        $tran_id = $req_time;
        $firstname = Auth::user()->username;
        $phone = Auth::user()->contact;
        $amount = $totalAmount;
        $items = base64_encode(json_encode($item));
        $payment_option = 'cards';
        $return_url = base64_encode("/confirmation");
        $continue_success_url = '/success';
        $currency = $data['return_seat']['price']->currency;
        $return_params = 1;
        // WARNING: Do not change the order of these data! 
        // Follow this order: https://www.payway.com.kh/developers/create-transaction
        $hash = $req_time . $merchant_id . $tran_id . $amount . $items . $firstname . $phone . $payment_option . $return_url . $continue_success_url . $currency . $return_params;
        $hashReady = $this->payWayService->getHash($hash);

        // This order does not matter. Just use the RIGHT INDEXING on the View.
        $paywayData = [
            'req_time' => $req_time,
            'tran_id' => $tran_id,
            'merchant_id' => $merchant_id,
            'amount' => $amount,
            'items' => $items,
            'firstname' => $firstname,
            'phone' => $phone,
            'payment_option' => $payment_option,
            'return_url' => $return_url,
            'continue_success_url' => $continue_success_url,
            'currency' => $currency,
            'return_params' => $return_params,
            'hash' => $hashReady,
        ];
        // dd($paywayData);

        // Store Payment info to Session
        Session::put('payment_data', $paywayData);   
        
        // End of PayWay data.

        return view('web.frontend.page.payment.index', with($data), compact('paywayData'));
    }

    /* 
            Operation outside of the System.
    */
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
    /* 
            End of Operation outside of the System.
    */
}
