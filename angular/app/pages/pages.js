(function(){
"use strict";

angular.module('app.pages',
        [   
            'ui.router',
            'ui.bootstrap',
            'ngStorage',
            'app.pages.index',
            'app.pages.orders',
            'app.pages.login'
        
        ])
        .config(function ($urlRouterProvider){
             $urlRouterProvider.otherwise('/');       
        });
    
    })();