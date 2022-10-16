<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'flight_id', 'cout', 'total', 'paid', 'confirmation_code', 'payment_detail_id'
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function paymentDetail()
    {
        return $this->belongsTo(PaymentDetail::class);
    }

    public function reservationDetail()
    {
        return $this->hasMany(ReservationDetail::class);
    }
}