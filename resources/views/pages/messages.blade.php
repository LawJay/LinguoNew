@extends('layouts.master')
@section('title')
    Messages
@endsection

<head>

    <?php use App\Http\Controllers\UserController;?>
</head>
@section('content')
    @include('inc.message-block')
    <div class="container">
        <div class="row">


            <div style="margin: 0 auto;" class="col-md-8">
                <h4>Messages</h4>
                <div class="table-responsive">


                    <table id="mytable" class="table table-bordered table-striped">

                        <thead>

                        <th>Date</th>
                        <th>Username</th>
                        <th>Message</th>

                        <th>Reply</th>

                        <th>Delete</th>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                        <tr>

                            <td>{{$message->created_at}}</td>
                            <td>{{ $message->sender_id  }}</td>
                            <td>{{$message->message}}</td>
                            <td><p data-placement="top" data-messageid="{{$message->sender_id}}"  data-toggle="tooltip" title="Reply"><button class="btn btn-primary btn-xs" data-title="reply" data-toggle="modal" data-target="#reply" ><i class="material-icons">reply</i></button></p></td>
                            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><i class="material-icons">delete</i></button></p></td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <form action="{{ route('message.create') }}" method="POST">
                        <div class="form-group">
                            <input class="form-control" placeholder="Recipient" type="text" name="recipient">
                            <textarea  class="form-control" name="body" id="new-post" rows="5" placeholder="Start typing here..."></textarea>
                        </div>
                        <button type="submit" class="btnn btn-primary">Submit</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection