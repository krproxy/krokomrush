<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('_lft');
            $table->unsignedInteger('_rgt');
            $table->unsignedInteger('parent_id')->nullable();
            $table->string('name');
            $table->string('slug')->nullable;
            $table->text('note')->nullable;
            $table->text('desc')->nullable;
            $table->text('order')->nullable;
            $table->boolean('showtop')->default(true);
            $table->boolean('showside')->default(true);
            $table->boolean('showbottom')->default(true);
            $table->boolean('showcontent')->default(true);
            $table->timestamps();
            $table->index([ '_lft', '_rgt', 'parent_id', 'slug' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ex_categories');
    }
}
