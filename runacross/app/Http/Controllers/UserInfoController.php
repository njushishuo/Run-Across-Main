<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Log;

class UserInfoController extends Controller
{

    protected $User;

    public function __construct(User $user)
    {

        $this->User=$user;
    }



    public function getUserInfo($userId){

        return view('user_profile');
    }
}
