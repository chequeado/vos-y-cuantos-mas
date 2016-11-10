var DesmitificadorApp = angular.module('DesmitificadorApp', ['templates-frontend','chart.js','ngMaterial']);

DesmitificadorApp.config(function(ChartJsProvider){
//    ChartJsProvider.setOptions({ colours :  });
})

DesmitificadorApp.controller('MainCtrl', function ($scope,$templateCache, $http, $window) {

	$scope.loading = true;

	$scope.question = null;
	$scope.index = null;
	$scope.thanks = false;
    $scope.answer = false;
    $scope.bet = 50;

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
        $scope.sendEvent('Category', 'start', $scope.category.name , $scope.category.id);
    	$scope.index = 0;
    	$scope.renderQuestion();
    };

    $scope.skip = function(){
        $scope.sendEvent('Question', 'skip', $scope.question.title, $scope.question.id);
        $scope.next();
    };

    $scope.moveNext = function(){
        $scope.sendEvent('Question', 'next', $scope.question.title, $scope.question.id);
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

    $scope.bgImage = '';

    $scope.renderQuestion = function(){
        $scope.questionMode = true;
        $scope.question = $scope.questions[$scope.index];
        $scope.bgImage = 'url(/imagecache/original/' + $scope.question.image_file + ')';
        $scope.question.answer = false;
        $scope.question.bet = 50;
    	$scope.include_options = $scope.question.answer_type.slug+'/frontend.html';
    };

    $scope.goToAnswer = function(){
        $scope.sendEvent('Question', 'result', $scope.question.title, $scope.question.id);
        $scope.question.diff = Math.abs($scope.question.bet - $scope.question.answer.value);
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
        $scope.sendEvent('Option', 'open', $scope.question.title, $scope.question.id);
    };

    $scope.closeSelect = function(){
        $scope.sendEvent('Option', 'close', $scope.question.title, $scope.question.id);
        if($scope.question.answer){
            $scope.sendEvent('Option', 'select', $scope.question.answer.text, $scope.question.answer.id);        
        }
    };

    $scope.sendEvent = function(cat,action,label,value){
        if($window.ga){
            $window.ga('send', 'event', cat,action,label,value);
        }
    }

});
