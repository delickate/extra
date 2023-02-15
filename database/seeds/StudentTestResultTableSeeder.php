<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentTestResultTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('student_test_result')->delete();
        
        \DB::table('student_test_result')->insert(array (
            0 => 
            array (
                'test_result_id' => 1,
                'user_idFK' => 50,
                'test_idFK' => NULL,
                'scour' => 50,
                'created_at' => '2022-09-09 15:17:40',
                'updated_at' => '2022-09-09 15:19:18',
                'created_by' => 50,
                'updated_by' => NULL,
                'type_of_assessment' => 'pre',
                'topic_idFK' => 4,
                'course_idFK' => NULL,
                'activity_idFK' => NULL,
                'result_level_id' => 2,
                'is_latest' => 0,
            ),
            1 => 
            array (
                'test_result_id' => 2,
                'user_idFK' => 50,
                'test_idFK' => NULL,
                'scour' => 17,
                'created_at' => '2022-09-09 15:17:58',
                'updated_at' => '2022-09-09 15:19:18',
                'created_by' => 50,
                'updated_by' => NULL,
                'type_of_assessment' => 'post',
                'topic_idFK' => 4,
                'course_idFK' => NULL,
                'activity_idFK' => NULL,
                'result_level_id' => 1,
                'is_latest' => 0,
            ),
            2 => 
            array (
                'test_result_id' => 3,
                'user_idFK' => 50,
                'test_idFK' => NULL,
                'scour' => 50,
                'created_at' => '2022-09-09 15:18:11',
                'updated_at' => '2022-09-09 15:19:18',
                'created_by' => 50,
                'updated_by' => NULL,
                'type_of_assessment' => 'pre',
                'topic_idFK' => 4,
                'course_idFK' => NULL,
                'activity_idFK' => NULL,
                'result_level_id' => 2,
                'is_latest' => 0,
            ),
            3 => 
            array (
                'test_result_id' => 4,
                'user_idFK' => 50,
                'test_idFK' => NULL,
                'scour' => 50,
                'created_at' => '2022-09-09 15:19:09',
                'updated_at' => '2022-09-09 15:19:18',
                'created_by' => 50,
                'updated_by' => NULL,
                'type_of_assessment' => 'post',
                'topic_idFK' => 4,
                'course_idFK' => NULL,
                'activity_idFK' => NULL,
                'result_level_id' => 2,
                'is_latest' => 0,
            ),
            4 => 
            array (
                'test_result_id' => 5,
                'user_idFK' => 50,
                'test_idFK' => NULL,
                'scour' => 0,
                'created_at' => '2022-09-09 15:19:18',
                'updated_at' => '2022-09-09 15:19:18',
                'created_by' => 50,
                'updated_by' => NULL,
                'type_of_assessment' => 'post',
                'topic_idFK' => 4,
                'course_idFK' => NULL,
                'activity_idFK' => NULL,
                'result_level_id' => 1,
                'is_latest' => 1,
            ),
            5 => 
            array (
                'test_result_id' => 6,
                'user_idFK' => 58,
                'test_idFK' => NULL,
                'scour' => 40,
                'created_at' => '2022-09-09 16:17:10',
                'updated_at' => '2022-09-09 16:18:13',
                'created_by' => 58,
                'updated_by' => NULL,
                'type_of_assessment' => 'pre',
                'topic_idFK' => 1,
                'course_idFK' => NULL,
                'activity_idFK' => NULL,
                'result_level_id' => 2,
                'is_latest' => 0,
            ),
            6 => 
            array (
                'test_result_id' => 7,
                'user_idFK' => 58,
                'test_idFK' => NULL,
                'scour' => 17,
                'created_at' => '2022-09-09 16:17:47',
                'updated_at' => '2022-09-09 16:18:13',
                'created_by' => 58,
                'updated_by' => NULL,
                'type_of_assessment' => 'post',
                'topic_idFK' => 1,
                'course_idFK' => NULL,
                'activity_idFK' => NULL,
                'result_level_id' => 1,
                'is_latest' => 0,
            ),
            7 => 
            array (
                'test_result_id' => 8,
                'user_idFK' => 58,
                'test_idFK' => NULL,
                'scour' => 17,
                'created_at' => '2022-09-09 16:18:13',
                'updated_at' => '2022-09-09 16:18:13',
                'created_by' => 58,
                'updated_by' => NULL,
                'type_of_assessment' => 'post',
                'topic_idFK' => 1,
                'course_idFK' => NULL,
                'activity_idFK' => NULL,
                'result_level_id' => 1,
                'is_latest' => 1,
            ),
            8 => 
            array (
                'test_result_id' => 9,
                'user_idFK' => 58,
                'test_idFK' => NULL,
                'scour' => 33,
                'created_at' => '2022-09-09 16:19:08',
                'updated_at' => '2022-09-09 16:19:40',
                'created_by' => 58,
                'updated_by' => NULL,
                'type_of_assessment' => 'pre',
                'topic_idFK' => 2,
                'course_idFK' => NULL,
                'activity_idFK' => NULL,
                'result_level_id' => 2,
                'is_latest' => 0,
            ),
            9 => 
            array (
                'test_result_id' => 10,
                'user_idFK' => 58,
                'test_idFK' => NULL,
                'scour' => 0,
                'created_at' => '2022-09-09 16:19:40',
                'updated_at' => '2022-09-09 16:19:40',
                'created_by' => 58,
                'updated_by' => NULL,
                'type_of_assessment' => 'post',
                'topic_idFK' => 2,
                'course_idFK' => NULL,
                'activity_idFK' => NULL,
                'result_level_id' => 1,
                'is_latest' => 1,
            ),
            10 => 
            array (
                'test_result_id' => 11,
                'user_idFK' => 50,
                'test_idFK' => NULL,
                'scour' => 33,
                'created_at' => '2023-01-27 12:23:17',
                'updated_at' => '2023-01-27 12:23:17',
                'created_by' => 50,
                'updated_by' => NULL,
                'type_of_assessment' => 'pre',
                'topic_idFK' => 3,
                'course_idFK' => NULL,
                'activity_idFK' => NULL,
                'result_level_id' => 2,
                'is_latest' => 1,
            ),
            11 => 
            array (
                'test_result_id' => 12,
                'user_idFK' => 50,
                'test_idFK' => NULL,
                'scour' => 50,
                'created_at' => '2023-02-15 10:24:03',
                'updated_at' => '2023-02-15 10:24:03',
                'created_by' => 50,
                'updated_by' => NULL,
                'type_of_assessment' => 'pre',
                'topic_idFK' => 5,
                'course_idFK' => NULL,
                'activity_idFK' => NULL,
                'result_level_id' => 2,
                'is_latest' => 1,
            ),
            12 => 
            array (
                'test_result_id' => 13,
                'user_idFK' => 50,
                'test_idFK' => NULL,
                'scour' => 33,
                'created_at' => '2023-02-15 15:14:08',
                'updated_at' => '2023-02-15 15:14:08',
                'created_by' => 50,
                'updated_by' => NULL,
                'type_of_assessment' => 'pre',
                'topic_idFK' => 6,
                'course_idFK' => NULL,
                'activity_idFK' => NULL,
                'result_level_id' => 2,
                'is_latest' => 1,
            ),
        ));
        
        
    }
}