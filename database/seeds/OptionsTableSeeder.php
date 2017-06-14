<?php

use Illuminate\Database\Seeder;
Use App\Option;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('options')->delete();
Option::create(['id'=>1, 'question_id' => 1, 'desc' => 'A.	Influencia de la Sociedad sobre los grupos marginados .', 'area' =>2]);
Option::create(['id'=>2, 'question_id' => 1, 'desc' => 'B.	Influencia de la música rock en la vida moderna.', 'area' =>5]);
Option::create(['id'=>3, 'question_id' => 1, 'desc' => 'C.	Como dirigir y organizar el personal de una empresa.', 'area' =>8]);
Option::create(['id'=>4, 'question_id' => 1, 'desc' => 'D.	Sistemas de tratamiento médico de heroinómanos.', 'area' =>11]);

Option::create(['id'=>5, 'question_id' => 2, 'desc' => 'E.	Estado Actual de la ciencia colombiana.', 'area' =>1]);
Option::create(['id'=>6, 'question_id' => 2, 'desc' => 'F.	Los orígenes de la música moderna.', 'area' =>5]);
Option::create(['id'=>7, 'question_id' => 2, 'desc' => 'G.	Los orígenes y causas de la Segunda Guerra Mundial.', 'area' =>6]);

Option::create(['id'=>8, 'question_id' => 2, 'desc' => 'H.	Literatura Colombiana en la actualidad.', 'area' =>7]);
Option::create(['id'=>9, 'question_id' => 3, 'desc' => 'J.	La electro-mecánica.', 'area' =>3]);
Option::create(['id'=>10, 'question_id' => 3, 'desc' => 'K.	La música.', 'area' =>5]);
Option::create(['id'=>11, 'question_id' => 3, 'desc' => 'L.	Los computadores.', 'area' =>9]);
Option::create(['id'=>12, 'question_id' => 3, 'desc' => 'M.	Temas políticos, religiosos o filosóficos .', 'area' =>12]);

Option::create(['id'=>13, 'question_id' => 4, 'desc' => 'N.	Investigar sobre conductores o campos magnéticos.', 'area' =>1]);
Option::create(['id'=>14, 'question_id' => 4, 'desc' => 'O.	Realizar un estudio sociológico de las necesidades de energía eléctrica.', 'area' =>2]);
Option::create(['id'=>15, 'question_id' => 4, 'desc' => 'P.	Dirigir la construcción de las redes de distribución de electricidad.', 'area' =>3]);
Option::create(['id'=>16, 'question_id' => 4, 'desc' => 'R.	Dibujar esas mismas redes, diseñándolas sobre el papel.', 'area' =>4]);

Option::create(['id'=>17, 'question_id' => 5, 'desc' => 'S.	Sobre progresos tecnológicos de la humanidad.', 'area' =>2]);
Option::create(['id'=>18, 'question_id' => 5, 'desc' => 'T.	Sobre historia de mi país o del mundo.', 'area' =>3]);
Option::create(['id'=>19, 'question_id' => 5, 'desc' => 'V.	Sobre educación de niños o jóvenes.', 'area' =>10]);
Option::create(['id'=>20, 'question_id' => 5, 'desc' => 'X.	Sobre el cuerpo humano y como prevenir las enfermedades.', 'area' =>11]);

Option::create(['id'=>21, 'question_id' => 6, 'desc' => 'Y.	Todo para dibujantes.', 'area' =>4]);
Option::create(['id'=>22, 'question_id' => 6, 'desc' => 'Z.	Libros.', 'area' =>7]);
Option::create(['id'=>23, 'question_id' => 6, 'desc' => 'A.	Programas para computadores.', 'area' =>9]);
Option::create(['id'=>24, 'question_id' => 6, 'desc' => 'B.	Medicamentos.', 'area' =>11]);

Option::create(['id'=>25, 'question_id' => 7, 'desc' => 'C.	Investigar en un laboratorio sobre las causas de una enfermedad.', 'area' =>1]);
Option::create(['id'=>26, 'question_id' => 7, 'desc' => 'D.	Dirigir la administración.', 'area' =>8]);
Option::create(['id'=>27, 'question_id' => 7, 'desc' => 'E.	Mejorar los programas informáticos para alguna investigación.', 'area' =>9]);
Option::create(['id'=>28, 'question_id' => 7, 'desc' => 'F.	Dar consejos a los pacientes para que prevengan las enfermedades.', 'area' =>10]);

