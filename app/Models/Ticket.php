<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = "tbl_ticket";
    protected $fillable = [
        'ticket_id','issued_date','schedule_id','bus_seat_id','payment_id','storage_id','price_id'
    ];
    public function bus_seat() {
        return $this->belongsTo(Bus_seat::class);
    }
    public function schedule() {
        return $this->belongsTo(Schedule::class, 'schedule');
    }
    public function payment() {
        return $this->belongsTo(Payment::class);
    }
    public function storage() {
        return $this->belongsTo(Storage::class);
    }
    public function price() {
        return $this->belongsTo(Price::class);
    }
}
