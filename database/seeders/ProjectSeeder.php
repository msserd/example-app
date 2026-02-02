<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if ( ! empty(DB::table('projects')->count())) {
            return;
        }

        DB::table('projects')->insert([
            [
                'title' => 'Тестовый проект 1', 
                'owner_id' => 1, 
                'is_active' => true, 
                'created_at' => DB::raw('NOW()'), 
                'assignee_id' => 1, 
                'deadline_date' => '2026-02-15'
            ],
            [
                'title' => 'Тестовый проект 2', 
                'owner_id' => 1, 
                'is_active' => false, 
                'created_at' => DB::raw('NOW()'), 
                'assignee_id' => 1, 
                'deadline_date' => '2026-02-23'
            ],
        ]);
    }
}
