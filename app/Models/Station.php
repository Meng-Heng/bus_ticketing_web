<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;
    protected $table = "tbl_station";
    protected $fillable = [
        'name','p_address','s_address','commune','district','city'
    ];

    public function bus_seat_daily() {
        
    }
}
