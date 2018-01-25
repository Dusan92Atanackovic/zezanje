(function () {
    'use strict';

    angular.module('app.pages.landing', ['ui.router'])
            .config(routeConfig);

    function routeConfig($stateProvider) {
        $stateProvider
                .state('/landing', {
                    url: '/landing',
                    // views: {
                    //     main: {
                    //         templateUrl: 'views/pages/landing/landing.html'
                    //     }
                    // },
                    templateUrl: 'views/pages/landing/landing.html',
                    controller: "LandingController as landing",

                });
    }
})();
 
