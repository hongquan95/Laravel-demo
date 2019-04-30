<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFilm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film', function (Blueprint $table) {
            $table->increments('film_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->year('realease')->nullable();
            $table->unsignedInteger('language_id')->nullable();
            $table->unsignedInteger('original_language_id')->nullable();
            $table->unsignedInteger('rental_duration');
            $table->decimal('rental_rate', 4, 2);
            $table->unsignedInteger('length')->nullable();
            $table->decimal('replacement_cost', 5, 2);
            $table->string('rating', 10)->nullable();
            $table->string('special_features', 10)->nullable();
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
        Schema::dropIfExists('film');
    }
}
