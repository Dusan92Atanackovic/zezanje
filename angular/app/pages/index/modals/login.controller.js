(function () {
    'use strict';
    angular
        .module('app.pages')
        .controller("LoginController", IndexController2);

    /** @ngInject */
    /* @Controller */

    function IndexController2( $scope, $uibModalInstance, name, $timeout) {
    var vm = this;

    // $timeout(function(){
    //     console.log('1000');
    // }, 1000);

    vm.nesto = 'atana je car';

    // console.log('inside login controller');

    vm.confirm = function(){
        console.log('inside login controller');
        if (vm.name == undefined || vm.name.length < 3){
            console.log('toaster');
        }
        else{
            $uibModalInstance.close(vm.name);
        }
    };

    vm.cancel = function(){
        vm.name = null;
        $uibModalInstance.close(vm.name);
    };

    }
})();
