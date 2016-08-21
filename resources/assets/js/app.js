(function() {

    var app = angular.module('appName', ['timer']);

    app.config(function($interpolateProvider) {
    	$interpolateProvider.startSymbol('<%');
    	$interpolateProvider.endSymbol('%>');
  	});

    app.controller('MainController', function($scope, $window, $http) {

    	$scope.eventfinished = function (id) {

    		var event =  {
    			id: id
    		};
    	
    		$http.post('/event/sendreport', event);
    		alert("hello" + id);
    		//$window.location.href = '/';

    	}

    	$scope.addStandVisit = function (id) {
    		var stand =  {
    			id: id
    		};
    		$http.post('/stand/addStandVisit', stand);
    	}

    	$scope.addDocumentDownload = function (id) {
    		var stand =  {
    			id: id
    		};
    		$http.post('/stand/addDocumentDownload', stand);
    	}
		
	});



})();


