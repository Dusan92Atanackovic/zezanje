(function () {
    'use strict';
    angular
            .module('app.pages.index')
            .controller("IndexController", IndexController);

    /** @ngInject */
    /* @Controller */

    function IndexController($http, $state, $uibModal, $rootScope, $scope, $localStorage){


        var vm = this;
        vm.lokal = "";
        vm.obrok = "";
        vm.qrac = "";
        vm.selected = 'sve';

        vm.checkUser = function(){
            console.log($rootScope.name, 'rsn');
            if ($rootScope.name == undefined){
                vm.showUser = false;
            }else{

                vm.showUser = true;
                vm.user     = $rootScope.name;
            }

        };
        vm.checkUser();

        vm.login = function () {

            $uibModal.open({
                animation: true,
                templateUrl: "/views/pages/index/modals/login.html",
                size: "lg",
                scope:$rootScope,
                controller: 'LoginController as login',
                resolve : {
                    name : function() { return $scope.name; }
                }

            }).result.then(function(result) {
                // console.log(result);
                var res = result;
                if (res == undefined || res == null){
                    vm.showUser = false;
                }
                else{
                    vm.showUser = true;
                    vm.user = res;
                    $rootScope.name = res;
                    // vm.storage = $localStorage;
                    // console.log(vm.storage);
                    // console.log(vm.storage['name']);
                    // console.log(vm.storage.name);
                }
            });

        };

        vm.logout = function(){
            console.log('log out');
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
            if (lokal === "sve") {
                temp = vm.obrok;
            }
            vm.qrac = temp;

        };

        vm.addFood = function (obrok) {
            $http.get('/api/add_order').success(function (response) {
                console.log(response);

            });
        };

    }
})();
