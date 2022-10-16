<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('origin_id')->unsigned();
            $table->integer('destination_id')->unsigned();
            $table->integer('airline_id')->unsigned();
            $table->string('number');
            $table->double('base_price', 10, 2);
            $table->dateTime('departure_at');
            $table->integer('duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
};
