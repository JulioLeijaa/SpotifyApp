<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Playlist;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $playlists = Playlist::get()->whereNotIn('id', 3);
        return Inertia::render('Dashboard', [
            'playlists' => $playlists
        ]);
    }
}
