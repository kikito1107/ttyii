//noinspection JSUnresolvedVariable
/**
 * Created by aldorodriguez on 29/08/16.
 */

module.exports = function ($scope, MessagingRest) {

    $scope.routes = [];

    $scope.$watch('region_id', function (value) {
        if (typeof value === "undefined" || value === null) {
            return false;
        }

        MessagingRest.getUrl(
            {
                url: Messaging.baseUrl + 'api/routes/route-by-region'
            },
            function (data) {
                $scope.routes = data;
            }, {
                region_id: $scope.region_id
            }

        )
    });
};
