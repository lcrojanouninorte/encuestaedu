<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" ng-app="surveyApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Orienta-T') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ng-sortable.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ng-sortable.style.min.css') }}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.css">

    <link href="{{ asset('/css/personal.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/angular-wizard.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/ng-dialog/css/ngDialog.min.css">
    <link rel="stylesheet" href="/css/ng-dialog/css/ngDialog-theme-default.min.css">
  
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
<!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
        <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

 
</head>
<body >
    <div id="app">
 <nav class="navbar navbar-default navbar-static-top hide-print hidden-print z-depth-0">
            <div class="container">
                <div class="navbar-header ">

                    <!-- Collapsed Hamburger-->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
 
                    </button>
 
                    <!-- Branding Image-->
                    <a class="navbar-brand" href="{{ url('/') }}">
                         <img id="logo-nav" class=" logo-nav" src="/logo.png" style="width: 100px">
                    </a> 
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul id="login-nav" class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <!--  <li><a href="{{ route('login') }}">Iniciar Sesión <i class="material-icons right">exit_to_app</i></a> </li>-->
                           <!-- <li><a href="{{ route('register') }}">Register</a></li>-->
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>


<div class="flash-message">
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
        @yield('content')
    </div>

    <!-- Scripts -->

<!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <!-- Compiled and minified JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>

        
   
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-touch.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-animate.js"></script>
    <script src="{{ URL::asset('js/angular-sticky.min.js') }}"></script>
    <script src="{{ URL::asset('js/angular-wizard.min.js') }}"></script>
    <script src="{{ URL::asset('js/ng-sortable.min.js') }}"></script>
    <script src="{{ URL::asset('js/ui-bootstrap-tpls-2.5.0.min.js') }}"></script>
    <script src="{{ URL::asset('js/simplePagination.js') }}"></script>
    <script src="{{ URL::asset('js/configs.js') }}"></script>
    <script src="{{ URL::asset('js/controller.js') }}"></script>
    <script src="{{ URL::asset('js/services.js') }}"></script>
    <script src="{{ URL::asset('js/directive.js') }}"></script>
    <script src="{{ URL::asset('js/componets.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <script src="http://cdn.jsdelivr.net/angular.chartjs/latest/angular-chart.min.js"></script>

    <script src="/js/ng-dialog/ngDialog.min.js"></script>
     <script src="/js/SweetAlert.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.js"></script>





</body>
</html>
