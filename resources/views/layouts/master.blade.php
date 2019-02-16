<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
        <title>@yield('title')</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <?php use App\Http\Controllers\UserController?>;


    <link rel="stylesheet" href="public\css\css/bootstrap.min.css">

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
