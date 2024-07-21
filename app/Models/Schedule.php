<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bus_seat;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'tbl_schedule';
    protected $fillable = [
        'bus_id','origin','departure_date','departure_time','destination','arrival_date','arrival_time','sold_out'
    ];
    public function bus() {
        return $this->belongsTo(Bus::class);
    }
    public function ticket() {
        return $this->hasMany(Ticket::class);
    }

    public function schedule_to_seat() {
        return $this->hasMany(Bus_seat::class, Bus::class);
    }
}
