<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Seat;
use Validator;
use App\Http\Resources\SeatResource;

class SeatController extends BaseController
{
    public function __invoke(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'flight_id' => 'required',
            'class' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        try {
            $seats = Seat::where(['flight_id' => $input['flight_id'], 'class' => $input['class']])
                        ->where(function(Builder $query) {
                            $query->whereHas('reservationDetail', function($query) {
                                $query->whereHas('reservation', function($query) {
                                    $query->where('paid', 'N')
                                        ->whereRaw('TIMESTAMPDIFF(MINUTE, created_at ,NOW()) > 30');
                                });
                            })
                            ->orWhereDoesntHave('reservationDetail');
                        })
                        ->get();

            return $this->sendResponse(SeatResource::collection($seats), 'Seats retrieved successfully.');
        } catch (\Exception $e) {

            return $this->sendError('Validation Error.', $e->getMessage());
        }
    }
}