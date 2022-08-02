<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
    	for($i = 1; $i <= 8; $i++){
            Blog::create([
                'title' => $faker->sentence($nbWords = 8, $variableNbWords = true),
                'slug' => "kegiatan",
                'user_id' => 1,
                'category_id' => 1,
                'tag_detail_id' => 1,
                'content' => $faker->text,
                'image' => $faker->image
            ]);
    	}
    }
}
