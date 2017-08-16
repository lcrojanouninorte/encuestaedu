(function() {
    'use strict';
    var directives = angular.module('app.directives', []);
    directives.directive('question', question);

    directives.directive('onFinishRender', function ($timeout) {
    return {
        restrict: 'A',
            link: function (scope, element, attr) {
                if (scope.$last === true) {
                    scope.$evalAsync(attr.onFinishRender);
                     element.parent().draggable = true;
                }
            }
        }
    });

    /** @ngInject */
    function question(apiConf) {
        var directive = {
            restrict: 'E',
            templateUrl: apiConf.questionTemplate,
            //template: '<button type="button" class="btn btn-default">button</button>',
            scope: {
                question: '='
            },
            controller: questionsController,
            controllerAs: 'vm',
            bindToController: true,
            link: linkf
        };

        return directive;

        /** @ngInject */
        function linkf(scope, el, attr, vm) {
            // scope.question = attr.questionTemplate    ;
            //vm.qIndex = scope.pmp.qIndex;
        }
        /** @ngInject */
        function questionsController($scope, $log, $attrs, survey) {
            var vm = this;
            //vm.questions =  survey.currentSurvey();
            vm.clicked = {};
            vm.answers = [];
            vm.loadNgSortable = function() {
                console.log('loaded');
            }

            


            //version2

            vm.dragControlListeners = {
                accept: function(sourceItemHandleScope, destSortableScope){ 
                      return sourceItemHandleScope.itemScope.sortableScope.$id === destSortableScope.$id;

                }, //override to determine drag is allowed or not. default is true.
                itemMoved: function(event){
                   vm.question.done = true;
                },
                orderChanged: function(event){
                     event;
                     vm.question.done = true;
                },
               // containment: '#board', //optional param.
                //clone: true, //optional param for clone feature.
                allowDuplicates: false //optional param allows duplicates to be dropped.
            };

            vm.dragControlListeners1 = {
                containment: '#board', //optional param.
                allowDuplicates: true //optional param allows duplicates to be dropped.
            };

            //clases de ayuda general
            vm.setQuestionDone = function(){
                vm.question.done = true;
            }

            //clases de ayuda visual css
            vm.isQuestionDone = function(){
                if(vm.question.done){
                    return "done";
                }else{
                    return "not-done";
                }
            }





        }

    }



})();
