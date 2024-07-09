<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superuser = User::create([
            'name' => 'admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $role = Role::create(['name' => 'SuperAdmin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $superuser->assignRole([$role->id]);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $roleadmin = Role::create(['name' => 'Admin']);

        $permissionsadmin = [
            'manage-list',
            'manage-create',
            'manage-edit',
            'manage-delete',
            'timeline-list',
            'timeline-create',
            'timeline-edit',
            'timeline-delete',
            'documentation-list',
            'documentation-create',
            'documentation-edit',
            'documentation-delete'
        ];

        $roleadmin->syncPermissions($permissionsadmin);

        $admin->assignRole([$roleadmin->id]);

        $roleadmin = Role::create(['name' => 'User']);
    }
}