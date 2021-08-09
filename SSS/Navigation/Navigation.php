<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script> 
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

<nav class="navbar navbar-expand-md bg-primary navbar-dark "> 
  <a class="navbar-brand" href="#"><small>STUDENT STATIONERY SHOP</small></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse navbar-brand" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo 'index.php?temp='.md5('dashboard');  ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo 'index.php?temp='.md5('about');  ?>">About</a>
      </li>
      <li class="nav-item" >
        <a class="nav-link" href="<?php echo 'index.php?temp='.md5('Students');  ?>">Add Student</a>
      </li>  
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Purchase
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo 'index.php?temp='.md5('stock');  ?>">Stock Details</a>
        <a class="dropdown-item" href="<?php echo 'index.php?temp='.md5('delivery');  ?>">Waiting For Delivery </a>
        <a class="dropdown-item" href="<?php echo 'index.php?temp='.md5('deliveryhistory');  ?>">Delivery History</a>
      </div>
    </ul>
       <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['username']  ?> </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="View/logout.php "">Log Out</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Help</a>
      </li>
    </ul>
  </div>  
</nav>
<!-- <br><br/> fixed-top  -->

