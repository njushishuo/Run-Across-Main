<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserStatsController extends Controller
{
    public function getUserStats($userId){
        return view('user_statistics');
    }
}
