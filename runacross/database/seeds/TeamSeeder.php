<?php

use Illuminate\Database\Seeder;
use App\Competition;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $compts = Competition::where('type','team')->get();

        foreach($compts as $compt){
            $curTime = time()+8*3600;
            //还没开始
            if($compt->start_at > $curTime){

                for($j=1;$j<=4;$j++){

                    if($j%2==0){
                        $team = "red";
                    }else{
                        $team = "blue";
                    }

                    DB::table('team_competition')->insert([
                        "competition_id"=>$compt->id,
                        "user_id"=>$j,
                        "team"=>$team,
                        "stride_count"=>0
                    ]);
                }

            }else{

                for($j=1;$j<4;$j++){

                    if($j%2==0){
                        $team = "red";
                    }else{
                        $team = "blue";
                    }

                    DB::table('team_competition')->insert([
                        "competition_id"=>$compt->id,
                        "user_id"=>$j,
                        "team"=>$team,
                        "stride_count"=>$j*1000+$j*300
                    ]);
                }
            }

        }
    }
}
