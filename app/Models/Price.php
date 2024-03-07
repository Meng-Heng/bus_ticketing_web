<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $table = "tbl_price";
    protected $fillable = [
        'price'
    ];
    // public function bus_seats() {
    //     return $this->hasMany(Price::class, 'id');
    // }
}
