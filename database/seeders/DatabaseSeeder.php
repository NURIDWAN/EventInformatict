<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Settingweb;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\SettingwebSeeder;
use Database\Seeders\RolePermissionSeeder;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(SettingwebSeeder::class);
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $this->call(RolePermissionSeeder::class);
        $this->call(UserSeeder::class);
        Settingweb::create([
            'title' => 'judul',
            'sort_title' => 'judul',
            'footer_title' => 'footer',
            'logo' => 'logo',
            'count_down' => '27-7-2024',
            'link_maps'=> 'link',
            'htm' => 10000
        ]);
    }
}