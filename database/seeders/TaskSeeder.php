<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Task::create([
            'user_id' => 1,  // user
            'title' => 'Task 1',
            'description' => 'This is task 1',
            'status' => 'Pending',
            'due_date' => now()->addDays(7),
        ]);
    }
}
