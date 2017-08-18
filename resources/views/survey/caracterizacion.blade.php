@extends('layouts.app')
@section('content')
<div class="container"  ng-controller="SurveyController as surveyCrtl">


 
 
  
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        
        <div class="panel-body">
<div class="col-md-12 col-md-offset-0 text-center">
<h5>Según tus respuestas, hemos detectado que las siguientes áreas son más afines a tu perfil</h5>

<br>
<div class="row">
@if(count($results)>=0)
  @foreach ($results as $key=>$result)
      <div class="col s12 m6">
        <div class="card" style="min-height: 500px;">
           <div id="area-{{$key}}" class=" valign-wrapper" style="min-height: 70px;">
           <div class="col s12 text-center">
             <h5>{{ $result->title}}</h5>
             </div>
          </div>
          <br>
         <p> <span class="valign-wrapper" style="color: #000;">En esta área puedes econtrar profeciones relacionadas con: {{$result->desc}}</span></p> 
            
          <div class="card-content">
          <div ><span>Puntaje:</span>
          <h4 class="text-center">{{$result->total}}</h4>
            
          </div>
          <p>Elije una categoria que te llame la atención:</p>
            <div class="collection row">
            @if(!count($result->categorias)>0)
                      <p>No Existen categorias asociadas nivel academico seleccionado, por favor intenta realizar nuevamente el test</p>
            @else
                       @foreach ( $result->categorias as $categoria)
                       <a class="collection-item" href="/cno/{{$survey->id}}/{{$result->cod_area}}/{{$categoria->categoria}}/{{$nivel}}">
                          {{$categoria->categoria_desc}}

                       </a>
                       @endforeach
           @endif
            </div>
          </div>
        </div>
      </div>

    
  @endforeach
@else
<h6>No hay una ruta ocupacional que corresponda a los criterios que has seleccionado, intenta volver a realizar el test.</h6>
@endif

  </div>
 

         
          
          </div>

          <br>
          <div style="margin-top:30px;" class="col-md-5 col-md-offset-5">
            <a class="btn btn-success" href="/">Volver</a>

          </div>
        </div>
      </div>
    </div>
  </div>
 

   <!-- Pagina 2, profile
  <uib-tab index="1" >
  <uib-tab-heading>
  <i class="glyphicon glyphicon-bell"></i> Resultado por pregunta
  </uib-tab-heading>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Questionario</div>
        <div class="panel-body">

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Pregunta</th>
                <th>Opcion</th>

                <th>Puntaje</th>
                <th>Area</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($survey->answers as $answer)
              <tr>
                <td>{{$answer->options->question->desc}}</td>
                <td>{{$answer->options->desc}} </td>
                <td>{{$answer->value}} </td>
                <td>{{$answer->options->area}}</td>
              </tr>
              
              @endforeach
            </tbody>
          </table>
          
          {{ csrf_field() }}
          <br>
          

          <div class="col-md-5 col-md-offset-5">
            <a class="btn btn-primary" href="{{ URL::route('home') }}">Volver</a>

          </div>
        </div>
      </div>
    </div>
  </div>
  </uib-tab>
  -->
 


 
  
</div>
@endsection