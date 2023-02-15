<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DivisionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('division')->delete();
        
        \DB::table('division')->insert(array (
            0 => 
            array (
                'id' => 1,
                'division_cde' => 1,
                'circle_id' => 1,
                'name' => 'Burala',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:48',
            ),
            1 => 
            array (
                'id' => 2,
                'division_cde' => 101,
                'circle_id' => 4,
                'name' => 'Shahdra',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'division_cde' => 11,
                'circle_id' => 3,
                'name' => 'Chakbandi',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'division_cde' => 12,
                'circle_id' => 3,
                'name' => 'Gujranwala',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'division_cde' => 14,
                'circle_id' => NULL,
                'name' => 'Khanwah',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'division_cde' => 15,
                'circle_id' => 3,
                'name' => 'Marala',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'division_cde' => 16,
                'circle_id' => 4,
                'name' => 'Pasrur Link',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'division_cde' => 17,
                'circle_id' => 3,
                'name' => 'Sheikhupura',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:48',
            ),
            8 => 
            array (
                'id' => 9,
                'division_cde' => 18,
                'circle_id' => NULL,
                'name' => 'Bhakkar',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'division_cde' => 19,
                'circle_id' => 6,
                'name' => 'Kalabagh',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:48',
            ),
            10 => 
            array (
                'id' => 11,
                'division_cde' => 2,
                'circle_id' => 4,
                'name' => 'Khanki',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:48',
            ),
            11 => 
            array (
                'id' => 12,
                'division_cde' => 20,
                'circle_id' => 7,
                'name' => 'Kirana',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            12 => 
            array (
                'id' => 13,
                'division_cde' => 21,
                'circle_id' => 6,
                'name' => 'Layyah',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:48',
            ),
            13 => 
            array (
                'id' => 14,
                'division_cde' => 22,
                'circle_id' => 8,
                'name' => 'Gujrat Division UJC',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            14 => 
            array (
                'id' => 15,
                'division_cde' => 23,
                'circle_id' => 7,
                'name' => 'Rasul Division LJC',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            15 => 
            array (
                'id' => 16,
                'division_cde' => 24,
                'circle_id' => 7,
                'name' => 'Sargodha',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            16 => 
            array (
                'id' => 17,
                'division_cde' => 25,
                'circle_id' => 7,
                'name' => 'Shahpur ',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            17 => 
            array (
                'id' => 18,
                'division_cde' => 26,
                'circle_id' => 6,
                'name' => 'Khushab',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:48',
            ),
            18 => 
            array (
                'id' => 19,
                'division_cde' => 28,
                'circle_id' => 9,
                'name' => 'Multan',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            19 => 
            array (
                'id' => 20,
                'division_cde' => 29,
                'circle_id' => 9,
                'name' => 'Shujabad',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            20 => 
            array (
                'id' => 21,
                'division_cde' => 3,
                'circle_id' => 5,
                'name' => 'Lower Gugera',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:48',
            ),
            21 => 
            array (
                'id' => 22,
                'division_cde' => 32,
                'circle_id' => 16,
                'name' => 'Balloki',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:50',
            ),
            22 => 
            array (
                'id' => 23,
                'division_cde' => 33,
                'circle_id' => 16,
                'name' => 'Okara',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:50',
            ),
            23 => 
            array (
                'id' => 24,
                'division_cde' => 34,
                'circle_id' => 16,
                'name' => 'Sahiwal',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:50',
            ),
            24 => 
            array (
                'id' => 25,
                'division_cde' => 35,
                'circle_id' => 16,
                'name' => 'Khanewal',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:50',
            ),
            25 => 
            array (
                'id' => 26,
                'division_cde' => 38,
                'circle_id' => 10,
                'name' => 'Eastern Bar',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            26 => 
            array (
                'id' => 27,
                'division_cde' => 39,
                'circle_id' => 10,
                'name' => 'Western Bar',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            27 => 
            array (
                'id' => 28,
                'division_cde' => 4,
                'circle_id' => 3,
                'name' => 'Upper Gugera',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:48',
            ),
            28 => 
            array (
                'id' => 29,
                'division_cde' => 42,
                'circle_id' => 16,
                'name' => 'Kotadu',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            29 => 
            array (
                'id' => 30,
                'division_cde' => 43,
                'circle_id' => 16,
                'name' => 'Muzaffargarh',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            30 => 
            array (
                'id' => 31,
                'division_cde' => 44,
                'circle_id' => 12,
                'name' => 'D G Khan',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            31 => 
            array (
                'id' => 32,
                'division_cde' => 45,
                'circle_id' => 12,
                'name' => 'Rajanpur',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            32 => 
            array (
                'id' => 33,
                'division_cde' => 47,
                'circle_id' => 14,
                'name' => 'Sadiqia',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            33 => 
            array (
                'id' => 34,
                'division_cde' => 48,
                'circle_id' => 14,
                'name' => 'Fordwah',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            34 => 
            array (
                'id' => 35,
                'division_cde' => 49,
                'circle_id' => 14,
                'name' => 'Hakra',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            35 => 
            array (
                'id' => 36,
                'division_cde' => 5,
                'circle_id' => 5,
                'name' => 'FSD Canal',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:48',
            ),
            36 => 
            array (
                'id' => 37,
                'division_cde' => 51,
                'circle_id' => 13,
                'name' => 'Ahmedpur',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            37 => 
            array (
                'id' => 38,
                'division_cde' => 52,
                'circle_id' => 13,
                'name' => 'Bahawalpur',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            38 => 
            array (
                'id' => 39,
                'division_cde' => 54,
                'circle_id' => 15,
                'name' => 'Rahimyar Khan',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:50',
            ),
            39 => 
            array (
                'id' => 40,
                'division_cde' => 55,
                'circle_id' => 15,
                'name' => 'Dallas',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:50',
            ),
            40 => 
            array (
                'id' => 41,
                'division_cde' => 56,
                'circle_id' => 12,
                'name' => 'CRBC',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            41 => 
            array (
                'id' => 42,
                'division_cde' => 6,
                'circle_id' => 3,
                'name' => 'Hafizabad',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:48',
            ),
            42 => 
            array (
                'id' => 43,
                'division_cde' => 7,
                'circle_id' => 9,
                'name' => 'Jhang',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
            43 => 
            array (
                'id' => 44,
                'division_cde' => 9,
                'circle_id' => 6,
                'name' => 'Lahore',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:48',
            ),
            44 => 
            array (
                'id' => 45,
                'division_cde' => 97,
                'circle_id' => 6,
                'name' => 'Mianwali',
                'created_at' => NULL,
                'updated_at' => '2022-05-17 12:04:49',
            ),
        ));
        
        
    }
}