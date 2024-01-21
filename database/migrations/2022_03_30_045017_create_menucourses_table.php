<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenucoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menucourses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->integer('price')->unsigned();
            $table->string('cash')->nullable();
            $table->string('payment');
            $table->string('no_payment');
            $table->string('color');
            $table->text('cancel');
            $table->text('date_change');
            $table->string('option');
            $table->string('image');
            $table->string('timeframe');
            $table->string('capacity');
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
        Schema::dropIfExists('menucourses');
    }
}
