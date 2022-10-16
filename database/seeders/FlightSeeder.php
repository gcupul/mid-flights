<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Airport;
use App\Models\Airline;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flights')->delete();
        \App\Models\Flight::factory(1000)->make()->each(function ($flight) {
            $flight->origin()->associate(Airport::inRandomOrder()->first());
            $flight->destination()->associate(Airport::inRandomOrder()->first());
            $flight->airline()->associate(Airline::inRandomOrder()->first());
            $flight->save();
        });
    }
}
