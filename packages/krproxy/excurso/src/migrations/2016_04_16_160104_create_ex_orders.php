<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('excursion_id');
            $table->text('type');
            $table->text('name');
            $table->text('email')->nullable();
            $table->text('phone');
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
        Schema::drop('ex_orders');
    }
}
