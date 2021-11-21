<!DOCTYPE html>
<html ng-app="CodeDrive">
<head>
    <title></title>
    <meta charset="utf-8" />
    <script data-require="angular.js@1.4.x" src="https://code.angularjs.org/1.4.12/angular.js" data-semver="1.4.9"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://rawgit.com/daniel-nagy/md-data-table/master/dist/md-data-table.css">
</head>
<body ng-controller="CodeDriveCtrl" layout="column" ng-init="loadData()">
<?php
require_once("Table.php");

$table_arr2 = [
    "table"=>["name"=>"index_table","app"=>"CodeDrive","controller"=>"CodeDriveCtrl"],
    "header"=>["title"=>"Hello Parthiban","theme"=>"orange","autoload"=>"yes","time"=>"2000","globalsearch"=>"yes"],
    "sql"=>"SELECT *,CustomerID as ID FROM `tbl_customer`",
    "button"=>["New"=>["newbtn","http://github.com","green"],"Edit"=>["exitbtn","http://google.com","blue"],"Delete"=>["deletebtn","#","red"]],
    "data" =>["CustomerName"=>["output","CustomerName","yes"],"Address"=>["output","Address","yes"],"City"=>["output","City","no"],"PostalCode"=>["output","PostalCode","yes"],"Country"=>["output","Country","no"],"Select"=>["select","select","no"],"Action"=>["button","Process","http://google.com"]],
    "filter"=>["emp_name"=>["Employee Name","text"],"salary"=>["Salary","text"],"gender"=>["Gender","text"],"city"=>["City","text"],"email"=>["Email","text"]],
    "pagination"=>["option"=>"show","pagesize"=>"5"]
    ];
$tb =  new Table($table_arr2);


?>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-aria.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.js"></script>
    <script src="https://rawgit.com/daniel-nagy/md-data-table/master/dist/md-data-table.js"></script>
</body>
</html>