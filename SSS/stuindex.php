<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
session_start();
 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
spl_autoload_register(function($className) {
           require_once "Model/".$className.".php";
});
$obj=new StuModel();
$data= $obj->fetch_data_datatable();
//var_dump($data);
function decrypt($ivHashCiphertext, $password) {
    $method = "AES-256-CBC";
    $iv = substr($ivHashCiphertext, 0, 16);
    $hash = substr($ivHashCiphertext, 16, 32);
    $ciphertext = substr($ivHashCiphertext, 48);
    $key = hash('sha256', $password, true);
    if (!hash_equals(hash_hmac('sha256', $ciphertext . $iv, $key, true), $hash)) return null;
    return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSS</title>
</head> 
<body ng-app="ucensss" ng-controller="sssctrl" ng-init="GenerateTable()">
<div><?php  require_once("Navigation/stuNavigation.php");  ?></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <?php
                            $param=$_GET['temp'];
                            //echo "Param :".$param;
                            if($param=="dc7161be3dbf2250c8954e560cc35060"){
     
                                   require_once("Students/Dashboard.php");

                            } elseif($param=="aba064f896dc3eb1653c3b68b9548ef1"){
                                   require_once("View/students.php");
                            }else{
                               // echo "dir".__DIR__;
                               require_once("Students/Dashboard.php");
                               //    require_once("View/sewstudent.php");
                            }
                        ?>
                </div>
          </div>
      </div>
    </div>
</div>
<script src="vendors/js/Main.js"></script>
<link rel='stylesheet' href='vendors/css/style.css'></link>  
<script>
angular.module("ucensss",[]).controller("sssctrl",function($scope,$http,$filter){

$scope.courseDetails=["Bachelor of Engineering","Bachelor of Technology"];

$scope.BecourseDetails=["Computer Science Engineering","Mechanical Engineering","Electrical and Electronics Engineering",
"Electronics and Communication Engineering","Civil Engineering"];

$scope.BtechcourseDetails = ["Informational Technology"];

$scope.ayear = ["First Year","Second Year","Third Year","Final Year"];
var studentid= 0;
$scope.insert= function(){
   // alert($scope.password+" "+$scope.confirm_password);
   // alert("Model/Ajaxinsert.php?functionname=insertpassword&id="+<?php echo $_SESSION['ID']  ?>);
   $http.post("Model/Ajaxinsert.php?functionname=insertpassword&id="+<?php echo $_SESSION['ID']  ?>,{
       'password': $scope.password,
       'confirm_password': $scope.confirm_password
       }).then(function success(response){ 
        var message= response.data;   
           swal({
                text: message,
                timer: 2000,
                showConfirmButton: true
             }, function(){
                 if(message=="Password Updated Successfully"){
                 window.location.href = "stuindex.php?temp=dc7161be3dbf2250c8954e560cc35060";
                 }
            });
            if(message=="Password Updated Successfully"){
            window.location.href = "stuindex.php?temp=dc7161be3dbf2250c8954e560cc35060";
            }
       },function error(response){
            alert(response.data);
       });
   }
});
$('#password').on('click',function(){
      //  alert("Pasword Clicked");
     // $('#popup').trigger('focus')
    });
    function  model_view(){
    }
</script>
</body>
<br /></br/> 
<div class="footer fixed-bottom bg-primary   ">
<div class="footer-copyright text-center py-3">© 202 Copyright:Parthiban
</div>
</div>
</html>
<!--sticky-buttom page-footer -->