'use strict';

var controllers = angular.module('dabble.controllers', []);

//Append Function
controllers.controller('AppCtrl', function($scope){
	$scope.name = "Module";
});

controllers.controller('ShotsListCtrl', function($scope, dribbble, $routeParams){
	console.log($routeParams);
	console.log($routeParams.id);

	var list = $routeParams.list;

	dribbble.list(list).then(function (data){
		$scope.list = data.data;
		console.log(data);
	});

	$scope.loadNextPage = function () {
		dribbble.list(list, {page: parseInt($scope.list.page) + 1 }).then(function (data){
			console.log(data);

			$scope.list.page = data.data.page;
			$scope.list.shots = $scope.list.shots.concat(data.data.shots);
		});

	}
});


controllers.controller('ShotsCtrl', function($routeParams, dribbble, $scope){
	
	var id = $routeParams.id;
	console.log(id);

	var comments = $routeParams;
	console.log("This are comments" + comments);

	dribbble.shot(id).then(function (data){
		$scope.shot = data.data;
		console.log(data);
	})
});

