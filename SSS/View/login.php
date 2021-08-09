<?php
session_start(); 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php?temp=dashbord");
    exit;
}
spl_autoload_register(function($className) {
    require_once "../Model/".$className.".php";
});
$obj=new DBModel();
$submit=$obj->post_method('submit');
$username=$obj->post_method('username');
$password=$obj->post_method('password');
$result =$obj->login_username($username,$password);
//var_dump($result);
$result=implode(" ",$result);
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSS</title>
</head>
<body">
    <div><?php  require_once("../Navigation/Loginnav.php");  ?></div>
    <?php 
	if($submit) {
	if(strlen($result)>0){  ?>
    <script>swal("Error", "<?php echo $result  ?>", "error");  </script>
    <?php } }?>
    <div class="container ">
    <div class="row center-content-center" > 
    <div class="col-md-7 card-deck">
    <div class="card shadow p-1">
        <div class="text-center">
        <img src="../vendors/img/annauniversity.png" alt="Anna University Logo" width="200px" height="200px">
        <h4>University College Of Engineering Nagercoil</h4>
        <p><strong>STUDENT STATIONERY SHOP</strong></p>
        <ul>
            <li>This Student Stationery Shop Application is usefull for puchase Product from the store through online </li>
            <li>students can view their transactions,available product details,view current Balance ect..</li>
        </ul>
        </div>
    </div>
</div>
    <div class="col-md-5 card-deck ">
    <div class="card shadow p-3">
        <div class="card-body">
        <h2 class="text-center">Login</h2>
        <p class="text-center">Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="needs-validation" novalidate>
            <div class="form-group">Enter Username</label>
            <input type="text" name="username" class="form-control" value="" autocomplete="off" required>
            <span class="invalid-feedback">Please Enter UserName</span>
            </div>    
            <div class="form-group">
                <label class="form-label">Enter Password</label>
                <span class="invalid-feedback">Please Enter Password</span>
                <input type="password" name="password" class="form-control" autocomplete="off" required>
                <span class="invalid-feedback">Please Enter Password</span>
            </div>
            <div class="form-group" >
                <input  type="submit" class="btn btn-success" name="submit" value="Login">
            </div>
            <p>Don't have an account? <a href="Registration.php">Sign up now</a>.</p>
            <p>Forget Password <a href="Registration.php">Click Here</a>.</p>
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
</html>