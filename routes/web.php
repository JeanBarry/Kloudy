<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $arr_ip = geoip()->getLocation();
    /* var_dump($arr_ip); */
    $city = $arr_ip->city;
    $country = $arr_ip->country;

    return view('home', ['City' => $city, 'Country' => $country]);
});
