<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'category_id'  => \App\Category::all()->random()->id,
                'title'        => implode(' ', $faker->words(4)),
                'body'         => implode(' ', $faker->words(10)),
                'image'        => $faker->imageUrl(),
                'youtube_link' => 'https://www.youtube.com/channel/UCb9XEo_1SDNR8Ucpbktrg5A'
            ];

            \App\Post::create($data);
        }
    }
}
