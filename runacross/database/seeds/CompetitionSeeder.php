<?php

use Illuminate\Database\Seeder;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=4;$i++){

            DB::table('competition')->insert([
                "type"=>"team",
                "title"=>"一起来跑步吧！",
                "reward"=>"3000",
                "created_at"=> time()+8*3600,
                "start_at"=> time()+8*3600-3600*3,
                "end_at"=> time()+8*3600+3600*3+24*3600,
                "author_id"=>$i,
            ]);

            DB::table('competition')->insert([
                "type"=>"team",
                "title"=>"今晚跑10圈！",
                "reward"=>"1500",
                "created_at"=> time()+8*3600,
                "start_at"=> time()+8*60*60+3600*3,
                "end_at"=> time()+8*60*60+3600*3+24*3600,
                "author_id"=>$i,
            ]);

        }
    }
}
