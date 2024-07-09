<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
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
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}