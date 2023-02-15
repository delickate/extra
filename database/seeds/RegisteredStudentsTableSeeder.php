<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RegisteredStudentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('registered_students')->delete();
        
        \DB::table('registered_students')->insert(array (
            0 => 
            array (
                'student_id' => 1,
                'user_idFK' => 33,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-08-30 14:01:23',
                'updated_at' => '2022-08-30 14:01:23',
                'created_by' => 33,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            1 => 
            array (
                'student_id' => 2,
                'user_idFK' => 34,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-08-30 15:01:26',
                'updated_at' => '2022-08-30 15:01:26',
                'created_by' => 34,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            2 => 
            array (
                'student_id' => 3,
                'user_idFK' => 39,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-08-30 15:57:26',
                'updated_at' => '2022-08-30 15:57:26',
                'created_by' => 39,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            3 => 
            array (
                'student_id' => 4,
                'user_idFK' => 40,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-08-30 16:18:37',
                'updated_at' => '2022-08-30 16:18:37',
                'created_by' => 40,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            4 => 
            array (
                'student_id' => 5,
                'user_idFK' => 41,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-08-30 16:22:30',
                'updated_at' => '2022-08-30 16:22:30',
                'created_by' => 41,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            5 => 
            array (
                'student_id' => 6,
                'user_idFK' => 42,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-08-30 16:24:51',
                'updated_at' => '2022-08-30 16:24:51',
                'created_by' => 42,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            6 => 
            array (
                'student_id' => 7,
                'user_idFK' => 43,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-08-30 16:26:23',
                'updated_at' => '2022-08-30 16:26:23',
                'created_by' => 43,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            7 => 
            array (
                'student_id' => 8,
                'user_idFK' => 44,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-08-30 16:50:14',
                'updated_at' => '2022-08-30 16:50:14',
                'created_by' => 44,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            8 => 
            array (
                'student_id' => 9,
                'user_idFK' => 45,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-08-30 16:52:06',
                'updated_at' => '2022-08-30 16:52:06',
                'created_by' => 45,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            9 => 
            array (
                'student_id' => 10,
                'user_idFK' => 46,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-08-30 17:02:05',
                'updated_at' => '2022-08-30 17:02:05',
                'created_by' => 46,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            10 => 
            array (
                'student_id' => 11,
                'user_idFK' => 47,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-08-30 17:03:51',
                'updated_at' => '2022-08-30 17:03:51',
                'created_by' => 47,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            11 => 
            array (
                'student_id' => 12,
                'user_idFK' => 48,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-08-31 10:58:17',
                'updated_at' => '2022-08-31 10:58:17',
                'created_by' => 48,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            12 => 
            array (
                'student_id' => 13,
                'user_idFK' => 49,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-08-31 11:27:38',
                'updated_at' => '2022-08-31 11:27:38',
                'created_by' => 49,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            13 => 
            array (
                'student_id' => 14,
                'user_idFK' => 50,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-08-31 11:43:52',
                'updated_at' => '2022-09-07 12:22:12',
                'created_by' => 50,
                'updated_by' => NULL,
                'course_level' => '2',
            ),
            14 => 
            array (
                'student_id' => 15,
                'user_idFK' => 51,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-09-09 15:29:06',
                'updated_at' => '2022-09-09 15:29:06',
                'created_by' => 51,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            15 => 
            array (
                'student_id' => 16,
                'user_idFK' => 52,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-09-09 15:31:51',
                'updated_at' => '2022-09-09 15:31:51',
                'created_by' => 52,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            16 => 
            array (
                'student_id' => 17,
                'user_idFK' => 53,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-09-09 15:34:45',
                'updated_at' => '2022-09-09 15:34:45',
                'created_by' => 53,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            17 => 
            array (
                'student_id' => 18,
                'user_idFK' => 54,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-09-09 15:42:04',
                'updated_at' => '2022-09-09 15:42:04',
                'created_by' => 54,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            18 => 
            array (
                'student_id' => 19,
                'user_idFK' => 55,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-09-09 15:43:44',
                'updated_at' => '2022-09-09 15:43:44',
                'created_by' => 55,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            19 => 
            array (
                'student_id' => 20,
                'user_idFK' => 56,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-09-09 15:49:00',
                'updated_at' => '2022-09-09 15:49:00',
                'created_by' => 56,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            20 => 
            array (
                'student_id' => 21,
                'user_idFK' => 57,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-09-09 15:51:02',
                'updated_at' => '2022-09-09 15:51:02',
                'created_by' => 57,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
            21 => 
            array (
                'student_id' => 22,
                'user_idFK' => 58,
                'is_active' => 0,
                'course_idFK' => NULL,
                'created_at' => '2022-09-09 16:16:23',
                'updated_at' => '2022-09-09 16:16:23',
                'created_by' => 58,
                'updated_by' => NULL,
                'course_level' => NULL,
            ),
        ));
        
        
    }
}