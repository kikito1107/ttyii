/**
 * Created by enriqueramirez on 24/08/16.
 */
module.exports = function ($scope, MessagingRest) {
    require('../highcharts-theme');

    const URL_API = "api/graphic/";
    $scope.drawGraphic = function (url) {
        $btn = $('#btnGenerate').button('loading');
        MessagingRest.getUrl({
            url: ("" + Messaging.baseUrl) + URL_API + url
        }, function (data) {
            $scope.pdf = false;
            $('#first-graph').highcharts({
                title: {
                    text: data.title
                },
                chart: {
                    type: 'column'
                },
                subtitle: {
                    text: data.subtitle
                },
                xAxis: {
                    title: {
                        text: data.titleX
                    },
                    categories: data.categories,
                },
                yAxis: {
                    title: {
                        text: data.titleY
                    }
                },
                credits: {
                    enabled: false
                },
                legend: {
                    enabled: false
                },
                series: data.data
            });
            $btn.button('reset');
        }, {
            to_date: $scope.to_date,
            from_date: $scope.from_date,
            regionId: $scope.regionId
        });
    };

    $scope.drawGraphicBar = function (url) {
        $btn = $('#btnGenerate').button('loading');
        MessagingRest.getUrl({
            url: ("" + Messaging.baseUrl) + URL_API + url
        }, function (data) {
            console.log(data.data);
            $scope.pdf = false;
            $('#first-graph').highcharts({
                title: {
                    text: data.title
                },
                chart: {
                    type: 'column'
                },
                subtitle: {
                    text: data.subtitle
                },
                xAxis: {
                    title: {
                        text: data.titleX
                    },
                    categories: data.categories
                },
                yAxis: {
                    title: {
                        text: data.titleY
                    }
                },
                credits: {
                    enabled: false
                },
                legend: {
                    enabled: false
                },
                series: data.data
            });
            $btn.button('reset');
        }, {
            to_date: $scope.to_date,
            from_date: $scope.from_date,
            regionId: $scope.regionId
        });
    };
    /**
     * Asignamos el valor de la fecha inicial al $scope
     */
    $('#from_date').change(function () {
        var value = $(this).val();
        $scope.$safeApply(function () {
            $scope.from_date = value;
        });
    });

    /**
     * Asignamos el valor de la fecha final al $scope
     */
    $('#to_date').change(function () {
        var value = $(this).val();
        $scope.$safeApply(function () {
            $scope.to_date = value;
        });
    });

    $scope.routes = [];

    $scope.$watch('region_id', function (value) {
        if (typeof value === "undefined" || value === null) {
            return false;
        }
        MessagingRest.getUrl(
            {
                url: Messaging.baseUrl + 'api/graphic/route-by-region'
            },
            function (data) {
                $scope.routes = data;
            }, {
                region_id: $scope.region_id
            }

        )
    });

    /**
     * Obtiene los datos para mostrar una tabla
     * @param url
     */
    $scope.drawTable = function (url) {
        $btn = $("#btnGenerate").button('loading');
        var route_id = ($scope.route_id != null) ? $scope.route_id.id : null;
        MessagingRest.getUrl({
            url: ("" + Messaging.baseUrl) + URL_API + url
        }, function (data) {
            $scope.pdf = false;
            $scope.statistics = data;
            $btn.button('reset');
        }, {
            to_date: $scope.to_date,
            from_date: $scope.from_date,
            region_id: $scope.region_id,
            route_id: route_id
        });
    };
};
