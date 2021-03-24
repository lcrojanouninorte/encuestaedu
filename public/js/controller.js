angular.module('app.controllers', [])
    .controller('SurveyController', function($scope, survey, $log, $window, Pagination, WizardHandler, ngDialog) {
        var surveyCrtl = this;

        surveyCrtl.pagination = Pagination.getNew(18);
        surveyCrtl.pagination.numPages = 0;
        surveyCrtl.questions = [];
        surveyCrtl.answers = [];
        surveyCrtl.splash = true;
        surveyCrtl.sectionsErrors = {
            s1: false,
            s2: false,
            s3: false
        };
        surveyCrtl.profile = {
            user_id: "",
            nombre: "",
            edad: "",
            curso: "",
            institucion: ""
        }
        surveyCrtl.active = 0;
        surveyCrtl.answers_done = 0;
        surveyCrtl.tabs = [
            { disabled: false },
            { disabled: true },
            { disabled: true },
        ];
        surveyCrtl.inputType = false;


        surveyCrtl.labels = ['2006', '2007', '2008', '2009', '2010', '2011', '2012'];
        surveyCrtl.series = ['Series A', 'Series B'];

        surveyCrtl.chart_data = [
            [65, 59, 80, 81, 56, 55, 40]

        ];

        surveyCrtl.paginationPerPage = function() {
            //surveyCrtl.pagination.perPage = 10
        }



        surveyCrtl.next = function(tab_index) {
            //validar que el formulario este completo
            surveyCrtl.active = tab_index;
            surveyCrtl.tabs[tab_index].disabled = false;

        }
        surveyCrtl.back = function(question_index) {
            if (surveyCrtl.pagination.page > 0) {
                surveyCrtl.pagination.page = surveyCrtl.pagination.page - 1;

            }
        }
        surveyCrtl.validate = function(question_index) {
            var is_ok = true;
            if (surveyCrtl.pagination.page < surveyCrtl.pagination.numPages) {
                surveyCrtl.pagination.page = surveyCrtl.pagination.page + 1;

            }


            if (!surveyCrtl.questions[question_index].done) {

                $window.scrollTo(0, 0);
                is_ok = false;


            }
            $window.scrollTo(0, 0);

            if (is_ok) {
                WizardHandler.wizard('mainw').next();
                if (surveyCrtl.pagination.page > surveyCrtl.pagination.numPages) {
                    surveyCrtl.save();
                }
                if (question_index == 51) {
                    // surveyCrtl.save();
                }
            } else {
                // swal("!Esta pregunta esta sin contestar!", "¡Recuerda elegir todas las opciones en orden de preferencia!");
            }

            return is_ok;
        }

        //Iniciar solicitando las preguntas
        survey.getQuestions("token").then(function(data) {
            if (!$.isEmptyObject(data) && data !== null && typeof(data) != "undefined") {
                surveyCrtl.questions = data;
                surveyCrtl.pagination.numPages = Math.ceil(surveyCrtl.questions.length / surveyCrtl.pagination.perPage) * 3 - 1;
                //active();
            } else {
                surveyCrtl.questions = {};
            }
            $log.debug("recibido en questions controller: ", surveyCrtl.questions);
        });


        //Guardar encuesta
        surveyCrtl.save = function() {
            //TODO: preguntar un modal
            survey.create(surveyCrtl.profile).then(
                function(data) {
                    if (!$.isEmptyObject(data) && data !== null && typeof(data) != "undfined") {
                        if (data.success) {
                            //se guardo correctamente, redireccionar al dashboar
                            $window.location.href = '/caracterizacion/' + data.survey.id;
                            //$window.location.href = '/survey/'+data.survey.id;
                            //redireccionar a home
                        } else {
                            //mostrar que hubo un error al guardar
                            alert("error al guardar intente mas tarde");
                        }
                        //active();
                    } else {
                        alert("error al guardar intente mas tarde");
                    }
                    // $log.debug("recibido en questions controller: ", surveyCrtl.questions);
                });

        }

        //helpers

        surveyCrtl.canExitChar = function() {
            //Verificar si el e-mail ya existe
            return survey.isNewEmail(surveyCrtl.profile.email).then(
                function(data) {
                    if (!$.isEmptyObject(data) && data !== null && typeof(data) != "undfined") {
                        if (data.success) {
                            if (!data.newUser) {
                                alert("Ya has ingresado anteriormente, por favor ingresa con tu usuario y contraseña");
                                $window.location.href = '/login';
                            }
                        } else {
                            //mostrar que hubo un error al guardar
                            alert("error intente mas tarde");
                        }
                        //active();
                    } else {
                        alert("error intente mas tarde");
                    }
                    // $log.debug("recibido en questions controller: ", surveyCrtl.questions);
                });

        };

        //animation

        surveyCrtl.hide_splash = function() {
            surveyCrtl.splash = false;
        }

        surveyCrtl.getAreasResults = function(survey_id) {
            //Verificar si el e-mail ya existe


            return survey.getSurveyResults(survey_id).then(
                function(data) {
                    if (!$.isEmptyObject(data) && data !== null && typeof(data) != "undfined") {
                        surveyCrtl.chart_data = [];
                        surveyCrtl.labels = [];

                        angular.forEach(data, function(area, key) {
                            surveyCrtl.chart_data.push(area.total);
                            var desc_area = area.desc_area.split(":")
                            desc_area = desc_area[0];
                            surveyCrtl.labels.push(desc_area);
                        });
                    } else {
                        alert("error preuebe su conexion");
                    }
                    // $log.debug("recibido en questions controller: ", surveyCrtl.questions);
                });

        };


        //Dialog
        surveyCrtl.clickToOpen = function() {
            ngDialog.open({ template: 'loginForm', className: 'ngdialog-theme-default' });
        };
        surveyCrtl.clickToOpen2 = function() {
            ngDialog.open({ template: 'registerForm', className: 'ngdialog-theme-default custom-width-800', });
        };

    });