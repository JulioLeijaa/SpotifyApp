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
        $playlists = Playlist::find($id);	
        foreach($playlists->songs as $song){
            $songs[] = $song;
        }
        return Inertia::render('Components/playlist/Playlists', [
            'playlists' => $playlists
        ]);
    }
}
