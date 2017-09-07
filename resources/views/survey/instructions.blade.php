@extends('layouts.app')
@section('content')
@if( !empty( Auth::user()->id))
<div class="container"  ng-controller="SurveyController as surveyCrtl" ng-init="surveyCrtl.profile.user_id={{Auth::user()->id}}">
@else
<div class="container"  ng-controller="SurveyController as surveyCrtl" >
@endif

  <div class="row animated fadeInLeft">
    <div class="col s12" style="padding-top: 2%;">
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
 
          <a href="/questions" type="button" class="waves-effect waves-light"  ><img width="200" src="/btn/iniciar.png" > </a>
        </div>
      </div>
      </wz-step>
 
      
      
      </wizard>
    </div>
  </div>
</div>
</div>
@endsection