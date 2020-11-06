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
        $this->call(QuestionsTableSeeder::class);
	    $this->call(OptionsTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(PreparationlevelsTableSeeder::class);
        
    }
}
