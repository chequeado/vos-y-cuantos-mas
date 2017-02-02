var DesmitificadorApp = angular.module('DesmitificadorApp', ['chart.js','ui.bootstrap-slider']);

DesmitificadorApp.config(function(ChartJsProvider){
//    ChartJsProvider.setOptions({ colours :  });
})

DesmitificadorApp.controller('MainCtrl', function ($scope,$templateCache, $http, $window,$anchorScroll) {

	$scope.loading = true;

	$scope.question = null;
	$scope.index = null;
    $scope.answer = false;
    $scope.bet = 50;

    $scope.chart = {};

    $scope.state = null;
    $scope.bgImage = '';

    $scope.isMobile = function detectmob(){ 
        console.log($window.innerWidth,$window.innerHeight);
        return ($window.innerWidth <= 800)?true:false;
    };

    $scope.init = function(category_id,colors){
        //Chart.defaults.global.colours = colors;
        $scope.category_id = category_id;
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

    $scope.renderQuestion = function(){
        $anchorScroll('app-layout');
        $scope.question = $scope.questions[$scope.index];
        $scope.bgImage = 'url(/imagecache/original/' + $scope.question.image_file + ')';
        if(!$scope.isMobile()){
            $('body').css('background-image',$scope.bgImage);
        }
        $scope.question.answer = false;
        $scope.state = 'options';
    };

    $scope.chooseOption = function(opt){
        $scope.question.answer = opt;
        $scope.sendEvent('Option', 'select', $scope.question.answer.text, $scope.question.answer.id);
        $scope.saveVote($scope.question.id,$scope.question.answer.id);
        $scope.state = 'slider';
        $scope.renderSlider();
    };

    $scope.changeOption = function(){
        $scope.renderQuestion();
    };

    $scope.renderSlider = function(){
        $scope.question.bet = 50;
        $scope.state = 'slider';
    };

    $scope.chooseBet = function($event,value){
        console.log('chooseBet');
        $scope.renderAnswer();
    };

    $scope.renderAnswer = function(){
        $scope.state = 'answer';
        $scope.sendEvent('Question', 'result', $scope.question.title, $scope.question.id);
        $scope.question.diff = Math.abs($scope.question.bet - $scope.question.answer.value);
        $scope.question.options = $scope.question.options.sort(function(a, b){return b.value-a.value});
        $scope.chart.data = _.map($scope.question.options,function(d){
            return d.value;
        });

        $scope.chart.labels = _.map($scope.question.options,function(d){
            return d.text;
        });
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
        if(!$scope.isMobile()){
            $('body').css('background-image','none');
        }
        $window.location = '/summary?key='+$('meta[name="_token"]').attr('content')+'&cat='+$scope.category_id;
    	//$scope.state = 'thanks';
    };

    $scope.sendEvent = function(cat,action,label,value){
        if($window.ga){
            $window.ga('send', 'event', cat,action,label,value);
        }
    };

    $scope.saveVote = function(question_id,option_id){

        $http.post('/api/vote', 
            {
                'question_id':question_id,
                'option_id':option_id,
                '_token':$('meta[name="_token"]').attr('content')
            })
            .then(function(response){
                $scope.votes = response.data.response;
                console.log(response);
            }, function(e){
                console.error(e);
            });
    };

});


DesmitificadorApp.controller('SummaryCtrl', function ($scope,$templateCache, $http, $window,$anchorScroll) {

    $scope.loading = true;

    $scope.votes = {};

    $scope.isMobile = function(){ 
        return ($window.innerWidth <= 800)?true:false;
    };

    $scope.init = function(category_id,votes,colors){

        votes.map(function(v){
            var cuantos = 'pocos';
            if(v.option.value>=50){
                cuantos = 'muchos';
            }else if(v.option.value<50 && v.option.value >20){
                cuantos = 'algunos';
            }
            v.col = cuantos;
            return v;
        });

        $scope.votes = _.groupBy(votes,'col');

        //Chart.defaults.global.colours = colors;
/*        $scope.category_id = category_id;
//        $scope.chart.colours = colors;
        $http.get('/api/questions?category_id='+category_id, {})
            .then(function(response){
                $scope.category = response.data.metadata.category;
                $scope.questions = response.data.records;
                $scope.start();
                $scope.loading = false;
            }, function(e){
                console.error(e);
            });*/
    };

    $scope.start = function(){
        console.log('start!');
    };

});
