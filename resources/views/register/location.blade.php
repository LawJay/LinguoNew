
<?php
$user = Auth::user();
?>
<head>
    <link href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/main.css') }}">
</head>
<center>
    <header class="masthead d-flex" style="padding-top: 15%">
        <div class="container text-center my-auto">
            <h1 class="mb-1">Hello {{$user->name}}</h1>
            <h3 class="mb-5">
                <em>Where do you live?</em>
            </h3>
            <form action="{{ route('account.location') }}" method="post" enctype="multipart/form-data">
                <input type="text" name="location" class="form-control" value="{{ $user->age }}" id="location">
                <button type="submit" class="btn btn-primary btn-xl js-scroll-trigger">Submit</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>

        </div>

    </header>
</center>
