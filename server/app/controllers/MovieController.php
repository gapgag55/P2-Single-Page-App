<?php 

namespace App\Controllers;

use App\Model\TwitterModel;
use App\Model\SpotifyModel;

class MovieController
{

    /**
     * Show the home page.
     */
    public function index()
    {   
        return view('movie-page', [
            'id' => $_GET['id']
        ]);
    }
}
