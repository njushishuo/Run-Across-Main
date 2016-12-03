<?php

namespace App\Http\Controllers;

use App\Summary;
use Illuminate\Http\Request;

class UserStatsController extends Controller
{

    protected $Summary;

    public function __construct(Summary $summary)
    {
        $this->Summary=$summary;
    }

    public function getUserStats($userId){

        $summary = $this->Summary->getSummary($userId);

        return view('user_statistics',['summary'=>$summary]);
    }
}
