<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'origin_id', 'destination_id', 'airline_id', 'number', 'base_price', 'departure_at', 'duration'
    ];

    public function origin()
    {
        return $this->belongsTo(Airport::class, 'origin_id', 'id');
    }

    public function destination()
    {
        return $this->belongsTo(Airport::class, 'destination_id', 'id');
    }

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }
}