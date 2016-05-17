var DesmitificadorApp = angular.module('DesmitificadorApp', ['templates-frontend','chart.js']);

DesmitificadorApp.controller('MainCtrl', function ($scope,$templateCache, $http) {

	$scope.loading = true;

	$scope.question = null;
	$scope.index = null;
	$scope.thanks = false;

	$scope.questionMode = true;

    $scope.choose = null;

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
        $scope.chooseMsg = null;
    	$scope.questionMode = true;
    	$scope.question = $scope.questions[$scope.index];
    	$scope.include_options = $scope.question.answer_type.slug+'/frontend.html';
    };

    $scope.clickAnswer = function(opt){
    	$scope.answer = opt;
        $scope.chooseMsg = opt.text;
    };

    $scope.goToAnswer = function(){
        $scope.questionMode = false;
        $scope.chart.data = _.map($scope.question.options,function(d){
            return d.value;
        });

        $scope.chart.labels = _.map($scope.question.options,function(d){
            return d.text;
        });
    };

    $scope.correctMenuPosition = function($event){
        var target = $($event.currentTarget).parent();
        var menu = target.find('.dropdown-menu');
        menu.css('top',target.offset().top+target.height());
        menu.css('left',target.offset().left);
        menu.css('width',target.width());
        console.log($event.currentTarget.getBoundingClientRect());
        console.log(target.position());
        console.log(target.offset());
    };

});

$(function(){
});