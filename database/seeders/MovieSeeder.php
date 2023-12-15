<?php

//namespace Database\Seeders;
//
//use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;
//use Faker\Factory as Faker;
//use GuzzleHttp\Client;
//use App\Models\Genre;
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
//                $imageURL = 'https://image.tmdb.org/t/p/w500' . ($movieData['poster_path'] ?? '');
//
//                $genreName = $faker->movieGenre;
//                $genre = Genre::firstOrCreate(['name' => $genreName]);
//
//                DB::table('movies')->insert([
//                    'title' => $movieData['title'] ?? $movieTitle,
//                    'description' => $movieData['overview'] ?? '',
//                    'year' => substr($movieData['release_date'], 0, 4) ?? '',
//                    'genre_id' => $genre->id,
//                    'actor' => $actorsString,
//                    'artwork' => $imageURL,
//                    'created_at' => now(),
//                ]);
//            }
//        }
//    }
//}


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Movie, Genre, Actor};
use Faker\Factory as Faker;
use GuzzleHttp\Client;
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

                $genre = Genre::firstOrCreate(['name' => $faker->movieGenre]);
                $movie = Movie::firstOrcreate([
                    'title' => $movieData['title'] ?? $movieTitle,
                    'description' => $movieData['overview'] ?? '',
                    'year' => substr($movieData['release_date'], 0, 4) ?? '',
                    'genre_id' => $genre->id,
                    'artwork' => 'https://image.tmdb.org/t/p/w500' . ($movieData['poster_path'] ?? ''),
                ]);

                foreach ($actors as $actorName) {
                    $actor = Actor::firstOrCreate(['name' => $actorName]);
                    $movie->actors()->attach($actor->id);
                }
            }
        }
    }
}
