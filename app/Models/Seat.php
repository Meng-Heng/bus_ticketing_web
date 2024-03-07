<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seat_type;
use Carbon\Carbon;

class Seat extends Model
{
    use HasFactory;
    protected $table = "tbl_seat";
    protected $fillable = [
        'seat_number', 'seat_type_id'
    ];
    public function seat_type() {
        return $this->belongsTo(Seat_type::class);
    }
    // public function bus_seats() {
    //     return $this->hasMany(Seat::class, 'id');
    // }
}
