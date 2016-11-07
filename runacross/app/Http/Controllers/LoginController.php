<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    //
    protected $user;

    public function __construct(User $user)
    {
        $this->user=$user;
    }

    public function showUsers(){
        $this->user->getAllUsers();
    }
}
