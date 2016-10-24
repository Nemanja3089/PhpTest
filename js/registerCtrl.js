(function() {
    'use strict';

    angular
        .module('myApp')
        .controller('RegisterCtrl', RegisterCtrl);

    function RegisterCtrl($http, $location, $rootScope) {
        
        var vm = this;
        vm.message = false;
        vm.code = '';
        vm.register = register;
        vm.ObjecttoParams = ObjecttoParams;
        
        function ObjecttoParams(obj) {
            var p = [];
            for (var key in obj) {
                p.push(key + '=' + encodeURIComponent(obj[key]));
            }
            return p.join('&');
        }

        function register(user) {
            $http({
                method: 'POST',
                url: 'http://localhost/tutorials/zadatak/user/register',
                data: vm.ObjecttoParams(user),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function(response) {
                $rootScope.user = response.data.user;
                $location.path('dashboard');
             
            }, function(error) {
                vm.message = error.data;
                vm.code = error.data.code;
                $location.path('registration');
            });
        }
    }
})();