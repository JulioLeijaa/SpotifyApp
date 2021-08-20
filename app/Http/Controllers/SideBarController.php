<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use Illuminate\Http\Request;

class SideBarController extends Controller
{
    //
    public function index() {

        $posts = [  
            array(
                "name" => "playlist1"
            )
        ];
        return response()->json($posts, 200);
        // return Inertia::share('Components/sidebar/SideBar', [
        //     "posts" => $posts
        // ]);
    }
}
