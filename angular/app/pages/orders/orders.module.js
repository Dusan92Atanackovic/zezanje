(function () {
    'use strict';

    angular.module('app.pages.orders', ['ui.router'])
            .config(routeConfig);

    function routeConfig($stateProvider) {
        $stateProvider
                .state('/orders', {
                    url: '/orders',
                    // views: {
                    //     main: {
                    //         templateUrl: 'views/pages/landing/landing.html'
                    //     }
                    // },
                    templateUrl: 'views/pages/orders/orders.html',
                    controller: "OrdersController as orders",

                });
    }
})();
 
