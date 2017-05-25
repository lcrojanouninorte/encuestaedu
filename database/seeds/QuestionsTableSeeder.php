<?php

use Illuminate\Database\Seeder;
Use App\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('questions')->delete();
     

Question::create(['id'=>1, 'desc' => 'Asistiría a una conferencia profesional sobre:']);
Question::create(['id'=>2, 'desc' => 'De tener que hacer un trabajo en clase elegiría: ']);
Question::create(['id'=>3, 'desc' => 'De integrarme en un grupo, preferiría uno de aficionados a: ']);
Question::create(['id'=>4, 'desc' => 'En una central eléctrica preferiría: ']);
Question::create(['id'=>5, 'desc' => 'De comprarme una valiosa enciclopedia, la elegiría: ']);
Question::create(['id'=>6, 'desc' => 'Si tuviese que abrir un negocio vendería: ']);
Question::create(['id'=>7, 'desc' => 'En un hospital preferiría: ']);
Question::create(['id'=>8, 'desc' => 'Prefiero leer un libro: ']);
Question::create(['id'=>9, 'desc' => 'Me gustaría leer una bibliografía sobre:']);
Question::create(['id'=>10, 'desc' => 'Preferiría Ser:']);
Question::create(['id'=>11, 'desc' => 'En una Universidad preferiría: ']);
Question::create(['id'=>12, 'desc' => 'En una editorial de libros preferiría: ']);
Question::create(['id'=>13, 'desc' => 'Ante una carrera automovilística preferiría: ']);
Question::create(['id'=>14, 'desc' => 'En un viaje a un país extranjero preferiría:']);
Question::create(['id'=>15, 'desc' => 'Prefiero: ']);
Question::create(['id'=>16, 'desc' => 'De publicar algo, preferirá: ']);
Question::create(['id'=>17, 'desc' => 'Prefiero:']);
Question::create(['id'=>18, 'desc' => 'En un periódico:']);
Question::create(['id'=>19, 'desc' => 'Prefiero: ']);
Question::create(['id'=>20, 'desc' => 'Prefiero:']);
Question::create(['id'=>21, 'desc' => 'En los estudios de Televisión preferiría: ']);
Question::create(['id'=>22, 'desc' => 'En un almacén grande prefiero:']);
Question::create(['id'=>23, 'desc' => 'Prefiero:']);
Question::create(['id'=>24, 'desc' => 'Prefiero oír hablar en un debate televisivo, sobre: ']);
Question::create(['id'=>25, 'desc' => 'Prefiero:']);
Question::create(['id'=>26, 'desc' => 'En una academia militar preferiría: ']);
Question::create(['id'=>27, 'desc' => 'Prefiero:']);
Question::create(['id'=>28, 'desc' => 'Prefiero organizar una biblioteca de: ']);
Question::create(['id'=>29, 'desc' => 'En un almacén grande preferiría: ']);
Question::create(['id'=>30, 'desc' => 'Me gustaría ser un: ']);
Question::create(['id'=>31, 'desc' => 'En una finca agrícola-ganadera preferiría.']);
Question::create(['id'=>32, 'desc' => 'De publicar algo, preferiría: ']);
Question::create(['id'=>33, 'desc' => 'En un aeropuerto preferiría encargarme de:']);
Question::create(['id'=>34, 'desc' => 'Prefiero visitar una exposición de: ']);
Question::create(['id'=>35, 'desc' => 'En una alcaldía importante preferiría: ']);
Question::create(['id'=>36, 'desc' => 'De integrarme en un grupo, preferiría: ']);
Question::create(['id'=>37, 'desc' => '¿Qué regalo aceptaría con más agrado? (Suponiendo que no tengo ninguno) ']);
Question::create(['id'=>38, 'desc' => 'Prefiero:']);
Question::create(['id'=>39, 'desc' => 'En la organización de un evento deportivo-científico preferiría: ']);
Question::create(['id'=>40, 'desc' => 'En una fábrica de automóviles preferiría: ']);
Question::create(['id'=>41, 'desc' => 'En una empresa de televisión preferiría: ']);
Question::create(['id'=>42, 'desc' => 'En una empresa de seguros de vida y automóviles prefería: ']);
Question::create(['id'=>43, 'desc' => 'Prefiero participar de un curso sobre: ']);
Question::create(['id'=>44, 'desc' => 'Prefiero:']);
Question::create(['id'=>45, 'desc' => 'En la construcción de una autopista preferiría: ']);
Question::create(['id'=>46, 'desc' => 'En un instituto de enseñanza preferiría: ']);
Question::create(['id'=>47, 'desc' => 'Compraría un libro de: ']);
Question::create(['id'=>48, 'desc' => 'En una tesis doctoral  preferiría replantear: ']);
Question::create(['id'=>49, 'desc' => 'Si tengo que quedarme en casa en una tarde lluviosa, preferiría: ']);
Question::create(['id'=>50, 'desc' => 'Prefiero: ']);
Question::create(['id'=>51, 'desc' => 'Por afinidad de gustos cultivaría la amistad con un aficionado: ']);
Question::create(['id'=>52, 'desc' => 'Prefiero:']);
    }
}
