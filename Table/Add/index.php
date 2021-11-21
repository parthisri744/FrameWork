<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <title>Add multiple</title>
</head>

<body align="center" ng-app="codedrive" ng-controller="codedrivectrl">
    <h1>Add Multiple Input</h1>
    <form method="post" ng-submit="submitForm()">
    <table border=1 align="center">
        <thead>
            <tr>
               <th>SI NO</th>
               <th>Option</th>
                <th>Name</th>
                <th>Type</th>
                <th>PhNO</th>
                <th ng-click="reverse()">Action</th>
            </tr>
        </thead>
        <tbody ng-repeat = "input in inputlist track by $index">
             <tr>
                <td>{{$index +1}}</td>
                <td><input type="checkbox" ng-model="input.checkbox" ng-value="false"></td>
                <td><input type="text" name="name[]" ng-model="input.name"></td>
                <td><input type="text" name="type[]" ng-model="input.type"></td>
                <td><input type="text" name="input.phno[]" ng-model="input.phno"></td>
                <td><input type="button" value="add" ng-click="addnew($index)" style="background-color:green;color:white"  ng-show="$last">
                <input type="button" style="background-color:red;color:white" ng-click="remove($index)" ng-show="inputlist.length > 1 && input.checkbox!=true"  value="Remove">
                <input type="button" style="background-color:blue;color:white" ng-click="copydata($index)" ng-show="input.checkbox==true" value="Add"></td>
             </tr>
        </tbody>
    </table>
  JSON :  {{inputlist}}
  </form>
</body>
<script>
    var app = angular.module("codedrive",[]);
    app.controller("codedrivectrl",function($scope){
        $scope.inputlist =[{}];
        $scope.addnew = function (index) {
            console.log($scope.inputlist);   
            console.log("Create Before :"+$scope.inputlist.length+"---  index  ---"+index);
            if($scope.inputlist.length >= 1 ){
            $scope.inputlist.push({});
            console.log("Create After :"+$scope.inputlist.length);
            }
        }
        $scope.remove = function (index) {
           var confirmbtn =  confirm("Are You Sure Do You Want To Delete!");
           if(confirmbtn==true){
            console.log("Deleted "+index);
            $scope.inputlist.splice(index,1);
           }
        }
        $scope.copydata = function (index) {
            console.log("Copy Clicked :"+index);
            var copy = angular.copy($scope.inputlist[index]);
            $scope.inputlist.push(copy);
            $scope.inputlist[index].checkbox=false;
        }
        $scope.reverse =  function () {
            $scope.inputlist.reverse();
        }
    });
</script>
</html>