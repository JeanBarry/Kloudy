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
function callAPI($method, $url, $data){
    $curl = curl_init();
 
    switch ($method){
       case "POST":
          curl_setopt($curl, CURLOPT_POST, 1);
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          break;
       case "PUT":
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
          break;
       default:
          if ($data)
             $url = sprintf("%s?%s", $url, http_build_query($data));
    }
 
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'APIKEY: 111111111111111111111',
       'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
 
    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    return $result;
}

Route::get('/', function () {
    /* GeoIP Package*/
    $remote_add = $_SERVER['REMOTE_ADDR'];
    $arr_ip = geoip($remote_add);
        
    $city = $arr_ip->city;
    $country = $arr_ip->country;
    $countryiso = $arr_ip->iso_code;
    //------------------
    /* Weather API*/
    $appid = "c11a10ba229bbd10d1ca905d2be1837b";

    $api_url = "https://api.openweathermap.org/data/2.5/weather?q=$city,$countryiso&appid=$appid";
    $api_url = str_replace(" ", '%20', $api_url);

    $weather_data = callAPI('GET', $api_url, false);

    $weather_json = json_decode($weather_data, TRUE);

    $temperature = $weather_json['main']['temp'];
    $temperature_celsius = $temperature - 273.15;
    $state = $weather_json['weather'][0]['description'];
    $humidity = $weather_json['main']['humidity'];
    //------------------

    return view('home', [ 
    'City' => $city, 
    'Country' => $country, 
    'Temperature' => $temperature_celsius,
    'State' => $state,
    'Humidity' => $humidity
    ]);
});
