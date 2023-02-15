<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentCoursesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('student_courses')->delete();
        
        \DB::table('student_courses')->insert(array (
            0 => 
            array (
                'student_courses_id' => 1,
                'student_idFK' => 14,
                'course_idFK' => 2,
                'created_at' => '2023-01-19 00:57:01',
                'updated_at' => '2023-01-19 00:57:01',
                'created_by' => 50,
                'updated_by' => NULL,
            ),
            1 => 
            array (
                'student_courses_id' => 2,
                'student_idFK' => 14,
                'course_idFK' => 1,
                'created_at' => '2023-01-19 16:49:48',
                'updated_at' => '2023-01-19 16:49:48',
                'created_by' => 50,
                'updated_by' => NULL,
            ),
        ));
        
        
    }
}