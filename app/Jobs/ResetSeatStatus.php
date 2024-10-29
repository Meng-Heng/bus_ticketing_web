<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Schedule;
use App\Models\Ticket;
use Carbon\Carbon;

class ResetSeatStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $tickets = Ticket::whereHas('schedule', function($query) {
            $query->where('arrival_time', '<', Carbon::now());
        })->get();
    
        foreach($tickets as $ticket) {
            $bus_seat = $ticket->bus_seat;
            $bus_seat->status = 'Available';
            $bus_seat->save();
        }
    }
}
