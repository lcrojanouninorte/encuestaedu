<?php

use Illuminate\Database\Seeder;
Use App\Preparationlevel;
class PreparationlevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('preparationlevels')->delete();
Preparationlevel::create(['id'=>1, 'desc' => 'Nivel de Preparación A']);
Preparationlevel::create(['id'=>2, 'desc' => 'Nivel de Preparación B']);
Preparationlevel::create(['id'=>3, 'desc' => 'Nivel de Preparación C']);
Preparationlevel::create(['id'=>4, 'desc' => 'Nivel de Preparación D']);
    }
}
