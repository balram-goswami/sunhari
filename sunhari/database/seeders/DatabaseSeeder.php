<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // $this->call(CountriesTableSeeder::class);
		//$this->call(StatesTableSeeder::class);
	//	$this->call(CitiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
         
