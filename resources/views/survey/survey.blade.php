@extends('layouts.app')
@section('content')
<div class="container"  ng-controller="SurveyController as surveyCrtl">
  <div class="panel panel-default">
    <div class="panel-body" style="padding-left: 10px; padding-right: 10px;">
      <wizard hide-indicators="true" on-finish="finishedWizard()" on-cancel="cancelledWizard()" indicators-position="top">
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
        <button type="button" class="waves-effect waves-light btn-large blue darken-1" wz-next value="Go on">Siguiente <i class="glyphicon glyphicon-chevron-right"></i></button>
      </div>
     
    </wz-step>




        <wz-step wz-title="Instrucciones" class="center-align">
          <div class="row">
            <img src="/logo.png" style="width: 100px;">
          </div>
          <br>
          <div>
            <p ><b>Bienvenido(a) al Test de orientación académica Orienta-T!</b></p>
          </div>
          <div class="col s12">
            <br>
            <br>
            <p>Este test puede ayudarte a saber cúales son tus preferencias y como se relacionan ocupaciones en el mundo del trabajo.</p>
            <br>
            <p>En la parte de abajo de la pantalla haz click en el botón SIGUIENTE para continuar y en el botón REGRESAR para leer de nuevo las instrucciones o cambiar tus respuestas.</p>
          </div>

          
          <br>
          <br>
          <br>
          <div class="row">
            <div class="col s6 right-align">
              <a href="/" type="button" class="waves-effect waves-light btn-large blue darken-1" wz-previous>REGRESAR  </a>
            </div>
            <div class="col s6 left-align">
              <button type="button" class="waves-effect waves-light btn-large blue darken-1" wz-next value="Continue">SIGUIENTE </button>
            </div>
          </div>
        </wz-step>
        <wz-step wz-title="Instrucciones" class="center-align">
          <div class="row">
            <img src="/logo.png" style="width: 100px;">
          </div>
          <br>
          <div>
            <p ><b>INSTRUCCIONES DE APLICACIÓN</b></p>
          </div>
          <div class="col s12">
            <br>
            <br>
            <p>Lee cada pregunta con atención y decide cómo te sentirias en cada situación al responder las preguntas de acuerdo a tus preferencias</p>
            
          </div>
          <br>
          <br>
          <div class="col s12 ">
            <div class="row ">
              <div class="col s5  right-align">
                <img src="/smile4.png" style="width: 20px">
              </div>
              <div class="col s7 valign-wrapper">
                <p><b>Me gusta mucho</b></p>
              </div>
            </div>
            <div class="row ">
              <div class="col s5  right-align">
                <img src="/smile3.png" style="width: 20px">
              </div>
              <div class="col s7 valign-wrapper">
                <p><b>Me gusta</b></p>
              </div>
            </div>
            <div class="row ">
              <div class="col s5  right-align">
                <img src="/smile2.png" style="width: 20px">
              </div>
              <div class="col s7 valign-wrapper">
                <p><b>No estoy seguro</b></p>
              </div>
            </div>
            <div class="row ">
              <div class="col s5  right-align">
                <img src="/smile1.png" style="width: 20px">
              </div>
              <div class="col s7 valign-wrapper">
                <p><b>Me me gusta</b></p>
              </div>
            </div>
          </div>
          <br>
          <br>
          <br>
          <div class="row">
            <div class="col s6 right-align">
             <button type="button" class="waves-effect waves-light btn-large blue darken-1" wz-previous value="Back">REGRESAR </button>
            </div>
            <div class="col s6 left-align">
              <button type="button" class="waves-effect waves-light btn-large blue darken-1" wz-next value="Continue">SIGUIENTE </button>
            </div>
          </div>
        </wz-step>


        <wz-step wz-title="Instrucciones" class="">
        <div class="center-align">
            <div class="row ">
              <img src="/logo.png" style="width: 100px;">
            </div>
            <br>
            <div>
              <p ><b>ANTES DE INICIAR...</b></p>
            </div>
       
            <br>
          </div>
          <div class="form-group " >
              <label class="col-md-12 control-label center-align" for="opciones">¿Cuál de las siguientes opciones consideras más adecuada a tu actualidad?</label>
               <br> <br>
              <div class="col-md-8" style="text-align: left;">
                
                  <div class="col s12" style="margin-bottom: 15px;    font-size: 0.8em;">
                    <input ng-model="surveyCrtl.profile.opciones" name="group2" type="radio" id="opciones1" value="1"/>
                    <label for="opciones1">1. Tengo el tiempo y las posibilidades para estudiar por varios años sin necesidad de trabajar.</label>
                  </div>
                  <div class="col s12" style="margin-bottom: 15px;    font-size: 0.8em;">
                    <input ng-model="surveyCrtl.profile.opciones" name="group2" type="radio" id="opciones2" value="2"/>
                    <label for="opciones2">2. Puedo estudiar durante varios años pero necesito trabajar al tiempo.</label>
                  </div>
                  <div class="col s12" style="margin-bottom: 15px;    font-size: 0.8em;">
                    <input ng-model="surveyCrtl.profile.opciones" name="group2" type="radio" id="opciones3" value="3"/>
                    <label for="opciones3">3. Necesito estudiar rápidamente para laborar cuanto antes. </label>
                  </div>
                  <div class="col s12" style="margin-bottom: 15px;    font-size: 0.8em;">
                    <input ng-model="surveyCrtl.profile.opciones" name="group2" type="radio" id="opciones4" value="4"/>
                    <label for="opciones4">4. No tengo tiempo para estudiar, necesito trabajar de inmediato.</label>
                  </div>

                 
              </div>
            </div>
          
          <br>
          <br>
          <br>
          <div class="row">
            <div class="col s6 right-align">
              <a href="/" type="button" class="waves-effect waves-light btn-large blue darken-1" wz-previous>REGRESAR  </a>
            </div>
            <div class="col s6 left-align">
              <button type="button" class="waves-effect waves-light btn-large blue darken-1" wz-next value="Continue">SIGUIENTE </button>
            </div>
          </div>
        </wz-step>

                <wz-step wz-title="Instrucciones" class="">
        <div class="center-align">
            <div class="row ">
              <img src="/logo.png" style="width: 100px;">
            </div>
            <br>
            <div>
              <p ><b>SOBRE EL CUESTIONARIO</b></p>
            </div>
       
            <br>
          </div>
          <div class="col s12">
            <br>
            <br>
            <p>Responde con cuidado y sinceridad, pues te ayudará a conocer mejor tus propios intereses y a compararlos con las otras personas. Responde guiándote únicamente por el gusto que te suscitan las actividades que se te indiquen.</p>
            
          </div>
          
          <br>
          <br>
          <br>
          <div class="row">
            <div class="col s6 right-align">
             <button type="button" class="waves-effect waves-light btn-large blue darken-1" wz-previous value="Back">REGRESAR </button>
            </div>
            <div class="col s6 left-align">
              <button type="button" class="waves-effect waves-light btn-large blue darken-1" wz-next value="Continue">EMPEZAR </button>
            </div>
          </div>
        </wz-step>




    <wz-step wz-title="Test">
    <p> 
    </p>
    <div class="row">
      <div class="col s12">
        <div class="panel-body">
          <div hl-sticky="" offsetTop="10" class="simple" >
            <div class="col s3 m1">
              <p> Progreso:</p>
            </div>
            <div  class="col s9 m11" >
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
          <button ng-show="surveyCrtl.pagination.page == 0"  class="col s6 waves-effect waves-light btn-large blue darken-1"  wz-previous>REGRESAR</button>
            <button ng-hide="surveyCrtl.pagination.page == 0"  class="col s6 waves-effect waves-light btn-large blue darken-1" ng-click="surveyCrtl.pagination.prevPage()">Anterior</button>
            <button ng-hide="surveyCrtl.pagination.page + 1 >= surveyCrtl.pagination.numPages" class="col s6 waves-effect waves-light btn-large blue darken-1" ng-click="surveyCrtl.pagination.nextPage();">Siguiente</button>
            <button ng-show="surveyCrtl.pagination.page + 1 >= surveyCrtl.pagination.numPages"  type="button" class="col s6 waves-effect waves-light btn-large blue darken-1" ng-click="surveyCrtl.save();" wz-next >Enviar</button>
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