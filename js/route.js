(function() {
    'use strict';
    angular
        .module('myApp', ['ngRoute', 'ngAnimate'])
        .config(config);
        
    
    function config($routeProvider, $locationProvider) {
        $routeProvider.when('/', {
            templateUrl: "view/home.html",
            controller: 'HomeCtrl',
            controllerAs: 'vm'
        });
        $routeProvider.when('/login', {
            templateUrl: "view/login.html",
            controller: 'LoginCtrl',
            controllerAs: 'vm'
        });
        $routeProvider.when('/registration', {
            templateUrl: "view/registration.html",
            controller: 'RegisterCtrl',
            controllerAs: 'vm'
        });
        $routeProvider.when('/dashboard', {
            templateUrl: "view/dashboard.html",
            controller: 'DashboardCtrl',
            controllerAs: 'vm'
        });
        $routeProvider.otherwise({
            redirectTo: '/home'
        });
        $locationProvider.html5Mode(true);
    }
})();