Option::create(['id'=>29, 'question_id' => 8, 'desc' => 'G.	De la psicología de las personas.', 'area' =>2]);
Option::create(['id'=>30, 'question_id' => 8, 'desc' => 'H.	De la historia de las diversas civilizaciones.', 'area' =>6]);
Option::create(['id'=>31, 'question_id' => 8, 'desc' => 'J.	De aplicaciones de computadores.', 'area' =>9]);
Option::create(['id'=>32, 'question_id' => 8, 'desc' => 'K.	De estrategia y tácticas de guerra.', 'area' =>13]);

Option::create(['id'=>33, 'question_id' => 9, 'desc' => 'L.	Un gran pintor.', 'area' =>4]);
Option::create(['id'=>34, 'question_id' => 9, 'desc' => 'M.	Un gran músico.', 'area' =>5]);
Option::create(['id'=>35, 'question_id' => 9, 'desc' => 'N.	Un gran pedagogo .', 'area' =>10]);
Option::create(['id'=>36, 'question_id' => 9, 'desc' => 'O.	Un conductor experto.', 'area' =>13]);

Option::create(['id'=>37, 'question_id' => 10, 'desc' => 'P.	Experto en biología genética.', 'area' =>1]);
Option::create(['id'=>38, 'question_id' => 10, 'desc' => 'R.	Experto en sanidad ambiental.', 'area' =>11]);
Option::create(['id'=>39, 'question_id' => 10, 'desc' => 'S.	Experto en leyes sociales o laborales.', 'area' =>12]);
Option::create(['id'=>40, 'question_id' => 10, 'desc' => 'T.	Experto desactivando explosivos o manipulando sustancias peligrosas.', 'area' =>13]);

Option::create(['id'=>41, 'question_id' => 11, 'desc' => 'V.	Investigar sobre el comportamiento del hombre en grupo.', 'area' =>2]);
Option::create(['id'=>42, 'question_id' => 11, 'desc' => 'X.	Ser catedrático  de literatura o lengua.', 'area' =>7]);
Option::create(['id'=>43, 'question_id' => 11, 'desc' => 'Y.	Formar profesionales de la enseñanza como catedrático de pedagogía.', 'area' =>10]);
Option::create(['id'=>44, 'question_id' => 11, 'desc' => 'Z.	Ser catedrático de derecho.', 'area' =>12]);

Option::create(['id'=>45, 'question_id' => 12, 'desc' => 'A.	Hacer los dibujos y diseños artísticos.', 'area' =>4]);
Option::create(['id'=>46, 'question_id' => 12, 'desc' => 'B.	Confeccionar los mapas geográficos o redactar los temas históricos.', 'area' =>6]);
Option::create(['id'=>47, 'question_id' => 12, 'desc' => 'C.	Dirigir la distribución, venta o comercialización de los libros.', 'area' =>8]);
Option::create(['id'=>48, 'question_id' => 12, 'desc' => 'D.	Llevar relaciones públicas con los grandes clientes.', 'area' =>12]);

Option::create(['id'=>49, 'question_id' => 13, 'desc' => 'E.	Ser el ingeniero mecánico de pruebas y mantenimiento.', 'area' =>3]);
Option::create(['id'=>50, 'question_id' => 13, 'desc' => 'F.	Escribir un reportaje para una revista especializada.', 'area' =>7]);
Option::create(['id'=>51, 'question_id' => 13, 'desc' => 'G.	Controlar los gastos e ingresos económicos relacionados con la carrera.', 'area' =>8]);
Option::create(['id'=>52, 'question_id' => 13, 'desc' => 'H.	Ser piloto de uno de los carros.', 'area' =>13]);

