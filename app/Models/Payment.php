<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = "tbl_payment"; 
    protected $fillable = [
        "payment_method",
        'payment_datetime',
        'user_id',
        'review_id'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
