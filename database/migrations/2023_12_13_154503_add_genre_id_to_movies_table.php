<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenreIdToMoviesTable extends Migration
{
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->unsignedBigInteger('genre_id')->nullable()->after('id');
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropForeign(['genre_id']);
            $table->dropColumn('genre_id');
        });
    }
}
