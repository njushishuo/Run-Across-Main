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

            Log::info("login success");

            $url = "/user/".$user->id."/related-moments";

            $request->session()->put('user',$user);

            return ['result'=>true , 'url'=>$url];

        }else{

            Log::info("login fail");

            return ['result'=>false];

        }
    }
}
