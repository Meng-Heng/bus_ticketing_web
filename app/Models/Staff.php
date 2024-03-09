<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'tbl_staff';
    protected $fillable = [
        'staff_id',
        'fname',
        'lname',
        'gender',
        'position',
        'date_of_birth',
        'place_of_birth',
        'id_card',
        'residency',
        'contact',
        'is_active',
        'user_id'
    ];
    public function user() {
        return $this->belongsTo(Users::class);
    }
}
