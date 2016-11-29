<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Log;

class LoginController extends Controller
{

    protected $User;

    public function __construct(User $user)
    {
        $this->User=$user;
    }

    public function postLogin(Request $request){

        $user = $this->User->verify
            ( $request->input('username') , $request->input('password'));

        Log::info("user",['user'=>$user]);

        if($user!=null){

            $url = "/user/".$user->id."/related-moments";

            Log::info("sucess");
            Log::info("$url");

            return ['result'=>true , 'url'=>$url];

        }else{

            Log::info("fail");

            return ['result'=>false];

        }
    }
}
