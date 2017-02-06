var feedApp = angular.module('feedApp', []);

App.controller('feedCtrl', function($scope, $http) {
  $http.get('/api/feed.json')
       .then(function(res){
          $scope.feed = res.data;
        });
});
