@extends('layouts.app')
@section('content')
<div class="container"  ng-controller="SurveyController as surveyCrtl">
  <div class="panel panel-default">
    <div class="panel-body" style="padding-left: 10px; padding-right: 10px;">
      <wizard name="mainw" class="slide-animate" hide-indicators="true" on-finish="finishedWizard()" on-cancel="cancelledWizard()" indicators-position="top">
      <wz-step wz-title="Perfil" >
      <h2 class="center-align">Inicia tu ruta ocupacional</h2>
      <strong class="text-bold">Este cuestionario trata de clasificar tus preferencias profesionales en 13 grandes áreas de interés. Responde con cuidado y sinceridad, pues te ayudara a conocer mejor tus propios intereses. Responde guiándote únicamente por el gusto que te suscitan las actividades que se te indiquen.</strong>
      <br>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
      <form  name="charForm" class="form-horizontal" style="margin-top: 10px;">
        
        <!--  <input type="hidden" name="user_id" ng-model="surveyCrtl.profile.user_id" ng-init="surveyCrtl.profile.user_id = {{1}}"> -->
        
        @if(Auth::check())
        <h4 class="text-center">Bienvenido nuevamente {{Auth::user()->name }}</h4>
        <p class="text-center">No eres tu?:
        <a href="/logout"
          onclick="event.preventDefault();
          jQuery(document).ready(function($) {
          document.getElementById('logout-form').submit();
          });">
          Salir
        </a>
        </p>
        <input type="hidden" name="user_id" ng-model="surveyCrtl.profile.user_id" ng-init="surveyCrtl.profile.user_id = {{Auth::id()}}">
        @else
        <div class="form-group">
          <label class="col-md-4 control-label" for="Institución">Nombre y Apellido*</label>
          <div class="col-md-5">
            <input id="Nombre" ng-model="surveyCrtl.profile.nombre"  name="nombre" type="text" placeholder="" class="form-control input-md" required>
            <div class="   alert-danger" role="alert">
              <span class="error" ng-show="charForm.nombre.$touched && charForm.nombre.$error.required">
              *El nombre es obligatorio!</span>
              <span class="error" ng-show="charForm.nombre.$touched && charForm.nombre.$error.text">
              *Este no es un nombre valido!</span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="Institución">E-Mail*</label>
          <div class="col-md-5">
            <input id="Institución" ng-model="surveyCrtl.profile.email"  name="email" type="email" placeholder="" class="form-control input-md"  required>
            <div class="   alert-danger" role="alert">
              <span class="error" ng-show="charForm.email.$touched && charForm.email.$error.required">
              *E-mail es obligatorio!</span>
              <span class="error" ng-show="charForm.email.$touched && charForm.email.$error.email">
              *Este no es un E-mail Valido!</span>
            </div>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Institución">Contraseña*</label>
          <div class="col-md-5">
            <input id="Institución" ng-model="surveyCrtl.profile.contrasena"  name="contrasena" type="password" placeholder="" class="form-control input-md" required>
            <div class="   alert-danger" role="alert">
              <span class="error" ng-show="charForm.contrasena.$touched && charForm.contrasena.$error.required">
              *Este campo es obligatorio!</span>
               
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="Institución">Verificar Contraseña*</label>
          <div class="col-md-5">
            <input id="Institución" ng-model="surveyCrtl.profile.contrasena2"  name="contrasena2" type="password" placeholder="" class="form-control input-md" required>
            <div class="   alert-danger" role="alert">
              <span class="error" ng-show="charForm.contrasena2.$touched && charForm.contrasena2.$error.required">
              *Este campo es obligatorio!</span>
              <span class="error" ng-show="charForm.contrasena2.$touched && (surveyCrtl.profile.contrasena != surveyCrtl.profile.contrasena2)">
              *No Coinciden!</span>
               
            </div>
          </div>
        </div>
