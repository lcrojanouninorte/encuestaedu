@extends('layouts.app')
@section('content')
<div class="container"  ng-controller="SurveyController as surveyCrtl">
  <div class="row">
    <div class="col s12">
      <div class="panel panel-default animated fadeInLeft">
        
        <div class="panel-body ">
          <div class="col s12">
            <div class="col s12 center-align">
           
              <!--<img class="" src="/logo.png" style="width: 100px;">-->
            </div>
            
            <div class="col s12 text-center"><h5>CARRERAS QUE COINCIDEN CON TUS INTERESES Y NIVEL DE PREPARACION</h5>
            <p>Haz click en cada ocupación para conocer con más detalle</p>
</div>


            <div class="col s12">
              <div class="collection with-header" >
                <div class="collection-header  green accent-1"><h6 class="text-center bold">{{$level->desc}}</h6></div>

                @if(count($level->cnos)>0)
                  @foreach ($level->cnos as $key=>$cno)
                  
 
                  <a style="z-index: 100;" href="/profesion/{{$cno->cod_profesion}}/{{$level->id}}" class="collection-item avatar valign-wrapper">
 
                    <i class="circle green">{{ ++$key }}</i>
                    <span class=" title"><p>  {{$cno->ocupacion}}</p></span>
                  </a>
                 
                  
                 
                  @endforeach

                  <!--<div class="col s12 center-align"> <a href="/cnopdf/{{$survey}}/{{$cod_area}}/{{$category}}/{{$level->id}}" class="btn btn-primary" target="_blank"> Descargar Pdf</a></div>-->
                @else
                  <p>No hay profesiones para este nivel de preparación</p>
                @endif
              </div>
          </div>

            
            <div class="col s12  "><br>
          <!--  <br><h6>OTROS NIVELES QUE TE PUEDEN INTERESAR:</h6></div>-->
            <div class="col s12">
            @foreach ($results as $nivel)
              @if(count($nivel->cnos)>0)
            <div class="collection with-header "  >
              <div class="collection-header yellow  lighten-{{$nivel->id}}"><h6 class="text-center bold">{{$nivel->desc}}</h6></div>
                @foreach ($nivel->cnos as $key=>$cno)
              
              <a style="z-index: 100;" href="/profesion/{{$cno->cod_profesion}}/{{$nivel->id}}" class="collection-item avatar ">
                <i class="circle green">{{ ++$key }}</i>
                <span class=" title"><p>  {{$cno->ocupacion}}</p></span>
                
                
              </a>
               @endforeach 
              </div>              
              @endif
           
            
            @endforeach
            </div>
            
       
          <br>
          <div class="col-md-5 col-md-offset-5">
            
            @if($level!=null)
            <a class="btn btn-primary" href="/caracterizacion/{{$survey}}">Volver</a>
            
             
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  </div>
</div>
@endsection