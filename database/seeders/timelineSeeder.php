<?php

namespace Database\Seeders;

use App\Models\Timeline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class timelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Timeline::create([
            'start_time' => '18:00',
            'end_time' => '19:00',
            'name' => 'berangkat',
            'description' => 'kumpul'
        ]);
    }
}