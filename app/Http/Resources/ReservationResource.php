<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ReservationDetailResource;

class ReservationResource extends JsonResource
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
            'flight' => [
                'number' => $this->flight->number,
                'origin' => [
                    'airport' => $this->flight->origin->name,
                    'city' => $this->flight->origin->city,
                    'state' => $this->flight->origin->state
                ],
                'destination' => [
                    'airport' => $this->flight->destination->name,
                    'city' => $this->flight->destination->city,
                    'state' => $this->flight->destination->state
                ],
            ],
            'count' => $this->count,
            'total' => $this->total,
            'paid' => $this->paid,
            'confirmation_code' => $this->confirmation_code,
            'detail' => ReservationDetailResource::collection($this->reservationDetail)
        ];
    }
}
