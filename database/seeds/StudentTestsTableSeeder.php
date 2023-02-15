<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentTestsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('student_tests')->delete();
        
        
        
    }
}