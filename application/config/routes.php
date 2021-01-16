<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['songs'] = 'songs/index';
$route['songs/add'] = 'songs/add';
$route['songs/update'] = 'songs/update';
$route['songs/(:any)'] = 'songs/view/$1';

$route['artists'] = 'artists/index';
$route['artists/add'] = 'artists/add';
$route['artists/update'] = 'artists/update';
$route['artists/(:any)'] = 'artists/songs/$1';

$route['repertories/add'] = 'repertories/add';
$route['repertories/update'] = 'repertories/update';
$route['repertories/add_song_to_repertory'] = 'repertories/add_song_to_repertory';
$route['repertories/remove_song_from_repertory'] = 'repertories/remove_song_from_repertory';
$route['repertories/(:any)'] = 'repertories/view/$1';
$route['repertories'] = 'repertories/index';

$route['users'] = 'users/index';

$route['default_controller'] = 'pages/view';

$route['genres'] = 'genres/index';
$route['genres/update'] = 'genres/update';
$route['genres/add'] = 'genres/add';
$route['genres/(:any)'] = 'genres/songs/$1';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
