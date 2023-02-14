<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // $superAdmin = Role::create(['name' => 'super-admin']);
        // $user = User::create([
        //     'name' => 'Super Admin',
        //     'password' => Hash::make('123456'),
        //     'email' => 'superadmin@example.com',
        //     'username' => 'super-admin'
        // ]);
        // $user->assignRole($superAdmin);

        // $admin = Role::create(['name' => 'admin']);
        // $user = User::create([
        //     'name' => 'admin',
        //     'password' => Hash::make('123456'),
        //     'email' => 'admin@panagah.com',
        //     'username' => 'admin',
        //     'district_id' => 22
        // ]);
        // $user->assignRole($admin);

        // $user = User::create([
        //     'name' => 'qa',
        //     'password' => Hash::make('123456'),
        //     'email' => 'qa@panagah.com',
        //     'username' => 'qa',
        //     'district_id' => 22
        // ]);
        // $user->assignRole($admin);

        $guest = Role::create(['name' => 'guest']);
    }
}
