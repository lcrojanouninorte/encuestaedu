@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">










    <div class="flash-message animated fadeIn">
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
            <div class="panel panel-default animated fadeInLeft" >
                <div class="panel-heading">
                    Mis Herramientas 
            
                </div>

                <div class="panel-body valign-wrapper center-align"  style="min-height: 200px; flex-direction: column;">
                @if(empty($survey['id']))
                <div class="col s12">
                    
                    <a href="{{url('questions')}}"><button type="button" class="btn btn-primary">Crear encuesta</button></a>


                </div>
                @else

                <p class="text-center">Da click en el siguiente enlace para ver los resultados de tu encuesta.</p>
             <br> 
                <div class=" text-center">
                    <div class="row text-center">
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
