(function() {
    'use strict';
    
    angular
        .module('myApp')
        .controller('HomeCtrl', HomeCtrl);

    function HomeCtrl($location, $scope, $rootScope) {
        //DATA
        var vm = this;
        vm.search = '';
        vm.message = false;
        vm.code = '';
        vm.error = false;
        vm.user = $rootScope.user || false;
        console.log('$rootScope.user', vm.user );
        //METHODS
        vm.redirect = redirect;

        function redirect() {
            if (vm.user) {
                $location.path('dashboard');
            } else {
                vm.error = 'Please Log-in to continue...';
            }
        }
        /**
         *Function to watch user input 
         */
        $scope.$watch(function() {
            if (vm.search) {
                vm.query = vm.search.charAt(0).toUpperCase() + vm.search.substr(1).toLowerCase();
            }
            if (vm.search.length < 1) {
                vm.query = '';
            }
            return vm.query;
        }, function(current) {
            if (current === undefined) {
                vm.search = '';
            } else {
                console.info('search', current);
                $rootScope.search = current;
            }
        });
    }
})();