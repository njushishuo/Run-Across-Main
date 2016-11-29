<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Moment;
use Log;
use Illuminate\Http\Request;

class MomentController extends Controller
{
    protected $Moment;
    protected $Friend;

    public function __construct(Moment $moment , Friend $friend)
    {
        $this->Moment=$moment;
        $this->Friend=$friend;
    }


    /**
     * 动态板使用该方法获取用户相关的动态（本人和follow的动态）
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRelatedMoments($userId){
        /*用户关注的人*/

        $relatedIds= $this->Friend->getAllFriendsIdByUserId($userId);

        $relatedIds[]=$userId;

        $moments =  $this->Moment->getMomentsByUserIds($relatedIds);

        return view('moments_board' , ['moments'=>$moments]);

    }



    public function createMomentBoard(Request $request, $userId){
        $moment = new Moment();
        $moment->content = $request->input('moment_content');
        $moment->picture = "http://cdnimg.erun360.com/Utility/Uploads/2016-01-14/678ecb7b-3eec-4036-bbdb-83e5f8d0782a.jpg";
        $moment->author_id = $userId;
        $moment->created_at = date('y-m-d H:i:s',time()+8*60*60);
        $moment->save();

        $url = "/user/".$userId."/related-moments";
        return redirect($url);

    }


    /**
     * 我的动态页面使用该方法获取用户自己的动态
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMyMoments($userId){
        /*用户关注的人*/

        $moments =  $this->Moment->getMomentsByUserId($userId);
        return view('moments_mine' , ['moments'=>$moments]);

    }

    public function createMomentMine(Request $request, $userId){
        $moment = new Moment();
        $moment->content = $request->input('moment_content');
        $moment->picture = "http://cdnimg.erun360.com/Utility/Uploads/2016-01-14/678ecb7b-3eec-4036-bbdb-83e5f8d0782a.jpg";
        $moment->author_id = $userId;
        $moment->created_at = date('y-m-d H:i:s',time()+8*60*60);
        $moment->save();

        $url = "/user/".$userId."/moments";
        return redirect($url);
    }

    public function deleteMoment($userId,$momentId){

        $moment = Moment::find($momentId);

        if($moment!=null){

            Log::info("delete moment id = ".$moment->id);
            $moment->delete();

            $url = "/user/".$userId."/moments/";
            return ['result'=>true , 'url'=>$url];

        }else{

            Log::info("not found moment id = ".$moment->id);

            return ['result'=>false ];
        }


    }

}