Option::create(['id'=>53, 'question_id' => 14, 'desc' => 'J.	Asistir a conciertos o exhibiciones musicales.', 'area' =>5]);
Option::create(['id'=>54, 'question_id' => 14, 'desc' => 'K.	Enterarme de la historia o geografía de ese país.', 'area' =>6]);
Option::create(['id'=>55, 'question_id' => 14, 'desc' => 'L.	Esforzarme por aprender su idioma.', 'area' =>7]);
Option::create(['id'=>56, 'question_id' => 14, 'desc' => 'M.	Estudiar sus modalidades organización económico-empresarial.', 'area' =>8]);

Option::create(['id'=>57, 'question_id' => 15, 'desc' => 'N.	Estudiar sobre una nueva forma de energía investigando en un laboratorio.', 'area' =>1]);
Option::create(['id'=>58, 'question_id' => 15, 'desc' => 'O.	Estudiar la forma de mejorar un aparato electrónico.', 'area' =>3]);
Option::create(['id'=>59, 'question_id' => 15, 'desc' => 'P.	Estudiar nuevas formas de venta en una empresa.', 'area' =>8]);
Option::create(['id'=>60, 'question_id' => 15, 'desc' => 'R.	Estudiar formas de lograr programas más rápidos y seguros para computadores.', 'area' =>9]);

Option::create(['id'=>61, 'question_id' => 16, 'desc' => 'S.	Conclusiones sobre estudios de física o química.', 'area' =>1]);
Option::create(['id'=>62, 'question_id' => 16, 'desc' => 'T.	Un estudio sobre el contraste de luces y sombras en la pintura.', 'area' =>4]);
Option::create(['id'=>63, 'question_id' => 16, 'desc' => 'V.	Un estudio sobre costumbres de tribus antiguas.', 'area' =>6]);
Option::create(['id'=>64, 'question_id' => 16, 'desc' => 'X.	Un estudio sobre educación o aprendizaje infantil.', 'area' =>10]);

Option::create(['id'=>65, 'question_id' => 17, 'desc' => 'Y.	Afinar instrumentos musicales.', 'area' =>5]);
Option::create(['id'=>66, 'question_id' => 17, 'desc' => 'Z.	Resolver los problemas que me plantea el hacer un difícil programa para un computador.', 'area' =>9]);
Option::create(['id'=>67, 'question_id' => 17, 'desc' => 'A.	Ser maestro de Educación General Básica.', 'area' =>10]);
Option::create(['id'=>68, 'question_id' => 17, 'desc' => 'B.	Ayudar a aliviar el dolor físico de la gente.', 'area' =>11]);

Option::create(['id'=>69, 'question_id' => 18, 'desc' => 'C.	Encargado de un reportaje semanal sobre encuestas de opinión social.', 'area' =>2]);
Option::create(['id'=>70, 'question_id' => 18, 'desc' => 'D.	Encargado de un reportaje semanal sobre cuestiones económicas.', 'area' =>8]);
Option::create(['id'=>71, 'question_id' => 18, 'desc' => 'E.	Encargado de un reportaje semanal sobre aspectos relacionados con la enseñanza escolar.', 'area' =>10]);
Option::create(['id'=>72, 'question_id' => 18, 'desc' => 'F.	Encargado de un reportaje semanal en un país en guerra.', 'area' =>13]);

Option::create(['id'=>73, 'question_id' => 19, 'desc' => 'G.	Fabricar aparatos para que los minusválidos se valgan por sí mismos.', 'area' =>3]);
Option::create(['id'=>74, 'question_id' => 19, 'desc' => 'H.	Ser escritor en un periódico.', 'area' =>7]);
Option::create(['id'=>75, 'question_id' => 19, 'desc' => 'J.	Dar clases para elevar el nivel cultural de la gente, niños o adultos.', 'area' =>10]);
Option::create(['id'=>76, 'question_id' => 19, 'desc' => 'K.	Ser el portavoz de un grupo para defender sus propuestas ante la alcaldía.', 'area' =>12]);

Option::create(['id'=>77, 'question_id' => 20, 'desc' => 'L.	Comprobar una teoría sociológica encuestando a la gente.', 'area' =>2]);
Option::create(['id'=>78, 'question_id' => 20, 'desc' => 'M.	Reparar una TV de alta definición.', 'area' =>3]);
Option::create(['id'=>79, 'question_id' => 20, 'desc' => 'N.	Ilustrar con dibujos una publicación.', 'area' =>4]);
Option::create(['id'=>80, 'question_id' => 20, 'desc' => 'O.	Componer música.', 'area' =>5]);

