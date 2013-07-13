"use strict";
var app = angular.module('dabble', [
	'dabble.controllers',
	'dabbble.filters',
	'dabbble.services']);

app.config(function($routeProvider){
	$routeProvider
	.when("/shots/:id", {controller:"ShotsCtrl", templateUrl:"partials/shots.html"})
	.when("/:list", {controller:"ShotsListCtrl", templateUrl:"partials/shots_list.html"})
	.otherwise({redirectTo: "/popular"});
});