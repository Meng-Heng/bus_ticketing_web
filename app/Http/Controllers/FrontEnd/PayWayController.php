<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Price;
use App\Models\Storage;
use App\Models\Bus_seat;
use App\Models\Ticket;
use App\Models\Payment;
use App\Services\PayWayService;
use ArrayObject;
use Illuminate\Support\Facades\Auth;

class PayWayController extends Controller
{
    /*
            After a successful payment
    */
    public function paymentSuccess() {
        try {
            $departure_data = session()->get('departure_data');
            $departure_seat = session()->get('departure_seat');
            $return_data = session()->get('return_data');
            $return_seat = session()->get('return_seat');
            $payment_data = session()->get('payment_data');

            $departureBus = $departure_seat['schedule']->bus_id;
            $departure_seat_number = $departure_seat['departureSeatNumber'];

            $returnBus = $return_seat['schedule']->bus_id;
            $return_seat_number = $return_seat['returnSeatNumber'];

            $selectedDepartureSeat = new ArrayObject();
            $selectedReturnSeat = new ArrayObject();
            // dd(count($return_seat_number));
            foreach($departure_seat_number as $departureSeatNumber) {
                $selectedDepartureSeat->append(Bus_seat::where('bus_id', $departureBus)->where('seat_number', $departureSeatNumber)->first()); 
            }
            
            foreach($return_seat_number as $returnSeatNumber) {
                $selectedReturnSeat->append(Bus_seat::where('bus_id', $returnBus)->where('seat_number', $returnSeatNumber)->first());
            }
            // dd($selectedDepartureSeat, $selectedReturnSeat);
            
            // Storage and Price
            $storage = Storage::all()->last();
            $price = Price::all()->last();
            
            // Start insertion if payment success!
            if($payment_data['return_params'] == '1') {
                Session::flash('payment_created','Your purchase has been successful!');

                // Create departure ticket after payment success
                for($i=0; $i<count($selectedDepartureSeat); $i++) {
                    // Payment creation
                    $payment = new Payment();
                    $payment->payment_method = $payment_data['payment_option'];
                    $payment->payment_datetime = Carbon::now();
                    $payment->user_id = Auth::user()->id;
                    $payment->save();
                    // Ticket creation
                    $ticket = new Ticket();
                    $ticket->ticket_id =  $this->generateTicketId();
                    $ticket->is_issued = Carbon::now();
                    $ticket->schedule_id = $departure_seat['schedule']->id;
                    $ticket->bus_seat_id = $selectedDepartureSeat[$i]->id;
                    $ticket->payment_id = $payment->id;
                    $ticket->storage_id = $storage->id;
                    $ticket->price_id = $price->id;
                    $ticket->save();
                    Session::flash('departure_ticket_created');
                    // Update Bus seat
                    $bus_seat = Bus_seat::findOrFail($selectedDepartureSeat[$i]->id);
                    $bus_seat->status = 'Sold';
                    $bus_seat->save();
                }
                // Create return ticket after payment success
                if($selectedReturnSeat) {
                    for($i=0; $i<count($selectedReturnSeat); $i++) {
                        // Payment creation
                        $payment = new Payment();
                        $payment->payment_method = $payment_data['payment_option'];
                        $payment->payment_datetime = Carbon::now();
                        $payment->user_id = Auth::user()->id;
                        $payment->save();
                        // Ticket creation
                        $ticket = new Ticket();
                        $ticket->ticket_id = $this->generateTicketId();
                        $ticket->is_issued = Carbon::now();
                        $ticket->schedule_id = $return_seat['schedule']->id;
                        $ticket->bus_seat_id = $selectedReturnSeat[$i]->id;
                        $ticket->payment_id = $payment->id;
                        $ticket->storage_id = $storage->id;
                        $ticket->price_id = $price->id;
                        $ticket->save();
                        Session::flash('departure_ticket_created');
                        // Update Bus seat
                        $bus_seat = Bus_seat::findOrFail($selectedReturnSeat[$i]->id);
                        $bus_seat->status = 'Sold';
                        $bus_seat->save();
                    }
                }
                Session::flash('Your have acquired your ticket!', 'Success!');
            } else {
                Session::flash('payment_failing', 'Failed');
                return route('ticket');
            }
            return redirect('/');
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update($id) {
        $myTicket = Ticket::findOrFail($id)->where('user_id');
    }

    /* 
            Operation outside of the System.
    */
    public function generateTicketId()
    {
        // Generate current date and time in your preferred format
        $currentDateTime = now()->format('Y-m-d H:i:s'); // Format as 'YYYYMMDDHHMMSS'

        // Generate a random four-digit number --> compatible with uft8_general_ci
        $randomNumber = mb_convert_encoding(str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), 'UTF-8');

        // Create the ticket number using your desired format
        $ticketId = 'TICKET:' . $currentDateTime . '-' . $randomNumber; 

        return $ticketId;
    }   
    /* 
            End of Operation outside of the System.
    */
}
