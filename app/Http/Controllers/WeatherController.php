<?php

namespace App\Http\Controllers;

use App\Models\HistorialWeather;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;


class WeatherController extends Controller
{

    public function search($city){

        $key = config('services.owm.key');

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q=".$city."&lang=es"."&appid=".$key)
          ->json();
        if($response['cod'] == "200") {
          $response = [
          'weather' => $response['weather'][0]['description'],
          'temp' => $response['main']['temp'] - 273,
          'name' => $response['name'],
          'country' => $response['sys']['country'],
          'humidity' => $response['main']['humidity'],
          'coord' => ['lat' => $response['coord']['lat'], 'long' => $response['coord']['lon']],
          'ok' => $response['cod']
          ];


          $HistorialWeather = [
            'weather' => $response['weather'],
            'temp' => $response['temp'],
            'name' => $response['name'],
            'country' => $response['country'],
            'humidity' => $response['humidity'],
          ];

          //dd($HistorialWeather);

          HistorialWeather::create($HistorialWeather);

            return $response;

          } else {
            return response('not found');
          }
    }




      function countries (){
        $data = [];
        $cities = ['miami','new york','orlando'];

        for ($i=0; $i < count($cities); $i++) {
            $add = $this->search($cities[$i]);
            $data=Arr::add($data,$cities[$i], $add);
        }

        return json_decode(json_encode($data));
      }


    public function index(){
        $lat = '0';
        $long = '0';
        $response = $this->countries();
        return view('index')->with(['response'=> $response])
                            ->with('lat',$lat)
                            ->with('long',$long);
      }


    public function map ($lat,$long) {

        $response = $this->countries();
        return view('index')->with(['response'=> $response])
                            ->with('lat',$lat)
                            ->with('long',$long);
    }



    public function historial(){

        $historial = HistorialWeather::all();

        return view('historial')->with('historial',$historial);
    }
}
