<?php

namespace App\Http\Controllers;

use App\Competition;
use App\IndividualCmpt;
use App\TeamCmpt;
use App\VO\Cmpt_RecordsVO;
use App\VO\CompetitionVO;
use App\VO\UserVO;
use Illuminate\Http\Request;

use Log;

class CompetitionController extends Controller
{
    protected $Competition;
    protected $IndividualCmpt;
    protected $TeamCmpt;

    public function __construct(Competition $competition , IndividualCmpt $individualCmpt , TeamCmpt $teamCmpt)
    {
        $this->Competition = $competition;
        $this->IndividualCmpt = $individualCmpt;
        $this->TeamCmpt = $teamCmpt;
    }



/*---------------------------------------------------------------------------------------------------------*/

    /**
     * 竞赛板界面
     */
    public function getAllCmpts(){

        Log::info("getAllComt");

        $individualCompetitions=$this->Competition->findIndividualCompetitions();
        $teamCompetitions = $this->Competition->findTeamCompetitions();

        $individualCompetitionVOs = array();
        $individualPlayers = array();

        for ($i=0;$i<count($individualCompetitions);$i++){

            $individualCompetitionVOs[$i] = new CompetitionVO($individualCompetitions[$i]);
            $competitionId = $individualCompetitions[$i]->id;
            $individualPlayers[$i] = $this->IndividualCmpt->getMemberRecords($competitionId);
        }

        $teamCompetitionVOs = array();
        $teamPlayers =array();
        for ($i=0;$i<count($teamCompetitions);$i++){

            $teamCompetitionVOs[$i] = new CompetitionVO($teamCompetitions[$i]);
            $competitionId = $teamCompetitions[$i]->id;
            $teamPlayers[$i] =$this->TeamCmpt->getMemberRecords($competitionId);
        }




        return view('competition_board',['idvCmptVOs'=>$individualCompetitionVOs,
                            'tmCmptVOs'=>$teamCompetitionVOs ,
                            'idvPlayers'=>$individualPlayers,
                            'teamPlayers'=>$teamPlayers]);

    }

/*---------------------------------------------------------------------------------------------------------*/



    /**
     * 用户个人的竞赛界面(用户创建和参与的竞赛)
     * @param $userId
     * @return
     */
    public function getCompetitionsByUserId($userId){

        $idvCmps_created =$this->Competition->getIdvCmptsCreatedBy($userId);
        $tmCmps_created =$this->Competition->getTmCmptsCreatedBy($userId);
        $idvCmps_joined =$this->IndividualCmpt->getIdvCmptsJoinedBy($userId);
        $tmCmps_joined =$this->TeamCmpt->getTmCmptsJoinedBy($userId);

        $cmpts_created = array_merge($idvCmps_created,$tmCmps_created);
        $cmpts_joined = array_merge($idvCmps_joined,$tmCmps_joined);

        $cmpts_created_recordVOs = $this->getCmpt_RecordsVOsByCmpts($cmpts_created);
        $cmpts_joined_recordVOs = $this->getCmpt_RecordsVOsByCmpts($cmpts_joined);

        return view('competition_mine' ,
            ['createdVOs'=>$cmpts_created_recordVOs , 'joinedVOs'=>$cmpts_joined_recordVOs]);
    }


    private function getCmpt_RecordsVOsByCmpts($cmpts){
        $cmptsRecordVOs =array();

        for ($i=0;$i<count($cmpts);$i++){
            $cmptsVO = new CompetitionVO($cmpts[$i]);

            $cmptId = $cmpts[$i]->id;
            $cmptType = $cmpts[$i]->type;
            if($cmptType=='individual'){
                $records =$this->IndividualCmpt->getMemberRecords($cmptId);
            }
            $cmptsRecordVOs[$i]=new Cmpt_RecordsVO($cmptsVO,$records);
            Log::info($cmptsRecordVOs[$i]);
        }
        return $cmptsRecordVOs;
    }

    /**
     * 取消竞赛
     * @param $competitionId
     */
    public function deleteCompetition($competitionId){

    }


/*---------------------------------------------------------------------------------------------------------*/


    /**
     * @param Request $request
     * @param $userId
     * @return \Illuminate\Http\RedirectResponse|
     */
    public function createCmpt(Request $request , $userId){
        $input = $request->all();
        Log::info($input);
        $competition = new Competition();
        $competition->type =$input['type'];
        $competition->title = $input['title'];
        $competition->reward = $input['reward'];
        $competition->author_id = $userId;
        $competition->start_at =$this->handleDateString($input['start_at']);
        $competition->end_at =$this->handleDateString($input['end_at']);
        $competition->created_at =time()+8*3600;
        $competition->save();

        Log::info("id: $competition->id");

        if($competition->type == "individual"){
            $this->joinIdvCmpt($competition->id , $userId);
        }else{
            $this->joinTeamCmpt($competition->id , $userId , "red");
        }
        return redirect('/competitions');
    }


    private function handleDateString($inputDate){
        str_replace('T',' ',$inputDate);
        $inputDate.":00";
        Log::info($inputDate);
        $time = strtotime($inputDate);
        $converted = date("Y-m-d H:i:s",$time);
        Log::info("$inputDate convert to");
        Log::info($converted);
        Log::info("time : $time");
        return $time;
    }


    /**
     * 加入个人竞赛
     * @param $competitionId
     * @param $userId
     * @return array
     */
    public function joinIdvCmpt( $competitionId,$userId){

        $info=$this->IndividualCmpt->joinCompetition($competitionId,$userId);
        return ["result"=>true,"info"=>$info];

    }

    /**
     * 加入团队竞赛
     * @param $competitionId
     * @param $userId
     * @param $team
     * @return array
     */
    public function joinTeamCmpt($competitionId,$userId,$team){
        $info=$this->TeamCmpt->joinCompetition($competitionId,$userId,$team);
        return ["result"=>true,"info"=>$info];
    }


    /**
     * 退出竞赛
     * @param $competitionId
     * @param $userId
     */
    public function quitCmpt(Request $request,$competitionId,$userId){

    }

}
