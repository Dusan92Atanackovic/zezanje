(function () {
    'use strict';
    angular
        .module('app.pages.index')
        .controller("LoginController", IndexController2);

    /** @ngInject */
    /* @Controller */

    function IndexController2( $rootScope, $uibModalInstance) {
    var vm = this;

    vm.nesto = 'atana je car';

    // console.log('inside login controller');

    vm.yes = function(){
        console.log('inside login controller');
        $uibModalInstance.close("Success!");
    };

    }
})();
