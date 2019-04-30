<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignTableInventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventory', function (Blueprint $table) {
            $table->foreign('film_id', 'fk_inventory_film')->references('film_id')->on('film');
            $table->foreign('store_id', 'fk_inventory_store')->references('store_id')->on('store');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventory', function (Blueprint $table) {
            $table->dropForeign(['film_id', 'store_id']);
        });
    }
}
