(function () {
    'use strict';

    angular.module('app.pages.index', ['ui.router'])
            .config(routeConfig);

    function routeConfig($stateProvider) {
        $stateProvider
            .state('/', {
                url: '/',
                // views: {
                //     main: {
                //         templateUrl: 'views/pages/index/index.html'
                //     }
                // },
                templateUrl: 'views/pages/index/index.html',
                controller: "IndexController as index"

            });
    }
})();
