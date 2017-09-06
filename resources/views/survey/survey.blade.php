@extends('layouts.app')
@section('content')
@if( !empty( Auth::user()->id))
<div class="container"  ng-controller="SurveyController as surveyCrtl" ng-init="surveyCrtl.profile.user_id={{Auth::user()->id}}">
@else
<div class="container"  ng-controller="SurveyController as surveyCrtl" >
@endif

<% "user:" + surveyCrtl.profile.user_id %>
  <div class="row animated fadeInLeft">
    <div class="col s12" style="padding-top: 7%;">
      <wizard name="mainw" class="slide-animate" hide-indicators="true" on-finish="finishedWizard()" on-cancel="cancelledWizard()" indicators-position="top">
      
      <wz-step wz-title="Instrucciones" class="center-align">
      <div class="row">
        <img src="/LOGO GRANDE-16.png" style="width: 300px;">
      </div>
      <br>
      <div class="col s12 m8 offset-m2">
        <h4 ><strong>Bienvenido(a) al Test de orientación académica Orienta-T!</strong></h4>
      </div>
      <div class="col s12 m6 offset-m3" style="font-size: 18px!important;">
        <br>
        <br>
        <p>Este test te ayudará a saber cuáles son tus preferencias y
cómo se relacionan con ocupaciones en el mundo del trabajo. </p>
        <br>
        <h5  style="font-size: 18px!important;">Haz click en el botón continuar para ver las instrucciones y saber cómo responder el test.</h5>
      </div>


      

      <div class="row">
      <br>
      <br>
      <br><br>
        <div class="col s12   center-align">
          <a  href="/" type="button" class="waves-effect waves-light" wz-previous><img width="50" src="/btn/BOTON REDODNO ROJO BACK-16.png" width="200">  </a>
        
          <a style="margin-left: 40px;" type="button" class="waves-effect waves-light" wz-next value="Continue"><img width="50" src="/btn/BOTON REDONDO AZUL NEXT-16.png" width="200"> </a>
        </div>
      </div>
       
      </wz-step>



      <wz-step wz-title="Instrucciones" class="center-align">
      
      <div class="row left-align">
        <div class="col s12 m6 boxed-help " style="    padding: 7% 6% 0px 6%;;">
          <p >Cómo responder</p>
          <br>
          <strong ><p>Lee cada pregunta con
          atención y escoge
          todas las opciones en
          orden de preferencia.</p> 
          </strong>
          
        </div>
         
        <div class="col s12 m6">
           
            <div class="col s3 center-align">
              <div class="row ">
                <img src="/images/ICONOS PEQ-17.png" style="width: 50px">
              </div>
              <div class=" ">
                <h6>Me gusta</h6>
              </div>
            </div>

            <div class="col s3 center-align">
              <div class="row  ">
                <img src="/images/ICONOS PEQ-18.png" style="width: 50px">
              </div>
              <div class=" ">
                <h6>Me encanta</h6>
              </div>
            </div>

            <div class="col s3 center-align">
              <div class="row  ">
                <img src="/images/ICONOS PEQ-19.png" style="width: 50px">
              </div>
              <div class=" ">
                <h6>No estoy seguro</h6>
              </div>
            </div>
            <div class="col s3 center-align">
              <div class="row  ">
                <img src="/images/ICONOS PEQ-20.png" style="width: 50px">
              </div>
              <div class=" ">
                <h6>No me gusta</h6>
              </div>
            </div>
           
        <div class="col s12">
          <div class="col s3 m2">
            <img src="/images/ICONOS PEQ-21.png" style="width: 50px">
          </div>
          <div class="col s9 m10">
              <h5>Si deseas cambiar las opciones de una
  pregunta haz click en este botón.</h5>
          </div>
        </div>
        </div>
      </div>
 
      <br>
      <div class="row">
        <div class="col s12  center-align">
 
          <a type="button" class="waves-effect waves-light" wz-next value="Continue"><img width="200" src="/btn/iniciar.png" > </a>
        </div>
      </div>
      </wz-step>
      <!--
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
      -->
    
      
      <wz-step wz-title="Test">
      <p>
      </p>
      <div class="row">
        <div class="col s12">
          <div id="sticky-container" class="panel-body ">
            <div class="progress-lcr valign-wrapper" hl-sticky="" offsetTop="10" class="simple" >
              <div class="col s3 m1" style="font-size: 11px;">
                <p> Progreso:</p>
              </div>
              <div  class="col s4 m8" >
                <uib-progressbar  class="progress-striped active" max="52" value="surveyCrtl.answers_done" type="success">
                
                </uib-progressbar>
              </div>
              <div  class="col s5 m4 " style="font-size: 11px;" >
                <p>Pregunta <%surveyCrtl.answers_done + 1%> de 52</p>
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
              <div class="col s12 m6 center-align">
                <div href="#"  class="waves-effect waves-light" wz-previous><img width="50" src="/btn/BOTON REDODNO ROJO BACK-16.png" width="200">  </div>
              </div>
              <div class="col s12 m6 center-align">
                <div href="#"  class="waves-effect waves-light"  ng-click="surveyCrtl.validate(0,25,'s1')" value="Continue"><img width="50" src="/btn/BOTON REDONDO AZUL NEXT-16.png" width="200"> </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      </wz-step>
      <wz-step wz-title="Test2">
      
      <div class="row">
        <div class="col s12">
          <div class="panel-body">
            <div class="progress-lcr valign-wrapper" hl-sticky="" offsetTop="10" class="simple" >
              <div class="col s3 m1" style="font-size: 11px;">
                <p> Progreso:</p>
              </div>
              <div  class="col s4 m8" >
                <uib-progressbar  class="progress-striped active" max="52" value="surveyCrtl.answers_done" type="success">
                
                </uib-progressbar>
              </div>
              <div  class="col s5 m4 " style="font-size: 11px;" >
                <p>Pregunta <%surveyCrtl.answers_done + 1%> de 52</p>
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
              <div class="col s12 m6 center-align">
                <a href="/" type="button" class="waves-effect waves-light" wz-previous><img width="50" src="/btn/BOTON REDODNO ROJO BACK-16.png" width="200">  </a>
              </div>
              <div class="col s12 m6 center-align">
                <a type="button" class="waves-effect waves-light"  ng-click="surveyCrtl.validate(25,15,'s2')" value="Continue"><img width="50" src="/btn/BOTON REDONDO AZUL NEXT-16.png" width="200"> </a>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      </wz-step>
      <wz-step wz-title="Test3">
      
      <div class="row">
        <div class="col s12">
          <div class="panel-body">
            <div class="progress-lcr valign-wrapper" hl-sticky="" offsetTop="10" class="simple" >
              <div class="col s3 m1" style="font-size: 11px;">
                <p> Progreso:</p>
              </div>
              <div  class="col s4 m8" >
                <uib-progressbar  class="progress-striped active" max="52" value="surveyCrtl.answers_done" type="success">
                
                </uib-progressbar>
              </div>
              <div  class="col s5 m4 " style="font-size: 11px;" >
                <p>Pregunta <%surveyCrtl.answers_done + 1%> de 52</p>
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
              <div class="col s12 m6 center-align">
                <a href="/" type="button" class="waves-effect waves-light" wz-previous><img width="50" src="/btn/BOTON REDODNO ROJO BACK-16.png" width="200">  </a>
              </div>
              <div class="col s12 m6 center-align">
                <a type="button" class="waves-effect waves-light" wz-next  ng-click="surveyCrtl.validate(40,12,'s3')" value="Continue"><img src="/boton FIN.png" width="200"> </a>
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