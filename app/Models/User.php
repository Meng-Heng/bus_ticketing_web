<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "tbl_user";
    protected $fillable = [
        'username',
        'picture',
        'gender',
        'pwd',
        'email',
        'contact',
        'date_of_birth',
        'hometown',
        'id_card',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'pwd',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'pwd' => 'hashed',
    ];

    public function payment() {
        return $this->hasMany(Payment::class);
    }
    public function staff() {
        return $this->hasMany(Staff::class);
    }
    public function user_permission() {
        return $this->hasMany(UserPermission::class);
    }
}
