@extends('layouts.app') @section('content') @if( !empty( Auth::user()->id))
<div class="container" ng-controller="SurveyController as surveyCrtl" ng-init="surveyCrtl.profile.user_id={{Auth::user()->id}}">
    @else
    <div class="container" ng-controller="SurveyController as surveyCrtl">
        @endif
        <div class="row animated fadeInLeft " style="padding-top: 2%;">
            <div class="row">
                <div class="container-fluid  center-align ">
                    <div class="row center-align" style="margin-bottom: 0;">
                        <h6 class="blue-s">Progreso</h6>
                    </div>
                    <!-- hl-sticky="" offsetTop="10" -->
                    <div class="row progress-lcr valign-wrapper" class="simple">
                        <div class="col s9 m10 offset-m1 center-align">
                            <uib-progressbar class="progress-striped active" max="52" value="surveyCrtl.answers_done" type="success">
                            </uib-progressbar>
                        </div>
                        <div class="col blue-s" style="font-size: 11px;">
                            <p>
                                <%surveyCrtl.answers_done %> de 52
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <!--Encuesta-->

            <wizard name="mainw" class="slide-animate" hide-indicators="true" on-finish="finishedWizard()" on-cancel="cancelledWizard()" indicators-position="top">
                <wz-step wz-title="Test">
                    <div class="row">
                        <div class="col s2">

                        </div>
                        <div class="panel-body col s10">

                            <div class="col s8 valign-wrapper   ">

                            </div>
                            <div class="col s4 ">

                                <div class="col s3 center-align">
                                    <div class="row">
                                        <img src="/images/ICONOS PEQ-17.png" style="width: 35px;
                                opacity: 1;
                                filter: alpha(opacity=1);">
                                    </div>
                                    <div class="">
                                        <h6 style="font-size: 12px;"> Me encanta</h6>
                                    </div>
                                </div>

                                <div class="col s3 center-align">
                                    <div class="row">
                                        <img src="/images/ICONOS PEQ-18.png" style="width: 35px;
                                opacity: 1;
                                filter: alpha(opacity=50);">
                                    </div>
                                    <div class="">
                                        <h6 style="font-size: 12px;">Me gusta</h6>
                                    </div>
                                </div>

                                <div class="col s3 center-align">
                                    <div class="row">
                                        <img src="/images/ICONOS PEQ-19.png" style="width: 35px;
                                opacity: 1;
                                filter: alpha(opacity=1);">
                                    </div>
                                    <div class="">
                                        <h6 style="font-size: 12px;">No estoy seguro</h6>
                                    </div>
                                </div>
                                <div class="col s3 center-align">
                                    <div class="row">
                                        <img src="/images/ICONOS PEQ-20.png" style="width: 35px;
                                    opacity: 1;
                                    filter: alpha(opacity=1);">
                                    </div>
                                    <div class="">
                                        <h6 style="font-size: 12px;">No me gusta</h6>
                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>
                 
                    <div style="margin: 5px;" class="row" ng-repeat="question in surveyCrtl.questions | limitTo:surveyCrtl.pagination.perPage/3:(surveyCrtl.pagination.perPage/3)*surveyCrtl.pagination.page">

                        <div class="panel-body col s12  ">

                            <!--encuesta-->

                            <div class="row" style="margin-bottom: 0;">
                                <!-- <question ng-show="surveyCrtl.inputType" question="question"> </question>-->
                                <question-click ng-show="!surveyCrtl.inputType" donecount="surveyCrtl.answers_done" question="question">
                                </question-click>
                                <div class="alert-danger" role="alert">
                                    <span class="error" ng-show="!question.done &&
                                      surveyCrtl.sectionsErrors.s1">
                                    *Esta pregunta esta incompleta!</span>
                                </div>

                            </div>
                            {{ csrf_field() }}




                        </div>
                        <div class="row border-top">

                        </div>
                    </div>

                    <div class="col s4">
                        <div class="col s12 center-align">
                            <div ng-click="surveyCrtl.back($index)" ng-show="surveyCrtl.pagination.page>0" style="margin-right: 35px;" href="#" class="waves-effect waves-light" wz-previous>
                                <img width="50" src="/btn/BOTON REDODNO ROJO BACK-16.png" width="200">
                                <p class="pink-s">Regresar</p>

                            </div>

                            <div href="#" class="waves-effect waves-light" ng-click="surveyCrtl.validate(surveyCrtl.pagination.page)" value="Continue">
                                <img width="50" src="/btn/BOTON REDONDO AZUL NEXT-16.png" width="200">
                                <p class="blue-s">Continuar</p>
                            </div>
                        </div>
                    </div>
                </wz-step>


            </wizard>

        </div>
    </div>
</div>
@endsection