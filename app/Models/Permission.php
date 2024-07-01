<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'tbl_permission';
    protected $fillable = [
        'permission','description'
    ];

    public function user_permission() {
        return $this->hasMany(UserPermission::class);
    }
}
