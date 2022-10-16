<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FlightResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'airline' => $this->airline->name,
            'flight' => $this->number,
            'origin' => [
                'airport' => $this->origin->name,
                'city' => $this->origin->city,
                'state' => $this->origin->state
            ],
            'destination' => [
                'airport' => $this->destination->name,
                'city' => $this->destination->city,
                'state' => $this->destination->state
            ],
            'base_price' => $this->base_price,
            'departure_at' => $this->departure_at,
            'duration' => $this->duration
        ];
    }
}
