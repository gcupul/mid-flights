<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Flight;
use Validator;
use App\Http\Resources\FlightResource;

class FlightController extends BaseController
{
    public function __invoke(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'origin_id' => 'required',
            'destination_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        try {
            //buscar vuelos con origen y destino seleccionado
            $flights = Flight::where(['origin_id' => $input['origin_id'], 'destination_id' => $input['destination_id']])->get();

            return $this->sendResponse(FlightResource::collection($flights), 'Flights retrieved successfully.');
        } catch (\Exception $e) {

            return $this->sendError('Validation Error.', $e->getMessage());
        }
    }
}