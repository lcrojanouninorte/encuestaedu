@extends('layouts.app')
@section('content')
<div class="container"  ng-controller="SurveyController as surveyCrtl">


<uib-tabset active="surveyCrtl.active">
  <uib-tab index="0" >
  <uib-tab-heading>
  <i class="glyphicon glyphicon-bell"></i> Caracterizacion
  </uib-tab-heading>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Areas</div>
        <div class="panel-body">
<div class="col-md-12 col-md-offset-0 text-center">

<h3>Escoje un area ocupacional en cada una de las categorias:</h3>
<p>Es posible que solo halla una sola area de aplicación.</p>

 
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Puntaje</th>
                <th >Area</th>
                <th>Categoria</th>
              </tr>
            </thead>
            <tbody>
            
              @foreach ($results as $result)
              <tr>
                <td>{{$result->total}} </td>
                <td ><a href="/cno/{{$survey->id}}/{{$result->cod_area}}" > {{$result->desc_area}}</a> </td>
                <td>
                @if(!count($result->categorias)>0)
                    No existen categorias para el nivel de educación seleccionado 
                @else
                 <form action="#">
                   <ul>
                     @foreach ( $result->categorias as $categoria)
                     <li>
                      
                        <p>
                          <input ng-model="categoria{{$result->area}}" name="group{{$result->area}}" type="radio" id="test{{$result->area}}{{$categoria->categoria}}" value="{{$categoria->categoria}}"/>
                          <label for="test{{$result->area}}{{$categoria->categoria}}">{{$categoria->categoria_desc}}</label>
                        </p>
                         
                     
                      
                       
                     </li>
                     @endforeach

                   </ul>
                 
                   <a href="/cnopdf/{{$survey->id}}/{{$result->cod_area}}/<% categoria{{$result->area}} %>/{{$nivel}}" class="btn btn-primary" type="submit"> Descargar Pdf</a>
            </form>
                   @endif
                </td>
              </tr>
              
              @endforeach
                  
             
            </tbody>
          </table>
          
          </div>

          <br>
          <div style="margin-top:30px;" class="col-md-5 col-md-offset-5">
            <a class="btn btn-success" href="/">Volver</a>

          </div>
        </div>
      </div>
    </div>
  </div>
 </uib-tab>

   <!-- Pagina 2, profile-->
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
  </uib-tabset>


 
  
</div>
@endsection