<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RegisteredTeachersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('registered_teachers')->delete();
        
        \DB::table('registered_teachers')->insert(array (
            0 => 
            array (
                'teacher_id' => 1,
                'user_idFK' => 39,
                'teacher_name' => 'dfasdfd',
                'is_active' => 0,
                'subject_idFK' => 1,
                'created_at' => '2022-08-30 15:57:26',
                'updated_at' => '2022-08-30 15:57:26',
                'created_by' => 39,
                'updated_by' => NULL,
            ),
            1 => 
            array (
                'teacher_id' => 2,
                'user_idFK' => 49,
                'teacher_name' => 'Germane Holcomb',
                'is_active' => 0,
                'subject_idFK' => 3,
                'created_at' => '2022-08-30 16:22:30',
                'updated_at' => '2022-08-30 16:22:30',
                'created_by' => 49,
                'updated_by' => NULL,
            ),
        ));
        
        
    }
}