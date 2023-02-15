<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CourseLevelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('course_levels')->delete();
        
        \DB::table('course_levels')->insert(array (
            0 => 
            array (
                'level_id' => 1,
                'leval_name' => 'basic',
            ),
            1 => 
            array (
                'level_id' => 2,
                'leval_name' => 'middle',
            ),
            2 => 
            array (
                'level_id' => 3,
                'leval_name' => 'expert',
            ),
        ));
        
        
    }
}