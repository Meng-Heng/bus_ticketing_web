<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = "tbl_payment"; 
    protected $fillable = [
        "method"
        /*'payment_id',
        'booking_id',
        'amount_paid',
        'payment_date',
        'user_id'*/
    ];
}
