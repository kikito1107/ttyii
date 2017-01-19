/**
 * Created by enriqueramirez on 17/05/16.
 */
module.exports = function ($scope) {

    // Definimos el objeto RouteOperator
    var RouteOperator = function () {};
    $scope.routesOperatorCollection = [];

    // Definimos el objeto SupervisorOperator
    var SupervisorOperator = function () {};
    $scope.supervisorOperatorCollection = [];

    /**
     * Constructor para asiganr operador a una ruta
     * @type {{setProfile_id: RouteOperator.setProfile_id, setRoutes_id: RouteOperator.setRoutes_id}}
     */
    RouteOperator.prototype = {
        setRoutes_id: function (routes_id) {
            this.routes_id = routes_id;
            return this;
        }, setName: function (name) {
            this.name = name;
            return this;
        }
    };

    /**
     * Constructor para asignar un supervisor a uno o más operadores
     * @type {{setSupervisor_profile_id: SupervisorOperator.setSupervisor_profile_id, setOperator_profile_id: SupervisorOperator.setOperator_profile_id}}
     */
    SupervisorOperator.prototype = {
        setOperator_profile_id: function (operator_profile_id) {
            this.operator_profile_id = operator_profile_id;
            return this;
        }, setOperator_name: function (operator_name) {
            this.operator_name = operator_name;
            return this;
        }
    };

    /**
     * Función para generar la colección de Rutas para un operador
     */
    $scope.setRoutesOperator = function () {
        var _routeOperator = new RouteOperator();
        _routeOperator.setRoutes_id($scope.routeOperator.originalObject.id)
            .setName($scope.routeOperator.originalObject.name);
        $scope.routesOperatorCollection.push(_routeOperator);
        $scope.$broadcast('angucomplete-alt:clearInput');
    };

    /**
     * Función para generar la colección de Operadores que estaran a cargo de un supervisor
     */
    $scope.setSupervisorOperator = function (){
        var _supervisorOperator = new SupervisorOperator();
        _supervisorOperator.setOperator_profile_id($scope.profileOperator.originalObject.id)
            .setOperator_name($scope.profileOperator.originalObject.name +" "+$scope.profileOperator.originalObject.lastname
                +" "+$scope.profileOperator.originalObject.second_lastname);
        $scope.supervisorOperatorCollection.push(_supervisorOperator);
        $scope.$broadcast('angucomplete-alt:clearInput');
    };

    /**
     * Elimina un objetivo de la colección
     * @param index
     */
    $scope.deleteRoute = function (index) {
        var response;

        response = confirm('¿Desea eliminar el elemento?');

        if(response) {
            $scope.routesOperatorCollection.splice(index, 1);
        }
    };

    /**
     * Elimina un objetivo de la colección
     * @param index
     */
    $scope.deleteOperator = function (index) {
        var response;

        response = confirm('¿Desea eliminar el elemento?');

        if(response) {
            $scope.supervisorOperatorCollection.splice(index, 1);
        }
    };
};
