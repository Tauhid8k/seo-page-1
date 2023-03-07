<?php

namespace Database\Seeders;

use App\Models\ProjectStatusType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectStatusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project_status_type = new ProjectStatusType;
        $project_status_type->name = 'incomplete';
        $project_status_type->save();
    }
}
