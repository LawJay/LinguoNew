@extends('layouts.master')
@section('title')
    Users Online now
@endsection
@section('content')
@include('inc.message-block')
<section id="team" class="pb-5">
    <div class="container">
        <h5 class="section-title h1">Online Users</h5>
        <div class="row">
            @foreach($users as $user)
                @if($user->isOnline())
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="{{ route('account.image', ['name' => $user->name . '-' . $user->id . '.jpg']) }}" alt="card image"></p>
                                    <h4 class="card-title">{{$user->name}}</h4>
                                    <p class="card-text">{{$user->age}} - {{$user->location}}</p>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">

                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">{{$user->name}}</h4>
                                    <p class="card-text">{{ str_limit($user->bio, $limit = 200, $end = '...') }}</p>
                                    <ul class="list-inline">

                                        <li class="list-inline-item">

                                                <a href="{{ route('users', ['user_id' => $user->id]) }}" class="btn btn-primary text-xs-center"><i class="material-icons">launch</i></a>
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                    @endif
            @endforeach

        </div>
    </div>
</section>
<!-- Users -->
@endsection