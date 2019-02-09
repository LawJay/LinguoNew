<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;
        //validate
        $this->validate($request, [
            'recipient' => 'required',
            'body' => 'required|max:1000'
        ]);

        $message = new Message();
        $message->message = $request['body'];
        $message->read = 0;
        $message->sender_id = $id;
        $message->receiver_id = $request['recipient'];
        $note = 'Oops, there was an error';
        if($message->save()){
            $note = 'Message successfully Sent';
        }
        return redirect()->route('dashboard')->with(['message' => $note]);
    }

    public function createChat(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;
        //validate
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);
        $message = new Message();
        $message->message = $request['body'];
        $message->read = 0;
        $message->sender_id = $id;
        $message->receiver_id = $request['user_id'];
        $note = 'Oops, there was an error';
        if($message->save()){
            $note = 'Message successfully Sent';
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getChat($id){

            $messages = DB::table('messages')
                ->leftjoin('users', function($join){
                    $join->on('users.id','=','messages.sender_id'); // i want to join the users table with either of these columns
                    $join->orOn('users.id','=','messages.receiver_id');
                })->where('receiver_id', '=', $id)->get();

            return $messages;

    }
}
