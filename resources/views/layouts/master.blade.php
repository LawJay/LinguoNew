<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
        <title>@yield('title')</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <?php use App\Http\Controllers\UserController?>;


    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

    <link rel="stylesheet" href="css/custom.css">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

      <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">



@if(Auth::check())
            {{ UserController::update() }}
    @endif
    </head>
    <body>
    	@include('inc.header')
    	<div class="container">
    		@yield('content')
    	</div>
        @include('inc.footer')
        <script src="{{ URL::to('src/js/app.js') }}"></script>
    </body>
</html>
