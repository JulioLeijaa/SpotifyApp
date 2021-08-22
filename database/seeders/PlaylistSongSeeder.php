<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PlaylistSongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registers = [
            [
                'playlist_id' => 1,
                'song_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 1,
                'song_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 1,
                'song_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 1,
                'song_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 1,
                'song_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 1,
                'song_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 1,
                'song_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 1,
                'song_id' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 1,
                'song_id' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 1,
                'song_id' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 2,
                'song_id' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 2,
                'song_id' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 2,
                'song_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 5,
                'song_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 5,
                'song_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 5,
                'song_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 5,
                'song_id' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 4,
                'song_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 4,
                'song_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 4,
                'song_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'playlist_id' => 4,
                'song_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach($registers as $register){
            DB::table('playlist_song')->insert($register);
        }
    }
}
