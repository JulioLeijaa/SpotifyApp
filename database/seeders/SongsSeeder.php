<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Song;
use Carbon\Carbon;

class SongsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $songs = [
            [
                'id' => 1,
                'title' => 'Another one bites the dust',
                'url_image' => '/music/AnotherOneBitesTheDust.jpg',
                'url_song' => '/music/AnotherOneBitesTheDust.mp3',
                'artist' => 'Queen',
                'album' => 'The Game',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'title' => 'Desvelado',
                'url_image' => '/music/Desvelado.jpg',
                'url_song' => '/music/Desvelado.mp3',
                'artist' => 'Bobby Pulido',
                'album' => 'Desvelado',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'title' => 'Lose control',
                'url_image' => '/music/LoseControl.jpg',
                'url_song' => '/music/LoseControl.mp3',
                'artist' => 'MEDUZA, Becky Hill, Goodboys',
                'album' => 'Get to Know',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'title' => 'Me estas tentando',
                'url_image' => '/music/MeEstasTentando.PNG',
                'url_song' => '/music/MeEstasTentando.mp3',
                'artist' => 'Wisin & Yandel',
                'album' => 'La mente maestra',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'title' => 'Pam Pam',
                'url_image' => '/music/PamPam.jpg',
                'url_song' => '/music/PamPam.mp3',
                'artist' => 'Wisin & Yandel',
                'album' => 'La mente maestra',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'title' => 'Perdóname',
                'url_image' => '/music/Perdoname.jpg',
                'url_song' => '/music/Perdoname.mp3',
                'artist' => 'La Factoria ft. Eddy Lover',
                'album' => 'Perdóname',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'title' => 'Rockstar',
                'url_image' => '/music/Rockstar.jpg',
                'url_song' => '/music/Rockstar.mp3',
                'artist' => 'Post Malone ft. 21 Savage',
                'album' => 'Beerbongs & Bentleys',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'title' => 'Supalonely',
                'url_image' => '/music/Supalonely.png',
                'url_song' => '/music/Supalonely.mp3',
                'artist' => 'BENEE',
                'album' => 'Stella & Steve',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'title' => 'Te vas',
                'url_image' => '/music/TeVas.jpg',
                'url_song' => '/music/TeVas.mp3',
                'artist' => 'Perdidos De Sinaloa',
                'album' => 'Te Vas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 10,
                'title' => 'Yo sé que te acordarás',
                'url_image' => '/music/YoSeQueTeAcordaras.jpg',
                'url_song' => '/music/YoSeQueTeAcordaras.mp3',
                'artist' => 'Banda El Recodo',
                'album' => 'Lo mejor de mi vida',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach($songs as $song){
            Song::create($song);
        }
    }
}
