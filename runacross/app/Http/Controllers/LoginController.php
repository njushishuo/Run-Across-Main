<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class LoginController extends Controller
{

    protected $User;

    public function __construct(User $user)
    {
        $this->User=$user;
    }

    public function verify(Request $requeste){
         $pass = $this->User->verify($requeste->input('username') , $requeste->input('password'));
        if($pass){
            return view();
        }else{
            return view();
        }
    }
}