Option::create(['id'=>81, 'question_id' => 21, 'desc' => 'P.	Desarrollar los dibujos publicitarios.', 'area' =>4]);
Option::create(['id'=>82, 'question_id' => 21, 'desc' => 'R.	Seleccionar el nuevo personal que accede a los trabajos administrativos.', 'area' =>8]);
Option::create(['id'=>83, 'question_id' => 21, 'desc' => 'S.	Ser el asesor de una serie de divulgación sobre el cuerpo humano.', 'area' =>11]);
Option::create(['id'=>84, 'question_id' => 21, 'desc' => 'T.	Presentar un noticiero.', 'area' =>12]);

Option::create(['id'=>85, 'question_id' => 22, 'desc' => 'V.	Organizar la decoración de los espacios libres.', 'area' =>4]);
Option::create(['id'=>86, 'question_id' => 22, 'desc' => 'X.	Organizar la sección de librería.', 'area' =>7]);
Option::create(['id'=>87, 'question_id' => 22, 'desc' => 'Y.	Programar sistemas de venta y controlarlos por computador.', 'area' =>9]);
Option::create(['id'=>88, 'question_id' => 22, 'desc' => 'Z.	Vigilar los posibles robos y detener a los culpables.', 'area' =>13]);

Option::create(['id'=>89, 'question_id' => 23, 'desc' => 'A.	Ser un experto en energía solar o nuclear.', 'area' =>1]);
Option::create(['id'=>90, 'question_id' => 23, 'desc' => 'B.	Ser un experto en música folclórica o moderna.', 'area' =>5]);
Option::create(['id'=>91, 'question_id' => 23, 'desc' => 'C.	Ser concejal o congresista.', 'area' =>12]);
Option::create(['id'=>92, 'question_id' => 23, 'desc' => 'D.	Ser miembro de un equipo de rescate en una montaña alta.', 'area' =>13]);

Option::create(['id'=>93, 'question_id' => 24, 'desc' => 'E.	La importancia de las matemáticas en la investigación científica.', 'area' =>1]);
Option::create(['id'=>94, 'question_id' => 24, 'desc' => 'F.	La importancia de tener una concepción filosófica o teológica del mundo y de la vida.', 'area' =>2]);
Option::create(['id'=>95, 'question_id' => 24, 'desc' => 'G.	La importancia de expresarse con precisión y elegancia en el uso de la lengua oral o escrita.', 'area' =>7]);
Option::create(['id'=>96, 'question_id' => 24, 'desc' => 'H.	La importancia del uso adecuado de medicamentos para conservar la salud.', 'area' =>11]);

Option::create(['id'=>97, 'question_id' => 25, 'desc' => 'J.	Conocer a fondo las diversas formas de racismo .', 'area' =>2]);
Option::create(['id'=>98, 'question_id' => 25, 'desc' => 'K.	Conocer a fondo culturas o civilizaciones antiguas.', 'area' =>6]);
Option::create(['id'=>99, 'question_id' => 25, 'desc' => 'L.	Resolver problemas lógicos para terminar un programa de computador.', 'area' =>9]);
Option::create(['id'=>100, 'question_id' => 25, 'desc' => 'M.	Atender a los clientes importantes en una empresa para solucionar sus dudas.', 'area' =>12]);

Option::create(['id'=>101, 'question_id' => 26, 'desc' => 'N.	Especializarme en construcción de puentes.', 'area' =>3]);
Option::create(['id'=>102, 'question_id' => 26, 'desc' => 'O.	Especializarme en estudio de mapas y geografía.', 'area' =>6]);
Option::create(['id'=>103, 'question_id' => 26, 'desc' => 'P.	Especializarme en asistencia sanitaria.', 'area' =>11]);
Option::create(['id'=>104, 'question_id' => 26, 'desc' => 'R.	Realizar prácticas de vuelo y paracaidismo.', 'area' =>13]);

