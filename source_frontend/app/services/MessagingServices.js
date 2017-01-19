/**
 * Created by enriqueramirez on 24/08/16.
 */
module.exports = function ($http) {

    this.requestUrl = function (url, callback, params) {
        return $http({
            method: "POST",
            url: url.url,
            data: $.param(params),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        }).success(function (data) {
            if(typeof callback === "function") {
                callback(data);
            }
        });
    };

    this.getUrl = function (url, callback, params) {
        return $http.get(url.url, {
            params: params
        }).success(function (data) {
            if(typeof callback === "function") {
                callback(data);
            }
        });
    };
};
