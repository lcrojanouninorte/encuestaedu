<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" ng-app="surveyApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Proyectate') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ng-sortable.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ng-sortable.style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/personal.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/angular-wizard.min.css') }}" rel="stylesheet">
<!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">


</head>
<body >
    <div id="app">


        @yield('content')
    </div>

    <!-- Scripts -->

<!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>

        
   
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-touch.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-animate.js"></script>
    <script src="{{ URL::asset('js/angular-sticky.min.js') }}"></script>
    <script src="{{ URL::asset('js/angular-wizard.min.js') }}"></script>
    <script src="{{ URL::asset('js/ng-sortable.min.js') }}"></script>
    <script src="{{ URL::asset('js/ui-bootstrap-tpls-2.5.0.min.js') }}"></script>
    <script src="{{ URL::asset('js/simplePagination.js') }}"></script>
    <script src="{{ URL::asset('js/config.js') }}"></script>
    <script src="{{ URL::asset('js/controller.js') }}"></script>
    <script src="{{ URL::asset('js/service.js') }}"></script>
    <script src="{{ URL::asset('js/directive.js') }}"></script>
    <script src="{{ URL::asset('js/componets.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>


</body>
</html>
