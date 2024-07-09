<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Sabberworm\CSS\Settings;

class SettingwebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Settings::create([
            'title' => 'judul',
            'sort_title' => 'judul',
            'footer_title' => 'footer',
            'logo' => 'logo',
            'count_down' => '27/7/2024',
            'link_maps'=> 'link',
            'htm' => 10000
        ]);
    }
}