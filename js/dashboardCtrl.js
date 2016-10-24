(function() {
    'use strict';
   
    angular
        .module('myApp')
        .controller('DashboardCtrl', DashboardCtrl);

    function DashboardCtrl($http, $location, $scope, $rootScope) {
        
        var vm = this;
        vm.search = $rootScope.search;
        vm.message = false;
        vm.code = '';
        vm.users = $rootScope.user;
        vm.predicate = 'user_id';
        vm.reverse = true;
        vm.loged = $rootScope.user;
        vm.getUsers = getUsers;
        vm.order = order;
        vm.searchFromRoot = searchFromRoot;
        vm.logout = logout;
        /**
         *This function is made to collect the data from the database
         */
        function getUsers() {
            
            $http({
                method: 'GET',
                url: 'http://localhost/---ROOT-----/user/getUsers'

            }).then(function(response) {
                vm.users = response.data;
                console.log('users', response.data);

            }, function(error) {
                vm.message = error.data.message;
                vm.code = error.data.code;
                console.error('error', error.data);
                $location.path('login');

            });
        }

        function searchFromRoot() {
            if (vm.search) {
                vm.getUsers();
            }
        }
        searchFromRoot();

        function order(predicate) {
            vm.reverse = (vm.predicate === predicate) ? !vm.reverse : false;
            vm.predicate = predicate;
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
            }
        });

        function logout() {
            $http.get('http://localhost/---ROOT-----/user/logOut').then(function(response) {
                delete $rootScope.user;
                $location.path('/');
              
            }, function(error) {
           
            });
        }
    }
})();