Option::create(['id'=>105, 'question_id' => 27, 'desc' => 'S.	Demostrar matemáticamente la existencia de un nuevo elemento en la composición del átomo.', 'area' =>1]);
Option::create(['id'=>106, 'question_id' => 27, 'desc' => 'T.	Profundizar en el conocimiento de la filosofía moderna o actual.', 'area' =>2]);
Option::create(['id'=>107, 'question_id' => 27, 'desc' => 'V.	Demostrar a una empresa la necesidad de mecanizar sus sistemas de información y procesos de datos.', 'area' =>9]);
Option::create(['id'=>108, 'question_id' => 27, 'desc' => 'X.	Competir en pruebas que requieren prolongado esfuerzo físico.', 'area' =>13]);

Option::create(['id'=>109, 'question_id' => 28, 'desc' => 'Y.	Libros de historia o geografía.', 'area' =>6]);
Option::create(['id'=>110, 'question_id' => 28, 'desc' => 'Z.	Obras de teatro o novelas.', 'area' =>7]);
Option::create(['id'=>111, 'question_id' => 28, 'desc' => 'A.	Temas de organización empresarial o de economía.', 'area' =>8]);
Option::create(['id'=>112, 'question_id' => 28, 'desc' => 'B.	Programas informáticos.', 'area' =>9]);

Option::create(['id'=>113, 'question_id' => 29, 'desc' => 'C.	Ser el especialista en estudios de tendencias culturales, de costumbres y moda.', 'area' =>2]);
Option::create(['id'=>114, 'question_id' => 29, 'desc' => 'D.	Organizar la sección instrumentos musicales.', 'area' =>5]);
Option::create(['id'=>115, 'question_id' => 29, 'desc' => 'E.	Administrar la economía de la empresa.', 'area' =>8]);
Option::create(['id'=>116, 'question_id' => 29, 'desc' => 'F.	Organizar la sección de libros de textos escolares.', 'area' =>10]);

Option::create(['id'=>117, 'question_id' => 30, 'desc' => 'G.	Compositor musical conocido.', 'area' =>5]);
Option::create(['id'=>118, 'question_id' => 30, 'desc' => 'H.	Novelista conocido.', 'area' =>7]);
Option::create(['id'=>119, 'question_id' => 30, 'desc' => 'J.	Medico conocido.', 'area' =>11]);
Option::create(['id'=>120, 'question_id' => 30, 'desc' => 'K.	Militar conocido.', 'area' =>13]);

Option::create(['id'=>121, 'question_id' => 31, 'desc' => 'L.	Trabajar en un laboratorio para conseguir mejores productos.', 'area' =>1]);
Option::create(['id'=>122, 'question_id' => 31, 'desc' => 'M.	Montar un nuevo sistema de riego y encargarme de su mantenimiento.', 'area' =>3]);
Option::create(['id'=>123, 'question_id' => 31, 'desc' => 'N.	Vender los productos y administración de la finca.', 'area' =>8]);
Option::create(['id'=>124, 'question_id' => 31, 'desc' => 'O.	Cuidar de la salud de los animales y evitar epidemias.', 'area' =>11]);

Option::create(['id'=>125, 'question_id' => 32, 'desc' => 'P.	Un ensayo teórico sobre los orígenes de la religión, o el concepto de nación.', 'area' =>2]);
Option::create(['id'=>126, 'question_id' => 32, 'desc' => 'R.	Un nuevo sistema electrónico de control de calidad.', 'area' =>3]);
Option::create(['id'=>127, 'question_id' => 32, 'desc' => 'S.	Una novela o libro de poesía.', 'area' =>7]);
Option::create(['id'=>128, 'question_id' => 32, 'desc' => 'T.	Guía de consejos para un entrevistador o presentador de televisión.', 'area' =>12]);

