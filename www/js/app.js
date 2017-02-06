const myApp = angular.module('myApp', ['ui.router']);

myApp.config(function($stateProvider) {
    const login = {
        name: 'login',
        url: '/login',
        templateUrl: '/api/login.php'
    }

    const feed = {
        name: 'feed',
        url: '/feed',
        templateUrl: '/www/templates/feed.html'
    }

    $stateProvider.state(login);
    $stateProvider.state(feed);
});


myApp.controller('feedCtrl', function($scope, $http) {
    $http.get('/api/feed.json').then(function(response) {
        console.log(response);
        $scope.feed = response.data;
    });
});
