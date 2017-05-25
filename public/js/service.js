  angular.module('app.services',[])

  	.factory('survey', survey);

    /** @ngInject */
 
    function survey($log, $http,$filter, apiConf) {
        var apiHost = apiConf.apiHost;
        var currentSurvey = {};
 
        var service = {
            apiHost: apiHost,
            create:create,
            getQuestions: getQuestions,
            currentSurvey: getCurrentSurvey 

           // save: save,
           //stop: stop,
           //start: start
        };  
        var config = {};

        return service;

        function getQuestions(token) {
            var questions = {};
            $log.info("Obteniendo preguntas");
            return $http.get(apiHost +"/questions" )
                .then(getAnswersComplete)
                .catch(getAnswersFailed);

            function getAnswersComplete(response) {
                $log.info("devolviendo :", response);
                if (response.status == 200) { //Respuesta ok
                    if (typeof(response.data) != "undefined" && response.data != null) {//verificar que envio preguntas
                        currentSurvey = response.data;
                        return response.data;
                    } else {
                        return null //si no se ha realizado el insturmento
                    }
                }

                  currentSurvey = response.data;
                 return response.data;

            }

            function getAnswersFailed(error) {
                $log.error('XHR Failed for questions.\n' + angular.toJson(error.data, true));
                return questions;
            }
        }

        function getCurrentSurvey(){
            return currentSurvey;
        }     


        function create(profile) {
            var answers = {
                profile: profile,
                survey: currentSurvey
            };
            $log.info("Inicia proceso de guardado en base de datos del usuario" + answers.profile.user_id );
            $log.info("Enviando :", answers);
            return $http.post(apiHost +"/surveys",answers, {} )
                .then(postAnswersComplete)
                .catch(postAnswersFailed);

            function postAnswersComplete(response) {
                $log.info("devolviendo :", response);
                if (response.status == 200) { //Respuesta ok
                    if (typeof(response.data) != "undefined" && response.data != null) {//verificar que envio preguntas
                        if(typeof(response.data.questions)!="undefined"){
                        }
                        return response.data;
                    } else {
                        return null //si no se ha realizado el insturmento
                    }
                }

                return new_answers;

            }

            function postAnswersFailed(error) {
                $log.error('XHR Failed for getAnswers.\n' + angular.toJson(error.data, true));
                return null;
            }
        } 

    }
 
