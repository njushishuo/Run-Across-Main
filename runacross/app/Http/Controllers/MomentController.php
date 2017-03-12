<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Moment;
use App\Star;
use App\VO\MomentVO;
use Log;
use Illuminate\Http\Request;

class MomentController extends Controller
{
    protected $Moment;
    protected $Friend;
    protected $Star;

    public function __construct(Moment $moment , Friend $friend, Star $star)
    {
        $this->Moment=$moment;
        $this->Friend=$friend;
        $this->Star=$star;

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



    public function createMomentBoard(Request $request, $userId){

        if(isset($_FILES['image'])){
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $tmp=explode('.',$_FILES['image']['name']);
            $file_ext= end($tmp);

            $expensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$expensions)=== false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if($file_size > 2097152) {
                $errors[]='File size must be excately 2 MB';
            }

            if(empty($errors)==true) {
                move_uploaded_file($file_tmp,"uploads/".$file_name);
                echo "Success";
            }else{
                print_r($errors);
            }
        }



        $moment = new Moment();
        $moment->content = $request->input('moment_content');
        $moment->picture = "http://localhost:8000/uploads/".$file_name;
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
        $momentVOs =array();
        for($i =0;$i<count($moments);$i++){
            $hasVote = $this->Star->hasVote($moments[$i]->id , $userId);
            $count = $this->Star->getVoteCount($moments[$i]->id);
            $momentVOs[$i]= new MomentVO($moments[$i],$hasVote , $count);
        }
        return view('moments_mine' , ['momentVOs'=>$momentVOs]);

    }

    public function createMomentMine(Request $request, $userId){
        $moment = new Moment();
        $moment->content = $request->input('moment_content');
        $moment->picture = "http://cdnimg.erun360.com/Utility/Uploads/2016-01-14/678ecb7b-3eec-4036-bbdb-83e5f8d0782a.jpg";
        $moment->author_id = $userId;
        $moment->created_at =time()+8*60*60;
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


    public function vote($momentId , $userId){
        $this->Star->vote($momentId,$userId);

        return ['result'=>true];

    }

    public function unVote($momentId , $userId){
        $this->Star->unVote($momentId,$userId);

        return ['result'=>true];

    }


}
