<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;
    protected $table = "tbl_storage";
    protected $fillable = [
        'luggage',
        'measurement',
        'start_date'
    ];

    public function bus_seat() {
        return $this->hasMany(Bus_seat::class);
    }
    public function ticket() {
        return $this->hasMany(Ticket::class);
    }
}
