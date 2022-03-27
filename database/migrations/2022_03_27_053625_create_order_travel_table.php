<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTravelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_travel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('travel_id');
            $table->bigInteger('travel_distance');
            $table->timestamps();

            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_travel');
    }
}
