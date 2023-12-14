<?php

//namespace Database\Seeders;
//
//use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;
//use Faker\Factory as Faker;
//use GuzzleHttp\Client;
//use Xylis\FakerCinema\Provider\Movie as FakerCinemaMovie;
//
//class MovieSeeder extends Seeder
//{
//    public function run(): void
//    {
//        $faker = Faker::create();
//        $faker->addProvider(new FakerCinemaMovie($faker));
//        $client = new Client();
//        $apiKey = 'b54eb3cf97a9064086a0b34107a0d835';
//
//        for ($i = 0; $i < 10; $i++) {
//            $movieTitle = $faker->movie;
//            $response = $client->get("https://api.themoviedb.org/3/search/movie?api_key={$apiKey}&query=" . urlencode($movieTitle));
//            $data = json_decode($response->getBody(), true);
//
//            if (!empty($data['results'])) {
//                $movieData = $data['results'][0];
//
//                $actors = [];
//                $castResponse = $client->get("https://api.themoviedb.org/3/movie/{$movieData['id']}/credits?api_key={$apiKey}");
//                $castData = json_decode($castResponse->getBody(), true);
//
//                if (!empty($castData['cast'])) {
//                    foreach ($castData['cast'] as $castMember) {
//                        $actors[] = $castMember['name'];
//                        if (count($actors) === 5) break;
//                    }
//                }
//
//                $actorsString = implode(', ', $actors);
//
//                $imageURL = 'https://image.tmdb.org/t/p/w500' . ($movieData['poster_path'] ?? '');
//
//                DB::table('movies')->insert([
//                    'title' => $movieData['title'] ?? $movieTitle,
//                    'description' => $movieData['overview'] ?? '',
//                    'year' => substr($movieData['release_date'], 0, 4) ?? '',
//                    'genre' => $faker->movieGenre,
//                    'actor' => $actorsString,
//                    'studio' => $faker->studio,
//                    'artwork' => $imageURL,
//                    'created_at' => now(),
//                ]);
//                DB::table('genres')-insert(['genre' => $faker->movieGenre]);
//            }
//        }
//    }
//}

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use GuzzleHttp\Client;
use App\Models\Genre; // Import the Genre model
use Xylis\FakerCinema\Provider\Movie as FakerCinemaMovie;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $faker->addProvider(new FakerCinemaMovie($faker));
        $client = new Client();
        $apiKey = 'b54eb3cf97a9064086a0b34107a0d835';

        for ($i = 0; $i < 10; $i++) {
            $movieTitle = $faker->movie;
            $response = $client->get("https://api.themoviedb.org/3/search/movie?api_key={$apiKey}&query=" . urlencode($movieTitle));
            $data = json_decode($response->getBody(), true);

            if (!empty($data['results'])) {
                $movieData = $data['results'][0];

                $actors = [];
                $castResponse = $client->get("https://api.themoviedb.org/3/movie/{$movieData['id']}/credits?api_key={$apiKey}");
                $castData = json_decode($castResponse->getBody(), true);

                if (!empty($castData['cast'])) {
                    foreach ($castData['cast'] as $castMember) {
                        $actors[] = $castMember['name'];
                        if (count($actors) === 5) break;
                    }
                }

                $actorsString = implode(', ', $actors);
                $imageURL = 'https://image.tmdb.org/t/p/w500' . ($movieData['poster_path'] ?? '');

                // Create or find the genre
                $genreName = $faker->movieGenre;
                $genre = Genre::firstOrCreate(['name' => $genreName]);

                DB::table('movies')->insert([
                    'title' => $movieData['title'] ?? $movieTitle,
                    'description' => $movieData['overview'] ?? '',
                    'year' => substr($movieData['release_date'], 0, 4) ?? '',
                    'genre_id' => $genre->id, // Assigning genre_id
                    'actor' => $actorsString,
                    'artwork' => $imageURL,
                    'created_at' => now(),
                ]);
            }
        }
    }
}
