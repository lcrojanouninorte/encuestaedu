@extends('layouts.app')
@section('content')
<div class="container"  ng-controller="SurveyController as surveyCrtl">
   
  <uib-tabset active="surveyCrtl.active">
  <uib-tab index="0" >
  <uib-tab-heading>
  <i class="glyphicon glyphicon-bell"></i> Resultados por area
  </uib-tab-heading>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Areas</div>
        <div class="panel-body">
          <div class="col-md-6 col-md-offset-3 text-center">
            
            <table class="table table-bordered text-center">
              <thead>
                <tr >
                @if($level!=null)
                <h6>CARRERAS QUE CONINCIDEN CON TU NIVEL DE PREPARACIÓN:</h6>
                
                  <th>Ocupación</th>
                  <th>Descripción</th>
                 
                 @elseif($category!=null)
                 <p>Elije un nivel de conocimiento:</p>
                   <th>Nivel</th>
                  @else
                  <p>Elije una categoria en la cual desempeñarte:</p>
                   <th>Categoria</th>

              @endif
                </tr>
              </thead>
              <tbody>
                @foreach ($results as $result)
                <tr>
                  @if($level!=null)
                  <td><a href="/cno/{{}}">{{$result->ocupacion}}</a></td>
                  <td> {{$result->desc_ocupacion}} </td>
                  
                  @elseif($category!=null)
                  <td><a href="/cno/{{$survey}}/{{$cod_area}}/{{$category}}/{{$result->nivel}}" > {{$result->nivel}}</a> </td>
                  @else
                  <td><a href="/cno/{{$survey}}/{{$cod_area}}/{{$result->categoria}}" > {{$result->categoria}}</a> </td>
                  @endif
                  
                </tr>
                
                @endforeach
              </tbody>
            </table>
          </div>
          <br>
          <div class="col-md-5 col-md-offset-5">
            
            @if($level!=null)
            <a class="btn btn-primary" href="/cno/{{$survey}}/{{$cod_area}}/{{$category}}/">Volver</a>
            
            @elseif($category!=null)
            <a class="btn btn-primary" href="/cno/{{$survey}}/{{$cod_area}}/">Volver</a>
            @else
            <a class="btn btn-primary" href="/surveys/{{$survey}}">Volver</a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  </uib-tab>
  </uib-tabset>
 
  
</div>
@endsection