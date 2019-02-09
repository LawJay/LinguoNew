<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function online(){

        $users = User::paginate(20);
        return view('pages.online')->with('users',$users);
    }

    public function profile(){
        return view('pages.profile');
    }
    public function register(){
        return view('register.register');
    }


}
