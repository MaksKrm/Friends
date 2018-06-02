<?php

use Illuminate\Database\Seeder;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $goods = [];
        for ($i = 0; $i < 10; $i++) {
            $goods[] = [
                'title' => $faker->word,
                'description' => $faker->sentence,
                'photo' => $faker->imageUrl(300,  300, 'cats'),
                'created_at' => $faker->dateTime
            ];
        }
        DB::table('goods')->insert($goods);
    }
}
