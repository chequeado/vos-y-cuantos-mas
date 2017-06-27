//Backend

var Backend = {};

Backend.init = function(){
    $(".chosen-select").chosen();
    $(".icon-select").chosenIcon({
      disable_search_threshold: 10
      });
};

Backend.initEditQuestion = function(){

    
};


$(function() {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "400",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    Backend.init();
});

//angular

var BackendApp = angular.module('BackendApp', ['angular.chosen','templates-backend','chart.js']);

BackendApp.controller('QuestionCtrl', function ($scope,$templateCache) {
  
    $scope.changeType = function(){
        $scope.include_options = $scope.answer_type+'/backend.html';
    };

    $scope.init = function(data,options){
        console.log(options);
        $scope.options = options;
        if(data.answer_type_id){
            $scope.answer_type = data.answer_type_id;
        } else {
            $scope.answer_type = 'options';
        }
        $scope.changeType();
    };

});

BackendApp.controller('ImageCtrl', function ($scope,$templateCache) {

    $scope.default = 'http://placehold.it/1600x900';

    var path = '/imagecache/original/';

    $scope.openImage = function(){
        $("#inputFile").click();
    };

    $scope.clearImage = function(){
        $("#inputFile").val('').change();
    };

    $scope.readURL =  function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $scope.$apply(function(){
                    $scope.imgUrl = e.target.result;
                });
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            $scope.imgUrl = ($scope.original)?$scope.original:$scope.default;
        }
    }

    $scope.init = function(img){
        $scope.imgUrl = (img)?path+img:$scope.default;
        $scope.original = (img)?path+img:false;
        $("#inputFile").change(function () {
            $scope.$apply(function(){
                $scope.imgUrl = 'https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif';
            });
            $scope.changed = true;
            $scope.readURL(this);
        });
    };

});

BackendApp.controller('StatsCtrl', function ($scope,$http,$timeout) {
  
    $scope.loading = true;

    $scope.colors = [ "#1f77b4", "#ff7f0e", "#2ca02c", "#d62728", "#9467bd", "#8c564b", "#e377c2", "#7f7f7f", "#bcbd22", "#17becf" ];

    $scope.chart1 = {};
    $scope.chart2 = {};

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
        $scope.renderQuestion($scope.questions[0]);
    };

    $scope.selectQuestion = function(q){
        $scope.renderQuestion(q);
    };

    $scope.renderQuestion = function($question){
        $scope.loadingVotes = true;
        $scope.question = $question;
        $scope.question.options = _.map($scope.question.options,function(o,i){
            o.color = $scope.colors[i];
            return o;
        });
        $scope.question.options = $scope.question.options.sort(function(a, b){return b.value-a.value});
        $scope.chart1.colors = _.map($scope.question.options,function(d){
            return d.color;
        });
        $scope.chart1.data = _.map($scope.question.options,function(d){
            return d.value;
        });

        $scope.chart1.labels = _.map($scope.question.options,function(d){
            return d.text;
        });

        $timeout(function(){
            $http.get('/api/results?question_id='+$scope.question.id, {})
                .then(function(response){
                    var values = response.data.records.map(function(r){
                        r.total = parseInt(r.total);
                        return r;
                    });

                    $scope.voteTotal = 0;

                    $scope.voteOptions = angular.copy($scope.question.options);

                    $scope.voteTotal = _.sumBy(values, 'total');

                    _.forEach($scope.voteOptions,function(vo){
                        var val = _.find(values, { 'id': parseInt(vo.id) });
                        vo.value = (val)?((val.total*100)/$scope.voteTotal).toFixed(1):0;
                    });

                    $scope.voteOptions = $scope.voteOptions.sort(function(a, b){return b.value-a.value});

                    $scope.loadingVotes = false;
                    $scope.chart2.colors = _.map($scope.voteOptions,function(d){
                        return d.color;
                    });
                    $scope.chart2.data = _.map($scope.voteOptions,function(d){
                        return d.value;
                    });

                    $scope.chart2.labels = _.map($scope.voteOptions,function(d){
                        return d.text;
                    });

                }, function(e){
                    console.error(e);
                });
        },1000);


    };

});