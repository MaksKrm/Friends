<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $news = [];
        for ($i = 0; $i < 10; $i++) {
            $news[] = [
                'title' => $faker->sentence,
                'text' => $faker->text,
                'file' => $faker->randomNumber . '.jpg'
            ];
        }
        DB::table('news')->insert($news);
    }
}
