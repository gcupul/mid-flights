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
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('flight_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('count');
            $table->double('total', 10, 2);
            $table->enum('paid', ['Y', 'N'])->default('N');
            $table->string('confirmation_code')->nullable();
            $table->unsignedBigInteger('payment_detail_id')->nullable();
            $table->timestamps();
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->index('flight_id');
            $table->index('payment_detail_id');
            $table->index('user_id');

            $table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');
            $table->foreign('payment_detail_id')->references('id')->on('payment_details')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
