@extends('layouts.app')
@section('content')
<div class="row" id="profesiones">
	<div class=" container">
		<div class="row" style="margin-bottom: 5px!important;">
			<div class="col s12 m6 animated fadeIn" style="    padding: 0 .3rem; ">
				<div class="card-panel   box-s  " style="background-color: #5076BA;">
					<div class="row ">
						<img class="col" style="height: 50px;" src="/images/PERSONALIDAD.png">
						<h5 class="text-center col">Personalidad</h5>
					</div>
					
					<h6 class="text-center">{{$results->ocupacion}}</h6>
					<br>
					<p>{{$results->desc_ocupacion}}</p>
				</div>
			</div>
			
			<div class="col s12 m6 animated fadeIn  " style="    padding: 0 .3rem; ">
				<div class="card-panel box-s" style="background-color: #7391C8;">
					<div class="row ">
						<img class="col" style="height: 45px;" src="/images/SALIDA OCUPACIONAL.png">
						<h5 class="text-center col">Salida Ocupacional</h5>
					</div>
					<div class="row">
						
						<h6 class="text-center col">
						@if($results->descoutputs->count()>0)
						<span style="font-weight: bolder;" >{{$results->descoutputs[0]->onet}}</span>
						@else
						N/A
						@endif
						</h6>
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
		</div>
		<div class="row">
			<div class="col s12 m4 animated fadeIn  box-s" style="    padding: 0 .3rem; ">
				<div class="card-panel  box-s" style="background-color: #D86C8C;">
					<div class="row ">
						
						<img class="col" style="height: 40px;" src="/images/HABILIDADES.png">
						<h5 class="text-center col">Habilidades</h5>
					</div>
					
					<ul class="profesion">
						@foreach ($results->skills as $skill)
						<li><span class="valign-wrapper"><i class="small material-icons">label_outline</i>{{$skill->habilidad}}</span></li>
						@endforeach
					</ul>
					
					
				</div>
			</div>
			
			<div class="col s12 m4 animated fadeIn  box-s" style="    padding: 0 .3rem ; ">
				<div class="card-panel  box-s" style="background-color: #FF8E72;">
					<div class="row ">
						
						<img class="col" style="height: 40px;  " src="/images/CONOCIMIENTOS.png">
						<h5 class="  col" style="padding: 0px">Conocimientos</h5>
					</div>
					<ul>
						@foreach ($results->knowledges as $knowledge)
						<li><span class="valign-wrapper"><i class="small material-icons">label_outline</i>{{$knowledge->conocimiento}}</span></li>
						@endforeach
					</ul>
					
					
				</div>
			</div>
			<div class="col s12 m4 animated fadeIn  box-s" style="    padding: 0 .3rem; ">
				<div class="card-panel  box-s" style="background-color: #F7D06F;">
					<div class="row ">
						
						<img class="col" style="height: 40px;" src="/images/OFERTA ACADEMICA.png">
						<h5 class="col" style="font-size: 1.4em;">Oferta Académica</h5>
					</div>
					<ul class="row">
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
					<div class="row right-align">
						<a class="col s12" style="color: white;" href="http://aprende.colombiaaprende.edu.co/buscandocarrera" target="_blank">Más información  <i class="material-icons">chevron_right</i></a>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<br>
	<div style="margin-top:30px;" class="row center-align hide-print">
		<div class="col s12">
			<div class="col s12 m6 left-align">
				<div class="col s12   center-align">
					<a  class="  col s12" href="{{ url()->previous() }}">
						<img src="/btn/BOTON REDODNO ROJO BACK-16.png" width="50px">
						<p class="pink-s">Regresar</p>
					</a>
				</div>
			</div>
			
			 
				<div class="col 12 center-align">
					<div class="col  s12 m4">
						
						<a  class="    " href="#" onclick="myFunction()" target="_blank">
							<img src="/btn/IMPRIMIR.png" width="150">
						</a>
					</div>
					<div class="col  s12 m4">
						
						<a  class="   " href="/profesionpdf/{{$cod_profesion}}/{{$nivel}}" target="_blank">
							<img src="/btn/PDF.png" width="150">
						</a>
					</div>
					<div class="col s12 m4">
						
						<a  class="   " href="/profesionemail/{{$cod_profesion}}/{{$nivel}}" >
							<img src="/btn/ENVIAR CORREO.png" width="150">
						</a>
					</div>
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