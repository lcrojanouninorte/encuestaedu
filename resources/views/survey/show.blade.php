@extends('layouts.app')
@section('content')
<div class="container"  ng-controller="SurveyController as surveyCrtl">
  @if (Auth::check())

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
  
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Area</th>
                <th>Puntaje Total</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($results as $result)
              <tr>
                <td>{{$result->area}}</td>
                <td>{{$result->total}} </td>
              </tr>
              
              @endforeach
            </tbody>
          </table>
          </div>

          <br>
          <div class="col-md-5 col-md-offset-5">
            <a class="btn btn-primary" href="{{ URL::route('home') }}">Volver</a>

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


  @else
  <div class="panel panel-default">
    <div class="panel-body">
      <h2 style="text-align: center">Login</h2>
      <p> Para ver la encuesta debes estar logeado</p>
    </div>
  </div>
  @endif
  
</div>
@endsection