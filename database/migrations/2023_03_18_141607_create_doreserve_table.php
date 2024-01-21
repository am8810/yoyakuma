<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoreserveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doreserve', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('calendar_id')->unsigned();
            $table->integer('reservepage_id')->unsigned();
            $table->integer('do_capacity');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('card_holder');
            $table->string('card_number');
            $table->integer('card_expiry_year');
            $table->integer('card_expiry_month');
            $table->string('security_code');
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
        Schema::dropIfExists('doreserve');
    }
}
