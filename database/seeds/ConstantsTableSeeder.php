<?php

use Illuminate\Database\Seeder;

class ConstantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $constants = [];
        for ($i = 0; $i < 8; $i++) {
            $constants[] = [
                'help' => $faker->word,
                'contact' => $faker->phoneNumber,
                'message' => $faker->sentence
            ];
        }
        DB::table('constants')->insert($constants);
    }
}
