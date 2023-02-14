<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::query()->truncate();
        DB::table('role_has_permissions')->truncate();
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'view-dashboard',
            'view-reports',
            'panahgah-list',
            'panahgah-create',
            'panahgah-edit',
            'panahgah-delete',
            'citizen-activities',
            'department-activities',
            'activity-log',
            'export-department-activities',
            'export-citizen-complaints',
            'usermanagement',
            'delete-activities'
         ];


         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }

         DB::statement('SET FOREIGN_KEY_CHECKS=1;');


    }
}
