@extends('layouts.app')
@section('content')
<div class="container"  ng-controller="SurveyController as surveyCrtl">

@if (Auth::check())
 <uib-tabset active="surveyCrtl.active">
  <uib-tab index="0" >
  <uib-tab-heading>
  <i class="glyphicon glyphicon-bell"></i> Normas de Aplicación
  </uib-tab-heading>
  <div class="panel panel-default">
    <div class="panel-body">
      <h2 style="text-align: center">Normas de Aplicación </h2>
      <p>
        En cada pregunta debes leer cuidadosamente las 4 actividades que tienen una letra. A Continuación, en la HOJA DE RESPUESTAS, poner 0 en la actividad que menos te gusta de las cuatro, un 3 en la que más te gusta, un 2 en la siguiente que más te gusta, y un 1 en la que queda. Se trata, pues de ordenar de 0 a 3 esas actividades según tu preferencia. Aunque a veces te cueste algo decidirte, siempre deberás establecer un orden de 0 a 3 para poder valorar bien la prueba.
      </p>
      <p>
        EJEMPLO: En una empresa preferiría
      </p>
      <ul>
        <li>K.  Llevar la contabilidad</li>
        <li>R. Enseñar nuevas técnicas de producción </li>
        <li>P. Mantener la maquinaria en perfectas condiciones de funcionamiento. </li>
        <li>N. Visitar a los clientes para venderles los productos.</li>
      </ul>
      <h4 style="text-align: center">Hoja de respuestas</h4>
      <div class="col-sm-4 col-sm-offset-4">
        <table class="table text-center ">
          <thead>
          </thead>
          <tbody>
            <tr>
              <td>K</td>
              <td>2</td>
            </tr>
            <tr>
              <td>R</td>
              <td>1</td>
            </tr>
            <tr>
              <td>P</td>
              <td>0</td>
            </tr>
            <tr>
              <td>N</td>
              <td>3</td>
            </tr>
          </tbody>
        </table>
        
      </div>
      <div class="col-sm-12">
        <p>En este caso, según las respuestas, lo que más me gusta es visitar a los clientes, y por eso lo valoro con tres puntos, y lo que menos, mantener la maquinaria, valorado con 0 puntos.
        Aunque no hay tiempo fijo para responder al cuestionario, debes terminarlo por completo y no dejar sin responder ninguna pregunta para que se pueda valorar correctamente. No pienses tampoco mucho las respuestas, déjate llevar de la primera impresión.</p>
        <strong class="text-bold">Este cuestionario trata de clasificar tus preferencias profesionales en 13 grandes áreas de interés. Responde con cuidado y sinceridad, pues te ayudara a conocer mejor tus propios intereses y a compararlos con los de otras personas. Responde guiándote únicamente por el gusto que te suscitan las actividades que se te indiquen.</strong>
      </div>
    <div class="col-sm-2 col-sm-offset-10 text-left">
     <button type="button" class="btn btn-info btn-md" ng-click="surveyCrtl.next(1);">Siguiente <i class="glyphicon glyphicon-chevron-right"></i></button> 
    </div>
    </div>
  </div>
  </uib-tab>

  <!-- Pagina 2, profile-->
  <uib-tab index="1" disable="surveyCrtl.tabs[1].disabled ">
  <uib-tab-heading>
  <i class="glyphicon glyphicon-bell"></i> Información
  </uib-tab-heading>
  <div class="panel panel-default">
    
    <div class="panel-body">


      <form class="form-horizontal">
      <input type="hidden" name="user_id" ng-model="surveyCrtl.profile.user_id" ng-init="surveyCrtl.profile.user_id = {{Auth::user()->id}}">
        <fieldset>
          <!-- Form Name -->
          <legend>Información</legend>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Institución">Institución</label>
            <div class="col-md-5">
              <input id="Institución" ng-model="surveyCrtl.profile.institucion"  name="Institución" type="text" placeholder="" class="form-control input-md">
              
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="edad">Edad</label>
            <div class="col-md-2">
              <input id="edad" ng-model="surveyCrtl.profile.edad"  name="edad" type="text" placeholder="" class="form-control input-md">
              
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="curso">Curso</label>
            <div class="col-md-2">
              <input id="curso" ng-model="surveyCrtl.profile.curso"  name="curso" type="text" placeholder="" class="form-control input-md" required="">
              
            </div>
          </div>
        </fieldset>
      </form>
       <div class="col-sm-2 col-sm-offset-10 text-left">
     <button type="button" class="btn btn-info btn-md" ng-click="surveyCrtl.next(2);">Siguiente <i class="glyphicon glyphicon-chevron-right"></i></button> 
    </div>
    </div>
  </div>

  </uib-tab>
  <uib-tab index="2" disable="surveyCrtl.tabs[2].disabled ">
  <uib-tab-heading>
  <i class="glyphicon glyphicon-bell"></i> Alert!
  </uib-tab-heading>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Questionario</div>
        <div class="panel-body">
          
          <!--encuesta-->
          
          <div ng-repeat="question in surveyCrtl.questions">
            <question  question="question"> </question>
          </div>
          {{ csrf_field() }}
          <div class="col-md-5 col-md-offset-5">
            <button type="button" class="btn btn-primary" ng-click="surveyCrtl.save();">Enviar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </uib-tab>
  </uib-tabset>
@else
<div class="panel panel-default">
    <div class="panel-body">
      <h2 style="text-align: center">Login</h2>
      <p> Para realizar la encuesta debes estar logeado</p>
    </div>
  </div>
@endif
 
</div>
@endsection