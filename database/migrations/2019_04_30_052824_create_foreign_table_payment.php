<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignTablePayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment', function (Blueprint $table) {
            $table->foreign('customer_id', 'fk_payment_customer')->references('customer_id')->on('customer');
            $table->foreign('staff_id', 'fk_payment_staff')->references('staff_id')->on('staff');
            $table->foreign('rental_id', 'fk_payment_rental')->references('rental_id')->on('rental');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment', function (Blueprint $table) {
            $table->dropForeign(['customer_id', 'staff_id', 'rental_id']);
        });
    }
}