Option::create(['id'=>129, 'question_id' => 33, 'desc' => 'V.	Diseñar los programas de impresión automática de los pasabordos.', 'area' =>9]);
Option::create(['id'=>130, 'question_id' => 33, 'desc' => 'X.	Organizar cursos de capacitación y actualización de los conocimientos de los empleados.', 'area' =>10]);
Option::create(['id'=>131, 'question_id' => 33, 'desc' => 'Y.	Servicios médicos del aeropuerto.', 'area' =>11]);
Option::create(['id'=>132, 'question_id' => 33, 'desc' => 'Z.	Buen trato a pasajeros y clientes.', 'area' =>12]);

Option::create(['id'=>133, 'question_id' => 34, 'desc' => 'A.	Aparatos electrónicos aplicados a la empresa o industria.', 'area' =>3]);
Option::create(['id'=>134, 'question_id' => 34, 'desc' => 'B.	Pintura.', 'area' =>4]);
Option::create(['id'=>135, 'question_id' => 34, 'desc' => 'C.	Música moderna.', 'area' =>5]);
Option::create(['id'=>136, 'question_id' => 34, 'desc' => 'D.	Computadores aplicados a la educación o empresas.', 'area' =>9]);

Option::create(['id'=>137, 'question_id' => 35, 'desc' => 'E.	Trabajar en temas de urbanismo o edificación.', 'area' =>3]);
Option::create(['id'=>138, 'question_id' => 35, 'desc' => 'F.	Dirigir estudios sobre recursos naturales o artísticos de la región.', 'area' =>6]);
Option::create(['id'=>139, 'question_id' => 35, 'desc' => 'G.	Trabajar en planificación educativo.', 'area' =>10]);
Option::create(['id'=>140, 'question_id' => 35, 'desc' => 'H.	Dirigir los equipos de rescate de los bomberos o policías.', 'area' =>13]);

Option::create(['id'=>141, 'question_id' => 36, 'desc' => 'J.	Quienes se interesan por problemas planteados en las ciencias exactas.', 'area' =>1]);
Option::create(['id'=>142, 'question_id' => 36, 'desc' => 'K.	Se dedican al teatro o dibujo artístico.', 'area' =>4]);
Option::create(['id'=>143, 'question_id' => 36, 'desc' => 'L.	Aficionados a la literatura.', 'area' =>7]);
Option::create(['id'=>144, 'question_id' => 36, 'desc' => 'M.	Quienes tratan de aumentar el nivel cultural de otras personas a través de la enseñanza.', 'area' =>10]);

Option::create(['id'=>145, 'question_id' => 37, 'desc' => 'N.	Un libro de antropología .', 'area' =>2]);
Option::create(['id'=>146, 'question_id' => 37, 'desc' => 'O.	Un libro de técnicas para pintura o escultura.', 'area' =>4]);
Option::create(['id'=>147, 'question_id' => 37, 'desc' => 'P.	Un atlas de geografía mundial o de mi país.', 'area' =>6]);
Option::create(['id'=>148, 'question_id' => 37, 'desc' => 'R.	Un libro de medicina sobre el cuerpo humano.', 'area' =>11]);

Option::create(['id'=>149, 'question_id' => 38, 'desc' => 'S.	Investigar sobre la vida animal o vegetal en el océano.', 'area' =>1]);
Option::create(['id'=>150, 'question_id' => 38, 'desc' => 'T.	Ser miembro de una orquesta importante.', 'area' =>5]);
Option::create(['id'=>151, 'question_id' => 38, 'desc' => 'V.	Investigar sobre algunos hechos históricos importantes.', 'area' =>6]);
Option::create(['id'=>152, 'question_id' => 38, 'desc' => 'X.	Defender en juicio los derechos de otras personas.', 'area' =>12]);

Option::create(['id'=>153, 'question_id' => 39, 'desc' => 'Y.	Tomar fotos o hacer dibujos o croquis sobre lo que vamos observando.', 'area' =>4]);
Option::create(['id'=>154, 'question_id' => 39, 'desc' => 'Z.	Administrar los fondos o economía del grupo.', 'area' =>8]);
Option::create(['id'=>155, 'question_id' => 39, 'desc' => 'A.	Ser el portavoz del grupo ante los periodistas o corresponsales de radio.', 'area' =>12]);
Option::create(['id'=>156, 'question_id' => 39, 'desc' => 'B.	Intervenir Activamente en las acciones de mayor riesgo.', 'area' =>13]);

