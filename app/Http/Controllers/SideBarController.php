<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Playlist;

use Illuminate\Http\Request;

class SideBarController extends Controller
{
    //
    public function index() {
        
        
        $playlist = Playlist::get()->whereNotIn('id', 3);
        return response()->json($playlist, 200);
    }
}
