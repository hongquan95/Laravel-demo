<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignTableStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->foreign('address_id', 'fk_staff_addresss')->references('address_id')->on('address');
            $table->foreign('store_id', 'fk_staff_stores')->references('store_id')->on('store');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->dropForeign(['address_id', 'staff_id']);
        });
    }
}
