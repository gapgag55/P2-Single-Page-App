<?php 

namespace App\Model;

use SpotifyWebAPI;

class SpotifyModel {

    private $api;
    // send API key to request the data
    public function __construct() {
        $session = new SpotifyWebAPI\Session(
            'f0d677f3dbb04911be29149f7fd8fe30',
            'c203b70a60514e41b8446b7c18a59352'
        );

        /**
         * Normally, the time for accessing spotify API is limited,
         * so this code will generate new key every time
         * when this function is called
         */
        $session->requestCredentialsToken();
        $accessToken = $session->getAccessToken();

        $this->api = new SpotifyWebAPI\SpotifyWebAPI();
        $this->api->setAccessToken($accessToken);
    }

    // return the first track of musics
    public function playlist($keyword) {
        $results = $this->api->search($keyword, 'track');
        return $results->tracks->items[0]->artists[0]->uri;
    }
}