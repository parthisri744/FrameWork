<?php

require_once 'config.php';
ini_set('dispaly_errors',1);
ini_set();
error_reporting(E_ALL);
$itemid=$_GET['id'];
echo "itemid :".$itemid;
$sql="SELECT ID,name,price FROM items";
$stmt = $db->prepare($sql);
$stmt->bindParam(':ID', $itemid);
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    $data[]=$row;
}
print_r($data);
echo json_encode($data);  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD-DELETE</title>
    <link rel="stylesheet" href="vendor/bootstrap.min.css">
</head>
<body ng-app="myapp" ng-controller="ctrl"  ng-init="fetchdata()">

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>

<div>
<h3 style="color:green">{{msg}}<h3>
<div ng-repeat = "input in inputlist">
<form name="formnew">
{{$index + 1}}
<input type="hidden" ng-model="input.ID" value="" class="form-controll">
<input type="text" ng-model="input.name" value="" class="form-controll">
<input type="text" ng-model="input.price" value="" class="form-controll">
<input type="button" ng-click="remove(input)"  class="btn btn-danger" value="Remove">
</form>
</div>
<input type="button" class="btn btn-primary" ng-click="addnew()" value="Add"><input type="button" class="btn btn-success" ng-disabled="formnew.$invalid" ng-click="submitform()" value="Save">
</div>
<div>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="result in listinput">
                <td>{{result.name}}</td>
                <td>{{result.price}}</td>
            </tr>
        </tbody>
    </table>

</div>
<script>
angular.module("myapp",[]).controller("ctrl",function($scope,$http){
	$scope.success=false;
	$scope.errr=false;
    var encoded_data = "<?php echo base64_encode(json_encode($data)); ?>";
    var decoded_data = atob(encoded_data);
    console.log(decoded_data);
    var json_data = JSON.parse(decoded_data);
    console.log(json_data);
	$scope.inputlist=[];
    $scope.addnew=function(){
		$scope.inputlist.push({});
	};
    if(json_data!=null && json_data.length > 0){
        $scope.inputlist = json_data;
    }else{
        $scope.addnew();
    }
	
	$scope.remove=function(input){
		var removeid=$scope.inputlist.indexOf(input);
		//alert(removeid);
		$scope.inputlist.splice(removeid,1);
	};
	$scope.submitform=function(){
		$http.post("insert.php",$scope.inputlist).success(function(data){
			//console.log(data);
			$scope.msg=data;
		});
	};
        $scope.fetdata=function(){
         
           //$scope.inputlist=$scope.newinput;
        }
	
});
</script>
    <script src="vendor/popper.min.js" ></script>
    <script src="vendor/bootstrap.min.js" ></script>
</body>
</html>