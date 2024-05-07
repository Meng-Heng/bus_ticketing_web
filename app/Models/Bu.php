<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bu extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'buses';

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
    protected $fillable = ['bus_plate', 'total_seat', 'description', 'is_active'];

    
}
