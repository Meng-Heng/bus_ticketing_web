<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $table = "tbl_bus";
    protected $fillable = [
        'bus_plate',
        'total_seat',
        'description',
        'is_active'
    ];
}
