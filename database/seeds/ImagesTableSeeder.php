<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $images = [];
        for ($i = 0; $i < 60; $i++) {
            $images[] = [
                'name' => $faker->imageUrl(300,  300, 'cats'),
                'animal_id' => $faker->numberBetween(1, 20),
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime
            ];
        }
        DB::table('images')->insert($images);
    }
}