Option::create(['id'=>157, 'question_id' => 40, 'desc' => 'C.	Dirigir el montaje de las piezas eléctricas o partes delicadas del motor.', 'area' =>3]);
Option::create(['id'=>158, 'question_id' => 40, 'desc' => 'D.	Diseñar los dibujos de nuevos modelos.', 'area' =>4]);
Option::create(['id'=>159, 'question_id' => 40, 'desc' => 'E.	Hacer los estudios de viabilidad económica de nuevos modelos.', 'area' =>8]);
Option::create(['id'=>160, 'question_id' => 40, 'desc' => 'F.	Atender a los accidentados en la empresa.', 'area' =>11]);

Option::create(['id'=>161, 'question_id' => 41, 'desc' => 'G.	Presentar un programa sobre la ciencia en la actualidad.', 'area' =>1]);
Option::create(['id'=>162, 'question_id' => 41, 'desc' => 'H.	Investigar la influencia de la propaganda en las costumbres de la gente o sobre sus hábitos de consumo.', 'area' =>2]);
Option::create(['id'=>163, 'question_id' => 41, 'desc' => 'J.	Presentar un programa sobre edificación y cuidado del entorno urbanístico.', 'area' =>3]);
Option::create(['id'=>164, 'question_id' => 41, 'desc' => 'K.	Ser el protagonista de una escena muy arriesgada en una película.', 'area' =>13]);

Option::create(['id'=>165, 'question_id' => 42, 'desc' => 'L.	Dirigir cursos de especialización o enseñanza para los empleados.', 'area' =>10]);
Option::create(['id'=>166, 'question_id' => 42, 'desc' => 'M.	Realizar las revisiones médicas para comprobar la salud de los nuevos asegurados.', 'area' =>11]);
Option::create(['id'=>167, 'question_id' => 42, 'desc' => 'N.	Hacer visitas comerciales para captar nuevos clientes.', 'area' =>12]);
Option::create(['id'=>168, 'question_id' => 42, 'desc' => 'O.	Ir a los lugares donde ha habido accidentes para dar un informe del siniestro .', 'area' =>13]);

Option::create(['id'=>169, 'question_id' => 43, 'desc' => 'P.	Nuevas formas de energía.', 'area' =>1]);
Option::create(['id'=>170, 'question_id' => 43, 'desc' => 'R.	Arqueología .', 'area' =>6]);
Option::create(['id'=>171, 'question_id' => 43, 'desc' => 'S.	Algún idioma moderno.', 'area' =>7]);
Option::create(['id'=>172, 'question_id' => 43, 'desc' => 'T.	Primeros auxilios en casos de un accidente.', 'area' =>11]);

Option::create(['id'=>173, 'question_id' => 44, 'desc' => 'V.	Buscar hechos y datos que confirmen una teoría sobre la influencia del ambiente social en el nivel cultural de la gente.', 'area' =>2]);
Option::create(['id'=>174, 'question_id' => 44, 'desc' => 'X.	Buscar nuevos datos que den a conocer mejor un famoso hecho histórico.', 'area' =>6]);
Option::create(['id'=>175, 'question_id' => 44, 'desc' => 'Y.	Buscar datos estadísticos que ayuden a decidir la política económica de una empresa.', 'area' =>8]);
Option::create(['id'=>176, 'question_id' => 44, 'desc' => 'Z.	Trabajar con niños que tengan dificultades de aprendizaje en la lectura.', 'area' =>10]);

Option::create(['id'=>177, 'question_id' => 45, 'desc' => 'A.	Dirigir y organizar su construcción.', 'area' =>3]);
Option::create(['id'=>178, 'question_id' => 45, 'desc' => 'B.	Ser el experto en geografía regional, para asesorar a los ingenieros.', 'area' =>6]);
Option::create(['id'=>179, 'question_id' => 45, 'desc' => 'C.	Informatizar la gestión económica o los cálculos estadísticos.', 'area' =>9]);
Option::create(['id'=>180, 'question_id' => 45, 'desc' => 'D.	Convencer a los afectados por expropiaciones, para llegar a un entendimiento sobre compensaciones económicas.', 'area' =>12]);

