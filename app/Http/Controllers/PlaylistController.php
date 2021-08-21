<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class PlaylistController extends Controller
{
    //
    public function index($id){
        // $playlists = DB::table('playlists')
        //                 ->join('playlist_song', 'playlists.id', '=', 'playlist_song.playlist_id')
        //                 ->join('songs', 'playlist_song.song_id', '=', 'songs.id')
        //                 ->select('playlists.*','songs.*')
        //                 ->where('playlists.id', '=', 1)->get();
        // $playlists = new Playlist();
        // $playlists = $playlists->songs()->get();
        // error_log(json_encode($playlists));
        $user = Playlist::find(1);	
        $playlists = $user->songs;
        // dd($user->songs);
        error_log(json_encode($playlists));
        return Inertia::render('Components/playlist/Playlists', ['playlists' => json_encode($playlists)]);
    }
}
