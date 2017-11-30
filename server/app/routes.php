<?php 

$router->get('/home', 'PageControllers@home');
$router->get('/now-playing', 'PageControllers@playing');
$router->get('/top-rate', 'PageControllers@topMovie');
$router->get('/lastest', 'PageControllers@lastest');
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