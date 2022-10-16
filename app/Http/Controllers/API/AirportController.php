<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Airport;
use Validator;
use App\Http\Resources\AirportResource;

class AirportController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $airports = Airport::all();

        return $this->sendResponse(AirportResource::collection($airports), 'Airports retrieved successfully.');
    }
}