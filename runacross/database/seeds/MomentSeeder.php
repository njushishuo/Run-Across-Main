<?php

use Illuminate\Database\Seeder;

class MomentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=4;$i++){
            for($j=0;$j<2;$j++){

                DB::table('moment')->insert([
                    "content"=>"今天跑了3000米，流了很多汗，也很累，但是很开心!!",
                    "picture"=>"http://s11.sinaimg.cn/mw690/703b092dtx6CljIPAQq4a&690",
                    "created_at"=> time(),
                    "author_id"=>$i,
                ]);
            }
        }

    }
}
