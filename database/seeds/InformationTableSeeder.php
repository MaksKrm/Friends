<?php

use Illuminate\Database\Seeder;

class InformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $information = [];
        for ($i = 0; $i < 16; $i++) {
            $information[] = [
                'tittle' => $faker->sentence,
                'article' => $faker->paragraphs(5, true),
                'file' => $faker->imageUrl($width = 250, $height = 250),
                'created_at' => $faker->dateTime
            ];
        }
        DB::table('helpful_informations')->insert($information);
    }
}
