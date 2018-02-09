(function () {
    'use strict';
    angular
            .module('app.pages.index')
            .controller("IndexController", IndexController);

    /** @ngInject */
    /* @Controller */

    function IndexController($http) {
        var vm = this;
        vm.lokal = "";
        vm.obrok = "";
        vm.qrac = "";
        vm.selected = 'sve';

        vm.logMe = function () {
            console.log('log me');
        };
        vm.google = function () {
            var win = window.open("/#/landing");
            win.focus();
        };
        
        vm.lokals = function () {

            $http.post('/api/get_lokals').success(function (response) {
                vm.lokal = response;
            });
        };
        
        vm.obroks = function () {

            $http.post('/api/get_obroks').success(function (response) {
                
                vm.obrok = response;
                vm.qrac = response;
            });

        };

        vm.sift = function (lokal) {
            vm.selected = lokal;
            vm.qrac = vm.obrok;
            var l = vm.obrok.length;
            var temp = [];
            for (var i = 0; i < l; i++) {
                if (vm.obrok[i].lokal === lokal) {
                    temp.push(vm.obrok[i]);
                }
            }
            if(lokal === "sve"){
                temp = vm.obrok;
            }
            vm.qrac = temp;

        };

    }
})();
