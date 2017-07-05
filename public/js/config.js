var app = angular.module('surveyApp', 
  [
  'ngTouch',
  'ngAnimate',
  'simplePagination',
    'ui.bootstrap',
    'as.sortable',
    'app.services',  
    'app.controllers',
    'app.directives',
    'app.componets',
    'hl.sticky','mgo-angular-wizard'
    ]); 


app.config(config);

  /** @ngInject */
  function config($interpolateProvider) {
    // Enable log
     $interpolateProvider.startSymbol('<%');
     $interpolateProvider.endSymbol('%>');  
     
    
     
  }

var local = {
  	"apiHost": "http://encuestaedu.app/api",
    "questionTemplate": "/templates/question.template.html",
    "resultUrl":"http://localhost/pmp_hugo/PMP/public/results/"
  };
  var prod = {
    "login":  "http://colorado.uninorte.edu.co/evadoc_api/login/google",
    "logout": "http://colorado.uninorte.edu.co/evadoc_api/logout",
    "base":   "http://colorado.uninorte.edu.co/evadoc_api/",
    "port": "80"
  };
angular.module("surveyApp")
	   .constant('apiConf',local);
 

 