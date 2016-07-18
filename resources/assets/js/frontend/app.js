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
        ga('send', 'event', 'Category', 'start', $scope.category.name , $scope.category.id);
    	$scope.index = 0;
    	$scope.renderQuestion();
    };

    $scope.skip = function(){
        ga('send', 'event', 'Question', 'skip', $scope.question.title, $scope.question.id);
        $scope.next();
    };

    $scope.moveNext = function(){
        ga('send', 'event', 'Question', 'next', $scope.question.title, $scope.question.id);
        $scope.next();
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
        ga('send', 'event', 'Question', 'result', $scope.question.title, $scope.question.id);
        $scope.questionMode = false;
        $scope.question.options = $scope.question.options.sort(function(a, b){return b.value-a.value});
        $scope.chart.data = _.map($scope.question.options,function(d){
            return d.value;
        });

        $scope.chart.labels = _.map($scope.question.options,function(d){
            return d.text;
        });
    };

    $scope.openSelect = function(){
        ga('send', 'event', 'Option', 'open', $scope.question.title, $scope.question.id);
    };

    $scope.closeSelect = function(){
        ga('send', 'event', 'Option', 'close', $scope.question.title, $scope.question.id);
        if($scope.question.answer){
            ga('send', 'event', 'Option', 'select', $scope.question.answer.text, $scope.question.answer.id);        
        }
    };

});
