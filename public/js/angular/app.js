var app = angular.module("ContentManagerApp",['ngRoute','ngCookies'],function($interpolateProvider,$httpParamSerializerProvider) {
	$interpolateProvider.startSymbol('{%');
	$interpolateProvider.endSymbol('%}');
})
