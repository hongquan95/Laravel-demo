<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignTableRental extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rental', function (Blueprint $table) {
            $table->foreign('inventory_id', 'fk_rental_inventory')->references('inventory_id')->on('inventory');
            $table->foreign('customer_id', 'fk_rental_customer')->references('customer_id')->on('customer');
            $table->foreign('staff_id', 'fk_rental_staff')->references('staff_id')->on('staff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rental', function (Blueprint $table) {
            $table->dropForeign(['inventory_id', 'customer_id', 'staff_id']);
        });
    }
}
