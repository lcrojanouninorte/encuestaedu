@extends('layouts.app')
@section('content')
<div >
<div class="row">
	

      <div class="col s12">

        <div class="card-panel center-align">
         
              <img class="" src="/logo.png" style="width: 100px;">
 

			<h4 class="text-center">{{$results->ocupacion}}</h4>
				<p>{{$results->desc_ocupacion}}</p>
 
        </div>
      </div>
    </div>
	

</div>

<div class="row">

	<div class="row">
      <div class="col s12 m4">
        <div class="card-panel ">
        <div class="row">
        	<img class="col" style="height: 45px;" src="http://danieldonahoo.com/wp-content/uploads/2015/11/settings-icon.png">
			<h5 class="text-center col">Habilidades</h5>
        </div>
        	
			<ul class="profesion">
			@foreach ($results->skills as $skill)
				<li><span class="valign-wrapper"><i class="small material-icons">label_outline</i>{{$skill->habilidad}}</span></li>
		    @endforeach
		    </ul>
				
 
        </div>
      </div>
  
      <div class="col s12 m4">
        <div class="card-panel ">
			<div class="row">
        	<img class="col" style="height: 45px;" src="http://eversity.uasys.edu/sites/default/files/content/paragraphs/text-graphic/problem_solving.png">
			<h5 class="text-center col">Conocimientos</h5>
       		 </div>
			<ul>
			@foreach ($results->knowledges as $knowledge)
				<li><span class="valign-wrapper"><i class="small material-icons">label_outline</i>{{$knowledge->conocimiento}}</span></li>
		    @endforeach
		    </ul>
				
 
        </div>
      </div>
      <div class="col s12 m4">
        <div class="card-panel ">
			<div class="row">
        	<img class="col" style="height: 45px;" src="https://www.shareicon.net/download/2016/07/22/800263_start_512x512.png">
			<h5 class="text-center col">Salidas Ocupacionales</h5>
        </div>
			<ul>
			@foreach ($results->outputs as $output)
				@if($output->nivel == $nivel)

				<li><span class="valign-wrapper"><i class="small material-icons">label_outline</i>{{$output->salida}}</span></li>
				@endif
		    @endforeach
		    </ul>
				
 
        </div>
      </div>
    </div>
 <br>
          <div style="margin-top:30px;" class="col-md-5 col-md-offset-5">
            <a class="btn btn-success" href="/">Volver al Inicio</a>

          </div>

 

</div>
@endsection