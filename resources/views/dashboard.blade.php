@extends('layouts.master')
@section('title')
    Dashboard
@endsection


@section('content')
@include('inc.message-block')
<div class="container-fluid ">
    <div class="row">
        <div class="col my-sidebar">
            <h2>LEFT</h2>
            <h6>(FIXED 230px COLUMN)</h6>
        </div>
        <div class="col text-center">
          <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
  <div class="carousel-item active">
    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(35).jpg">
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(33).jpg">
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(31).jpg">
  </div>
</div>
</div>
        </div>
        <div class="col my-sidebar">
            <h2>RIGHT</h2>
            <h6>(FIXED 230px COLUMN)</h6>
        </div>
    </div>
</div>
@endsection
