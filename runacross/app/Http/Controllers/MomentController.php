<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Moment;
use Log;

class MomentController extends Controller
{
    protected $Moment;
    protected $Friend;

    public function __construct(Moment $moment , Friend $friend)
    {
        $this->Moment=$moment;
        $this->Friend=$friend;
    }

    public function getRelatedMoments($userId){

        Log::info("getMoments");

        /*用户关注的用户*/

        $relatedIds= $this->Friend->getAllFriendsIdByUserId($userId);

        $relatedIds[]=$userId;

        $moments =  $this->Moment->getMomentsByUserIds($relatedIds);

        return view('moments_board' , $moments);

    }


}
