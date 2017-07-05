

@extends('layouts.app') 
@section('content')
<style type="text/css">
@page { margin: 0px; }
body { margin: 0px; }
#login-nav{display: none;}
header { position: fixed; top: 100px; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
footer { position: fixed; bottom: 0px; left: 0px; right: 0px;  height: 80px; }
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
<div class="container"  ng-controller="SurveyController as surveyCrtl" style="position: relative;top:20px;color: black!important"> 
   
 
 
   <h2 class="center-align">Inicia tu Ruta Ocupacional</h2>
 

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading"> <p>Puedes acceder a una de estas ocupaciónes:</p></div>
        <div class="panel-body">
          <div class="col-md-12  text-center">
            <table class="table table-bordered text-center">
              <thead>
                <tr >
                  <th>Ocupación</th>
                  <th>Descripción</th>
                  <th>Habilidades</th>
                  <th>Conocimientos</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($results as $result)
                <tr>
                    <td> {{$result->ocupacion}} </td>
                    <td> {{$result->desc_ocupacion.""}} </td>
                    <td> 
                      <ul style="list-style-type: circle;">
                        @foreach ($result->skills as $habilidad)
                        <li>{{$habilidad->habilidad}}</li>
                        @endforeach
                      </ul>
                    </td>
                    <td> 
                      <ul style="list-style-type: circle;">
                        @foreach ($result->knowledge as $conocimiento)
                        <li>{{$conocimiento->conocimiento}}</li>
                        @endforeach
                      </ul> 
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
          </div>
          <br>

        </div>
      </div>
    </div>
  </div>
 
</div>
</main>
<div class="row">
   <footer class="logos col-sm-12 ">

 
                <div class="col-sm-4 center-align">
                    <img src="logos/uninorte.jpg" >
                </div>
                <div class="col-sm-4 center-align" >
                     <img src="logos/promigas.jpg" style="max-width: 120px;">
                </div>
                <div class="col-sm-4 center-align">
                    <img src="logos/camaracomercio.png" style="max-width: 160px;">
                </div>
                   
                   
                
  </footer>

</div>
 
@endsection