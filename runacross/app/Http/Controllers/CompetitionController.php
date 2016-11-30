<?php

namespace App\Http\Controllers;

use App\Competition;
use App\IndividualCmpt;
use App\TeamCmpt;
use Illuminate\Http\Request;

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

    /**
     * 竞赛板界面
     */
    public function getAllCompetitions(){


    }

    /**
     * 竞赛板界面发布新的竞赛
     * @param Request $request
     * @param $userId
     */
    public function createCompetitionBoard(Request $request , $userId){

    }

    /**
     * 加入竞赛
     * @param $competitionId
     * @param $userId
     */
    public function joinCompetition($competitionId,$userId){

    }


    /**
     * 退出竞赛
     * @param $competitionId
     * @param $userId
     */
    public function quitCompetition($competitionId,$userId){

    }



 /*---------------------------------------------------------------------------------------------------------*/


    /**
     * 用户个人的竞赛界面(用户创建和参与的竞赛)
     * @param $userId
     */
    public function getCompetitionsByUserId($userId){

    }

    /**
     * 用户个人的竞赛界面发布新的竞赛
     * @param Request $request
     * @param $userId
     */
    public function createCompetitionMine(Request $request , $userId){

    }

    /**
     * 取消竞赛
     * @param $competitionId
     */
    public function deleteCompetition($competitionId){

    }

}
