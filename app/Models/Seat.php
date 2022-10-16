<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'flight_id', 'row', 'seat', 'class'
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function reservationDetail()
    {
        return $this->hasMany(ReservationDetail::class);
    }
}