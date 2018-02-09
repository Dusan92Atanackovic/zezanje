(function () {
    'use strict';

    angular.module('app.pages.login', ['ui.router'])
            .config(routeConfig);

    function routeConfig($stateProvider) {
        $stateProvider
            .state('/login', {
                url: '/login',
                // views: {
                //     main: {
                //         templateUrl: 'views/pages/index/index.html'
                //     }
                // },
                templateUrl: 'views/pages/login/login.html',
                controller: "LoginController as login"

            });
    }
})();
