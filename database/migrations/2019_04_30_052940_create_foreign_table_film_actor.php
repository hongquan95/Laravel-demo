<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignTableFilmActor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('film_actor', function (Blueprint $table) {
            $table->foreign('film_id', 'fk_film_actor_film')->references('film_id')->on('film');
            $table->foreign('actor_id', 'fk_film_actor_actor')->references('actor_id')->on('actor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('film_actor', function (Blueprint $table) {
            $table->dropForeign(['film_id', 'actor_id']);
        });
    }
}
