<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignTableStore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('store', function (Blueprint $table) {
            $table->foreign('manager_staff_id', 'fk_store_staff')->references('staff_id')->on('staff');
            $table->foreign('address_id', 'fk_store_address')->references('address_id')->on('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('store', function (Blueprint $table) {
            $table->dropForeign(['manager_staff_id', 'address_id']);
        });
    }
}
