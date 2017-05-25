@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                @if(empty($survey['id']))
                <div class="col-md-4 col-md-offset-4">
                    
                    <a href="{{url('questions')}}"><button type="button" class="btn btn-primary">Crear encuesta</button></a>

                </div>
                @else

                <p>A continuación puede observar la encuesta que ya realizo o sus resultados.</p>
             
                <div class="col-md-4 col-md-offset-4 text-center">
                    <div class="row">
                    <a href="surveys/{{$survey->id}}"><button type="button" class="btn btn-primary btn-block">Ver Encuesta Realizada</button></a>
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
