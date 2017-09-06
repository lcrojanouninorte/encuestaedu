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
        <div class="col m8 offset-m2">
            <div class="panel panel-default animated fadeInLeft" >
                <div class="panel-heading">
                    Mis Herramientas 
                </div>

                <div class="panel-body  center-align valign-wrapper"  style="min-height: 220px;">
                <div class="container " > 
                 
                @if(empty($survey['id']))

                    <div class="col s10 offset-s1" >
                    <p class="blue-s" style="font-size: 14px;">Haz click en el siguiente enlaces para realizar el test.</p>
                    <br> 
                        
                        <a href="{{url('questions')}}">
                        <img src="/btn/iniciar.png" width="200">
                        </a>


                    </div>
                @else

                <p class="blue-s" style="font-size: 14px;">Haz click en los siguientes enlaces para ver los resultados
de tu test o para borrarlos y realizarlo de nuevo.</p>
             <br> 
                <div class=" text-center">
                    <div class="row text-center">
                    <a  href="caracterizacion/{{$survey->id}}"><img src="/btn/MIS RESULTADOS.png" width="200"></a>
                    <br> 
                    <br> 
                    <br> 
                    {{ Form::open(['method' => 'DELETE', 'route' => ['surveys.destroy', $survey->id]]) }}
                        {{ Form::token()}}
                        {{ Form::hidden('id', $survey->id) }}
                        {{ Form::submit('Borrar encuesta realizada ', ['class' => 'btn btn-pink']) }}
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
</div>
@endsection
