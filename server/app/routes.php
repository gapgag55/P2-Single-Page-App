<?php 

$router->get('/home', 'HomeController@index');
$router->get('/coming', 'ComingMovieController@index');
$router->get('/top-rate', 'TopMovieController@index');

/*
 * GET /movie
 * Params: id
 */
$router->get('/movie', 'MovieController@index');