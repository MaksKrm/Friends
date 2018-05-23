<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(AnimalsTableSeeder::class);
        $this->call(InformationTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(ConstantsTableSeeder::class);
    }
}
