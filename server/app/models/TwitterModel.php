<?php 

namespace App\Model;

use Abraham\TwitterOAuth\TwitterOAuth;
use PHPInsight\Sentiment;

class TwitterModel {

    private $twitter;
    //connect twitter and this is the request of twitter
    public function __construct() {
        $this->twitter = new TwitterOAuth(
            'Ch8GhEOxzBMFTpP5EQn6nfdCx',
            '8pzW0L4NSuuJnNPuH5NjijXPWmagd987e5BZG03DhUVIiQSHv6',
            '818647314151550976-nZRQWVvKsvhXesJBwPLNd6VYYRmgRNd',
            'gSITgARZRO9W9BNsqcsVgplEQ6vh9706OOJrfXE8vpB9K'
        );
    }
    // get data by using keyword
    public function searchTweet($keyword) {
        $results = $this->twitter->get("search/tweets", [
            "q" => $keyword,
            "count" => 20
        ]);
        
        
        $results = (array) $results;
        $tweets  = $results["statuses"];
        /**
         * send each commet to analyse sentiment
         * and store the score
         */
        for($i = 0; $i < sizeof($tweets); $i++) {
            $score = $this->analysis( $tweets[$i]->text );
            $tweets[$i]->analysis = $score;
        }

        return json_encode($tweets);
    }

    // anlyse the sentiment and return positive, negative, or neutral
    public function analysis($string) {
        $sentiment = new Sentiment();
        $class = $sentiment->categorise($string);
        
        return $class;
    }
}