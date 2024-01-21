<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnCardHolderColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doreserve', function (Blueprint $table) {
            $table->dropColumn('card_holder');
        });
        Schema::table('doreserve', function (Blueprint $table) {
            $table->dropColumn('card_number');
        });
        Schema::table('doreserve', function (Blueprint $table) {
            $table->dropColumn('card_expiry_year');
        });
        Schema::table('doreserve', function (Blueprint $table) {
            $table->dropColumn('card_expiry_month');
        });
        Schema::table('doreserve', function (Blueprint $table) {
            $table->dropColumn('security_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doreserve', function (Blueprint $table) {
            $table->string('card_holder');
        });
        Schema::table('doreserve', function (Blueprint $table) {
            $table->string('card_number');
        });
        Schema::table('doreserve', function (Blueprint $table) {
            $table->string('card_expiry_year');
        });
        Schema::table('doreserve', function (Blueprint $table) {
            $table->string('card_expiry_month');
        });
        Schema::table('doreserve', function (Blueprint $table) {
            $table->string('security_code');
        });
    }
}
