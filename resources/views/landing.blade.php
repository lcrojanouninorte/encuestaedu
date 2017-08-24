<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title>Orienta-T</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/personal.css" rel="stylesheet">
        
        
        <!-- Styles -->
        <style>
        html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
        }
        .full-height {
        height: 100vh;
        }
        .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
        }
        .position-ref {
        position: relative;
        }
        .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
        }
        .content {
        text-align: center;
        }
        .title {
        font-size: 84px;
        }
        .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
        }
        .m-b-md {
        margin-bottom: 30px;
        }
        </style>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
    </head>
    <body class="full-height  ">
        <div class="row">
       
            <div class="col s12 left-align" style="margin: 10px;min-height: 100px">
                <img id="logo-nav" class="logo-principal logo-nav" src="/logo.png" style="width: 50px">
            </div>
        </div>
        <div class="valign-wrapper" style="padding: 10px; flex-direction: column;min-height: 420px">
            <div class="row">
                <div class="col s12" style="min-height: 100px">
                    <div id="splashscreen" >
                     <div class="col s12 center-align">
                        <h2>Bienvenido a </h2>
                     </div>
                        <div class="row">
                            <div class="col s12 center-align">
                                <img class="logo-principal logo-main" src="/logo.png" style="width: 170px">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="options">
                        <div class=" col s12 center-align begin">
                            <a  href="/questions" class="waves-effect waves-light btn-large blue darken-1">
                            Empezar<i class="material-icons right">play_arrow</i></a>
                        </div>
                        <div class=" col s12 center-align" style="margin-top: 5px;">
                            <p>Ó</p>
                        </div>
                        
                        <div class=" col s12 center-align" style="margin-top: 5px;text-decoration: underline;color:blue;">
                            <a  href="/login" class=" btn-link">
                            Iniciar Sesión</a>
                        </div>
                        
                        
                    
                    </div>
                </div>
                
            </div>
            <div id="illustracion" class="ilustracion-wrapper col s12 center-align" >
                        <img   class="ilustracion" src="/ilustracion.png">
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col s12 logos-wrapper " style="    padding: 0px;">
                    <div class="logos  valign-wrapper">
                        <div class="col s4 center-align">
                            <img class="logo1" src="/logos/uninorte.jpg" >
                        </div>
                        <div class="col s4 center-align"  >
                            <img class="logo1" src="/logos/promigas.jpg"  style="width: 135px">
                        </div>
                        <div class="col s4 center-align">
                            <img class="logo1" src="/logos/camaracomercio.png"  >
                        </div>
                    </div>
                </div>
                <div class="row center-align" >
                    <div class="col s12 m6 offset-m3">
                        <br>
                        <p class="disclaimer"><b>Disclaimer:</b> Los derechos de Autor del Test Preferencias Profesionales (PPS) les corresponden a Carlos Yuste, David Yuste y Jose Luis Galvez. Hace parte de su propiedad intelectual y se reservan sus derechos de autor. Se ha autorizado el uso del Test para fines educativos e investigativos sin ningún tipo de lucro. </p>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
        <script type="text/javascript">
        $(function(){

            $('#splashscreen').show();
            setTimeout(function(){
                $('#splashscreen').fadeOut("slow");
            },2000);

            $('#logo-nav').hide();
            setTimeout(function(){
                $('#logo-nav').fadeIn("slow");
            },2900);

            $('#illustracion').hide();
            setTimeout(function(){
                $('#illustracion').fadeIn("slow");
            },2900);


            $('#options').hide();
            setTimeout(function(){
                $('#options').fadeIn("slow");
            },2900);

        });
        </script>
    </body>
</html>