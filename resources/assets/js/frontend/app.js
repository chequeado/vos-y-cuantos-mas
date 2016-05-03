var DesmitificadorApp = angular.module('DesmitificadorApp', ['templates-frontend']);

DesmitificadorApp.controller('MainCtrl', function ($scope,$templateCache, $http) {

	$scope.loading = true;

    $scope.init = function(category_id){
    	$http.get('/api/questions?category_id='+category_id, {})
    		.then(function(response){
    			console.log(response);
    			$scope.category = response.data.metadata.category;
    			$scope.questions = response.data.records;
    			$scope.loading = false;
    		}, function(e){
    			console.error(e);
    		});
    };

});

$(function(){
});