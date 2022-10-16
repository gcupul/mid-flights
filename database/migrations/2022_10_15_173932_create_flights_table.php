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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('origin_id');
            $table->unsignedBigInteger('destination_id');
            $table->unsignedBigInteger('airline_id');
            $table->string('number');
            $table->double('base_price', 10, 2);
            $table->dateTime('departure_at');
            $table->integer('duration');
            $table->timestamps();
        });

        Schema::table('flights', function (Blueprint $table) {
            $table->index('origin_id');
            $table->index('destination_id');
            $table->index('airline_id');

            $table->foreign('origin_id')->references('id')->on('airports')->onDelete('cascade');
            $table->foreign('destination_id')->references('id')->on('airports')->onDelete('cascade');
            $table->foreign('airline_id')->references('id')->on('airlines')->onDelete('cascade');
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
