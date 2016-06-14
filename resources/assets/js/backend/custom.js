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

var BackendApp = angular.module('BackendApp', ['angular.chosen','templates-backend']);

BackendApp.controller('QuestionCtrl', function ($scope,$templateCache) {
  
    $scope.changeType = function(){
        $scope.include_options = $scope.answer_type+'/backend.html';
    };

    $scope.init = function(data,options){
        $scope.options = options;
        if(data.answer_type_id){
            $scope.answer_type = data.answer_type_id;
            $scope.changeType();
        }
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