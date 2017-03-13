<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Moment;
use App\Star;
use App\Util\FileUploader;
use App\VO\MomentVO;
use Log;
use Illuminate\Http\Request;

class MomentController extends Controller
{
    protected $Moment;
    protected $Friend;
    protected $Star;
    protected $FileUploader;

    public function __construct(Moment $moment , Friend $friend, Star $star , FileUploader $fileUploader)
    {
        $this->Moment=$moment;
        $this->Friend=$friend;
        $this->Star=$star;
        $this->FileUploader=$fileUploader;
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
        $momentVOs =array();
        for($i =0;$i<count($moments);$i++){
            $hasVote = $this->Star->hasVote($moments[$i]->id , $userId);
            $count = $this->Star->getVoteCount($moments[$i]->id);
            $momentVOs[$i]= new MomentVO($moments[$i],$hasVote , $count);
        }

        return view('moments_board' , ['momentVOs'=>$momentVOs]);

    }



    public function createMoment(Request $request, $userId){


        $file_name = $this->FileUploader->uploadPicture();


        $moment = new Moment();
        $moment->content = $request->input('moment_content');

        if($file_name==null){
            $moment->picture = null;
        }else{
            $moment->picture = "http://".$_SERVER['HTTP_HOST']."/uploads/".$file_name;
        }

        $moment->author_id = $userId;
        $moment->created_at = date('y-m-d H:i:s',time()+8*60*60);
        $moment->save();
        $url = $_SERVER["HTTP_REFERER"];
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
        $momentVOs =array();
        for($i =0;$i<count($moments);$i++){
            $hasVote = $this->Star->hasVote($moments[$i]->id , $userId);
            $count = $this->Star->getVoteCount($moments[$i]->id);
            $momentVOs[$i]= new MomentVO($moments[$i],$hasVote , $count);
        }
        return view('moments_mine' , ['momentVOs'=>$momentVOs]);

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


    public function vote($momentId , $userId){
        $this->Star->vote($momentId,$userId);

        return ['result'=>true];

    }

    public function unVote($momentId , $userId){
        $this->Star->unVote($momentId,$userId);

        return ['result'=>true];

    }


}
