<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Xylis\FakerCinema\Provider\Movie;


class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $faker->addProvider(new Movie($faker));

        DB::table('movies')->insert([
            'title' => $faker->movie,
            'description' => $faker->overview,
            'year' => $faker->year($max = 'now'),
            'genre' => $faker->movieGenre
        ]);
    }
}
