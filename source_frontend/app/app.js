window._ = require('lodash');
require('angular');
require('angular-i18n/angular-locale_es-mx');
require('angular-route');
require('angular-google-maps');
require('angular-simple-logger');
require('angucomplete-alt');
require('angularjs-scope.safeapply/src/Scope.SafeApply');

var uibs = require('angular-ui-bootstrap'),
    MessagingServices = require('./services/MessagingServices'),
    MainController = require('./controllers/MainController'),
    RoutesController = require('./controllers/RoutesController'),
    RouteOperatorController = require('./controllers/RouteOperatorController'),
    StatisticsController = require('./controllers/StatisticsController'),
    NotificationControler = require('./controllers/NotificationController');

var messaging = angular.module('messaging', [
    "ngRoute",
    uibs,
    'nemLogging',
    'uiGmapgoogle-maps',
    'angucomplete-alt',
    'Scope.safeApply'
]).config(function(uiGmapGoogleMapApiProvider) {
    uiGmapGoogleMapApiProvider.configure({
        v: '3.17',
        libraries: 'geometry,visualization'
    });
});

messaging.controller('MainController', ['$scope', MainController])
    .service('MessagingRest', ['$http', MessagingServices])
    .controller('RoutesController', ['$scope', 'uiGmapGoogleMapApi', RoutesController])
    .controller('RouteOperatorController', ['$scope', RouteOperatorController])
    .controller('StatisticsController', ['$scope', 'MessagingRest', StatisticsController])
    .controller('NotificationControler', ['$scope', 'MessagingRest', NotificationControler]);

