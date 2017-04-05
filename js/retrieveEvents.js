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
