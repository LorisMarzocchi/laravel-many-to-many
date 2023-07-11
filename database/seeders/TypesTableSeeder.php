<?php

namespace Database\Seeders;
use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = [
            [
                'name'          => 'Front-end',
                'description'   => $faker->paragraphs(rand(1, 2), true),
            ],
            [
                'name'          => 'Back-end',
                'description'   => $faker->paragraphs(rand(1, 2), true),
            ],
            [
                'name'          => 'Full-stack',
                'description'   => $faker->paragraphs(rand(1, 2), true),
            ],
        ];
        foreach ($categories as $category) {
            Type::create($category);
        }

    }
}
