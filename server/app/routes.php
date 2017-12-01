<?php 

$router->get('/home', 'PageControllers@home');
$router->get('/now-playing', 'PageControllers@playing');
$router->get('/top-rate', 'PageControllers@topMovie');
$router->get('/people', 'PageControllers@people');
$router->get('/favorites', 'PageControllers@favorites');

/*
 * GET /movie
 * Params: id
 */
$router->get('/movie', 'MovieController@index');

/*
 * GET comment Twitter
 */
$router->get('/twitter', 'MovieController@getCommentTwitter');

/*
 * GET uri Spotify
 */
$router->get('/spotify', 'MovieController@getSpotify');


/*
 * GET people
 */
$router->get('/person', 'PersonController@index');