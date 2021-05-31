<?php
use Illuminate\Support\Str;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Generate Application Key
$router->get('/key', function () {
    $random = Str::random(32);

    return $random;
});

// Artikel Controller
$router->get('artikel/get', 'ArtikelController@getAll');
$router->get('artikel/id/{id}', 'ArtikelController@getById');
$router->get('artikel/judul/{judul}', 'ArtikelController@getByJudul');
$router->post('artikel/addArtikel', 'ArtikelController@create');
$router->put('artikel/{id}', 'ArtikelController@update');
$router->delete('artikel/{id}', 'ArtikelController@delete');

// Ijin Controller
$router->get('ijin/getAll', 'IjinController@getAll');
$router->get('ijin/getByKodeDivisi/{kodedivisi}', 'IjinController@getByKodeDivisi');
$router->get('ijin/getByNup/{nup}', 'IjinController@getByNup');

// Faq Controller
$router->get('faq/get', 'FaqController@get');

// Trx Controller
$router->get('trx/getByNup/{nup}', 'TrxController@getByNup');

// Data Project Controller
$router->get('project/getProject', 'DataProjectController@getProject');
$router->get('project/getProjectApp/{id_sbu_cabang}/{status}', 'DataProjectController@getProjectApp');
$router->get('project/getProjectCabang/{id_sbu_cabang}', 'DataProjectController@getProjectCabang');
$router->get('project/getProjectDroping/{so_number}', 'DataProjectController@getProjectDroping');
$router->get('project/getProjectByID/{id}', 'DataProjectController@getProjectByID');