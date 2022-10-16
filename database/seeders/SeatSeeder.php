<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Flight;


class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seats')->delete();

        $seats = ['A', 'B', 'C', 'D'];
        $flights = Flight::get();

        foreach($flights as $flight) {
            //ejecutivo
            for ($i = 1; $i <= 5; $i++)
            {
                foreach($seats as $seat) {
                    DB::table('seats')->insert([
                        'flight_id' => $flight->id,
                        'row' => $i,
                        'seat' => $seat,
                        'class' => 'Ejecutivo',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                }
            }

            //normal
            for ($i = 6; $i <= 15; $i++)
            {
                foreach($seats as $seat) {
                    DB::table('seats')->insert([
                        'flight_id' => $flight->id,
                        'row' => $i,
                        'seat' => $seat,
                        'class' => 'Normal',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                }
            }

            //económico
            for ($i = 16; $i <= 30; $i++)
            {
                foreach($seats as $seat) {
                    DB::table('seats')->insert([
                        'flight_id' => $flight->id,
                        'row' => $i,
                        'seat' => $seat,
                        'class' => 'Económico',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                }
            }
        }
    }
}
