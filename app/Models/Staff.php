<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'tbl_staff';
    protected $fillable = [
        'fname','lname','user_id','picture','hometown','identification','residency','contact','is_active','position'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
