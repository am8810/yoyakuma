<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminDoreservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doreserves', function (Blueprint $table) {
            $table->integer('calendar_id')->unsigned()->nullable();
            $table->integer('reservepage_id')->unsigned()->nullable();
            $table->integer('do_capacity')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->date('do_date')->nullable();
            $table->time('do_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doreserves', function (Blueprint $table) {
            //
        });
    }
}
