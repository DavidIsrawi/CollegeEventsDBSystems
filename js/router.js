app.config(['$routeProvider', function($routeProvider) {
    console.log("router");
    $routeProvider
    .when("/event", {
        controller : ['$routeParams', function($routeParams){
            var self = this;
            self.Event_id =  $routeParams.Event_id;
            self.Name = $routeParams.Name;
            self.Description = $routeParams.Description;
            self.Contact_name = $routeParams.Contact_name;
            self.Contact_email = $routeParams.Contact_email;
            self.Start_date = $routeParams.Start_date;
            self.End_date = $routeParams.End_date;
            self.Location_name = $routeParams.Location_name;
        }],
        controllerAs: 'ctrl',
        templateUrl : "/event.html"
    })
    .when("/events", {
        controller : "customersCtrl",
        templateUrl : "/events.html"
    })
    .otherwise({
        controller : "customersCtrl",
        templateUrl : "/events.html"
    });
}]);
