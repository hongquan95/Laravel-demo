<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('staff_id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->unsignedInteger('address_id')->nullable();
            $table->binary('picture')->nullable();
            $table->string('email', 20);
            $table->unsignedInteger('store_id')->nullable();
            $table->integer('active');
            $table->string('user_name', 16);
            $table->string('password', 40)->nullable();
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
        Schema::dropIfExists('staff');
    }
}
