<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'tbl_review';
    protected $fillable = [
        'user_id',
        'star',
        'feedback'
    ];
    public function user() {
        return $this->belongsTo(Users::class);
    }
}
