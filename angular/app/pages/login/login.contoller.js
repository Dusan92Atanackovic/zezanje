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
             $http.post('/login',{"email":vm.username,"password":vm.password}).success(function (response) {
                
                
               console.log(response);

               

            });
        };
    }
       
})();
