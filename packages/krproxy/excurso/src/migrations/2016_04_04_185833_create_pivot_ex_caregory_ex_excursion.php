<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotExCaregoryExExcursion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_category_ex_excursion', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ex_category_id');
            $table->unsignedInteger('ex_excursion_id');
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
        Schema::drop('ex_category_ex_excursion');
    }
}
