<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('provinces')->delete();
        
        \DB::table('provinces')->insert(array (
            0 => 
            array (
                'province_id' => 2,
                'province_name' => 'Azad Jammu and Kashmir',
                'lat' => '33.948891',
                'lng' => '74.329613',
                'province_color_code' => '#e0723d',
                'province_points' => NULL,
                'sms_percentage' => 1.95,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'province_id' => 3,
                'province_name' => 'Gilgit-Baltistan',
                'lat' => '35.802567',
                'lng' => '74.983185',
                'province_color_code' => '#a85e00',
                'province_points' => NULL,
                'sms_percentage' => 0.56,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'province_id' => 4,
                'province_name' => 'Islamabad',
                'lat' => '33.684422',
                'lng' => '73.047882',
                'province_color_code' => '#a15e00',
                'province_points' => NULL,
                'sms_percentage' => 0.97,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'province_id' => 6,
                'province_name' => 'Punjab',
                'lat' => '31.147129',
                'lng' => '75.341217',
                'province_color_code' => '#00a800',
                'province_points' => NULL,
                'sms_percentage' => 51.17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'province_id' => 7,
                'province_name' => 'KPK',
                'lat' => '34.486870',
                'lng' => '72.089493',
                'province_color_code' => '#ac6500',
                'province_points' => NULL,
                'sms_percentage' => 17.09,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'province_id' => 8,
                'province_name' => 'Sindh',
                'lat' => '25.894302',
                'lng' => '68.524712',
                'province_color_code' => '#b01d96',
                'province_points' => NULL,
                'sms_percentage' => 22.32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'province_id' => 9,
                'province_name' => 'Balochistan',
                'lat' => '28.480330',
                'lng' => '65.563744',
                'province_color_code' => '#5bb4c0',
                'province_points' => NULL,
                'sms_percentage' => 5.9399999999999995,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}