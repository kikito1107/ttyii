module.exports = function ($scope, uiGmapGoogleMapApi) {
    // Definimos el objeto RouteOperator
    console.log("entra");
    var nc = 1;
    var Sintomas = function () {};
    $scope.sintomasCollection = [];


    /**
     * Constructor para la lista de sintomas
     * @type {{setSintomas_id: Sintomas.setSintomas_id, setSintoma: Sintomas.setSintoma, setSintoma_id_db: Sintomas.setSintoma_id_db}}
     */
    Sintomas.prototype = {
        setSintomas_id: function (sintomas_id) {
            this.sintomas_id = sintomas_id;
            return this;
        }, setSintoma: function (sintoma) {
            this.sintoma = sintoma;
            return this;
        }, setSintoma_id_db: function (Sintoma_id_db) {
            this.sintoma_id_db = sintoma_id_db;
            return this;
        }
    };

    /**
     * Función para generar la colección de Sintomas
     */
    $scope.setElement = function () {
        console.log($scope.sintoma);
        var _sintomas = new Sintomas();
        var id = nc++;
        _sintomas.setSintomas_id(id)
            .setSintoma($scope.sintoma);
        $scope.sintomasCollection.push(_sintomas);
        $scope.sintoma = "";
    };

    /**
     * Elimina un objetivo de la colección
     * @param index
     */
    $scope.deleteSintoma = function (index) {

        var response;
        response = confirm('¿Desea eliminar el elemento?');
        if (response) {
            $scope.sintomasCollection.splice(index, 1);
        }
    };
};