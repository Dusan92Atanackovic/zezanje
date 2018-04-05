(function(){
"use strict";

angular.module('app.pages',
        [   
            'ui.router',
            'ui.bootstrap',
            'ngStorage',
            'app.pages.index',
            'app.pages.landing',
            'app.pages.login'
        
        ])
        .config(function ($urlRouterProvider){
             $urlRouterProvider.otherwise('/');       
        });
    
    })();