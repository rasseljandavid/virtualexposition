(function() {
/*
    angular.module("appName", [], function($interpolateProvider) {
			$interpolateProvider.startSymbol('<%');
			$interpolateProvider.endSymbol('%>');
		 }).controller("MainController", MainController);

    MainController.$inject = ["$scope"];

    function MainController($scope) {
        $scope.val = "You are the man!";
        $scope.eventid = {val: 'testing'};
     //   $scope.$watch('event', function (id) {
        	//alert(id);
    //    });
    	

    	$scope.checkEvents = function (id) {
    		console.log($scope.eventid);
    		return true;
    	};
    };  
    */
    var app = angular.module('appName', []);
    app.config(function($interpolateProvider) {
    	$interpolateProvider.startSymbol('<%');
    	$interpolateProvider.endSymbol('%>');
  	});

    app.controller('MainController', function($scope) {
 		
	});

})();


