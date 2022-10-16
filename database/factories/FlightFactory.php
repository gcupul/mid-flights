<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Airport;
use App\Models\Airline;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = Carbon::create(2022, 10, 1, 0, 0, 0);
        return [
            'number' =>  Str::random(10),
            'base_price' => rand(1000, 10000),
            'departure_at' => $date->addWeeks(rand(1, 52))->addMinute(rand(120, 1440))->format('Y-m-d H:i:s'),
            'duration' => rand(1, 300),
            'origin_id' => function () {
                if ($airport = Airport::inRandomOrder()->first()) {
                    return $airport->id;
                }

                return factory(Airport::class)->create()->id;
            },
            'destination_id' => function () {
                if ($airport = Airport::inRandomOrder()->first()) {
                    return $airport->id;
                }

                return factory(Airport::class)->create()->id;
            },
            'airline_id' => function () {
                if ($airline = Airline::inRandomOrder()->first()) {
                    return $airline->id;
                }

                return factory(Airline::class)->create()->id;
            },
        ];
    }
}
