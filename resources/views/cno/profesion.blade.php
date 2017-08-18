@extends('layouts.app')
@section('content')
 

<div class="row">

	<div class=" container">

  
      <div class="col s12 " style="    padding: 0 .3rem;">
        <div class="card-panel center-align">
              <img class="" src="/logo.png" style="width: 100px;">
			<h4 class="text-center">{{$results->ocupacion}}</h4>
				<p>{{$results->desc_ocupacion}}</p>
        </div>
      </div>
 

       <div class="col s12 " style="    padding: 0 .3rem; page-break-inside: avoid;">
        <div class="card-panel ">
			<div class="row">
        	<img class="col" style="height: 45px;" src="https://www.shareicon.net/download/2016/07/22/800263_start_512x512.png">
			<h5 class="text-center col">Salida Ocupacional: <span style="font-weight: bolder;" >{{$results->descoutputs[0]->onet}}</span></h5>
        </div>
			<ul>

			 
			<li>
				<p style="font-weight: bold;">Descripción:</p>
				<span class="valign-wrapper"> {{$results->descoutputs[0]->desc}}</span>

				</li>
 
		
		    </ul>
				
 
        </div>
      </div>
 
      <div class="col s12 m4 " style="    padding: 0 .3rem; page-break-inside: avoid;">
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
  
      <div class="col s12 m4 " style="    padding: 0 .3rem ; page-break-inside: avoid;">
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


      <div class="col s12 m4 " style="    padding: 0 .3rem; page-break-inside: avoid;">
        <div class="card-panel ">
			<div class="row">
        	<img class="col" style="height: 45px;" src="http://media.utp.edu.co/ilex/archivos/solicite-su-certificado-de-cursos-de-ingles-ilex/certificate-flat.png">
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