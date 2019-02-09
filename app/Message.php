<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillables = [
    'sender_id', 'reciever_id', 'message', 'read'

    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
