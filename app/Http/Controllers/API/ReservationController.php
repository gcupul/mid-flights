<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use App\Models\ReservationDetail;
use App\Models\PaymentDetail;
use App\Models\Seat;
use App\Models\Flight;
use Carbon\Carbon;
use Validator;
use DB;

class ReservationController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reservation(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'flight_id' => 'required',
            'passenger' => 'required',
            'passenger.*.name' => 'required',
            'passenger.*.last_name'=> 'required',
            'passenger.*.seat_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        DB::beginTransaction();
        try {

            $user = Auth::user();

            $now = Carbon::now()->addHour(3);
            $flight = Flight::find($input['flight_id']);
            if ($flight->departure_at < $now) {
                return $this->sendError('No puede reservar este vuelo, su hora de partida es en menos de 3hrs.', []);
            }

            $reservation = new Reservation();
            $reservation->flight_id = $input['flight_id'];
            $reservation->user_id = $user->id;
            $reservation->count = count($input['passenger']);
            $reservation->save();

            $total = 0;
            foreach ($input['passenger'] as $pass) {

                $seat = Seat::find($pass['seat_id']);

                $price = $reservation->flight->base_price;

                if($seat->class === 'Normal') {
                    $price = $price * 1.35;
                }
                if($seat->class === 'Ejecutivo') {
                    $price = $price * 1.45;
                }

                $total = $total + $price;

                $reservationDetail = new ReservationDetail();
                $reservationDetail->reservation_id = $reservation->id;
                $reservationDetail->name = $pass['name'];
                $reservationDetail->last_name = $pass['last_name'];
                $reservationDetail->seat_id = $pass['seat_id'];
                $reservationDetail->price = $price;
                $reservationDetail->save();
            }

            $reservation->total = $total;
            $reservation->save();

            DB::commit();
            return $this->sendResponse(ReservationResource::make($reservation), 'Reservation saved successfully.');
        } catch(Exception $e) {
            DB::rollback();
            return $this->sendError('Validation Error.', $e->getMessage());
        }
    }

    public function payReservation(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'flight_id' => 'required',
            'reservation_id' => 'required',
            'payment' => 'required',
            'payment.name' => 'required',
            'payment.card' => 'required',
            'payment.expiration' => 'required',
            'payment.cvv' => 'required',
            'payment.type_card' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        DB::beginTransaction();
        try {

            $now = Carbon::now();
            $reservation = Reservation::where('id', $input['reservation_id'])->whereRaw('TIMESTAMPDIFF(MINUTE, created_at ,"'. $now .'") < 30')->first();
            if(!$reservation) {
                return $this->sendError('La reservación ya ha vencido ha pasado mas de 30min.', []);
            }

            $now = Carbon::now()->addHour(3);
            $flight = Flight::find($input['flight_id']);
            if ($flight->departure_at < $now) {
                return $this->sendError('No puede reservar este vuelo, su hora de partida es en menos de 3hrs.', []);
            }

            $paymentDetail = new PaymentDetail();
            $paymentDetail->name = $input['payment']['name'];
            $paymentDetail->last_digits = substr($input['payment']['card'], -4);
            $paymentDetail->expiration = $input['payment']['expiration'];
            $paymentDetail->type_card = $input['payment']['type_card'];
            $paymentDetail->save();

            $reservation->confirmation_code = Str::random(8);
            $reservation->payment_detail_id = $paymentDetail->id;
            $reservation->paid = 'Y';
            $reservation->save();

            DB::commit();
            return $this->sendResponse(ReservationResource::make($reservation), 'Reservation saved successfully.');
        } catch(Exception $e) {
            DB::rollback();
            return $this->sendError('Validation Error.', $e->getMessage());
        }
    }
}