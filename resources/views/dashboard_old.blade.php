@extends('layouts.master')
@section('title')
    Dashboard
@endsection


@section('content')
@include('inc.message-block')

<?php
  $user = Auth::user();
?>
<section class="row new-post">
	<div class="col-md-6 col-md-offset-3">
		<header><h3> What's on your mind?</h3></header>



		<form action="{{ route('post.create') }}" method="POST">
			<div class="form-group">
				<textarea  class="form-control" name="body" id="new-post" rows="10" placeholder="Start typing here..."></textarea>
			</div>
			<button type="submit" class="btnn btn-primary">Submit</button>
			<input type="hidden" name="_token" value="{{ Session::token() }}">
		</form>
	</div>
    <div class="col-md-6 col-md-offset-3">
        <h3>Activity</h3>
        <ul>
           <li>You are now friends with John</li>
            <li>You have reached level 6 in french!</li>
            <li>Your profile has had 36 views today.</li>
        </ul>
    </div>
</section>
<section class="row posts">
	<div class="col-md-6 col-md-offset-3">
			<header><h3>What's new...</h3></header>
				 @foreach($posts as $post)
                 <div class="card card-outline-primary">
                <article class="post" data-postid="{{ $post->id }}">

                    <p>{{ $post->body }}</p>
                    <div class="info">
                        Posted by {{ $post->user->name }} on {{ $post->created_at }}
				</div>
				<div class="interaction">

					 <a  href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this' : 'Like' : 'Like'  }}</a> |
					<a  class="like" : 'Like' href="#">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this' : 'Dislike' : 'Dislike'  }}</a>


					@if(Auth::user() == $post->user)
					|

					<a href="#" class="edit material-icons">create</a> |
					<a href="{{route('post.delete', ['post_id' => $post->id])}}"><i class="material-icons">delete</i></a>
					@endif

				</div>
				</article>
                </div>
                <br>
				@endforeach



	</div>
    <div class="col-md-6 col-md-offset-3">
        <header><h3>Media</h3></header>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/d0yGdNEWdn0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

  <div class="container bootstrap snippet">
  <div class="header">
    <h3 class="text-muted prj-name">
        <span class="fa fa-users fa-2x principal-title"></span>
        Friends List
    </h3>
  </div>


  <div class="jumbotron list-content" style="overflow: scroll; height: 250px;">
    <ul class="list-group">
      <li href="#" class="list-group-item title">
        Your Friends
      </li>
        @foreach($users as $user)
      <li href="#" class="list-group-item text-left">
        <img class="img-thumbnail" href="#"  src="{{ route('account.image', ['name' => $user->name . '-' . $user->id . '.jpg']) }}">
        <label class="name">
            {{$user->name}}<br>
        </label>
        <label class="pull-right">
            <a  class="btn btn-success btn-xs glyphicon glyphicon-ok" href="{{ route('users', ['user_id' => $user->id]) }}" title="View"></a>
            <a  class="btn btn-danger  btn-xs glyphicon glyphicon-trash" href="#" title="Delete"></a>
            <a  class="btn btn-info  btn-xs glyphicon glyphicon glyphicon-comment" href="#" title="Send message"></a>
        </label>
        <div class="break"></div>
      </li>
        @endforeach

</div>
</section>





</div>

 <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">Edit the Post</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script >
    	var token = '{{ Session::token() }}';
    	var urlEdit = '{{  route('edit') }}'
        var urlLike = '{{  route('like') }}'
    </script>
@endsection
