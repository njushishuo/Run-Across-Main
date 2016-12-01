<?php

use Illuminate\Database\Seeder;
use App\Competition;

class IndividualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $compts = Competition::where('type','individual')->get();

        foreach($compts as $compt){
            $curTime = time()+8*3600;
            //还没开始
            if($compt->start_at > $curTime){

                for($j=1;$j<4;$j++){
                    DB::table('individual_competition')->insert([
                        "competition_id"=>$compt->id,
                        "user_id"=>$j,
                        "stride_count"=>0
                    ]);
                }

            }else{

                for($j=1;$j<4;$j++){
                    DB::table('individual_competition')->insert([
                        "competition_id"=>$compt->id,
                        "user_id"=>$j,
                        "stride_count"=>$j*1000+$j*300
                    ]);
                }
            }

        }


    }
}
