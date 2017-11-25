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

    public function search() {
        $results = $this->api->search('perfect', 'track');
        
        echo '<pre>' . var_export($results, true) . '</pre>';
    
        foreach ($results->artists->items as $artist) {
            echo $artist->name, '<br>';
        }


       // echo '<iframe src="https://open.spotify.com/embed?uri=spotify:artist:6eUKZXaKkcviH0Ku9w2n3V" width="300" height="380" frameborder="0" allowtransparency="true"></iframe>';
    }
}