Option::create(['id'=>181, 'question_id' => 46, 'desc' => 'E.	Dar clases de dibujo o pintura.', 'area' =>4]);
Option::create(['id'=>182, 'question_id' => 46, 'desc' => 'F.	Dar clases de música.', 'area' =>5]);
Option::create(['id'=>183, 'question_id' => 46, 'desc' => 'G.	Dar clases de geografía o historia.', 'area' =>6]);
Option::create(['id'=>184, 'question_id' => 46, 'desc' => 'H.	Dar clases de actividades atléticas como karate o lucha libre.', 'area' =>13]);

Option::create(['id'=>185, 'question_id' => 47, 'desc' => 'J.	Sociología .', 'area' =>2]);
Option::create(['id'=>186, 'question_id' => 47, 'desc' => 'K.	Historia de la pintura.', 'area' =>4]);
Option::create(['id'=>187, 'question_id' => 47, 'desc' => 'L.	Estudios literarios.', 'area' =>7]);
Option::create(['id'=>188, 'question_id' => 47, 'desc' => 'M.	Estudios legislativos .', 'area' =>12]);

Option::create(['id'=>189, 'question_id' => 48, 'desc' => 'N.	La teoría evolucionista sobre el origen del hombre.', 'area' =>2]);
Option::create(['id'=>190, 'question_id' => 48, 'desc' => 'O.	Nuevas formas de expresión musical.', 'area' =>5]);
Option::create(['id'=>191, 'question_id' => 48, 'desc' => 'P.	Un nuevo lenguaje informático.', 'area' =>9]);
Option::create(['id'=>192, 'question_id' => 48, 'desc' => 'R.	Las teorías sobre el origen del cáncer.', 'area' =>11]);

Option::create(['id'=>193, 'question_id' => 49, 'desc' => 'S.	Construir alguna cosa o arreglarla.', 'area' =>3]);
Option::create(['id'=>194, 'question_id' => 49, 'desc' => 'T.	Tocar algún instrumento o escuchar música.', 'area' =>5]);
Option::create(['id'=>195, 'question_id' => 49, 'desc' => 'V.	Leer novelas.', 'area' =>7]);
Option::create(['id'=>196, 'question_id' => 49, 'desc' => 'X.	Enseñar a un compañero un tema de clase que no entendió.', 'area' =>10]);

Option::create(['id'=>197, 'question_id' => 50, 'desc' => 'Y.	Mezclar productos en un laboratorio para encontrar otro nuevo.', 'area' =>1]);
Option::create(['id'=>198, 'question_id' => 50, 'desc' => 'Z.	Dibujar comics o caricaturas.', 'area' =>4]);
Option::create(['id'=>199, 'question_id' => 50, 'desc' => 'A.	Probar o mejorar un programa de computador.', 'area' =>9]);
Option::create(['id'=>200, 'question_id' => 50, 'desc' => 'B.	Orientar a otros para que acierten en su elección profesional.', 'area' =>10]);

Option::create(['id'=>201, 'question_id' => 51, 'desc' => 'C.	 A estudios de otras lenguas.', 'area' =>7]);
Option::create(['id'=>202, 'question_id' => 51, 'desc' => 'D.	A organizar y dirigir empresas propias.', 'area' =>8]);
Option::create(['id'=>203, 'question_id' => 51, 'desc' => 'E.	A los computadores.', 'area' =>9]);
Option::create(['id'=>204, 'question_id' => 51, 'desc' => 'F.	Al submarinismo.', 'area' =>13]);

Option::create(['id'=>205, 'question_id' => 52, 'desc' => 'G.	Investigar sobre la formación de la tierra.', 'area' =>1]);
Option::create(['id'=>206, 'question_id' => 52, 'desc' => 'H.	Formar parte de un grupo musical.', 'area' =>5]);
Option::create(['id'=>207, 'question_id' => 52, 'desc' => 'J.	Dirigir la contabilidad de una empresa.', 'area' =>8]);
Option::create(['id'=>208, 'question_id' => 52, 'desc' => 'K.	Ser presentador de programas de televisión.', 'area' =>12]);


    }
}
