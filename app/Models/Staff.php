<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'staff';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fname', 'lname', 'user_id', 'picture', 'hometown', 'identification', 'residency', 'contact', 'is_active', 'position'];

    
}
