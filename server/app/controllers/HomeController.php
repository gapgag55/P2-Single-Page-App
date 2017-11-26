<?php 

namespace App\Controllers;

class HomeController
{
    /**
     * Show the home page.
     */
    public function index()
    {
        return view('home-page');
    }

}