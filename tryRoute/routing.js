$(document).ready(function() {
    $("#rsos-content").ready(function() {
        if (!checkCookie("loggedIn")) {
            $("#rsos-content").html("<br><br><br><br><br><center><b>You must first sign in to access this page.</b></center><br><br><br><br><br>");
        }
    })
});
// User name to sign-in text
$(".signinbtn").click(function(){
    $("#uname").text(first.value)
})

var app = angular.module('myApp', ['ngRoute']);
app.controller('customersCtrl', function($scope, $http) {
    $http.get("http://teamflightclubproject.com/php/viewEveryEvent.php")
    .then(function (response) {
        console.log("Connected");
        var responseData = response.data;

        responseData.map(function(index){
            date = new Date(index.Start_date);
            index.Start_date = date;
        })

        $scope.events = responseData;
    });
});

app.config(['$routeProvider', function($routeProvider) {
    console.log("router");
    $routeProvider
    .when("/home", {
        controller : "customersCtrl",
        templateUrl : "home.html"
    })
    .when("/organizations", {
        controller : "customersCtrl",
        templateUrl : "organizations.html"
    })
    .when("/aboutus", {
        controller : "customersCtrl",
        templateUrl : "aboutus.html"
    })
    .when("/event/:id", {
        controller : "customersCtrl",
        templateUrl : "event.html"
    })
    .when("/events", {
        controller : "customersCtrl",
        templateUrl : "events.html"
    })
    .otherwise({
        redirecto: "/home"
    });
}]);
