@extends('layouts.app')
@section('content')
<div class="container"  ng-controller="SurveyController as surveyCrtl">
  @if (Auth::check())
  
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