<?php 

namespace App\Controllers;

class PageControllers
{
    /**
     * Show the home page.
     */
    public function home()
    {
        return view('home-page');
    }

    /**
     * Show the favorites page.
     */
   public function favorites()
   {
       return view('favorites-page');
   }

   /**
    * Show the playing page.
    */
    public function playing()
    {
        return view('now-playing-page');
    }

    /**
     * Show the top movie page.
     */
    public function topMovie()
    {
        return view('top-page');
    }

    /**
     * Show the playing page.
     */
    public function people()
    {
        return view('people-page');
    }

   /**
    * Show the 404 page.
    */
    public function error()
    {
        return view('404');
    }
}
