@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Your Account</h3></header>
            <a class="nav-link" href="{{route('info')}}"><i class="material-icons">info</i></a>
            <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="first_name">Username</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="name">

                    <label for="first_name">Bio</label>
                    <textarea type="text" name="bio" class="form-control" value="" id="bio">{{$user->bio}}</textarea>

                    <label for="first_name">Location</label>
                    <input type="text" name="location" class="form-control" value="{{ $user->location }}" id="location">

                    <label for="first_name">Age</label>
                    <input type="text" name="age" class="form-control" value="{{ $user->age }}" id="age">

                    <label for="first_name">Website</label>
                    <input type="text" name="website" class="form-control" value="{{ $user->website }}" id="website">
                </div>
                <div class="form-group">
                    <label for="image">Image (only .jpg)</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Save Account</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
      @if (Storage::disk('local')->has($user->name . '-' . $user->id . '.jpg'))
        <section class="row new-post">
            <div class="col-md-6 col-md-offset-3">
                <img src="{{ route('account.image', ['name' => $user->name . '-' . $user->id . '.jpg']) }}">
                <p>Success - Path = {{ route('account.image', ['name' => $user->name . '-' . $user->id . '.jpg']) }}</p>
            </div>
        </section>
        @else
       
        <img height="50%" width="200px" src="{{ route('account.image', ['name' => $user->name . '-' . $user->id . '.jpg']) }}">
    @endif

@endsection