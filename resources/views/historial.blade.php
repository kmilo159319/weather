@extends('layouts.app',['navtitle' => 'Historial De Consultas','active2' => 'active'])
@section('content')
    <main class="mt-5 ">
        <div class="px-5 ms-5 container row">
            <div class="col-md-8 mx-5 col-6 row d-flex justify-content-center">
                <table class="table bg-white mt-5 img-container">
                    <thead class="">
                      <tr>
                        <th scope="">pais</th>
                        <th scope="">ciudad</th>
                        <th scope="">clima</th>
                        <th scope="">temperatura</th>
                        <th scope="">humedad</th>
                        <th scope="">fecha</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($historial as $item)
                      <tr>
                        <td>{{$item->country}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->weather}}</td>
                        <td>{{$item->temp}}&deg;C</td>
                        <td>{{$item->humidity}}%</td>
                        <td>{{$item->created_at->translatedFormat('d M Y')}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </main>
@endsection
