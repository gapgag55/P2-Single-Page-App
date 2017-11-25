<?php 

namespace App\Controllers;

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
