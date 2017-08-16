@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">










    <div class="flash-message">
   @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
           
            <div class="row">
                  <div class="col s12 ">
                    <div class="card-panel green accent-1">
                       <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                    </div>
                  </div>
                </div>

            @endif
    @endforeach

       
</div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Mis Herramientas 
            
                </div>

                <div class="panel-body">
                @if(empty($survey['id']))
                <div class="col-md-4 col-md-offset-4">
                    
                    <a href="{{url('questions')}}"><button type="button" class="btn btn-primary">Crear encuesta</button></a>


                </div>
                @else

                <p class="text-center">A continuación puede ver los resultados de la encuesta.</p>
             <br> 
                <div class=" text-center">
                    <div class="row">
                    <a class="btn btn-danger" href="caracterizacion/{{$survey->id}}">RESULTADOS</a>
                    <p>ó</p>
                    {{ Form::open(['method' => 'DELETE', 'route' => ['surveys.destroy', $survey->id]]) }}
                {{ Form::token()}}
                {{ Form::hidden('id', $survey->id) }}
                {{ Form::submit('Borrar encuesta realizada ', ['class' => 'btn btn-danger']) }}
            {{ Form::close() }}
             
                    </div>
                    <br> 
                    
 
                </div>


                @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
