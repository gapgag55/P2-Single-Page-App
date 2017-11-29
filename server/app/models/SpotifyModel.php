<?php 

namespace App\Model;

use SpotifyWebAPI;

class SpotifyModel {

    private $api;

    public function __construct() {
        $session = new SpotifyWebAPI\Session(
            'f0d677f3dbb04911be29149f7fd8fe30',
            'c203b70a60514e41b8446b7c18a59352'
        );

        $session->requestCredentialsToken();
        $accessToken = $session->getAccessToken();

        $this->api = new SpotifyWebAPI\SpotifyWebAPI();
        $this->api->setAccessToken($accessToken);
    }

    public function playlist($keyword) {
        $results = $this->api->search($keyword, 'track');
        // var_dump($results);
        return $results->tracks->items[0]->artists[0]->uri;
        // https://open.spotify.com/embed?uri=spotify:user:spotify:playlist:3rgsDhGHZxZ9sB9DQWQfuf
        
        // echo '<pre style="color: #FFF;">' . var_export($results->tracks->items[0]->artists[0]->uri, true) . '</pre>';
    
        // foreach ($results->artists->items as $artist) {
        //     echo $artist->name, '<br>';
        // }


       // echo '<iframe src="https://open.spotify.com/embed?uri=spotify:artist:6eUKZXaKkcviH0Ku9w2n3V" width="300" height="380" frameborder="0" allowtransparency="true"></iframe>';
    }
}