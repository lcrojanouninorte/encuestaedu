@extends('layouts.app')
@section('content')
 

<div class="row" id="profesiones">

	<div class=" container">

  
      <div class="col s12 m6 " style="    padding: 0 .3rem;">

        <div class="card-panel center-align">
        <div class="row shifttitle">
        	<img class="col" style="height: 45px;" src="/images/7 icono personalidad.png">
			<h5 class="text-center col">Personalidad</h5>
        </div>
              <img class="" src="/logo.png" style="width: 100px;">
			<h4 class="text-center">{{$results->ocupacion}}</h4>
				<p>{{$results->desc_ocupacion}}</p>
        </div>
      </div>
 

       <div class="col s12 m6" style="    padding: 0 .3rem; page-break-inside: avoid;">
        <div class="card-panel ">
        <div class="row shifttitle">
        		<img class="col" style="height: 45px;" src="/images/7 icono conocimiento.png">
			<h5 class="text-center col">Salida Ocupacional</h5>
        </div>
			<div class="row">
        
			<h5 class="text-center col"> 
			@if($results->descoutputs->count()>0)
			<span style="font-weight: bolder;" >{{$results->descoutputs[0]->onet}}</span>
			@else
			N/A
			@endif

			</h5>
        </div>
			<ul>

			 
			<li>
				<p style="font-weight: bold;">Descripción:</p>
				@if($results->descoutputs->count()>0)
				<span class="valign-wrapper"> {{$results->descoutputs[0]->desc}}</span>
				@else
				N/A
				@endif

				</li>
 
		
		    </ul>
				
 
        </div>
      </div>
 
      <div class="col s12 m4 " style="    padding: 0 .3rem; page-break-inside: avoid;">
        <div class="card-panel ">
        <div class="row shifttitle">
<<<<<<< HEAD
        	<img class="col" style="height: 45px;" src="https://lh4.googleusercontent.com/aLWx8KEIU1z5TWP3aPTn0CmzXb3chV459kW-6psjb76dUk-d8xda2z8ACB4a9s5T-uZyyK8s9bgD0VI=w1920-h918">
=======
        	<img class="col" style="height: 45px;" src="/images/7 icono habilidades.png">
>>>>>>> 5e56ce35edba0c4a474fdf906e2d959471f2b50f
			<h5 class="text-center col">Habilidades</h5>
        </div>
        	
			<ul class="profesion">
			@foreach ($results->skills as $skill)
				<li><span class="valign-wrapper"><i class="small material-icons">label_outline</i>{{$skill->habilidad}}</span></li>
		    @endforeach
		    </ul>
				
 
        </div>
      </div>
  
      <div class="col s12 m4 " style="    padding: 0 .3rem ; page-break-inside: avoid;">
        <div class="card-panel ">
			<div class="row shifttitle">
 
        	<img class="col" style="height: 45px;" src="/images/7 icono aptitudes.png">
			<h5 class="text-center col">Conocimientos</h5>
       		 </div>
			<ul>
			@foreach ($results->knowledges as $knowledge)
				<li><span class="valign-wrapper"><i class="small material-icons">label_outline</i>{{$knowledge->conocimiento}}</span></li>
		    @endforeach
		    </ul>
				
 
        </div>
      </div>


      <div class="col s12 m4 " style="    padding: 0 .3rem; page-break-inside: avoid;">
        <div class="card-panel ">
			<div class="row shifttitle">
 
        	<img class="col" style="height: 30px; font-size: 12px" src="/images/7 icono educacion.png">
			<h5 class="text-center col">Oferta Académica</h5>
        </div>
			<ul>

			<?php  $title= "" ?>
			<?php  $salidas= [] ?>
			@foreach ($results->outputs as $output)
				@if($output->nivel == $nivel)
					<?php  $title_old= $output->onet; ?>

				<li>
					@if($title_old != $title || $title ="")
						 
						<?php 
						//TODO: cambiar esto para que lo haga desde el controlador, solo se debe crear una tabl a mas
							$salidas[] = $title_old;
							$title = $title_old; 
						?>
					@else
						<?php $title = $title_old; ?>
					@endif
				<span class="valign-wrapper"><i class="small material-icons">label_outline</i>{{$output->salida}}</span>

				</li>
				@endif
		    @endforeach
		    </ul>
				
 
        </div>
      </div>

    </div>
 <br>
          <div style="margin-top:30px;" class="col s12  text-center hide-print">
          <div class="container">
          	
          <div class="col s12 m3">
          	<a  class="btn btn-success col s12" href="{{ url()->previous() }}">Atras <i class="small material-icons">label_outline</i></a>
          </div>
            
            <div class="col s12 m3 ">
            	
            <a  class="btn btn-primary col s12" href="#" onclick="myFunction()" target="_blank">Imprimir <i class="small material-icons">label_outline</i></a>
            </div>
            <div class="col s12 m3">
            	
            <a  class="btn btn-primary col s12" href="/profesionpdf/{{$cod_profesion}}/{{$nivel}}" target="_blank">PDF <i class="small material-icons">label_outline</i></a>
            </div>
            <div class="col s12 m3">
            	
            <a  class="btn btn-primary col s12" href="/profesionemail/{{$cod_profesion}}/{{$nivel}}" >Enviar a E-mail <i class="small material-icons">label_outline</i></a>
            </div>
          </div>
          </div>

 

</div>
<script>
function myFunction() {
    window.print();
}
</script>
@endsection