<?php

namespace Database\Seeders;

use App\Models\Project;
// use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('projects') as $projectData) {


            $technologies = $projectData['technologies'];
            unset($projectData['technologies']);


            $slug = Project::slugger($projectData['title']);
            $projectData['slug'] = $slug;

            $project = Project::create($projectData);
            $project->technologies()->sync($technologies);
            // $project->technologies()->sync($projectData['technologies']);
        }

    }

}

