<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignTableFilm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('film', function (Blueprint $table) {
            $table->foreign('language_id', 'fk_film_language')->references('language_id')->on('language');
            $table->foreign('original_language_id', 'fk_film_language_original')->references('language_id')->on('language');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('film', function (Blueprint $table) {
            $table->dropForeign(['language_id', 'original_language_id']);
        });
    }
}
