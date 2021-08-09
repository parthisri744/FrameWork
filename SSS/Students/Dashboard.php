<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
spl_autoload_register(function($className) {
           require_once "../Model/".$className.".php";
});
$obj=new StuModel();
$studata =  $obj->fetch_data_datatable();
//var_dump($studata);
foreach($studata as $stdentdata){
    $passflag = $stdentdata['passflag'];
}
//echo "Passflag :".$passflag;
if($passflag == 0)
{?> 
    <script type="text/javascript">
    $(window).on('load', function() {
        $('#popup').modal('show');
    });
    </script>
    <div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
      </div>
      <div class="modal-body">
      <img src="vendors/img/password.gif" alt="Anna University Logo" height="200px" width="100px" class="card-img-top" >
      <form  method="post" class="needs-validation" novalidate>
            <div class="form-group">
                <label class="form-label">Enter Password</label>
                <input type="password" name="password" class="form-control" ng-model="password" autocomplete="off" required>
                <span class="invalid-feedback">Please Enter Password</span>
            </div>
            <div class="form-group">
                <label class="form-label">Enter confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" ng-model="confirm_password" autocomplete="off" required>
                <span class="invalid-feedback">Please Enter confirm Password</span>
            </div>
            <div class="form-group" align="center">
                <input  type="submit" class="btn btn-success" name="submit" ng-click="insert()"  value="Change Password">
                <a class="btn btn-danger"   href="Students/logout.php" role="button" >Logout</a>
            </div>
         </form>
      </div>
  </div>
</div>
</div>
<?php
}
?> 
<div ng-app="ucensss" ng-controller="sssctrl">
    <div class="text-center">
    <h3>University College Of Engineering Nagercoil</h3>
    <h4>STUDENT STATIONERY SHOP</h4>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 "> 
                <div class="card shadow">
                    <div class="card-body">
                    <img src="vendors/img/user.png" alt="Anna University Logo" class="card-img-top" >
                        <div class="text-center">
                            <h3>Welcome <b><?php echo $_SESSION['sname']  ?></b></h3>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#passwordrest">Change Password
</button>
                        </div>

                    </div>
                </div>
            </div>
                <div class="col-md-9">
                     <div class="col-md-12 center-content-center">
                    <div class="card shadow">
                    <div class="card-body">
                    <img class="card-img-top" src="vendors/img/ucen.jpg" alt="Ucen image" style="width:100%; height: 500px">
                    <div class="card-body">
                    <h4 class="card-title"></h4>
                    <h4 class="card-text text-secondary" style="padding-left:10px; font-family: 'Bitter', serif;">University College of Engineering,Nagercoil is one of the constituent Engineering Colleges of Anna University, Chennai. The campus is formed in the year 2009 with a goal of enhancing the quality of technical education in the southern part of Tamilnadu. It is a college for the top notch students. We provide under graduate courses with our highbrow and involved faculties. The institution also provides MBA in distance education mode. The students are admitted through single window counselling. Our vast campus with contemporary style buildings and smart classes provides world class experience and luxury for students to acquire knowledge. Trees and fresh air in the campus disentangles the entangles of the students and thus making it a wonderful study environment.</h4>
                    <a href="https://ucen.ac.in/about.php" class="btn btn-primary ">See Official Website</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="passwordrest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
        </div>
        <div class="modal-body">
        <img src="vendors/img/password.gif" alt="Anna University Logo" height="200px" width="100px" class="card-img-top" >
        <form  method="post" class="needs-validation" novalidate>
            <div class="form-group">
                <label class="form-label">Enter Password</label>
                <input type="password" name="password" class="form-control" ng-model="password" autocomplete="off" required>
                <span class="invalid-feedback">Please Enter Password</span>
            </div>
            <div class="form-group">
                <label class="form-label">Enter confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" ng-model="confirm_password" autocomplete="off" required>
                <span class="invalid-feedback">Please Enter confirm Password</span>
            </div>
            <div class="form-group" align="center">
                <input  type="submit" class="btn btn-success" name="submit" ng-click="insert()"  value="Change Password">
                <a class="btn btn-danger" href="Students/logout.php" role="button" >Logout</a>
            </div>
         </form>
      </div>
      </div>
  </div>
<br/><br/><br/><br/>
