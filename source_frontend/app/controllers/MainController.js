module.exports = function ($scope) {
    
    var a = $(".layout-container"),
        r = $("body");
    
    $("#sidebar-toggler").click(function(e) {
        e.preventDefault();
        a.toggleClass("sidebar-visible");
        $(this).parent().toggleClass("active");
    });

    $(".sidebar-layout-obfuscator").click(function(e) {
        e.preventDefault();
        a.removeClass("sidebar-visible");
        $("#sidebar-toggler").parent().removeClass("active");
    });

    $("#offcanvas-toggler").click(function(e) {
        e.preventDefault();
        r.toggleClass("offcanvas-visible");
        $(this).parent().toggleClass("active");
    });

    window.addEventListener("resize", function() {
        window.innerWidth < 768 && (r.removeClass("offcanvas-visible"), $("#offcanvas-toggler").parent().addClass("active"));
    });
};

module.exports = function ($scope) {
    $scope.popup = {
        opened: false
    };
    $scope.open = function () {
        $scope.popup.opened = true;
    };
};

var compareTo = function() {
    return {
        require: "ngModel",
        scope: {
            otherModelValue: "=compareTo"
        },
        link: function(scope, element, attributes, ngModel) {

            ngModel.$validators.compareTo = function(modelValue) {
                return modelValue == scope.otherModelValue;
            };

            scope.$watch("otherModelValue", function() {
                ngModel.$validate();
            });
        }
    };
};

module.directive("compareTo", compareTo);