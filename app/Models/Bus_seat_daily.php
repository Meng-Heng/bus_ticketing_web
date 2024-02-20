<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus_seat_daily extends Model
{
    use HasFactory;
    protected $table = 'tbl_bus_seat_daily';
    protected $fillable = [
        'bus_seat_id','destination','departure_date','departure_time','arrival_date','arrival_time','is_sold','station_id'
    ];
    public function bus_seat() {
        return $this->belongsTo(Bus_seat::class);
    }
    public function station() {
        return $this->belongsTo(Station::class);
    }
}
