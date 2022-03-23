<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_id');
            $table->foreignId('customer_id');
            $table->date('date');
            $table->integer('count');
            $table->timestamps();

            $table->foreign('food_id')->references('id')->on('food')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_user');
    }
}
