<?php

namespace App\Http\Controllers;

use App\Competition;
use App\IndividualCmpt;
use App\TeamCmpt;
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
     */
    public function getCompetitionsByUserId($userId){

    }

    /**
     * 取消竞赛
     * @param $competitionId
     */
    public function deleteCompetition($competitionId){

    }


/*---------------------------------------------------------------------------------------------------------*/


    /**
     * 发布新的竞赛
     * @param Request $request
     * @param $userId
     */
    public function createCmpt(Request $request , $userId){

    }


    /**
     * 加入个人竞赛
     * @param $competitionId
     * @param $userId
     */
    public function joinIdvCmpt(Request $request, $competitionId,$userId){


    }

    /**
     * 加入团队竞赛
     * @param $competitionId
     * @param $userId
     */
    public function joinTeamCmpt(Request $request,$competitionId,$userId,$team){

    }


    /**
     * 退出竞赛
     * @param $competitionId
     * @param $userId
     */
    public function quitCmpt(Request $request,$competitionId,$userId){

    }

}
