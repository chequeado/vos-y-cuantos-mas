//Backend

var Backend = {};

Backend.init = function(){
    $(".chosen-select").chosen();
};

Backend.initEditQuestion = function(){

    console.log('pala');
    
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

var BackendApp = angular.module('BackendApp', ['angular.chosen','templates-backend']);

BackendApp.controller('QuestionCtrl', function ($scope,$templateCache) {
  
    $scope.changeType = function(){
        $scope.include_options = $scope.answer_type+'/backend.html';
    };


    $scope.init = function(data){
        console.log('init');
        if(data.answer_type_id){
            $scope.answer_type = data.answer_type_id;
        }
    };

});