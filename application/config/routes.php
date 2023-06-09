<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['posts/delete/(:any)'] = 'posts/delete/$1';
$route['posts/create'] = 'posts/create';
$route['posts/edit'] = 'posts/edit';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
