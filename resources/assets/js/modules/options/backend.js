BackendApp.controller('OptionsCtrl', function ($scope) {
  
	$scope.addOption = function(){
		$scope.$parent.options.push({});
	};

	$scope.removeOption = function(index){
    	$scope.$parent.options.splice(index, 1);
  	};

});