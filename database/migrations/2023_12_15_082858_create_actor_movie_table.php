<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('actor_movie', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('movie_id')->unsigned();
            $table->unsignedBiginteger('actor_id')->unsigned();

            $table->foreign('movie_id')->references('id')
                ->on('movies')->onDelete('cascade');
            $table->foreign('actor_id')->references('id')
                ->on('actors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actor_movie');
    }
};
