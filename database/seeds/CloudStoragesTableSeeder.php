<?php

use Illuminate\Database\Seeder;

class CloudStoragesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $links= [];
        for ($i = 0; $i < 12; $i++) {
            $links[] = [
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
                'message' => $faker->sentence,
                'file_name' => '13b73edae8443990be1aa8f1a483bc27.rar'
            ];
        }
        DB::table('cloud_storages')->insert( $links);
    }
}
