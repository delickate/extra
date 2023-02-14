<?php

use App\Designation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Designation::query()->truncate();
        $designations = [
            'Director',
            'Secretory',
            'Focal',
            'Data entry'
         ];




         foreach ($designations as $designation) {
              Designation::create(['name' => $designation]);
         }


    }
}
