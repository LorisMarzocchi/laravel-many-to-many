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
        //
        foreach(config('projects') as $project) {

            Project::create($project);
        }
    // }
    // public function run(Faker $faker)
    // {
    //     for ($i = 0; $i < 30; $i++)
    //     {
    //         Project::create([
    //             'title'       => $faker->words(rand(2, 3), true),
    //             'url_image'   =>'https://picsum.photos/id/'. rand(1, 270) . '/200/300',
    //             'description'     => $faker->paragraphs(rand(1, 1), true),
    //             'languages'     => $faker->words(rand(2, 2), true),
    //             'link_github'     => $faker->url(),

    //         ]);
    //     }
    }
}
