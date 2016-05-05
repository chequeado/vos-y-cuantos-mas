var DesmitificadorApp = angular.module('DesmitificadorApp', ['templates-frontend','chart.js']);

DesmitificadorApp.controller('MainCtrl', function ($scope,$templateCache, $http) {

	$scope.loading = true;

	$scope.question = null;
	$scope.index = null;
	$scope.thanks = false;

	$scope.questionMode = true;

    $scope.chart = {};

    $scope.init = function(category_id){
    	$http.get('/api/questions?category_id='+category_id, {})
    		.then(function(response){
    			$scope.category = response.data.metadata.category;
    			$scope.questions = response.data.records;
    			$scope.start();
    			$scope.loading = false;
    		}, function(e){
    			console.error(e);
    		});
    };

    $scope.start = function(){
    	$scope.index = 0;
    	$scope.renderQuestion();
    };

    $scope.next = function(){
    	$scope.index++;
    	$scope.renderQuestion();
    };

    $scope.finish = function(){
    	$scope.thanks = true;
    };

    $scope.renderQuestion = function(){
    	$scope.questionMode = true;
    	$scope.question = $scope.questions[$scope.index];
    	$scope.include_options = $scope.question.answer_type.slug+'/frontend.html';
    
    };

    $scope.clickAnswer = function(opt){
    	$scope.answer = opt;
    	$scope.questionMode = false;

        $scope.chart.data = _.map($scope.question.options,function(d){
            return d.value;
        });

        $scope.chart.labels = _.map($scope.question.options,function(d){
            return d.text;
        });
    };

});

$(function(){
});