(function(){
"use strict";

angular.module('app.pages',
        [   
            'ui.router',
            'app.pages.index',
            'app.pages.landing'
        
        ])
        .config(function ($urlRouterProvider){
             $urlRouterProvider.otherwise('/');       
        });
    
    })();