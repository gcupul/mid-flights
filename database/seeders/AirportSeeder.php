<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('airports')->delete();

        DB::table('airports')->insert([[
            'name' => 'A. I. de Chihuahua',
            'city' => 'Chihuahua',
            'state' => 'Chihuahua',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Ciudad Juárez',
            'city' => 'Ciudad Juarez',
            'state' => 'Chihuahua',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Monterrey',
            'city' => 'Monterrey',
            'state' => 'Nuevo León',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de San Luis Potosí',
            'city' => 'San Luis Potosí',
            'state' => 'San Luis Potosí',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Aguascalientes',
            'city' => 'Aguascalientes',
            'state' => 'Aguascalientes',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de la Ciudad de México',
            'city' => 'Ciudad de México',
            'state' => 'Ciudad de México',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. de Santa Lucia',
            'city' => 'Ciudad de México',
            'state' => 'Ciudad de México',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Guanajuato',
            'city' => 'ZM León',
            'state' => 'Guanajuato',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Toluca',
            'city' => 'Toluca',
            'state' => 'Estado de México',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Querétaro',
            'city' => 'Querétaro',
            'state' => 'Querétaro',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de La Paz',
            'city' => 'La Paz',
            'state' => 'Baja California Sur',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de San José del Cabo',
            'city' => 'San José de Cabo',
            'state' => 'Baja California Sur',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Mexicali',
            'city' => 'Mexicali',
            'state' => 'Baja California',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Tijuana',
            'city' => 'Tijuana',
            'state' => 'Baja California',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Guadalajara',
            'city' => 'Guadalajara',
            'state' => 'Jalisco',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Puerto Vallarta',
            'city' => 'Puerto Vallarta',
            'state' => 'Jalisco',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Bachihualato',
            'city' => 'Culiacán',
            'state' => 'Sinaloa',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Mazatlán',
            'city' => 'Mazatlán',
            'state' => 'Sinaloa',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Hermosillo',
            'city' => 'Hermosillo',
            'state' => 'Sonora',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Tuxtla Gutiérrez',
            'city' => 'Tuxtla Gutiérrez',
            'state' => 'Chiapas',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Oaxaca',
            'city' => 'Oaxaca',
            'state' => 'Oaxaca',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Cancún',
            'city' => 'Cancún',
            'state' => 'Quintana Roo',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Cozumel',
            'city' => 'Cozumel',
            'state' => 'Quintana Roo',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Villahermosa',
            'city' => 'Villahermosa',
            'state' => 'Tabasco',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Veracruz',
            'city' => 'Veracruz',
            'state' => 'Veracruz',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],[
            'name' => 'A. I. de Mérida',
            'city' => 'Mérida',
            'state' => 'Yucatán',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]]);
    }
}
