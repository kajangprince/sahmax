<?php

session_start();
if(!isset($_SESSION['email']) || $_SESSION['email'] != 'sahmaxoptimum@gmail.com' ){
die(header("location:./admin-logout"));
}

?>


<?php 

function escape($string){
   return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

?>

<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0, shrink-to-fit=no, user-scalable=yes">
    <meta name="handheldfriendly" content="yes">
    <meta name="description" content="Account profile, details, information...">
    <meta name="keywords" content="dashboard, user">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Account Details</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>

    <style>
    .dark-mode {
      background: #000;
      filter: invert(1) hue-rotate(180deg)
    }
    </style>

  </head>

  <body>
      
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="admindashboard" class="app-brand-link">              
              <span class="app-brand-text demo menu-text fw-bolder ms-2" style="color:#FD7E14">Sahmax Admin</span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="admindashboard.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Manage Clients</div>
              </a>
            </li>

              <li class="menu-item">
                <a href="rates" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-message-alt-add"></i>
                  <div data-i18n="Analytics">Rates update</div>
                </a>
              </li>
              
            <li class="menu-item">
              <a href="admin-verification-request" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-check"></i>
                <div data-i18n="Analytics">Verification requests</div>
              </a>
            </li>
                        <li class="menu-item">
              <a href="admin-active-buy-orders" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
                <div data-i18n="Analytics">Active Buy Orders</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="admin-active-sell-orders" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
                <div data-i18n="Analytics">Active Sell Orders</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="admin-completed-orders" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
                <div data-i18n="Analytics">Completed Orders</div>
              </a>
            </li>
            <li class="menu-item active">
              <a href="admin-account-details" class="menu-link">
                <i class="menu-icon tf-icons bx bx-credit-card"></i>
                <div data-i18n="Analytics">Account Details</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="admin-message-users" class="menu-link">
                <i class="menu-icon tf-icons bx bx-message"></i>
                <div data-i18n="Analytics">Message Users</div>
              </a>
            </li>

            <!--<li class="menu-item">
              <a href="client-statement" class="menu-link">
                <i class="menu-icon tf-icons bx bx-street-view"></i>
                <div data-i18n="Basic">View Client Statement</div>
              </a>
            </li>-->
           
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a href="account-settings.php"
                    data-icon="octicon-star" 
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/Sahmax-html-admin-template-free on GitHub">
                    <span class="" style="text-transform:capitalize">Welcome Admin</span></a>
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="images/hero_1.jpg" alt class="w-px-40 rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                             <img src="images/hero_1.jpg" alt class="w-px-40 rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block" style="text-transform:capitalize">Sahmax Admin</span>
                             <small class="text-muted">Admin Account</small><br>
                             <small class="text-muted" style="font-size:12px";>Connected</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="../logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

        
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Details /</span> Update</h4>

              <div class="row">
                <div class="col-md-12">
                  
                    <div class="card mb-4">
                    <hr class="my-0" />
                    <div class="card-body">
                     <form id="formAccountSettings" method="POST" action="" onsubmit="return true">
                       
                  <div class="row">
                    <div class="col-md-6 col-12 mb-md-0 mb-4">
                      <div class="card">
                        <h5 class="card-header">Account Details</h5>
                        <div class="card-body">
                          <p>This account details is found on buy order page</p>
                          <!-- Connections -->                                                      
                          <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                              <img src="../assets/img/icons/brands/activity.png" alt="google" class="me-3" height="30" />
                            </div>
                            
                            <?php
                            
                            include_once("pdoconfig.php");
                            
                            $adminemail = "sahmaxoptimum@gmail.com";
                            
                            //get admin account details from db
                            $sql = "SELECT * FROM admin_account_details WHERE email = :adminemail LIMIT 1";
                            $query = $con->prepare($sql);
                            $query->execute(array('adminemail' => $adminemail));
                            $row = $query->fetch(PDO::FETCH_ASSOC);
                            
                            $first_account = $row['first_account'];
                            $second_account = $row['second_account'];
                            $third_account = $row['third_account'];
                            $fourth_account = $row['fourth_account'];
                            $fifth_account = $row['fifth_account'];
                            $sixth_account = $row['sixth_account'];
                            $seventh_account = $row['seventh_account'];
                            
                            ?>
                            
                            <div class="flex-grow-1 row">
                              <div class="col-9 mb-sm-0 mb-2">
                                  
                                  <?php 
                                    
                                    include_once("pdoconfig.php");
                                    
                                    if(isset($_POST['addpalmpayaccount'])){
                                        $adminemail = "sahmaxoptimum@gmail.com";
                                        $first_account = "Palmpay";
                                        $addpalmpayaccount = "UPDATE admin_account_details SET first_account = :first_account WHERE email = :adminemail LIMIT 1";
                                    	$stmt1 = $con->prepare($addpalmpayaccount);
                                    	$stmt1->bindParam(":adminemail",$adminemail);
                                    	$stmt1->bindParam(":first_account",$first_account);
                                    	$stmt1->execute();
                                    	
                                    	if($addpalmpayaccount){
                                    	    echo"<span class='' style='color:green;font-size:14px;'>Palmpay Acc Restored</span>";
                                    	    $con = null;
                                    	}else{
                                    	    echo"<span class='' style='color:red;font-size:14px;'>Failed to restore account</span>";
                                    	    $con = null;
                                    	}
                                    }
                                        
                                 ?>
                                    
                                    
                                    <?php 
                                    
                                    include_once("pdoconfig.php");
                                    
                                    if(isset($_POST['removepalmpayaccount'])){
                                        $adminemail = "sahmaxoptimum@gmail.com";
                                        $first_account = null;
                                        $addpalmpayaccount = "UPDATE admin_account_details SET first_account = :first_account WHERE email = :adminemail LIMIT 1";
                                    	$stmt1 = $con->prepare($addpalmpayaccount);
                                    	$stmt1->bindParam(":adminemail",$adminemail);
                                    	$stmt1->bindParam(":first_account",$first_account);
                                    	$stmt1->execute();
                                    	
                                    	if($addpalmpayaccount){
                                    	    echo"<span class='' style='color:green;font-size:14px;'>Palmpay Acc Removed</span>";
                                    	    $con = null;
                                    	}else{
                                    	    echo"<span class='' style='color:red;font-size:14px;'>Failed to remove account</span>";
                                    	    $con = null;
                                    	}
                                    }
                                        
                                    ?>
                                    
                                <h6 class="mb-0">Palmpay</h6>
                                <small class="text-muted">
                                    
                                    <?php if($first_account=="Palmpay"){
                                        echo"$first_account <i class='fa fa-check' style='color:green'></i>";
                                    }else{
                                        echo"Removed";   
                                    }
                                        
                                    ?>
                                    
                                </small>
                              </div>
                              <div class="col-3 text-end">
                                <div class="form-check form-switch">
                                    
                                    <?php if($first_account=="Palmpay"){
                                         echo'<form action="" method="POST"> 
                                        <button type="submit" class="btn btn-deafult btn-sm float-end" name="removepalmpayaccount"><i class="fa fa-toggle-on fa-2x" style="color:blue"></i></button>
                                        </form>'; 
                                    }else{
                                         echo'<form action="" method="POST"> 
                                        <button type="submit" class="btn btn-default btn-sm float-end" name="addpalmpayaccount"><i class="fa fa-toggle-on fa-2x" style="color:grey""></i></button>
                                        </form>';  
                                    }
                                        
                                    ?>
                                    
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <!-- second account details -->
                          <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                              <img src="../assets/img/icons/brands/activity.png" alt="google" class="me-3" height="30" />
                            </div>
                            <div class="flex-grow-1 row">
                              <div class="col-9 mb-sm-0 mb-2">
                                  
                                  <?php 
                                    
                                    include_once("pdoconfig.php");
                                    
                                    if(isset($_POST['addaccessbankaccount'])){
                                        $adminemail = "sahmaxoptimum@gmail.com";
                                        $second_account = "Accessbank";
                                        $addaccessbankaccount = "UPDATE admin_account_details SET second_account = :second_account WHERE email = :adminemail LIMIT 1";
                                    	$stmt1 = $con->prepare($addaccessbankaccount);
                                    	$stmt1->bindParam(":adminemail",$adminemail);
                                    	$stmt1->bindParam(":second_account",$second_account);
                                    	$stmt1->execute();
                                    	
                                    	if($addaccessbankaccount){
                                    	    echo"<span class='' style='color:green;font-size:14px;'>Access Acc Restored</span>";
                                    	    $con = null;
                                    	}else{
                                    	    echo"<span class='' style='color:red;font-size:14px;'>Failed to restore account</span>";
                                    	    $con = null;
                                    	}
                                    }
                                        
                                 ?>
                                    
                                    
                                    <?php 
                                    
                                    include_once("pdoconfig.php");
                                    
                                    if(isset($_POST['removeaccessbankaccount'])){
                                        $adminemail = "sahmaxoptimum@gmail.com";
                                        $second_account = null;
                                        $addaccessbankaccount = "UPDATE admin_account_details SET second_account = :second_account WHERE email = :adminemail LIMIT 1";
                                    	$stmt1 = $con->prepare($addaccessbankaccount);
                                    	$stmt1->bindParam(":adminemail",$adminemail);
                                    	$stmt1->bindParam(":second_account",$second_account);
                                    	$stmt1->execute();
                                    	
                                    	if($addaccessbankaccount){
                                    	    echo"<span class='' style='color:green;font-size:14px;'>Accessbank Acc Removed</span>";
                                    	    $con = null;
                                    	}else{
                                    	    echo"<span class='' style='color:red;font-size:14px;'>Failed to remove account</span>";
                                    	    $con = null;
                                    	}
                                    }
                                        
                                    ?>
                                    
                                <h6 class="mb-0">Access bank</h6>
                                <small class="text-muted">
                                    
                                    <?php if($second_account=="Accessbank"){
                                        echo"$second_account <i class='fa fa-check' style='color:green'></i>";
                                    }else{
                                        echo"Removed";   
                                    }
                                        
                                    ?>
                                    
                                </small>
                              </div>
                              <div class="col-3 text-end">
                                <div class="form-check form-switch">
                                    
                                    <?php if($second_account=="Accessbank"){
                                         echo'<form action="" method="POST"> 
                                        <button type="submit" class="btn btn-deafult btn-sm float-end" name="removeaccessbankaccount"><i class="fa fa-toggle-on fa-2x" style="color:blue"></i></button>
                                        </form>'; 
                                    }else{
                                         echo'<form action="" method="POST"> 
                                        <button type="submit" class="btn btn-default btn-sm float-end" name="addaccessbankaccount"><i class="fa fa-toggle-on fa-2x" style="color:grey""></i></button>
                                        </form>';  
                                    }
                                        
                                    ?>
                                    
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <!-- Third account details -->
                          <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                              <img src="../assets/img/icons/brands/activity.png" alt="google" class="me-3" height="30" />
                            </div>
                            <div class="flex-grow-1 row">
                              <div class="col-9 mb-sm-0 mb-2">
                                  
                                  <?php 
                                    
                                    include_once("pdoconfig.php");
                                    
                                    if(isset($_POST['addfcmbaccount'])){
                                        $adminemail = "sahmaxoptimum@gmail.com";
                                        $third_account = "FCMB";
                                        $addfcmbaccount = "UPDATE admin_account_details SET third_account = :third_account WHERE email = :adminemail LIMIT 1";
                                    	$stmt1 = $con->prepare($addfcmbaccount);
                                    	$stmt1->bindParam(":adminemail",$adminemail);
                                    	$stmt1->bindParam(":third_account",$third_account);
                                    	$stmt1->execute();
                                    	
                                    	if($addfcmbaccount){
                                    	    echo"<span class='' style='color:green;font-size:14px;'>FCMB Acc Restored</span>";
                                    	    $con = null;
                                    	}else{
                                    	    echo"<span class='' style='color:red;font-size:14px;'>Failed to restore account</span>";
                                    	    $con = null;
                                    	}
                                    }
                                        
                                 ?>
                                    
                                    
                                    <?php 
                                    
                                    include_once("pdoconfig.php");
                                    
                                    if(isset($_POST['removefcmbaccount'])){
                                        $adminemail = "sahmaxoptimum@gmail.com";
                                        $third_account = null;
                                        $addfcmbaccount = "UPDATE admin_account_details SET third_account = :third_account WHERE email = :adminemail LIMIT 1";
                                    	$stmt1 = $con->prepare($addfcmbaccount);
                                    	$stmt1->bindParam(":adminemail",$adminemail);
                                    	$stmt1->bindParam(":third_account",$third_account);
                                    	$stmt1->execute();
                                    	
                                    	if($addfcmbaccount){
                                    	    echo"<span class='' style='color:green;font-size:14px;'>FCMB Acc Removed</span>";
                                    	    $con = null;
                                    	}else{
                                    	    echo"<span class='' style='color:red;font-size:14px;'>Failed to remove account</span>";
                                    	    $con = null;
                                    	}
                                    }
                                        
                                    ?>
                                    
                                <h6 class="mb-0">FCMB</h6>
                                <small class="text-muted">
                                    
                                    <?php if($third_account=="FCMB"){
                                        echo"$third_account <i class='fa fa-check' style='color:green'></i>";
                                    }else{
                                        echo"Removed";   
                                    }
                                        
                                    ?>
                                    
                                </small>
                              </div>
                              <div class="col-3 text-end">
                                <div class="form-check form-switch">
                                    
                                    <?php if($third_account=="FCMB"){
                                         echo'<form action="" method="POST"> 
                                        <button type="submit" class="btn btn-deafult btn-sm float-end" name="removefcmbaccount"><i class="fa fa-toggle-on fa-2x" style="color:blue"></i></button>
                                        </form>'; 
                                    }else{
                                         echo'<form action="" method="POST"> 
                                        <button type="submit" class="btn btn-default btn-sm float-end" name="addfcmbaccount"><i class="fa fa-toggle-on fa-2x" style="color:grey""></i></button>
                                        </form>';  
                                    }
                                        
                                    ?>
                                    
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          
                          <!-- Fourth account details -->
                          <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                              <img src="../assets/img/icons/brands/activity.png" alt="google" class="me-3" height="30" />
                            </div>
                            <div class="flex-grow-1 row">
                              <div class="col-9 mb-sm-0 mb-2">
                                  
                                  <?php 
                                    
                                    include_once("pdoconfig.php");
                                    
                                    if(isset($_POST['addfidelityaccount'])){
                                        $adminemail = "sahmaxoptimum@gmail.com";
                                        $fourth_account = "Fidelity bank";
                                        $addfidelityaccount = "UPDATE admin_account_details SET fourth_account = :fourth_account WHERE email = :adminemail LIMIT 1";
                                    	$stmt1 = $con->prepare($addfidelityaccount);
                                    	$stmt1->bindParam(":adminemail",$adminemail);
                                    	$stmt1->bindParam(":fourth_account",$fourth_account);
                                    	$stmt1->execute();
                                    	
                                    	if($addfidelityaccount){
                                    	    echo"<span class='' style='color:green;font-size:14px;'>Fidelity Acc Restored</span>";
                                    	    $con = null;
                                    	}else{
                                    	    echo"<span class='' style='color:red;font-size:14px;'>Failed to restore account</span>";
                                    	    $con = null;
                                    	}
                                    }
                                        
                                 ?>
                                    
                                    
                                    <?php 
                                    
                                    include_once("pdoconfig.php");
                                    
                                    if(isset($_POST['removefidelityaccount'])){
                                        $adminemail = "sahmaxoptimum@gmail.com";
                                        $fourth_account = null;
                                        $removefidelityaccount = "UPDATE admin_account_details SET fourth_account = :fourth_account WHERE email = :adminemail LIMIT 1";
                                    	$stmt1 = $con->prepare($removefidelityaccount);
                                    	$stmt1->bindParam(":adminemail",$adminemail);
                                    	$stmt1->bindParam(":fourth_account",$fourth_account);
                                    	$stmt1->execute();
                                    	
                                    	if($removefidelityaccount){
                                    	    echo"<span class='' style='color:green;font-size:14px;'>Fidelity Acc Removed</span>";
                                    	    $con = null;
                                    	}else{
                                    	    echo"<span class='' style='color:red;font-size:14px;'>Failed to remove account</span>";
                                    	    $con = null;
                                    	}
                                    }
                                        
                                    ?>
                                    
                                <h6 class="mb-0">Fidelity bank</h6>
                                <small class="text-muted">
                                    
                                    <?php if($fourth_account=="Fidelity bank"){
                                        echo"$fourth_account <i class='fa fa-check' style='color:green'></i>";
                                    }else{
                                        echo"Removed";   
                                    }
                                        
                                    ?>
                                    
                                </small>
                              </div>
                              <div class="col-3 text-end">
                                <div class="form-check form-switch">
                                    
                                    <?php if($fourth_account=="Fidelity bank"){
                                         echo'<form action="" method="POST"> 
                                        <button type="submit" class="btn btn-deafult btn-sm float-end" name="removefidelityaccount"><i class="fa fa-toggle-on fa-2x" style="color:blue"></i></button>
                                        </form>'; 
                                    }else{
                                         echo'<form action="" method="POST"> 
                                        <button type="submit" class="btn btn-default btn-sm float-end" name="addfidelityaccount"><i class="fa fa-toggle-on fa-2x" style="color:grey""></i></button>
                                        </form>';  
                                    }
                                        
                                    ?>
                                    
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <!-- Fifth account details -->
                          <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                              <img src="../assets/img/icons/brands/activity.png" alt="google" class="me-3" height="30" />
                            </div>
                            <div class="flex-grow-1 row">
                              <div class="col-9 mb-sm-0 mb-2">
                                  
                                  <?php 
                                    
                                    include_once("pdoconfig.php");
                                    
                                    if(isset($_POST['addgtbaccount'])){
                                        $adminemail = "sahmaxoptimum@gmail.com";
                                        $fifth_account = "GTBank";
                                        $addgtbaccount = "UPDATE admin_account_details SET fifth_account = :fifth_account WHERE email = :adminemail LIMIT 1";
                                    	$stmt1 = $con->prepare($addgtbaccount);
                                    	$stmt1->bindParam(":adminemail",$adminemail);
                                    	$stmt1->bindParam(":fifth_account",$fifth_account);
                                    	$stmt1->execute();
                                    	
                                    	if($addgtbaccount){
                                    	    echo"<span class='' style='color:green;font-size:14px;'>GTB Acc Restored</span>";
                                    	    $con = null;
                                    	}else{
                                    	    echo"<span class='' style='color:red;font-size:14px;'>Failed to restore account</span>";
                                    	    $con = null;
                                    	}
                                    }
                                        
                                 ?>
                                    
                                    
                                    <?php 
                                    
                                    include_once("pdoconfig.php");
                                    
                                    if(isset($_POST['removegtbaccount'])){
                                        $adminemail = "sahmaxoptimum@gmail.com";
                                        $fifth_account = null;
                                        $removegtbaccount = "UPDATE admin_account_details SET fifth_account = :fifth_account WHERE email = :adminemail LIMIT 1";
                                    	$stmt1 = $con->prepare($removegtbaccount);
                                    	$stmt1->bindParam(":adminemail",$adminemail);
                                    	$stmt1->bindParam(":fifth_account",$fifth_account);
                                    	$stmt1->execute();
                                    	
                                    	if($removegtbaccount){
                                    	    echo"<span class='' style='color:green;font-size:14px;'>GTB Acc Removed</span>";
                                    	    $con = null;
                                    	}else{
                                    	    echo"<span class='' style='color:red;font-size:14px;'>Failed to remove account</span>";
                                    	    $con = null;
                                    	}
                                    }
                                        
                                    ?>
                                    
                                <h6 class="mb-0">GTBank</h6>
                                <small class="text-muted">
                                    
                                    <?php if($fifth_account=="GTBank"){
                                        echo"$fifth_account <i class='fa fa-check' style='color:green'></i>";
                                    }else{
                                        echo"Removed";   
                                    }
                                        
                                    ?>
                                    
                                </small>
                              </div>
                              <div class="col-3 text-end">
                                <div class="form-check form-switch">
                                    
                                    <?php if($fifth_account=="GTBank"){
                                         echo'<form action="" method="POST"> 
                                        <button type="submit" class="btn btn-deafult btn-sm float-end" name="removegtbaccount"><i class="fa fa-toggle-on fa-2x" style="color:blue"></i></button>
                                        </form>'; 
                                    }else{
                                         echo'<form action="" method="POST"> 
                                        <button type="submit" class="btn btn-default btn-sm float-end" name="addgtbaccount"><i class="fa fa-toggle-on fa-2x" style="color:grey""></i></button>
                                        </form>';  
                                    }
                                        
                                    ?>
                                    
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <!-- Sixth account details -->
                          <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                              <img src="../assets/img/icons/brands/activity.png" alt="google" class="me-3" height="30" />
                            </div>
                            <div class="flex-grow-1 row">
                              <div class="col-9 mb-sm-0 mb-2">
                                  
                                  <?php 
                                    
                                    include_once("pdoconfig.php");
                                    
                                    if(isset($_POST['addzenithaccount'])){
                                        $adminemail = "sahmaxoptimum@gmail.com";
                                        $sixth_account = "Zenith bank";
                                        $addzenithaccount = "UPDATE admin_account_details SET sixth_account = :sixth_account WHERE email = :adminemail LIMIT 1";
                                    	$stmt1 = $con->prepare($addzenithaccount);
                                    	$stmt1->bindParam(":adminemail",$adminemail);
                                    	$stmt1->bindParam(":sixth_account",$sixth_account);
                                    	$stmt1->execute();
                                    	
                                    	if($addzenithaccount){
                                    	    echo"<span class='' style='color:green;font-size:14px;'>Zenith Acc Restored</span>";
                                    	    $con = null;
                                    	}else{
                                    	    echo"<span class='' style='color:red;font-size:14px;'>Failed to restore account</span>";
                                    	    $con = null;
                                    	}
                                    }
                                        
                                 ?>
                                    
                                    
                                    <?php 
                                    
                                    include_once("pdoconfig.php");
                                    
                                    if(isset($_POST['removezenithaccount'])){
                                        $adminemail = "sahmaxoptimum@gmail.com";
                                        $sixth_account = null;
                                        $removezenithaccount = "UPDATE admin_account_details SET sixth_account = :sixth_account WHERE email = :adminemail LIMIT 1";
                                    	$stmt1 = $con->prepare($removezenithaccount);
                                    	$stmt1->bindParam(":adminemail",$adminemail);
                                    	$stmt1->bindParam(":sixth_account",$sixth_account);
                                    	$stmt1->execute();
                                    	
                                    	if($removezenithaccount){
                                    	    echo"<span class='' style='color:green;font-size:14px;'>Zenith Acc Removed</span>";
                                    	    $con = null;
                                    	}else{
                                    	    echo"<span class='' style='color:red;font-size:14px;'>Failed to remove account</span>";
                                    	    $con = null;
                                    	}
                                    }
                                        
                                    ?>
                                    
                                <h6 class="mb-0">Zenith Bank</h6>
                                <small class="text-muted">
                                    
                                    <?php if($sixth_account=="Zenith bank"){
                                        echo"$sixth_account <i class='fa fa-check' style='color:green'></i>";
                                    }else{
                                        echo"Removed";   
                                    }
                                        
                                    ?>
                                    
                                </small>
                              </div>
                              <div class="col-3 text-end">
                                <div class="form-check form-switch">
                                    
                                    <?php if($sixth_account=="Zenith bank"){
                                         echo'<form action="" method="POST"> 
                                        <button type="submit" class="btn btn-deafult btn-sm float-end" name="removezenithaccount"><i class="fa fa-toggle-on fa-2x" style="color:blue"></i></button>
                                        </form>'; 
                                    }else{
                                         echo'<form action="" method="POST"> 
                                        <button type="submit" class="btn btn-default btn-sm float-end" name="addzenithaccount"><i class="fa fa-toggle-on fa-2x" style="color:grey""></i></button>
                                        </form>';  
                                    }
                                        
                                    ?>
                                    
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <!-- Seventh account details -->
                          <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                              <img src="../assets/img/icons/brands/activity.png" alt="google" class="me-3" height="30" />
                            </div>
                            <div class="flex-grow-1 row">
                              <div class="col-9 mb-sm-0 mb-2">
                                  
                                  <?php 
                                    
                                    include_once("pdoconfig.php");
                                    
                                    if(isset($_POST['addubaaccount'])){
                                        $adminemail = "sahmaxoptimum@gmail.com";
                                        $seventh_account = "UBA";
                                        $addubaaccount = "UPDATE admin_account_details SET seventh_account = :seventh_account WHERE email = :adminemail LIMIT 1";
                                    	$stmt1 = $con->prepare($addubaaccount);
                                    	$stmt1->bindParam(":adminemail",$adminemail);
                                    	$stmt1->bindParam(":seventh_account",$seventh_account);
                                    	$stmt1->execute();
                                    	
                                    	if($addubaaccount){
                                    	    echo"<span class='' style='color:green;font-size:14px;'>UBA Acc Restored</span>";
                                    	    $con = null;
                                    	}else{
                                    	    echo"<span class='' style='color:red;font-size:14px;'>Failed to restore account</span>";
                                    	    $con = null;
                                    	}
                                    }
                                        
                                 ?>
                                    
                                    
                                    <?php 
                                    
                                    include_once("pdoconfig.php");
                                    
                                    if(isset($_POST['removeubaaccount'])){
                                        $adminemail = "sahmaxoptimum@gmail.com";
                                        $seventh_account = null;
                                        $removeubaaccount = "UPDATE admin_account_details SET seventh_account = :seventh_account WHERE email = :adminemail LIMIT 1";
                                    	$stmt1 = $con->prepare($removeubaaccount);
                                    	$stmt1->bindParam(":adminemail",$adminemail);
                                    	$stmt1->bindParam(":seventh_account",$seventh_account);
                                    	$stmt1->execute();
                                    	
                                    	if($removeubaaccount){
                                    	    echo"<span class='' style='color:green;font-size:14px;'>UBA Acc Removed</span>";
                                    	    $con = null;
                                    	}else{
                                    	    echo"<span class='' style='color:red;font-size:14px;'>Failed to remove account</span>";
                                    	    $con = null;
                                    	}
                                    }
                                        
                                    ?>
                                    
                                <h6 class="mb-0">UBA Bank</h6>
                                <small class="text-muted">
                                    
                                    <?php if($seventh_account=="UBA"){
                                        echo"$seventh_account <i class='fa fa-check' style='color:green'></i>";
                                    }else{
                                        echo"Removed";   
                                    }
                                        
                                    ?>
                                    
                                </small>
                              </div>
                              <div class="col-3 text-end">
                                <div class="form-check form-switch">
                                    
                                    <?php if($seventh_account=="UBA"){
                                         echo'<form action="" method="POST"> 
                                        <button type="submit" class="btn btn-deafult btn-sm float-end" name="removeubaaccount"><i class="fa fa-toggle-on fa-2x" style="color:blue"></i></button>
                                        </form>'; 
                                    }else{
                                         echo'<form action="" method="POST"> 
                                        <button type="submit" class="btn btn-default btn-sm float-end" name="addubaaccount"><i class="fa fa-toggle-on fa-2x" style="color:grey""></i></button>
                                        </form>';  
                                    }
                                        
                                    ?>
                                    
                                </div>
                              </div>
                            </div>
                          </div>
                            
                          <!-- /Connections -->
                        </div>
                      </div>
                    </div>
                    
              
                </div>
              </div>
            </div>
            
            <!-- / Content -->

            
            <!-- JS script to turn on dark mode -->
            <script>

            // On page load set the theme.
            (function() {
            let onpageLoad = localStorage.getItem("theme") || "";
            let element = document.body;
            element.classList.add(onpageLoad);
            document.getElementById("theme").textContent =
            localStorage.getItem("theme") || "light";
            })();

            function themeToggle() {
            let element = document.body;
            element.classList.toggle("dark-mode");

            let theme = localStorage.getItem("theme");
            if (theme && theme === "dark-mode") {
            localStorage.setItem("theme", "");
            } else {
            localStorage.setItem("theme", "dark-mode");
            }

            document.getElementById("theme").textContent = localStorage.getItem("theme");
            }

            </script>

            <!--<div class="buy-now" onclick="themeToggle()">
            <div class="btn btn-danger btn-buy-now"><i class="bx bx-moon me-2"></i>Dark Mode</div>
            </div>-->

             <!-- Footer -->
                <footer class="footer bg-light">
                  <div
                    class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3"
                  >
                    <div>
                      <a
                        href="javascript:void(0)"
                        class="footer-text fw-bolder"
                        >Sahmax Optimum</a
                      >
                      &copy;<script>document.write(new Date().getFullYear());</script> All Rights Reserved. 
                    </div>
                    <div>
                      <div class="form-check form-control-sm footer-link me-3">
                        <div class="buy-now" onclick="themeToggle()">
                        <label class="form-check-label" for="customCheck2"><i class="bx bx-moon me-2"></i>Dark Mode</label>
                        </div>
                      </div>   
                      
                      <div class="dropdown dropup footer-link me-3">
                        <button
                          type="button"
                          class="btn btn-sm btn-outline-secondary dropdown-toggle"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          Naira (&#8358;)
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item" href="javascript:void(0);">Default Currency</a>
                        </div>
                      </div>
                      <a href="logout" class="btn btn-sm btn-outline-danger"
                        ><i class="bx bx-log-out-circle"></i> Logout</a
                      >
                    </div>
                  </div>
                </footer>
              <!--/ Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/pages-account-settings-account.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>