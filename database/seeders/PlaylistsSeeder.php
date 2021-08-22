<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Playlist;
use Carbon\Carbon;

class PlaylistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $playlists = [
            [
                'id' => 1,
                'name' => 'El mix',
                'url_image' => '/music/LoseControl.jpg',
                'active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'Dolidas',
                'url_image' => '/music/TeVas.jpg',
                'active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'Tranqui',
                'url_image' => '/music/Rockstar.jpg',
                'active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => 'Pa cuando se acabe el cuatri',
                'url_image' => '/music/PamPam.jpg',
                'active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'name' => 'Tranqui',
                'url_image' => '/music/Rockstar.jpg',
                'active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        foreach($playlists as $playlist){
            Playlist::create($playlist);
        }
    }
}
