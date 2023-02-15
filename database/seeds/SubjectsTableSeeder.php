<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('subjects')->delete();
        
        \DB::table('subjects')->insert(array (
            0 => 
            array (
                'subject_id' => 1,
                'subject_name' => 'English',
                'created_at' => '2022-08-30 14:56:11',
                'updated_at' => NULL,
                'created_by' => 1,
                'updated_by' => NULL,
            ),
            1 => 
            array (
                'subject_id' => 2,
                'subject_name' => 'Computer Science',
                'created_at' => '2022-08-30 14:56:58',
                'updated_at' => NULL,
                'created_by' => 1,
                'updated_by' => NULL,
            ),
            2 => 
            array (
                'subject_id' => 3,
                'subject_name' => 'Math',
                'created_at' => '2022-08-30 14:57:25',
                'updated_at' => NULL,
                'created_by' => 1,
                'updated_by' => NULL,
            ),
        ));
        
        
    }
}