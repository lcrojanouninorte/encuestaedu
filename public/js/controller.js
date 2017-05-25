angular.module('app.controllers', [])
    .controller('SurveyController', function($scope, survey, $log, $window) {
            var surveyCrtl = this;
            surveyCrtl.questions = [];
            surveyCrtl.answers = [];
            surveyCrtl.profile = {
              user_id:"",
              nombre: "",
              edad: "",
              curso:"",
              institucion: ""
            }
            surveyCrtl.active = 0;
            surveyCrtl.tabs = [
                { disabled: false },
                { disabled: true },
                { disabled: true },
            ];


            surveyCrtl.next = function(tab_index){
              //validar que el formulario este completo
              surveyCrtl.active = tab_index;
              surveyCrtl.tabs[tab_index].disabled = false;

            }

            //Iniciar solicitando las preguntas
            survey.getQuestions("token").then(function(data) {
                if (!$.isEmptyObject(data) && data !== null && typeof(data) != "undefined") {
                    surveyCrtl.questions = data;
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
                            if(data.success){
                              //se guardo correctamente, redireccionar al dashboar
                              $window.location.href = '/surveys/'+data.survey.id;
                              //redireccionar a home
                            }else{
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

            });
