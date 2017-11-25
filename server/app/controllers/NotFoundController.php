<?php 

namespace App\Controllers;

class NotFoundController
{
    /**
     * Show the home page.
     */
    public function index()
    {
        return view('404');
    }
}
