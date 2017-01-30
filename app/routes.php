<?php

$route[] = ['/', 'HomeController@index'];
$route[] = ['/posts', 'PostsController@index'];
$route[] = ['/post/{id}/show', 'PostsController@show'];
$route[] = ['/post/create', 'PostsController@create'];
$route[] = ['/post/store', 'PostsController@store'];
$route[] = ['/post/{id}/edit', 'PostsController@edit'];
$route[] = ['/post/{id}/update', 'PostsController@update'];
$route[] = ['/post/{id}/delete', 'PostsController@delete'];



return $route;