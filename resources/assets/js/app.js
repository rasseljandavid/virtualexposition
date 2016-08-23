(function() {

    var app = angular.module('appName', ['timer', 'ui.bootstrap.datetimepicker']);

    app.config(function($interpolateProvider) {
    	$interpolateProvider.startSymbol('<%');
    	$interpolateProvider.endSymbol('%>');
  	});

    app.controller('MainController', function($scope, $window, $http) {

    	$scope.eventfinished = function (id) {

    		var event =  {
    			id: id
    		};
    	
    		$http.post('/event/sendreport', event).success(function() {
			    $window.location.href = '/';
			});
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

    	$scope.registerUser = function () {
    		var data =  {
    			name: $scope.name,
    			phone: $scope.phone,
    			email: $scope.email,
    			password: $scope.password,
    			password_confirmation: $scope.password_confirmation,
    			logo: $scope.logo,
    			stand_id: $scope.stand_id
    		};
    		//console.log(data);
    		$http.post('/register', data).success(function(user_id) {
			    console.log(user_id); //data = 1 (server works);
			    angular.element('#dropJS').modal();
			});
    	}

    	$scope.doneUploading = function() {
    		if($scope.event_id) {
    			$window.location.href = "/event/" + $scope.event_id;
    		} else {
    			$window.location.href = "/";
    		}
    	};

         angular.element("#location").geocomplete({
          map: "#map-canvas-0",
          details: "form ",
          detailsAttribute: "data-geo",
          markerOptions: {
            draggable: true
          }
        });
        
        angular.element("#location").bind("geocode:dragged", function(event, latLng){
            angular.element("input[name=latitude]").val(latLng.lat());
            angular.element("input[name=longtitude]").val(latLng.lng());
        });

        var mapplic =  angular.element('#mapplic').mapplic({
                source: '/stand/showall/' + angular.element('#event_id').val(),    // Using mall.json file as map data
                sidebar: true,          // Enable sidebar
                minimap: true,          // Enable minimap
                markers: false,         // Disable markers
                fillcolor: false,       // Disable default fill color
                fullscreen: true,       // Enable fullscreen 
                maxscale: 3             // Setting maxscale to 3
       });


		
	});

	app.directive("fileread", [function () {
        return {
            scope: {
                fileread: "="
            },
            link: function (scope, element, attributes) {
                element.bind("change", function (changeEvent) {
                    var reader = new FileReader();
                    reader.onload = function (loadEvent) {
                        scope.$apply(function () {
                            scope.fileread = loadEvent.target.result;
                        });
                    }
                    reader.readAsDataURL(changeEvent.target.files[0]);
                });
            }
        }
    }]);

})();
