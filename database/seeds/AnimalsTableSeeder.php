<?php

use Illuminate\Database\Seeder;

class AnimalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $animals = [];
        for ($i = 0; $i < 20; $i++) {
            $animals[] = [
                'name' => $faker->firstName,
                'species' => $faker->randomElement($array = array (1, 2)),
                'breed' => $faker->lastName,
                'sex' => $faker->randomElement($array = array (1, 2)),
                'age' => $faker->randomNumber(2),
                'notes' => $faker->sentence,
                'contacts' => $faker->phoneNumber,
                'main_foto' => $faker->imageUrl(500, 500, 'cats'),
                'other_foto' => $faker->randomNumber . '.jpg',
                'published' => 1,
            ];
        }
        DB::table('animals')->insert($animals);
    }
}
