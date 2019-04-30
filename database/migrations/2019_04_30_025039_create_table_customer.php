<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('customer_idid');
            $table->unsignedInteger('store_id')->nullable();
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->string('email', 50)->nullable();
            $table->unsignedInteger('address_id')->nullable();
            $table->char('acive', 1);
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
        Schema::dropIfExists('customer');
    }
}
