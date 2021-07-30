<?php
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Form</title>
    <link rel="stylesheet" href="vendor/bootstrap.min.css">
</head>
<body  ng-app="myapp" ng-controller="ctrl">
    <h1 align="center">Welcome</h1>
    <table width="600px" cellspacing="5" cellpadding="5" align="center">
        <form action="<?php  $_SERVER['PHP_SELF']   ?>"  method="post" name="regform" ng-submit="newregmodel()"></form>
        <tr>
           <td><label for="">Enter User Name</label></td>
           <td><input type="text" name="uname" ng-model="regform.uname"  /></td>
        </tr>
        <tr>
            <td><label for="">Enter Age</label></td>
            <td><input type="number" name="uage" ng-model="regform.uage" /></td>
        </tr>
        <tr>
            <td align="center"><input type="button"  value="Submit" ng-click="submit" name="submit" class="btn btn-success" /> <input type="button"  value="Cancel" ng-click="" class="btn btn-danger" /></td>
        </tr>
</table>
    </table>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
<script src="vendor/popper.min.js" ></script>
<script src="vendor/bootstrap.min.js" ></script>
<script>
angular.module("myapp",[]).controller("ctrl",function($scope){

});
</script>
</body>
</html>
<?php
