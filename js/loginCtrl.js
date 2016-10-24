(function() {
    'use strict';

    angular
        .module('myApp')
        .controller('LoginCtrl', LoginCtrl);

    function LoginCtrl($http, $location, $rootScope) {
        
        var vm = this;
        vm.message = false;
        vm.code = '';
        $rootScope.user = false;
        vm.login = login;
        vm.ObjecttoParams = ObjecttoParams;
        
        function ObjecttoParams(obj) {
            var p = [];
            for (var key in obj) {
                p.push(key + '=' + encodeURIComponent(obj[key]));
            }
            return p.join('&');
        }

        function login(login) {
            $http({
                method: 'POST',
                url: 'http://localhost/---ROOT-----/user/login',
                data: vm.ObjecttoParams(login),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function(response) {
                $rootScope.user = response.data.user;
                $location.path('dashboard');
                
            }, function(error) {
                vm.message = error.data;
                vm.code = error.data.code;
                $location.path('login');
            });
        }
    }
})();