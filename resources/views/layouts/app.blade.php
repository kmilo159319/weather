<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Laravel Weather App</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/cover.css" rel="stylesheet">

</head>

<body class="d-flex h-100 text-center text-white">

    <div class="d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div class="mb-5">
                <h3 class="float-md-start mb-0">{{$navtitle}}</h3>
                <nav class="nav nav-masthead justify-content-center float-md-end me-4">
                    <a class="nav-link fw-bold py-1 px-0 {{$active1 ?? ''}}" aria-current="page" href="{{url('/')}}">Home</a>
                    <a class="nav-link fw-bold py-1 px-0 {{$active2 ?? ''}}" href="{{url('/historial')}}">historial</a>
                </nav>
            </div>
        </header>

        @yield('content')
    </div>

</body>

</html>
