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
        'description',
        'is_active'
    ];
    // public function bus_seats() {
    //     return $this->hasMany(Bus::class, 'id');
    // }
}