<!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="edad">Edad</label>
          <div class="col-md-5">
            <input id="edad" ng-model="surveyCrtl.profile.edad"  name="edad" type="number" placeholder="" class="form-control input-md" >
            <div class="   alert-danger" role="alert">
               
              <span class="error" ng-show="charForm.edad.$touched && charForm.edad.$error.number">
              *No es una edad valida!</span>
            </div>
          </div>
        </div>
        <!-- Form Name -->
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Institución">Colegio</label>
          <div class="col-md-5">
            <input id="Institución" ng-model="surveyCrtl.profile.institucion"  name="institucion" type="text" placeholder="" class="form-control input-md" >
            <div class="   alert-danger" role="alert">
               
               
            </div>
          </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="curso">Grado</label>
          <div class="col-md-5">
            <div class="row" >
              <p class="col s12">
                <input ng-model="surveyCrtl.profile.curso" name="grado" type="text" id="test1" />
                
              </p>
              <div class="   alert-danger" role="alert">
                 
                <span class="error" ng-show="charForm.grado.$touched && charForm.grado.$error.text">
                *No es una edad valida!</span>
              </div>
            </div>
          </div>
        </div>
        @endif
        

 
      </form>
      
      @if(Auth::check())
      <div class="col-sm-12   text-left center-align" style="margin-top: 15px;">
        <a href="https://drive.google.com/file/d/0B7oqoVmBYZyqeWpIVEV6Y3cybnM/view?usp=sharing" target="_blank" class="row "> Al hacer click en "Continuar" Acepta la politica de tratamiento de datos</a>
        <br>
        <button ng-disabled="!charForm.$valid" type="button" class="waves-effect waves-light btn-large blue darken-1" wz-next value="Go on">CONTINUAR</button>
      </div>
      @else
      <div class="col-sm-12   text-left center-align" style="margin-top: 15px;">
        <a href="https://drive.google.com/file/d/0B7oqoVmBYZyqeWpIVEV6Y3cybnM/view?usp=sharing" target="_blank" class="row "> Al hacer click en "Continuar" Acepta la politica de tratamiento de datos</a>
        <br>
        <button ng-disabled="!charForm.$valid" type="button" class="waves-effect waves-light btn-large blue darken-1" wz-next="surveyCrtl.canExitChar()" value="Go on">CONTINUAR</button>
      </div>
      @endif
      
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
            <p><b>No me gusta</b></p>
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
          <form name="nivelForm" class="form-horizontal" >
            
            
            <div class="col s12" style="margin-bottom: 15px;    font-size: 0.8em;">
              <input ng-model="surveyCrtl.profile.opciones" name="group2" type="radio" id="opciones1" value="1"  required/>
              <label for="opciones1">1. Tengo el tiempo y las posibilidades para estudiar por varios años sin necesidad de trabajar.</label>
            </div>
            <div class="col s12" style="margin-bottom: 15px;    font-size: 0.8em;">
              <input ng-model="surveyCrtl.profile.opciones" name="group2" type="radio" id="opciones2" value="2" required/>
              <label for="opciones2">2. Puedo estudiar durante varios años pero necesito trabajar al tiempo.</label>
            </div>
            <div class="col s12" style="margin-bottom: 15px;    font-size: 0.8em;">
              <input ng-model="surveyCrtl.profile.opciones" name="group2" type="radio" id="opciones3" value="3" required/>
              <label for="opciones3">3. Necesito estudiar rápidamente para laborar cuanto antes. </label>
            </div>
            <div class="col s12" style="margin-bottom: 15px;    font-size: 0.8em;">
              <input ng-model="surveyCrtl.profile.opciones" name="group2" type="radio" id="opciones4" value="4" required/>
              <label for="opciones4">4. No tengo tiempo para estudiar, necesito trabajar de inmediato.</label>
            </div>
          </form>
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
          <button ng-disabled="nivelForm.group2.$invalid" type="button" class="waves-effect waves-light btn-large blue darken-1" wz-next value="Continue">SIGUIENTE </button>
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
        <p>Responde con cuidado y sinceridad, pues te ayudará a conocer mejor tus propios intereses. Responde guiándote únicamente por el gusto que te suscitan las actividades que se te indiquen.</p>
        
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
            
            <div ng-repeat="question in surveyCrtl.questions | limitTo:25:0">
              <!-- <question ng-show="surveyCrtl.inputType" question="question"> </question>-->
              <question-click  ng-show="!surveyCrtl.inputType" donecount="surveyCrtl.answers_done" question="question"></question-click>
            <div  class="   alert-danger" role="alert">
              <span class="error" ng-show="!question.done && surveyCrtl.sectionsErrors.s1">
              *Esta pregunta esta incompleta!</span>
            </div>
              
            </div>

            {{ csrf_field() }}
            <div class="row">
        <div class="col s6 right-align">
          <button type="button" class="waves-effect waves-light btn-large blue darken-1" wz-previous value="Back">REGRESAR </button>
        </div>
        <div class="col s6 left-align">
          <button type="submit" class="waves-effect waves-light btn-large blue darken-1" ng-click="surveyCrtl.validate(0,25,'s1')" value="Continue">SIGUIENTE </button>
        </div>
      </div>
            
          </div>
        </div>
      </div>
      </wz-step>


       <wz-step wz-title="Test2">
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
            
            <div ng-repeat="question in surveyCrtl.questions | limitTo:15:25">
              <!-- <question ng-show="surveyCrtl.inputType" question="question"> </question>-->
              <question-click  ng-show="!surveyCrtl.inputType" donecount="surveyCrtl.answers_done" question="question"></question-click>
              <div  class="   alert-danger" role="alert">
              <span class="error" ng-show="!question.done && surveyCrtl.sectionsErrors.s2">
              *Esta pregunta esta incompleta!</span>
              </div>
            </div>

            {{ csrf_field() }}
            <div class="row">
        <div class="col s6 right-align">
          <button type="button" class="waves-effect waves-light btn-large blue darken-1" wz-previous value="Back">REGRESAR </button>
        </div>
        <div class="col s6 left-align">
          <button type="button" class="waves-effect waves-light btn-large blue darken-1" ng-click="surveyCrtl.validate(25,15,'s2')" value="Continue">SIGUIENTE </button>
        </div>
      </div>
            
          </div>
        </div>
      </div>
      </wz-step> 


       <wz-step wz-title="Test3">
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
            
            <div ng-repeat="question in surveyCrtl.questions | limitTo:12:40">
              <!-- <question ng-show="surveyCrtl.inputType" question="question"> </question>-->
              <question-click  ng-show="!surveyCrtl.inputType" donecount="surveyCrtl.answers_done" question="question"></question-click>

              <div  class="   alert-danger" role="alert">
              <span class="error" ng-show="!question.done && surveyCrtl.sectionsErrors.s3">
              *Esta pregunta esta incompleta!</span>
            </div>
            </div>

            {{ csrf_field() }}
            <div class="row">
        <div class="col s6 right-align">
          <button type="button" class="waves-effect waves-light btn-large blue darken-1" wz-previous value="Back">REGRESAR </button>
        </div>
        <div class="col s6 left-align">
          <button type="button" class="waves-effect waves-light btn-large blue darken-1" ng-click="surveyCrtl.validate(40,12,'s3')" value="Continue">Finalizar </button>
        </div>
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