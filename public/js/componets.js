var componets = angular.module('app.componets', []);

componets.component('questionClick', {
    bindings: {
        question: '<',
        donecount: '='
    },


    controller: function() {



        this.clicked = {};
        this.answers = [];

        //version 1
        this.setValue = function(question, option, event, opt) {
            option.opacity1 = 0.5;
            option.opacity2 = 0.5;
            option.opacity3 = 0.5;
            option.opacity4 = 0.5;
            option[opt] = 1;
            if (opt == "opacity1") {
                option.value = 1;
            }
            if (opt == "opacity2") {
                option.value = 2;
            }
            if (opt == "opacity3") {
                option.value = 3;
            }
            if (opt == "opacity4") {
                option.value = 4;
            }

            this.clicked = option;
            if (this.answers.length < 4) {
                if (this.answers.indexOf(option) === -1) {
                    this.answers.push(option);
                    //option.value = Math.abs(this.answers.length - 5);
                    //$(event.target).find(".item-check").addClass('color-position-'+option.value);
                } else {
                    var index = this.answers.indexOf(option);
                    if (index > -1) {
                        this.answers.splice(index, 1);
                        // $(event.target).find(".item-check").removeClass('color-position-'+option.value);
                        // option.value = 0;
                        angular.forEach(this.answers, function(option, key) {
                            // option.value = Math.abs(key - 4);
                        });
                    }
                }
            }
            if (this.answers.length >= 4) {
                this.setQuestionDone();
            }



        }


        this.reset = function(question) {
                for (var i = question.options.length - 1; i >= 0; i--) {
                    question.options[i].value = 0;
                    question.options[i].opacity[1] = 0.5;
                    question.options[i].opacity[2] = 0.5;

                    question.options[i].opacity[3] = 0.5;

                    question.options[i].opacity[4] = 0.5;

                }
                this.answers = [];
                if (this.question.done) {
                    //  this.donecount--;
                }
                this.question.done = false;

            }
            //fin version 1

        //clases de ayuda general
        this.setQuestionDone = function() {
            if (!this.question.done) {
                this.donecount++;
            }
            this.question.done = true;


        }

        //clases de ayuda visual css
        this.isQuestionDone = function() {
            if (this.question.done) {
                return "question-done";
            } else {
                return "not-done";
            }
        }


    },
    templateUrl: "templates/question-click.template.html"
});