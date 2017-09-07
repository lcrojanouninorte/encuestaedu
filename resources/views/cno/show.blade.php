@extends('layouts.app')
@section('content')
<div class="container"  ng-controller="SurveyController as surveyCrtl">
 
    <div class="row animated fadeInLeft">
 
          <div class="col s12  heading-s valign-wrapper" >
              <div class="col s12 text-center heading-s-title center-align">
              <p><strong>Carreras que coinciden con tus intereses y nivel de preparación:</strong></p>
              <p>Haz click en cada carrera para obtener más detalles.</p>
            </div>
          </div>

              
              @if(count($level->cnos)>0)
                        <div class="collection with-header col s12" style="padding: 0px; margin:0px;">
              <div class="collection-header  heading-level-s">
                <p class="text-center ">{{$level->desc}}</p>
              </div>
              <div class="col s8 offset-s2">
                
                @foreach ($level->cnos as $key=>$cno)
                <a style="z-index: 100;" href="/profesion/{{$cno->cod_profesion}}/{{$level->id}}" class="collection-item avatar valign-wrapper">
                  <i class="circle grey lighten-3">{{ ++$key }}</i>
                  <span class=" title"><p><strong>  {{$cno->ocupacion}}</p></strong></span>
                </a>
                @endforeach
              <!--<div class="col s12 center-align"> <a href="/cnopdf/{{$survey}}/{{$cod_area}}/{{$category}}/{{$level->id}}" class="btn btn-primary" target="_blank"> Descargar Pdf</a></div>-->
              @else
              
              @endif
            </div>
       
            @foreach ($results as $nivel)
              @if(count($nivel->cnos)>0)
              <div class="collection with-header col s12" style="padding: 0px; margin:0px;" >
                <div class="collection-header  heading-level-s">
                  <p class="text-center">{{$nivel->desc}}</p>
                </div>
                <div class="col s8 offset-s2">
                @foreach ($nivel->cnos as $key=>$cno)
                
                <a style="z-index: 100;" href="/profesion/{{$cno->cod_profesion}}/{{$nivel->id}}" class="collection-item avatar ">
                  <i class="circle grey lighten-3">{{ ++$key }}</i>
                  <span class=" title"><p><strong>{{$cno->ocupacion}}</p></strong> </span>

                </a>
                @endforeach
              </div>
              @endif
              </div>
              
              
              @endforeach
              </div>
           
          
          <div class="col s12  center-align"> 
              @if($level!=null)
              <a class="" href="/caracterizacion/{{$survey}}">
                  <img src="/btn/BOTON REDODNO ROJO BACK-16.png" width="40">
              </a>
              <p class="pink-s">Regresar</p>
 
              @endif
            
          </div>
        
     
    
    
    
  </div>
</div>
@endsection