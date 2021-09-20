<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'add','guard_name' => 'api']);
        Permission::create(['name' => 'edit','guard_name' => 'api']);
        Permission::create(['name' => 'delete','guard_name' => 'api']);

        $role = Role::create(['name' => 'User', 'guard_name' => 'api']);
        $role->givePermissionTo('edit');
       
        $role = Role::create(['name' => 'Admin', 'guard_name' => 'api']);
        $role->givePermissionTo(Permission::all());

        $user = User::create([
            'name' => 'Engr Lagahit',
            'email' => 'lagahit@gmail.com',
            'password' => bcrypt('Default123')
        ]);

        $user->assignRole('Admin');
    }
}
