<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Game::insert([
            [
                'title' => 'Grand Theft Auto V',
                'developer' => 'Rockstar Games',
                'genre' => 'Action',
                'release_date' => '2013-09-17',
                'platform' => 'pc',
                'price' => 29.99,
            ],
            [
                'title' => 'The Last of Us Part II',
                'developer' => 'Naughty Dog',
                'genre' => 'Action',
                'release_date' => '2020-06-19',
                'platform' => 'playstation',
                'price' => 49.99,
            ],
            [
                'title' => 'Halo Infinite',
                'developer' => '343 Industries',
                'genre' => 'Shooter',
                'release_date' => '2021-12-08',
                'platform' => 'xbox',
                'price' => 59.99,
            ],
            [
                'title' => 'PUBG Mobile',
                'developer' => 'Tencent Games',
                'genre' => 'Battle Royale',
                'release_date' => '2018-03-19',
                'platform' => 'android',
                'price' => 0.00,
            ],
            [
                'title' => 'Genshin Impact',
                'developer' => 'miHoYo',
                'genre' => 'RPG',
                'release_date' => '2020-09-28',
                'platform' => 'ios',
                'price' => 0.00,
            ],
        ]);
    }
}
