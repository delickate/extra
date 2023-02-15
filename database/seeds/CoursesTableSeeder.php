<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('courses')->delete();
        
        \DB::table('courses')->insert(array (
            0 => 
            array (
                'course_id' => 1,
                'course_name' => 'Computer',
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => 49,
                'updated_by' => NULL,
                'level_id' => NULL,
            ),
            1 => 
            array (
                'course_id' => 2,
                'course_name' => 'Physics',
                'created_at' => NULL,
                'updated_at' => NULL,
                'created_by' => 49,
                'updated_by' => NULL,
                'level_id' => NULL,
            ),
            2 => 
            array (
                'course_id' => 8,
                'course_name' => 'New Course',
                'created_at' => '2023-01-10 11:06:50',
                'updated_at' => '2023-01-10 11:06:50',
                'created_by' => 49,
                'updated_by' => NULL,
                'level_id' => NULL,
            ),
        ));
        
        
    }
}