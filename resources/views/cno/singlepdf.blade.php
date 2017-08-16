

@extends('layouts.app') 
@section('content')
<style type="text/css">
@page { margin: 0px; }
body { margin: 0px; }
nav{display: none;}
header { position: fixed; top: 100px; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
.footer { position: fixed; bottom: 0px; left: 0px; right: 0px;  height: 80px; }
li {
    list-style-type: circle!important;
}
ul {
    padding-left: 10px!important;
}
.panel-body {
   padding: 0px;
    padding-top: 15px;
}
</style>
<!--<header>header on each page</header>-->


<main>

<div class="row">

  <div class=" container">

  
      <div class="col s12">
        <div class="card-panel center-align">
              <img class="" src="/logo.png" style="width: 100px;">
      <h4 class="text-center">{{$results->ocupacion}}</h4>
        <p>{{$results->desc_ocupacion}}</p>
        </div>
      </div>
 
 
      <div class="col s12 ">
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
  
      <div class="col s12 ">
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
      <div class="col s12 ">
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
          <?php  $title_old= $output->desc_ciu; ?>

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
      <div class="col s12 ">
        <div class="card-panel ">
      <div class="row">
          <img class="col" style="height: 45px;" src="https://www.shareicon.net/download/2016/07/22/800263_start_512x512.png">
      <h5 class="text-center col">Salidas Ocupacionales</h5>
        </div>
      <ul>
 
      @foreach ($salidas as $output)
          <li>
        <span class="valign-wrapper"><i class="small material-icons">label_outline</i>{{$output}}:</span>

        </li>
        
        @endforeach
        </ul>
        
 
        </div>
      </div>
    </div>
 <br>
          <div style="margin-top:30px;" class="col-md-12  text-center">
            <a class="btn btn-success" href="/">Volver al Inicio</a>
 <a class="btn btn-primary" href="/profesionpdf/{{$cod_profesion}}/{{$nivel}}" target="_blank">Descargar Pdf</a>
                      <a class="btn btn-primary" href="/profesionpdf/{{$cod_profesion}}/{{$nivel}}" target="_blank">Enviar a E-mail</a>
          </div>

 

</div>
</main>
 
   <div class="footer logos row ">

 
                <div class="col-sm-4 ">
                    <img src="logos/uninorte.jpg" >
                </div>
                <div class="col-sm-4 " >
                     <img src="logos/promigas.jpg" style="max-width: 120px;">
                </div>
                <div class="col-sm-4 ">
                    <img src="logos/camaracomercio.png" style="max-width: 160px;">
                </div>
                   
                   
                
  </div>

 
 
@endsection