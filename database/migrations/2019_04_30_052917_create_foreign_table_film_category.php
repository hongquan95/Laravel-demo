<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignTableFilmCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('film_category', function (Blueprint $table) {
            $table->foreign('category_id', 'fk_film_category_category')->references('category_id')->on('category');
            $table->foreign('film_id', 'fk_film_category_film')->references('film_id')->on('film');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('film_category', function (Blueprint $table) {
            $table->dropForeign(['category_id', 'film_id']);
        });
    }
}
