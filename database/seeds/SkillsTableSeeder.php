<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('skills')->delete();
        Question::create(['id'=>1, 'desc' => 'Asistiría a una conferencia profesional sobre:']);
    }
}
