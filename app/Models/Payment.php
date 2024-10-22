<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;
    protected $table = "tbl_payment"; 
    protected $fillable = [
        "payment_method",
        'payment_datetime',
        'user_id',
        'review_id',
        'created_at',
        'updated_at'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function review(): HasOne {
        return $this->hasOne(Review::class);
    }
    public function ticket(): hasOne {
        return $this->hasOne(Ticket::class);
    }
}
