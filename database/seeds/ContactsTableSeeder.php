<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $contacts = [];
        for ($i = 0; $i < 8; $i++) {
            $contacts[] = [
                'name' => $faker->firstName,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber
            ];
        }
        DB::table('contacts')->insert($contacts);
    }
}
