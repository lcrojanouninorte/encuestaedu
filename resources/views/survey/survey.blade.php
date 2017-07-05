@extends('layouts.app')
@section('content')
<div class="container"  ng-controller="SurveyController as surveyCrtl">
  <div class="panel panel-default">
    <div class="panel-body" >
      <wizard on-finish="finishedWizard()" on-cancel="cancelledWizard()" indicators-position="top">
      <wz-step wz-title="Instrucciones">
      <h2 style="text-align: center">Instrucciónes de Aplicación </h2>
      <div class="col s12">
        En cada pregunta debes leer cuidadosamente las 4 actividades que tienen una letra.  Organízalas según tu preferencia. A Continuación, en la HOJA DE RESPUESTAS, poner Siendo 3 la de mayor preferencia y 0 la de menor.  0 en la actividad que menos te gusta de las cuatro, un 3 en la que más te gusta, un 2 en la siguiente que más te gusta, y un 1 en la que queda. Se trata, pues de ordenar de 0 a 3 esas actividades según tu preferencia. Aunque a veces te cueste algo decidirte, siempre deberás establecer un orden de 0 a 3 para poder valorar bien la prueba.  
      </div>
      <div class="col-sm-2 col-sm-offset-10 text-left">
        <button type="button" class="btn btn-info btn-md" wz-next value="Continue">Siguiente <i class="glyphicon glyphicon-chevron-right"></i></button>
      </div>
      </wz-step>
      <wz-step wz-title="Perfil">
      <h2 class="center-align">Inicia tu ruta ocupacional</h2>
      <strong class="text-bold">Este cuestionario trata de clasificar tus preferencias profesionales en 13 grandes áreas de interés. Responde con cuidado y sinceridad, pues te ayudara a conocer mejor tus propios intereses y a compararlos con los de otras personas. Responde guiándote únicamente por el gusto que te suscitan las actividades que se te indiquen.</strong>
       <br>
        <form class="form-horizontal" style="margin-top: 10px;">
          <!--  <input type="hidden" name="user_id" ng-model="surveyCrtl.profile.user_id" ng-init="surveyCrtl.profile.user_id = {{1}}"> -->
          <fieldset>
          @if(Auth::check())
          <h4>Bienvenido nuevamente {{Auth::user()->name }}</h4> 
          No eres tu?: 
          <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     jQuery(document).ready(function($) {
                                                       document.getElementById('logout-form').submit();
                                                     });">
                                            Salir
                                        </a>



          <input type="hidden" name="user_id" ng-model="surveyCrtl.profile.user_id" ng-init="surveyCrtl.profile.user_id = {{Auth::id()}}"> 
          @else
            <div class="form-group">
              <label class="col-md-4 control-label" for="Institución">E-Mail</label>
              <div class="col-md-5">
                <input id="Institución" ng-model="surveyCrtl.profile.email"  name="email" type="text" placeholder="" class="form-control input-md">
              </div>
            </div>

          @endif

            <!-- Form Name -->
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
              <label class="col-md-4 control-label" for="curso">Grado <% surveyCrtl.profile.curso %></label>
              <div class="col-md-8">
                <div class="row" >
                  <p class="col s2">
                    <input ng-model="surveyCrtl.profile.curso" name="group1" type="radio" id="test1" value="6" />
                    <label for="test1">6°</label>
                  </p>
                  <p class="col s2">
                    <input ng-model="surveyCrtl.profile.curso" name="group1" type="radio" id="test2"  value="7"/>
                    <label for="test2">7°</label>
                  </p>
                  <p class="col s2">
                    <input ng-model="surveyCrtl.profile.curso" name="group1" type="radio" id="test3"  value="8"/>
                    <label for="test3">8°</label>
                  </p>
                  <p class="col s2">
                    <input ng-model="surveyCrtl.profile.curso" name="group1" type="radio" id="test4"  value="9"/>
                    <label for="test4">9°</label>
                  </p>
                  <p class="col s2">
                    <input ng-model="surveyCrtl.profile.curso" name="group1" type="radio" id="test5"  value="10"/>
                    <label for="test5">10°</label>
                  </p>
                  <p class="col s2">
                    <input ng-model="surveyCrtl.profile.curso" name="group1" type="radio" id="test6" value="11" />
                    <label for="test6">11°</label>
                  </p>
                  
                </div>
              </div>
            </div>

            <div class="form-group " >
              <label class="col-md-4 control-label" for="opciones">Cuál de las siguientes opciones consideras más adecuada a tu actualidad. </label>
              <div class="col-md-8">
                
                  <p class="col s12">
                    <input ng-model="surveyCrtl.profile.opciones" name="group2" type="radio" id="opciones1" value="1"/>
                    <label for="opciones1">1. Tengo el tiempo y las posibilidades para estudiar por varios años sin necesidad de trabajar.</label>
                  </p>
                  <p class="col s12">
                    <input ng-model="surveyCrtl.profile.opciones" name="group2" type="radio" id="opciones2" value="2"/>
                    <label for="opciones2">2. Puedo estudiar durante varios años pero necesito trabajar al tiempo.</label>
                  </p>
                  <p class="col s12">
                    <input ng-model="surveyCrtl.profile.opciones" name="group2" type="radio" id="opciones3" value="3"/>
                    <label for="opciones3">3. Necesito estudiar rápidamente para laborar cuanto antes. </label>
                  </p>
                  <p class="col s12">
                    <input ng-model="surveyCrtl.profile.opciones" name="group2" type="radio" id="opciones4" value="4"/>
                    <label for="opciones4">4. No tengo tiempo para estudiar, necesito trabajar de inmediato.</label>
                  </p>

                 
              </div>
            </div>
            <div class="form-group " >
              <label class="col-md-4 control-label" for="verificacion">Es tu primera vez en la herramienta?. </label>
              <div class="col-md-8">
                
                  <p class="col s6">
                    <input ng-model="surveyCrtl.profile.verificacion" name="group3" type="radio" id="verificacion1" value="1"/>
                    <label for="verificacion1">Si</label>
                  </p>
                  <p class="col s6">
                    <input ng-model="surveyCrtl.profile.verificacion" name="group3" type="radio" id="verificacion2" value="0"/>
                    <label for="verificacion2">No</label>
                  </p>

                 
              </div>
            </div>
          
        </fieldset>
      </form>
      
      <div class="col-sm-2 col-sm-offset-10 text-left" style="margin-top: 15px;">
        <button type="button" class="btn btn-info btn-md" wz-next value="Go on">Siguiente <i class="glyphicon glyphicon-chevron-right"></i></button>
      </div>
     
    </wz-step>
    <wz-step wz-title="Test">
    <p>En cada pregunta debes leer cuidadosamente las 4 actividades. Organízalas según tu preferencia. Siendo 3 la de mayor preferencia y 0 la de menor.
    </p>
    <div class="row">
      <div class="col s12">
        <div class="panel-body">
          <div  offsetTop="10" class="simple" >
            <div class="col s1">
              <p> Progreso:</p>
            </div>
            <div hl-sticky="" class="col s11" >
              <uib-progressbar  class="progress-striped active" max="52" value="surveyCrtl.answers_done" type="success">
             
              </uib-progressbar>
            </div>
          </div>
          <!--encuesta-->
         
          <div ng-repeat="question in surveyCrtl.questions | startFrom: surveyCrtl.pagination.page * surveyCrtl.pagination.perPage | limitTo: surveyCrtl.pagination.perPage">
            <!-- <question ng-show="surveyCrtl.inputType" question="question"> </question>-->
            <question-click  ng-show="!surveyCrtl.inputType" donecount="surveyCrtl.answers_done" question="question"></question-click>
          </div>
          {{ csrf_field() }}
          <div class="col m3 push-m5" style="margin-top: 15px;">
            <button class="btn btn-success col" ng-click="surveyCrtl.pagination.prevPage()">Anterior</button>
            <button class="btn btn-success col" ng-click="surveyCrtl.pagination.nextPage()">Siguiente</button>
            <button type="button" class="btn btn-primary col" ng-click="surveyCrtl.save();" wz-next >Enviar</button>
            <p><--"Actualmente esta activo el boton de enviar para efectos de la prueba"</p>
          </div>
        </div>
      </div>
    </div>
    </wz-step>
    </wizard>
  </div>
</div>
</div>
</div>
@endsection