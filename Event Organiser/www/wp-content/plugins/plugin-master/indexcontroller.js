angular.module("myApp", []).controller("myCtrl", function ($scope, $http) {
  $scope.model = {};  
  $scope.model.event = atts.event;
  $scope.model.events = [];
    $scope.addEvent = function(){
      if($scope.event && $scope.event == ""){
        $scope.eventmessage="please select an event before clicking Submit";
      }
    }
    $scope.submitForm = function(){
      if($scope.model.event == "" || $scope.model.event == null){
        $scope.eventmessage="Please select an Event before clicking Submit";
        return;
      }
      $scope.eventmessage="";
      
      $http.post("/slim/api/appointment", $scope.model).then(
      function(data){
        alert(JSON.stringify(data.data));
        }, function(err){
          alert(JSON.stringify(err));
        });
    }
  });
