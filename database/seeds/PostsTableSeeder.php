<?php

use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset posts table
        DB::table('posts')->truncate();

        // generate 10 dummy post
        $posts = [];
        $faker = Faker::create();
        
        for ($i=0; $i <= 10 ; $i++) { 
            $image = "post_image_" . rand(1, 5) . ".jpg";

            $posts[] = [
                'title' => $faker->sentence(rand(8, 12)),
                'body' => $faker->paragraphs(rand(10, 15), true),
                'slug' => $faker->slug(),
                'featured_img' => rand(0, 1) == 1 ? $image : NULL,
                'status' => 'active',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
