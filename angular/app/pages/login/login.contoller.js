(function () {
    'use strict';
    angular
            .module('app.pages.login')
            .controller("LoginController", LoginController);

    /** @ngInject */
    /* @Controller */

    function LoginController($http) {
        var vm = this;
        
        vm.login = function () {
             $http.post('/api/get_obroks',).success(function (response) {
                
                vm.obrok = response;
                vm.qrac = response;
               

            });
        };
    }
       
})();
