<?php 

$router->get('/home', 'HomeController@index');
$router->get('/coming', 'ComingMovieController@index');
$router->get('/top-rate', 'TopMovieController@index');
$router->get('/favorites', 'FavoritesController@index');

/*
 * GET /movie
 * Params: id
 */
$router->get('/movie', 'MovieController@index');

/*
 * GET comment Twitter
 */
$router->get('/twitter', 'MovieController@getCommentTwitter');