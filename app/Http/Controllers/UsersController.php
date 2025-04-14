<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UsersController extends Controller
{
    //
    public function index(){
        $users = User::get();
        // dd($posts);
        return view('users.search',['users'=>$users]);
    }
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }
}
