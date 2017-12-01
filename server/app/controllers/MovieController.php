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

    public function getCommentTwitter() {
        echo json_encode((new TwitterModel())->searchTweet(
            $_GET['id']
        )->statuses);
    }

    public function getSpotify() {
        echo json_encode(
            (new SpotifyModel())->playlist($_GET['id'])
        );
    }
}
