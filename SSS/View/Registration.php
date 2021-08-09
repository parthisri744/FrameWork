<?php
session_start(); 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: Dashboard.php");
    exit;
}
spl_autoload_register(function($className) {
    require_once "../Model/".$className.".php";
});
$obj=new DBModel();
$submit=$obj->post_method('submit');
var_dump($submit);
$username=$obj->post_method('username');
$password=$obj->post_method('password');
$confirm_password=$obj->post_method('confirm_password');
$result=$obj->registration($username,$password,$confirm_password);
$result=implode(" ",$result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSS</title>
</head>
<body ng-app="ucensss" ng-controller="sssctrl">
    <div><?php  require_once("../Navigation/Loginnav.php");  ?></div>
    <?php
	if($submit) {
	if(strlen($result)>0){  ?>
    <script>swal("Error", "<?php echo $result  ?>", "error");  </script>
    <?php }else{ ?>
            <script>swal("Success !", "Registered Sucessfully", "success");  </script>
    <?php
    }
	}	
	?>
<div class="container ">
    <div class="row justify-content-center" > 
    <div class="col-md-6 ">
    <div class="card shadow p-3">
        <div class="card-body">
        <h2 class="text-center">Admin Registration Form</h2>
        <p class="text-center">Please fill this form to create an account</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="needs-validation" novalidate>
            <div class="form-group">
            <label class="form-label">Enter Username</label>
            <input type="text" name="username" class="form-control" value="" autocomplete="off" required>
            <span class="invalid-feedback">Please Enter UserName</span>
            </div>    
            <div class="form-group">
                <label class="form-label">Enter Password</label>
                <input type="password" name="password" class="form-control" autocomplete="off" required>
                <span class="invalid-feedback">Please Enter Password</span>
            </div>
            <div class="form-group">
                <label class="form-label">Enter confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" autocomplete="off" required>
                <span class="invalid-feedback">Please Enter confirm Password</span>
            </div>
            <div class="form-group" align="center">
                <input  type="submit" class="btn btn-success" name="submit" value="Register">
                <a class="btn btn-danger"  href="login.php" role="button" >Cancel</a>
            </div>
            <p>Don't have an account? <a href="login.php">Sign up now</a>.</p>
        </form>
        </div>
    </div>
</div>
</div>
</div>
<script src="../vendors/js/Main.js"></script>
</body>
<div class="footer fixed-bottom bg-primary sticky-buttom page-footer ">
<div class="footer-copyright text-center py-3">© 2020 Copyright:Parthiban
</div>
</div>
<footer class="font-small blue">
</footer>
</html>