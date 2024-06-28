<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'tbl_review';
    protected $fillable = [
        'star','feedback','posted_time','payment_id','user_id'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
