<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
<div ng-app="myapp" ng-controller="ctrl">
<div ng-repeat = "input in inputlist">
<form name="formnew">
<input type="text" ng-model="input.name">
<input type="text" ng-model="input.price">
<input type="button" ng-click="remove(input)" value="Remove">
</div>
<input type="button" ng-click="addnew()" value="Add"><input type="button" ng-disabled="formnew.$invalid" ng-click="submitform()" value="Save">
</div>
<script>
angular.module("myapp",[]).controller("ctrl",function($scope,$http){
	$scope.success=false;
	$scope.errr=false;
	$scope.inputlist=[];
	$scope.addnew=function(){
		$scope.inputlist.push({content:""});
	};
	$scope.remove=function(input){
		var removeid=$scope.inputlist.indexOf(input);
		//alert(removeid);
		$scope.inputlist.splice(removeid,1);
	};
	$scope.submitform=function(){
		$http.post("insert.php",$scope.inputlist).success(function(data){
			console.log(data);
			$scope.input = data;
		})
	}
});
</script>
</body>
</html>