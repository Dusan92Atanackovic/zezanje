(function () {
    'use strict';
    angular
        .module('app.pages.landing')
        .controller("LandingController", LandingController);


    function LandingController(){
        var vm = this;
        vm.atana = "Atana je car LandingController";

        vm.lf = function(){
          console.log('in landing controller');
        };

    }
})();
