<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'tbl_schedule';
    protected $fillable = [
        'bus_id','origin','departure_date','departure_time','destination','arrival_date','arrival_time','sold_out'
    ];
    public function bus() {
        return $this->belongsTo(Bus::class);
    }
}
