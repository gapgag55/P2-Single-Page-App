<?php 

namespace App\Model;

use Abraham\TwitterOAuth\TwitterOAuth;
use SentimentAnalysis\Analyzer;

class TwitterModel {

    private $twitter;

    public function __construct() {
        $this->twitter = new TwitterOAuth(
            'Ch8GhEOxzBMFTpP5EQn6nfdCx',
            '8pzW0L4NSuuJnNPuH5NjijXPWmagd987e5BZG03DhUVIiQSHv6',
            '818647314151550976-nZRQWVvKsvhXesJBwPLNd6VYYRmgRNd',
            'gSITgARZRO9W9BNsqcsVgplEQ6vh9706OOJrfXE8vpB9K'
        );
    }

    public function searchTweet($keyword) {
        return $this->twitter->get("search/tweets", [
            "q" => $keyword,
            "count" => 2
        ]);
    }

    // public function analysis() {
    //     // Analyze the text.
    //     $result = (Analyzer::withDefaultConfig())
    //         ->analyze('This PHP package is awesome');

    //     // Get and print the category.
    //     echo $result->category();
    // }
}