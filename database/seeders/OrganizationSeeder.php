<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function(){
            $organization = Organization::factory()->create();

            $users = User::factory()->count(20)->create([
                'organization_id' => $organization->id,
            ]);

            $owners = $users->random(3);

            foreach ($owners as $owner) {
                $projects = Project::factory()->count(rand(1, 3))->create([
                    'owner_id' => $owner->id,
                    'organization_id' => $organization->id,
                ]);

                foreach ($projects as $project) {
                    Task::factory()->count(rand(1, 5))->create([
                        'project_id' => $project->id,
                        'assignee_id' => $users->except($owners->pluck('id')->toArray())->random()->id,
                    ]);
                }
            }
        });

    }
}
