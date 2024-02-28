<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat_type extends Model
{
    use HasFactory;
    protected $table = "tbl_seat_type";
    protected $fillable = [
        'name',
        'description'
    ];
    public function seats() {
        return $this->hasMany(Seat_type::class, 'id');
    }
}
