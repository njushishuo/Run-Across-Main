<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFriendController extends Controller
{

    public function getUserFriends($userId){
        return view('user_friend');
    }


    public function search($keyword){

    }

    public function follow($userId,$watchId){

    }

    public function unfollow($userId,$watchId){

    }
}
