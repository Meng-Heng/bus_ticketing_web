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
        return $this->hasMany(UserPermission::class, 'user_id');
    }
    public function getAuthPassword()
    {
        return $this->pwd; // Use 'pwd' instead of 'password'
    }

    public function permissions() {
        return $this->belongsToMany(
            Permission::class,
            'tbl_user_permission',
            'user_id',
            'permission_id'
        );
    }

    public function hasPermission($requiredPermission)
    {
        // Get the default permission from config
        $defaultPermission = config('auth.permissions.default');

        // If the required permission is the default, no explicit check is needed
        if ($requiredPermission === $defaultPermission || !$this->user_permission()->exists()) {
            return true;
        } else {
            // Check if the user has the required permission
            return $this->user_permission()->whereHas('permission', function ($query) use ($requiredPermission) {
                $query->where('permission', $requiredPermission);
            })->exists();
        }
    }

    public function isDefaultUser()
    {
        // Treat as default if no permissions are assigned
        return $this->permissions->isEmpty();
    }

}
