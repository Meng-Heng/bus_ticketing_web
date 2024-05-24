<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusSeat extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bus_seats';

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
    protected $fillable = ['bus_id', 'seat_number', 'seat_type', 'storage_id', 'price_id', 'status'];

    
}
