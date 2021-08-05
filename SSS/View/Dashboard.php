<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
spl_autoload_register(function($className) {
           require_once "../Model/".$className.".php";
});
$obj=new DBModel();
?> 
<div ng-app="ucensss" ng-controller="sssctrl">
    <div class="text-center">
    <h3>University College Of Engineering Nagercoil</h3>
    <h4>STUDENT STATIONERY SHOP</h4>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-body">
                        <img src="vendors/img/user.png" alt="Anna University Logo" class="card-img-top" >
                        <div class="text-center">
                            <h3>Welcome to Student Stationery Shop</h3>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-md-9">
                <div class="card shadow">
                    <div class="card-body">
                    <div class="card-title p-4">
                        <h4>DashBoard</h4>
                    </div>
                    <div class="container">
                        <div class="card-deck">
                        <div class="card-columns">
                          <div class="card bg-primary">
                               <div class="card-body text-center">
                                   <h4 class="card-text ">Wating For Delivery</h4>
                                   <div class="count-up">
                                          <h1 class="counter-count">100</h1>
                                  </div>
                                      <a href=# class="btn btn-info card-link">Process</a>
                            </div>  
                        </div>
                         <div class="card bg-warning">
                               <div class="card-body text-center">
                                    <h4 class="card-text">Password Reset Request</h4>
                                    <div class="count-up">
                                          <h1 class="counter-count">200</h1>
                                  </div>
                                  <a href=# class="btn btn-info card-link">Process</a>
                               </div>
                         </div>
                         <div class="card bg-success">
                               <div class="card-body text-center">
                                    <h4 class="card-text">Deliveried Count</h4>
                                    <div class="count-up">
                                          <h1 class="counter-count">300</h1>
                                  </div>
                                  <a href=# class="btn btn-info card-link">Process</a>
                         </div>
                         </div>
                         <div class="card bg-danger">
                            <div class="card-body text-center">
                                   <h4 class="card-text">Total Balance Available</h4>
                                   <div class="count-up">
                                          <h1 class="counter-count">400</h1>
                                  </div>
                                  <a href=# class="btn btn-info card-link">Process</a>
                              </div>
                        </div>  
                        <div class="card bg-light">
                           <div class="card-body text-center">
                                       <p class="card-text">Some text inside the fifth card</p>
                                       <div class="count-up">
                                          <h1 class="counter-count">500</h1>
                                  </div>
                                  <a href=# class="btn btn-info card-link">Process</a>
                           </div>
                         </div>
                         <div class="card bg-info">
                         <div class="card-body text-center">
                               <p class="card-text">Some text inside the sixth card</p>
                               <div class="count-up">
                                          <h1 class="counter-count">600</h1>
                                </div>
                                <a href=# class="btn btn-info card-link">Process</a>
                         </div>
                    </div>
                 </div>
               </div>
            </div>
        </div>
</div>
<br/><br/><br/><br/>
