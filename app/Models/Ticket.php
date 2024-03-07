<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = "tbl_ticket";
    protected $fillable = [
        'ticket_id','bus_seat_id','schedule','carry_on','luggage','user_id','is_paid','paid_by'
    ];
    public function bus_seat() {
        return $this->belongsTo(Bus_seat::class);
    }
    public function schedule() {
        return $this->belongsTo(Bus_seat_daily::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function payment() {
        return $this->belongsTo(Payment::class);
    }
}
