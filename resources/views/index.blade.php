@extends('layouts.app',['navtitle' => 'El clima En La Ciudad','active1' => 'active'])
@section('content')
    <main class="px-3 mt-5 ">
        <div class="container row ms-3">
            <div class="col-12 col-md-8 row d-flex justify-content-center">
                @foreach ($response as $item)
                <div class="col-12 col-md-4 mb-5 mb-lg-1 mt-md-5 ms-xs-5">
                    <div class="col-12 row bg-white text-black img-container">
                        <div class="col-md-12">
                        <h1 class="mt-5">{{$item->name}}</h1>
                        <h4>{{$item->temp}}&deg;C</h4>
                        <h4>humedad</h4>
                        <h4>{{$item->humidity}}%</h4>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center align-items-end mb-5">
                           <form action="{{url('getmap',['lat'=> $item->coord->lat, 'long' => $item->coord->long])}}" method="GET">
                               <button class="btn btn-dark" type="submit">ver localizacion</button>
                           </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-2 col-10 mb-5" style="height: 25rem;">
                <x-maps-leaflet :centerPoint="['lat'=> $lat, 'long' => $long]" class="zise-map"></x-maps-leaflet>
                <a href="{{url('/')}}" class="btn btn-success mt-5">actualizar</a>
            </div>
        </div>

    </main>
@endsection
