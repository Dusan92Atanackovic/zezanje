(function () {
    'use strict';
    angular
        .module('app.pages.orders')
        .controller("OrdersController", OrdersController);


    function OrdersController(){
        var vm = this;
        vm.atana = "Atana je car orderController";

        vm.lf = function(){
          console.log('in orders controller');
        };

    }
})();
