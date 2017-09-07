@extends('layouts.app')
@section('content')
@if( !empty( Auth::user()->id))
<div class="container"  ng-controller="SurveyController as surveyCrtl" ng-init="surveyCrtl.profile.user_id={{Auth::user()->id}}">
  @else
  <div class="container"  ng-controller="SurveyController as surveyCrtl" >
    @endif
    <div class="row animated fadeInLeft" style="padding-top: 2%;" >
      <div class="row">
        <div class="container-fluid">
          <div class="row center-align" style="margin-bottom: 0;">
            <h6 class="blue-s">Progreso</h6>
          </div><!-- hl-sticky="" offsetTop="10" -->
          <div class="row progress-lcr valign-wrapper"  class="simple" >
            <div  class="col s9  m10 offset-m1 center-align" >
              <uib-progressbar  class="progress-striped active" max="52" value="surveyCrtl.answers_done" type="success">
              </uib-progressbar>
            </div>
            <div  class="col blue-s" style="font-size: 11px;" >
              <p><%surveyCrtl.answers_done  %> de 52</p>
            </div>
            
          </div>
        </div>
      </div>
      <!--Encuesta-->
        <wizard name="mainw" class="slide-animate" hide-indicators="true" on-finish="finishedWizard()" on-cancel="cancelledWizard()" indicators-position="top">
        <wz-step wz-title="Test"  ng-repeat="question in surveyCrtl.questions">
        
        <div class="row">
          
          
          
          <div class="panel-body col s10 offset-s1">
            
            <!--encuesta-->
            
            <div>
              <!-- <question ng-show="surveyCrtl.inputType" question="question"> </question>-->
              <question-click  ng-show="!surveyCrtl.inputType" donecount="surveyCrtl.answers_done" question="question"></question-click>
              <div  class="   alert-danger" role="alert">
                <span class="error" ng-show="!question.done && surveyCrtl.sectionsErrors.s1">
                *Esta pregunta esta incompleta!</span>
              </div>
              
            </div>
            {{ csrf_field() }}
            
            <div class="row">
              <div class="col s12 center-align">
                <div style="margin-right: 35px;" href="#"  class="waves-effect waves-light" wz-previous>
                  <img width="50" src="/btn/BOTON REDODNO ROJO BACK-16.png" width="200">
                  <p class="pink-s">Regresar</p>

                </div>
                
                <div href="#"  class="waves-effect waves-light"  ng-click="surveyCrtl.validate($index)" value="Continue">
                  <img width="50" src="/btn/BOTON REDONDO AZUL NEXT-16.png" width="200"> 
                  <p class="blue-s">Continuar</p>
                </div>
              </div>
            </div>

                   <div class="col s12 m8 offset-m2">
           
            <div class="col s3 center-align">
              <div class="row ">
                <img src="/images/ICONOS PEQ-17.png" style="width: 50px; opacity: 0.5;
    filter: alpha(opacity=50);">
              </div>
              <div class=" ">
                <h6>Me gusta</h6>
              </div>
            </div>

            <div class="col s3 center-align">
              <div class="row  ">
                <img src="/images/ICONOS PEQ-18.png" style="width: 50px; opacity: 0.5;
    filter: alpha(opacity=50);">
              </div>
              <div class=" ">
                <h6>Me encanta</h6>
              </div>
            </div>

            <div class="col s3 center-align">
              <div class="row  ">
                <img src="/images/ICONOS PEQ-19.png" style="width: 50px; opacity: 0.5;
    filter: alpha(opacity=50);">
              </div>
              <div class=" ">
                <h6>No estoy seguro</h6>
              </div>
            </div>
            <div class="col s3 center-align">
              <div class="row  ">
                <img src="/images/ICONOS PEQ-20.png" style="width: 50px; opacity: 0.5;
    filter: alpha(opacity=50);">
              </div>
              <div class=" ">
                <h6>No me gusta</h6>
              </div>
            </div>
           
          <div class="col s12 center-align pink-s">
          <h6 class="pink-s">¡Recuerda elegir todas las opciones en orden de preferencia!</h6>
          </div>
        </div>
        </div>
            
          </div>
          
        </div>
        </wz-step>
        <!--
        <wz-step wz-title="Test3">
        ssss
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
              
              
              <div ng-repeat="question in surveyCrtl.questions | limitTo:12:40">
                
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
        </wz-step>-->
        </wizard>
       
    </div>
  </div>
  
  @endsection