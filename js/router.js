app.config(['$routeProvider', function($routeProvider) {
    console.log("router");
    $routeProvider
    .when("/event/:id", {
        controller : "customersCtrl",
        templateUrl : "/event.html"
    })
    .when("/events", {
        controller : "customersCtrl",
        templateUrl : "/events.html"
    })
    .otherwise({
        redirecto: "/events"
    });
}]);
