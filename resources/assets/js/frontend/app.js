var DesmitificadorApp = angular.module('DesmitificadorApp', ['templates-frontend','chart.js','ngMaterial']);

DesmitificadorApp.config(function(ChartJsProvider){
//    ChartJsProvider.setOptions({ colours :  });
})

DesmitificadorApp.controller('MainCtrl', function ($scope,$templateCache, $http) {

	$scope.loading = true;

	$scope.question = null;
	$scope.index = null;
	$scope.thanks = false;
    $scope.answer = false;

	$scope.questionMode = true;

    $scope.chart = {};

    $scope.init = function(category_id,colors){
        //Chart.defaults.global.colours = colors;
    	$scope.chart.colours = colors;
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
        if($scope.index+1 == $scope.questions.length){
            $scope.finish();
        }else{
        	$scope.index++;
        	$scope.renderQuestion();            
        }
    };

    $scope.finish = function(){
    	$scope.thanks = true;
    };

    $scope.renderQuestion = function(){
        $scope.questionMode = true;
        $scope.question = $scope.questions[$scope.index];
        $scope.question.answer = false;
    	$scope.include_options = $scope.question.answer_type.slug+'/frontend.html';
    };

    $scope.goToAnswer = function(){
        $scope.questionMode = false;
        $scope.question.options = $scope.question.options.sort(function(a, b){return b.value-a.value});
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