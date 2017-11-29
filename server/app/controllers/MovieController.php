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
        $keyword = $this->searchKeyword();
        
        $tweets  = (new TwitterModel())->searchTweet($keyword)->statuses;
        $spotify = (new SpotifyModel())->playlist($keyword);
     
        return view('movie-page', [
            'id' => $_GET['id'],
            'tweets' => $tweets,
            'spotify' => $spotify,
            'keyword' => $keyword
        ]);
    }

    public function searchKeyword() {
        $api = 'https://api.themoviedb.org/3/movie/'. $_GET['id'];
        $key = '?api_key=aea1c02a2029aa398e2ea649ca42615a';
        $api .= $key; 

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $api); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_ENCODING , "gzip");
        $output = curl_exec($ch); 
        curl_close($ch);

        return json_decode( $output )->original_title;
    }
}
