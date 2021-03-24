@extends('layouts.app') @section('content')

<div class="row" ng-controller="SurveyController as surveyCrtl">


    <div class="container container-custom center-align">
        <div class="row">
            <div class="col s12  center-align">
                <img class="logo-principal" src="/LOGO GRANDE-16.png">
            </div>
            <div class="col s12 center-align">
                <h4 class="slogan"><strong>Inicia tu ruta ocupacional.</strong></h4>
            </div>
        </div>

        <div class="row center-align">
            <div class=" col s12 m6  right-align reg-btn" ng-click="surveyCrtl.clickToOpen2()">
                <!--<a  href="/questions" class=" waves-effect waves-light ">-->
                <img src="/btn/REGISTRATE-16.png" width="200"></a>
            </div>


            <div class=" col s12 m6  left-align iniciar-btn" ng-click="surveyCrtl.clickToOpen()">

                <!--<a  href="/login" class="waves-effect waves-light">-->
                <img src="/btn/INICIAR SESION-16.png" width="200"></a>
            </div>

        </div>


        <div class="row" style="margin-top: 8%;">
            <div class="col s12 m8 offset-m2 logos-wrapper " style="    padding: 0px;">
                <div class="logos  valign-wrapper">
                    <div class="col s12 m4 center-align">
                        <img class="logo1 animated fadeIn" src="/logos/uninorte.png">
                    </div>
                    <div class="col s12 m4 center-align">
                        <img class="logo1 animated fadeIn" src="/logos/promigas.jpg" style="width: 135px">
                    </div>
                    <div class="col s12 m4 center-align">
                        <img class="logo1 animated fadeIn" src="/logos/camaracomercio.png">
                    </div>
                </div>
            </div>
            <div class="row left-align">
                <div class="col s12 m8 offset-m2">
                    <br>
                    <p class="disclaimer">Los derechos de Autor del Test Preferencias Profesionales (PPS) les corresponden a Carlos Yuste, David Yuste y Jose Luis Galvez. Hace parte de su propiedad intelectual y se reservan sus derechos de autor. Se ha autorizado a la universidad
                        del Norte, la Camará de Comercio de Barranquilla y a Promigas el uso del Test para fines educativos e investigativos sin ningún tipo de lucro. </p>
                </div>

            </div>
        </div>

    </div>
    @if ($errors->has('email') || $errors->has('password'))
    <div ng-init="surveyCrtl.clickToOpen();"></div>
    @endif
    <script type="text/ng-template" id="loginForm">

        <div class="panel panel-default animated fadeInLeft">
            <div class="panel-heading">
                Iniciar Sesión
            </div>

            <div class="panel-body  center-align valign-wrapper" style="min-height: 220px;">
                <div class="row">

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col m4 control-label">E-Mail </label>

                            <div class="col m8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required> @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col m4 control-label">Contraseña</label>

                            <div class="col m8">
                                <input id="password" type="password" class="form-control" name="password" required> @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col s12 text-center">
                                <button type="submit" class="btn btn-blue">
                                    Login
                                </button>

                                <a class=" col s12" href="{{ route('password.request') }}">
                                    Olvidaste Tu Contraseña?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </script>


    <script type="text/ng-template" id="registerForm">

        <div class="panel panel-default animated fadeInLeft">
            <div class="panel-heading">
                Iniciar Sesión
            </div>

            <div class="panel-body  left-align valign-wrapper" style="min-height: 220px;">
                <div class="row">
                    <div class="container">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <form name="registerForm" role="form" method="POST" action="{{ route('register_orientate') }}" style="margin-top: 10px;">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input id="Nombre" ng-model="surveyCrtl.profile.nombre" name="nombre" type="text" placeholder="" class="validate form-control input-md" required autofocus>
                                    <div class="   alert-danger" role="alert">
                                        <span class="error" ng-show="registerForm.nombre.$touched && registerForm.nombre.$error.required">
                    *El nombre es obligatorio!</span>
                                        <span class="error" ng-show="registerForm.nombre.$touched && registerForm.nombre.$error.text">
                    *Este no es un nombre valido!</span>
                                    </div>
                                    <label class="control-label" for="Nombre">Nombre*</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="Apellido" ng-model="surveyCrtl.profile.apellido" name="apellido" type="text" placeholder="" class="validate" required>
                                    <div class="   alert-danger" role="alert">
                                        <span class="error" ng-show="registerForm.apellido.$touched && registerForm.apellido.$error.required">
                    *El apellido es obligatorio!</span>
                                        <span class="error" ng-show="registerForm.apellido.$touched && registerForm.apellido.$error.text">
                    *Este no es un apellido valido!</span>
                                    </div>
                                    <label for="Apellido">Apellido*</label>
                                </div>

                            </div>
                            <div class="row">

                                <div class="input-field col s12  form-group">
                                    <p>Estrato</p>
                                    <select id="stratum" ng-model="surveyCrtl.profile.stratum" name="stratum" class="validate form-control input-md" required>
                        <option value="" disabled selected>Estrato</option>
                        <option value="1">Estrato 1</option>
                        <option value="2">Estrato 2</option>
                        <option value="3">Estrato 3</option>
                        <option value="4">Estrato 4</option>
                        <option value="5">Estrato 5</option>
                        <option value="6">Estrato 6</option>
                </select>


                                    <div class="alert-danger" role="alert">
                                        <span class="error" ng-show="registerForm.stratum.$touched && registerForm.stratum.$error.required">
                    *El Estrato es obligatorio!</span>
                                        <span class="error" ng-show="registerForm.stratum.$touched && registerForm.stratum.$error.text">
                    *Este no es un Estrato valido!</span>
                                    </div>

                                </div>


                            </div>



                            <div class="row">
                                <!-- Text input-->
                                <div class="input-field col s12 ">
                                    <label class="control-label" for="institucion">Colegio ó Universidad</label>
                                    <input id="institucion" ng-model="surveyCrtl.profile.institucion" name="institucion" type="text" placeholder="" class="form-control input-md">
                                    <div class="   alert-danger" role="alert">
                                    </div>

                                </div>

                                <div class="input-field col s12 ">
                                    <p>Sector:</p>
                                    <p class="col sm-6">
                                        <label>
                    <input  ng-model="surveyCrtl.profile.inst_type" name="group1" type="radio" checked />
                    <span>Público</span>
                </label>
                                    </p>
                                    <p class="col sm-6 ">
                                        <label ng-model="surveyCrtl.profile.inst_type">
                    <input name="group1" type="radio" />
                    <span>Privado</span>
                </label>
                                    </p>
                                </div>


                            </div>
                            <!---->



                            <div class="row">
                                <div class="  col s12   form-group">
                                    <p>Departamento</p>
                                    <select id="dpto" ng-model="surveyCrtl.profile.dpto" name="dpto" class="validate form-control input-md" required>
                            <option value="" disabled selected>Departamento</option>
                        </select>


                                    <div class="alert-danger" role="alert">
                                        <span class="error" ng-show="registerForm.dpto.$touched && registerForm.dpto.$error.required">
                        *El Departamento es obligatorio!</span>
                                        <span class="error" ng-show="registerForm.dpto.$touched && registerForm.dpto.$error.text">
                        *Este no es un Departamento valido!</span>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="  col s12   form-group">
                                    <p>Municipio </p>
                                    <select id="muni" ng-model="surveyCrtl.profile.muni" name="muni" class="validate form-control input-md" required>
                            <option value="" disabled selected>Municipio</option>
                    </select>

                                    <div class="alert-danger" role="alert">
                                        <span class="error" ng-show="registerForm.muni.$touched && registerForm.muni.$error.required">
                        *El Municipio es obligatorio!</span>
                                        <span class="error" ng-show="registerForm.muni.$touched && registerForm.muni.$error.text">
                        *Este no es un Municipio valido!</span>
                                    </div>

                                </div>
                            </div>
                            <!---->
                            <div class="row">
                                <div class="input-field col s12  ">
                                    <input id="phone" ng-model="surveyCrtl.profile.phone" name="phone" type="number" placeholder="" class="form-control input-md">
                                    <label class="control-label" for="edad">Teléfono</label>
                                    <div class="alert-danger" role="alert">
                                        <span class="error" ng-show="registerForm.phone.$touched && registerForm.phone.$error.number">
                    *No es un telefono valido!</span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <!-- Text input-->
                                <div class="input-field col s12 m6 ">
                                    <input id="edad" ng-model="surveyCrtl.profile.edad" name="edad" type="number" placeholder="" class="form-control input-md">
                                    <label class="control-label" for="edad">Edad</label>
                                    <div class="alert-danger" role="alert">
                                        <span class="error" ng-show="registerForm.edad.$touched && registerForm.edad.$error.number">
                *No es una edad valida!</span>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="input-field col s12 m6">
                                    <label class="  control-label" for="grado">Grado</label>
                                    <input ng-model="surveyCrtl.profile.curso" name="grado" type="text" id="test1" />
                                    <div class="   alert-danger" role="alert">

                                        <span class="error" ng-show="registerForm.grado.$touched && registerForm.grado.$error.text">
                                *No es una edad valida!</span>
                                    </div>

                                </div>

                            </div>

                            <div class="row center-align">

                                <div class="input-field col s12 ">
                                    <label class="control-label" for="email">E-Mail*</label>

                                    <input id="email" ng-model="surveyCrtl.profile.email" name="email" type="email" placeholder="" class="form-control input-md" required>
                                    <div class="   alert-danger" role="alert">
                                        <span class="error" ng-show="registerForm.email.$touched && registerForm.email.$error.required">
                            *E-mail es obligatorio!</span>
                                        <span class="error" ng-show="registerForm.email.$touched && registerForm.email.$error.email">
                            *Este no es un E-mail Valido!</span>
                                    </div>

                                </div>
                                <!-- Text input-->
                                <div class="input-field col s12 m8 offset-m2">
                                    <label class="control-label" for="contrasena">Contraseña*</label>

                                    <input id="contrasena" ng-model="surveyCrtl.profile.contrasena" name="contrasena" type="password" placeholder="" class="form-control input-md" required>
                                    <div class="   alert-danger" role="alert">
                                        <span class="error" ng-show="registerForm.contrasena.$touched && registerForm.contrasena.$error.required">
                            *Este campo es obligatorio!</span>

                                    </div>

                                </div>
                                <div class="input-field col s12 m8 offset-m2">
                                    <label class=" control-label" for="contrasena2">Verificar Contraseña*</label>

                                    <input id="Institución" ng-model="surveyCrtl.profile.contrasena2" name="contrasena2" type="password" placeholder="" class="form-control input-md" required>
                                    <div class="   alert-danger" role="alert">
                                        <span class="error" ng-show="registerForm.contrasena2.$touched && registerForm.contrasena2.$error.required">
                            *Este campo es obligatorio!</span>
                                        <span class="error" ng-show="registerForm.contrasena2.$touched && (surveyCrtl.profile.contrasena != surveyCrtl.profile.contrasena2)">
                            *No Coinciden!</span>

                                    </div>

                                </div>
                            </div>

                            <!-- Form Name -->
                            <div class="col s12   text-left center-align" style="margin-top: 15px;">
                                <a href="https://drive.google.com/file/d/0B7oqoVmBYZyqZnhKX0ZtQ3lyb0E/view?usp=sharing" target="_blank" class="row "> Al hacer click en "Continuar" Acepta la politica de tratamiento de datos</a>
                                <br>

                            </div>
                            <!--<div class=" col s12 m12 center-align   waves-effect waves-light " ng-disabled="!registerForm.$valid" type="button">
                    <img src="/btn/REGISTRATE-16.png" width="200">
                    </div>-->
                            <button type="submit" class="btn btn-pink col s12 m12 center-align   waves-effect waves-light" ng-disabled="!registerForm.$valid">
                                    Regístrarse
                                </button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </script>


</div>


<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>



@endsection