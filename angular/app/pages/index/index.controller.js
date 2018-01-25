(function () {
    'use strict';
    angular
        .module('app.pages.index')
        .controller("IndexController", IndexController);

    /** @ngInject */
    /* @Controller */

    function IndexController($http){
        var vm = this;
        vm.atana = "Atana je car";


        vm.logMe = function(){
          console.log('log me');
        };
        vm.google = function(){
          var win = window.open("/#/landing");
          win.focus();
        };
        vm.rest = function () {
          $http.get('/api/test').success(function (response) {
              vm.atana = response;
          });
        };

    }
})();
