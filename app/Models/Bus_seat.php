<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seat;
use App\Models\Price;
use App\Models\Bus;

class Bus_seat extends Model
{
    use HasFactory;
    protected $table = 'tbl_bus_seat';
    protected $fillable = [
        'bus_id','seat_number','seat_type','storage_id','price_id','status'
    ];
    public function bus() {
        return $this->belongsTo(Bus::class);
    }
    public function storage() {
        return $this->belongsTo(Storage::class);
    }
    public function price() {
        return $this->belongsTo(Price::class);
    }
    public function ticket() {
        return $this->hasOne(Ticket::class);
    }
}
