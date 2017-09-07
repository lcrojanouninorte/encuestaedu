var componets = angular.module('app.componets', []);

componets.component('questionClick', {
  bindings: {
    question: '<',
    donecount : '='
  },

  
  controller: function () {

    

    this.clicked = {};
    this.answers = [];

    //version 1
            this.setValue = function(question, option, event) {
                this.clicked = option;
                if (this.answers.length < 4) {
                    if (this.answers.indexOf(option) === -1) {
                        this.answers.push(option);
                        option.value = Math.abs(this.answers.length - 5) ;
                        //$(event.target).find(".item-check").addClass('color-position-'+option.value);
                    } else {
                        var index = this.answers.indexOf(option);
                        if (index > -1) {
                            this.answers.splice(index, 1);
                           // $(event.target).find(".item-check").removeClass('color-position-'+option.value);
                            option.value = 0;
                            angular.forEach(this.answers, function(option, key) {
                                option.value = Math.abs(key - 4);
                            });
                        }
                    }
                }
                  if (this.answers.length == 4) {
                    this.setQuestionDone();
                  }
                


            }


            this.reset = function(question) {
                for (var i = question.options.length - 1; i >= 0; i--) {
                    question.options[i].value = 0;
                }
                this.answers = [];
                if(this.question.done){
                  this.donecount--;  
                }
                 this.question.done  = false;
                 
            }
            //fin version 1

            //clases de ayuda general
            this.setQuestionDone = function(){
                if(!this.question.done){
                  this.donecount++;  
                }
                this.question.done = true;

                
            }

            //clases de ayuda visual css
            this.isQuestionDone = function(){
                if(this.question.done){
                    return "question-done";
                }else{
                    return "not-done";
                }
            }


  },
  templateUrl: "templates/question-click.template.html"
});