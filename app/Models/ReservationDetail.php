<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reservation_id', 'name', 'last_name', 'seat_id', 'price'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}