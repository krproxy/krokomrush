<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExExcursions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_excursions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('cost')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->text('note')->nullable();
            $table->text('description')->nullable();

            $table->boolean('isNext')->default(false);
            $table->date('nextDate')->nullable();
            $table->time('nextTime')->nullable();

            $table->string('status')->nullable();
            $table->string('artikul')->nullable();
            $table->string('views')->nullable();
            $table->boolean('show')->nullable();
            $table->boolean('complected')->default(false);
            $table->integer('complect_id')->nullable();
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
        Schema::drop('ex_excursions');
    }
}
