<?php
session_start();
if(!isset($_SESSION['email'])){
	header("location:./login");
}
?>


<?php 

function escape($string){
   return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

?>

<?php $email = $_SESSION['email']; ?>

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
    <!-- Bootstrap link to open modal onclick -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- End of bootstrap link to open modal onclick -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Account Orders - Unpaid</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/style.css">

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
    
    <!-- JQUERY LIBRARY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <style>
    .dark-mode {
      background: #000;
      filter: invert(1) hue-rotate(180deg)
    }
    
    .modal-confirm {		
	color: #636363;
    }
    .modal-confirm .modal-content {
    	padding: 20px;
    	border-radius: 5px;
    	border: none;
    	text-align: center;
    	font-size: 14px;
    }
    .modal-confirm .modal-header {
    	border-bottom: none;   
    	position: relative;
    }
    .modal-confirm h4 {
    	text-align: center;
    	font-size: 26px;
    	margin: 30px 0 -10px;
    }
    .modal-confirm .close {
    	position: absolute;
    	top: -5px;
    	right: -2px;
    }
    .modal-confirm .modal-body {
    	color: #999;
    }
    .modal-confirm .modal-footer {
    	border: none;
    	text-align: center;		
    	border-radius: 5px;
    	font-size: 13px;
    	padding: 10px 15px 25px;
    }
    .modal-confirm .modal-footer a {
    	color: #999;
    }		
    .modal-confirm .icon-box {
    	width: 80px;
    	height: 80px;
    	margin: 0 auto;
    	border-radius: 50%;
    	z-index: 9;
    	text-align: center;
    	border: 3px solid #f15e5e;
    }
    .modal-confirm .icon-box i {
    	color: #f15e5e;
    	font-size: 46px;
    	display: inline-block;
    	margin-top: 13px;
    }
    .modal-confirm .btn, .modal-confirm .btn:active {
    	color: #fff;
    	border-radius: 4px;
    	background: #60c7c1;
    	text-decoration: none;
    	transition: all 0.4s;
    	line-height: normal;
    	min-width: 120px;
    	border: none;
    	min-height: 40px;
    	border-radius: 3px;
    	margin: 0 5px;
    }
    .modal-confirm .btn-secondary {
    	background: #c1c1c1;
    }
    .modal-confirm .btn-secondary:hover, .modal-confirm .btn-secondary:focus {
    	background: #a8a8a8;
    }
    .modal-confirm .btn-danger {
    	background: #f15e5e;
    }
    .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
    	background: #ee3535;
    }
    .trigger-btn {
    	display: inline-block;
    	margin: 100px auto;
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
            <a href="userdashboard" class="app-brand-link">              
            <span class="mb-0 site-logo"><span class="h2 mb-0">Sahmax<span class="text-info"  style="font-size:25px">Optimum</span></span></span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

        <?php
				
        include_once("pdoconfig.php");

        // $email = $_SESSION['email'];

        $stmt = $con->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute(array('email' => $email));
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
        $Validate_id = $row['id'];
        $id = escape($Validate_id);

        $Validate_firstname = $row['firstname'];	
        $firstname = escape($Validate_firstname);
        
        $Validate_middlename = $row['middlename'];	
        $middlename = escape($Validate_middlename);

        $Validate_surname = $row['surname'];	
        $surname = escape($Validate_surname);

        $Validate_email = $row['email'];	
        $email = escape($Validate_email);
        
        $Validate_phone_number = $row['phone_number'];	
        $phone_number = escape($Validate_phone_number);
        
        $Validate_city = $row['city'];	
        $city = escape($Validate_city);
        
        $Validate_state = $row['state'];	
        $state = escape($Validate_state);
        
        $Validate_address = $row['address'];	
        $address = escape($Validate_address);
        
        $Validate_dob = $row['date_of_birth'];	
        $dob = escape($Validate_dob);
        
        $Validate_profile_pic = $row['profile_img'];	
        $profile_pic = escape($Validate_profile_pic);
        
        $occupation = escape($row['occupation']);

        $email_status = escape($row['is_verified']);
            
        $time =  $row['created_at'];
        $timestamp = strtotime($time);
        $formatted_time = date('d F Y', $timestamp);
                    
        }

        ?>


          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="userdashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Order Statement</span>
            </li>
            <!-- Layouts --> 
            <li class="menu-item active">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="m20 8-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8zM9 19H7v-9h2v9zm4 0h-2v-6h2v6zm4 0h-2v-3h2v3zM14 9h-1V4l5 5h-4z"></path></svg>
                <div data-i18n="Layouts">Order Statement</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <!--<a href="layouts-without-menu.html" class="menu-link">-->
                  <a href="unpaid-order" class="menu-link">
                    <div data-i18n="Without menu">Unpaid orders</div>
                  </a>
                </li>
                <li class="menu-item">
                  <!--<a href="layouts-without-menu.html" class="menu-link">-->
                  <a href="paid-order" class="menu-link">
                    <div data-i18n="Without menu">Paid orders</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="completed-order" class="menu-link">
                    <div data-i18n="Without navbar">Completed orders</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Account Verification</span>
            </li>
            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
               <i class="bx bx-user me-2"></i>
                <div data-i18n="Layouts">My Profile</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <!--<a href="layouts-without-menu.html" class="menu-link">-->
                  <a href="myprofile" class="menu-link">
                    <div data-i18n="Without menu">Profile details</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="verification" class="menu-link">
                    <div data-i18n="Without navbar">Verification</div>
                  </a>
                </li>
              </ul>
            </li>

            
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Account Management</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Account Settings</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="account-settings" class="menu-link">
                    <div data-i18n="Account">Account</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">Authentications</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="change-password.php" class="menu-link">
                    <div data-i18n="Basic">Change Password</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="forgot-password.php" class="menu-link">
                    <div data-i18n="Basic">Forgot Password</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Network status</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="javascript:void();" class="menu-link">
                    <div data-i18n="Error" style="color:green">This site has no network issues</div>
                  </a>
                </li>
              </ul>
            </li>
           
            <!-- Network status -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Help</span></li>
            <li class="menu-item">
              <a
                href="mailto:support@sahmax.com"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">Support</div>
              </a>
            </li>
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
                    aria-label="Star themeselection/sahmaxoptimum-html-admin-template-free on GitHub">
                    <span class="" style="text-transform:capitalize">Welcome <?php echo escape($firstname); ?></span></a>
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="<?php echo "$profile_pic" ?>" alt class="w-px-40 rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                             <img src="<?php echo "$profile_pic" ?>" alt class="w-px-40 rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                        <?php
                          // Check if user is verified
                          $verification_status = "0";
                          $sql = $con->prepare("SELECT verification_status FROM users WHERE email = :email LIMIT 1");
                          $sql->execute(array('email' => $email));
                          if($sql->rowCount() > 0){
                          $row = $sql->fetch(PDO::FETCH_ASSOC);
                          if ($row['verification_status']==$verification_status){
                            echo"<span class='fw-semibold d-block' style='text-transform:capitalize'>
                                $firstname $surname</span>";
                            echo"<small class='' style='color:#B3BCC5; text-transform:capitalize'>";
                            echo "Unverified account &#x1F61E;";
                            echo "</small>";
                          } else {
                            echo"<span class='fw-semibold d-block' style='text-transform:capitalize'>
                                $firstname $surname <img src='images/verification-badge.png' style='width:11px;pointer-events:none'></span>";
                            echo"<small class='' style='color:#B3BCC5; text-transform:capitalize'>";
                            echo "Verified account";
                            echo "</small>";
                          }
                        }
                        
                        ?> 
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="myprofile">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="account-settings">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <!--<li>
                      <a class="dropdown-item" href="account-notifications">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-bell me-1c me-1"></i>
                          <span class="flex-grow-1 align-middle">Notifications</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">0</span>
                        </span>
                      </a>
                    </li>-->
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout">
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
            
            <br>
            
                <!-- show  this message if order deleted "); -->
                <?php if(isset($_SESSION['message'])) : ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                  <span style="color:#008000"><strong>Success!</strong> Order deleted.</span>
                </div>
                <?php 
                    unset($_SESSION['message']);
                    endif; 
                ?>
                

            
                <div class="table-responsive text-nowrap"> 

            
                <!-- Paid order fetch script -->
                <?php 
                
                include_once("pdoconfig.php");
                    
                $email = $_SESSION['email']; 
                
                //get user ID from db
                $sql = "SELECT id FROM users WHERE email = :email LIMIT 1";
                $query = $con->prepare($sql);
                $query->execute(array('email' => $email));
                $row = $query->fetch(PDO::FETCH_ASSOC);
                
                $user_id = $row['id'];
                
                $payment_status = "0";
                     
                $stmt =  $stmt = $con->prepare("SELECT * FROM buy_order WHERE payment_status = :payment_status AND user_id = :user_id");
                $stmt->bindParam(':user_id', $user_id);
                $stmt->bindParam(':payment_status', $payment_status);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->execute();
                if($stmt){
 
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        
                        $id = $row['id'];
                        $user_id = $row['user_id'];
                        $payment_status = $row['payment_status'];
                        $order_id = $row['order_id'];
                        $order_status = $row['order_status'];
                        $dollar_type = $row['dollar_type'];
                        $account_details = $row['account_details'];
                        $network = $row['network'];
                        $wallet_address = $row['address'];
                        $amount_in_naira = $row['amount_in_naira'];
                        $receipt = $row['receipt'];
                        //Formatted amount in Naira to be used in email message
                        $formatted_amount_in_naira = number_format($amount_in_naira, 2);
                        
                        $unformatted_date =  $row['date'];
                        $datestamp = strtotime($unformatted_date);
                        $date = date('d F Y', $datestamp);
                        
                        $unformatted_time =  $row['time'];
                        $timestamp = strtotime($unformatted_time);
                        $time = date('h:i A', $timestamp);

                        if ($dollar_type=="Deriv"){
                                    
                          echo "<footer style='border: 1px solid #969696;'>
                              <div class='container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3'>
                                <div>
                                  <a href='javascript:void(0)' class='footer-text fw-bolder'>Deriv Buy Order | Order ID - $order_id | <span style='width:10px;color:#03B0D4'><i class='bx bx-time'></i></span> $time<img src='images/star.gif' style='width:15px;height:15px'></a><br>
                                  <span>$date</span> | <span>Amount - &#8358;$formatted_amount_in_naira | <span style='color:#FF0000'>pending</span></b>
                                </div>
                                <div>
                                  <div class='form-check form-control-sm footer-link me-3'>
                                    <button type='button' class='btn btn-sm btn-outline-danger' disabled>
                                      Unpaid
                                    </button>
                                  </div> 
                                  
                                  <div class='dropdown dropup footer-link me-3'>
                                  <a class='dropdown-item' href='deriv-buy?orderid=$order_id&amount=$amount_in_naira'>
                                    <button type='button' class='btn btn-sm btn-outline-info' >
                                      View order
                                    </button>
                                    </a>
                                    <div class='dropdown-menu dropdown-menu-end'> 
                                      <a class='dropdown-item' href='javascript:void(0);'>View order</a>
                                    </div>
                                  </div>
                                  <a href='javascript:void(0)' class='btn btn-sm btn-outline-danger' data-bs-toggle='modal' data-bs-target='#CancelBuyOrderModal'
                                    ><i class='bx bx-log-out-circle'></i> Cancel</a> 
                                </div>
                              </div>
                            </footer>";
                            
                         }elseif($dollar_type == "Bitcoin"){
                                    
                          echo "<footer style='border: 1px solid #969696;'>
                              <div class='container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3'>
                                <div>
                                  <a href='javascript:void(0)' class='footer-text fw-bolder'>Bitcoin Buy Order | Order ID - $order_id | <span style='width:10px;color:#03B0D4'><i class='bx bx-time'></i></span> $time<img src='images/star.gif' style='width:15px;height:15px'></a><br>
                                  <span>$date</span> | <span>Amount - &#8358;$formatted_amount_in_naira | <span style='color:#FF0000'>pending</span></b>
                                </div>
                                <div>
                                  <div class='form-check form-control-sm footer-link me-3'>
                                    <button type='button' class='btn btn-sm btn-outline-danger' disabled>
                                      Unpaid
                                    </button>
                                  </div> 
                                  
                                  <div class='dropdown dropup footer-link me-3'>
                                  <a class='dropdown-item' href='bitcoin-buy?orderid=$order_id&amount=$amount_in_naira'>
                                    <button type='button' class='btn btn-sm btn-outline-info' >
                                      View order
                                    </button>
                                    </a>
                                    <div class='dropdown-menu dropdown-menu-end'> 
                                      <a class='dropdown-item' href='javascript:void(0);'>View order</a>
                                    </div>
                                  </div>
                                  <a href='javascript:void(0)' class='btn btn-sm btn-outline-danger' data-bs-toggle='modal' data-bs-target='#CancelBuyOrderModal'
                                    ><i class='bx bx-log-out-circle'></i> Cancel</a> 
                                </div>
                              </div>
                            </footer>";
                            
                         }elseif($dollar_type == "PM"){
                             
                          echo "<footer style='border: 1px solid #969696;'>
                              <div class='container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3'>
                                <div>
                                  <a href='javascript:void(0)' class='footer-text fw-bolder'>PM Buy Order | Order ID - $order_id | <span style='width:10px;color:#03B0D4'><i class='bx bx-time'></i></span> $time<img src='images/star.gif' style='width:15px;height:15px'></a><br>
                                  <span>$date</span> | <span>Amount - &#8358;$formatted_amount_in_naira | <span style='color:#FF0000'>pending</span></b>
                                </div>
                                <div>
                                  <div class='form-check form-control-sm footer-link me-3'>
                                    <button type='button' class='btn btn-sm btn-outline-danger' disabled>
                                      Unpaid
                                    </button>
                                  </div> 
                                  
                                  <div class='dropdown dropup footer-link me-3'>
                                  <a class='dropdown-item' href='pm-buy?orderid=$order_id&amount=$amount_in_naira'>
                                    <button type='button' class='btn btn-sm btn-outline-info' >
                                      View order
                                    </button>
                                    </a>
                                    <div class='dropdown-menu dropdown-menu-end'> 
                                      <a class='dropdown-item' href='javascript:void(0);'>View order</a>
                                    </div>
                                  </div>
                                  <a href='javascript:void(0)' class='btn btn-sm btn-outline-danger' data-bs-toggle='modal' data-bs-target='#CancelBuyOrderModal'
                                    ><i class='bx bx-log-out-circle'></i> Cancel</a> 
                                </div>
                              </div>
                            </footer>";
                            
                         }elseif($dollar_type == "USDT"){
                                    
                          echo "<footer style='border: 1px solid #969696;'>
                              <div class='container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3'>
                                <div>
                                  <a href='javascript:void(0)' class='footer-text fw-bolder'>USDT Buy Order | Order ID - $order_id | <span style='width:10px;color:#03B0D4'><i class='bx bx-time'></i></span> $time<img src='images/star.gif' style='width:15px;height:15px'></a><br>
                                  <span>$date</span> | <span>Amount - &#8358;$formatted_amount_in_naira | <span style='color:#FF0000'>pending</span></b><br>
                                  <b><span>$wallet_address - $network</span></b>
                                </div>
                                <div>
                                  <div class='form-check form-control-sm footer-link me-3'>
                                    <button type='button' class='btn btn-sm btn-outline-danger' disabled>
                                      Unpaid
                                    </button>
                                  </div> 
                                  
                                  <div class='dropdown dropup footer-link me-3'>
                                  <a class='dropdown-item' href='usdt-buy?orderid=$order_id&amount=$amount_in_naira'>
                                    <button type='button' class='btn btn-sm btn-outline-info' >
                                      View order
                                    </button>
                                    </a>
                                    <div class='dropdown-menu dropdown-menu-end'> 
                                      <a class='dropdown-item' href='javascript:void(0);'>View order</a>
                                    </div>
                                  </div>
                                  <a href='javascript:void(0)' class='btn btn-sm btn-outline-danger' data-bs-toggle='modal' data-bs-target='#CancelBuyOrderModal'
                                    ><i class='bx bx-log-out-circle'></i> Cancel</a> 
                                </div>
                              </div>
                            </footer>";
                            
                                                        
                         }elseif($dollar_type == "Neteller"){
                                    
                          echo "<footer style='border: 1px solid #969696;'>
                              <div class='container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3'>
                                <div>
                                  <a href='javascript:void(0)' class='footer-text fw-bolder'>Neteller Buy Order | Order ID - $order_id | <span style='width:10px;color:#03B0D4'><i class='bx bx-time'></i></span> $time<img src='images/star.gif' style='width:15px;height:15px'></a><br>
                                  <span>$date</span> | <span>Amount - &#8358;$formatted_amount_in_naira | <span style='color:#FF0000'>pending</span></b>
                                </div>
                                <div>
                                  <div class='form-check form-control-sm footer-link me-3'>
                                    <button type='button' class='btn btn-sm btn-outline-danger' disabled>
                                      Unpaid
                                    </button>
                                  </div> 
                                  
                                  <div class='dropdown dropup footer-link me-3'>
                                  <a class='dropdown-item' href='neteller-buy?orderid=$order_id&amount=$amount_in_naira'>
                                    <button type='button' class='btn btn-sm btn-outline-info' >
                                      View order
                                    </button>
                                    </a>
                                    <div class='dropdown-menu dropdown-menu-end'> 
                                      <a class='dropdown-item' href='javascript:void(0);'>View order</a>
                                    </div>
                                  </div>
                                  <a href='javascript:void(0)' class='btn btn-sm btn-outline-danger' data-bs-toggle='modal' data-bs-target='#CancelBuyOrderModal'
                                    ><i class='bx bx-log-out-circle'></i> Cancel</a> 
                                </div>
                              </div>
                            </footer>";
 
                         }
                    
                       } 
                      }
                             
                    ?>
 
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->
                  
                    
                    <!-- Cancel Buy order Modal -->
                      <div class="modal fade" id="CancelBuyOrderModal" data-backdrop="static" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-confirm modal-dialog-centered" role="document">
                    		<div class="modal-content">
                    			<div class="modal-header flex-column">
                    				<div class="icon-box">
                    					<i class="material-icons">&#xE5CD;</i>
                    				</div>						
                    				<h4 class="modal-title w-100">Are you sure?</h4>	
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                    			</div>
                    			<div class="modal-body">
                    				<p>Do you really want to cancel this transaction? This process cannot be undone.</p>
                    			</div>
                    			<?php echo"<form action='cancel-buy-order-validation.php' method='POST'>
                    			<div class='modal-footer justify-content-center'>
                    			    <input type='hidden' name='id' value='$user_id'/>
                    				<button type='submit' name='delete_user' class='btn btn-danger'>Yes cancel</button>
                    			</div>
                    			</form>";
                    			?>
                        
                    		</div>
                    	</div>
                    </div>     
                    <!-- End of cancel Buy order modal -->
                 
                                                                
                                <!-- FETCH ORDER DETAILS FROM TABLE -->
                                <?php
                            			
                                include_once("pdoconfig.php");
                            
                                $email = $_SESSION['email']; 
                                
                                //get user ID from db
                                $sql = "SELECT id FROM users WHERE email = :email LIMIT 1";
                                $query = $con->prepare($sql);
                                $query->execute(array('email' => $email));
                                $row = $query->fetch(PDO::FETCH_ASSOC);
                                
                                $user_id = $row['id'];
                                
                                $order_status = "open";
                    			    
                			    $stmt = $con->prepare("SELECT order_id , amount_in_naira , account_details , payment_status , order_status , dispute_level from buy_order WHERE user_id = :user_id AND order_status = :order_status ORDER BY :user_id DESC");
                                $stmt->bindParam(':user_id', $user_id);
                                $stmt->bindParam(':order_status', $order_status);
                                $stmt->execute();
                                while($row = $stmt->fetch()){
                                   $payment_status = $row['payment_status'];
                                   $order_id = $row['order_id'];
                                   $order_status = $row['order_status'];
                                   $account_details = $row['account_details'];
                                   $dispute_level = $row['dispute_level'];
                                   $amount_in_naira = $row['amount_in_naira'];
                                   //Formatted amount in Naira to be used in email message
                                   $formatted_amount_in_naira = number_format($amount_in_naira, 2);
                                
                                $dispute_level = "1";
                                if ($row['dispute_level']==$dispute_level){
                                // Check if user has mark order as paid and show order mark paid modal

                                // CALL MODAL HERE IF ORDER HAS BEEN PAID FOR
                        		echo '<script type="text/javascript">
                        			$(document).ready(function(){
                        				$("#disputedModal").modal("show");
                        			});
                        		</script>';
                        		
                               }
                                }
                                
                                ?>
                                
                                
                        <!-- Start of disputed order modal -->
                        <div class="modal fade" id="disputedModal" data-backdrop="static" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                         <!-- Modal content-->
                          <div class="modal-content" style="border:none;border-radius: 5px;">
                            <div class="modal-header" style="    background: #d75a4a; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                            </div>
                            <div class="modal-body">
                              <p style="text-align:center;color:#d75a4a;font-size:24px;font-weight:500;">There's a problem with your transaction. <br>Contact us via live chat!</p>
                              <p style="color:#555555;">Transaction ID:&nbsp;<strong style="font-weight:500;font-size:16px;color: #222222;"><?php echo $order_id ?></strong><br>Payment amount:&nbsp;<strong style="font-weight:500;font-size:16px;color: #222222;">&#8358;<?php echo $formatted_amount_in_naira ?></strong></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                          
                          </div>
                        </div>
                      <!-- End of disputed order modal -->

                                
                        <!-- Start of view Deriv Buy order modal -->
                        <div class="modal fade" id="paidModal" data-backdrop="static" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="border:none;border-radius: 5px;">
                        <div class="modal-header" style="background: #1ab394; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" style="opacity:1;color:#fff;font-size:20px"><b>&times;</b></button>
                              <h4 class="modal-title text-center"><img src="images/waiting.png" style="width:50px;pointer-events: none;" alt=""></h4>
                            </div>
                            <div class="modal-body">
                                    <?php
                                    		
                                    include_once("pdoconfig.php");
                                    
                                    // $email = $_SESSION['email'];
                                    
                                    $adminemail = "support@sahmax.com";
                                    
                                    $stmt = $con->prepare("SELECT derivbuy FROM rates WHERE email = :adminemail LIMIT 1");
                                    $stmt->execute(array('adminemail' => $adminemail));
                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                                    {
                                    
                                    $Validate_deriv_buy = $row['derivbuy'];	
                                    $deriv_buy = escape($Validate_deriv_buy);
                                    //Get order USD amount
                                    $unformatted_amount_in_dollar = $amount_in_naira / $deriv_buy;
                                    $amount_in_dollar = number_format($unformatted_amount_in_dollar, 2);
                                    
                                    }
                                ?>
                              <p style="text-align:center;color:#1ab394;font-size:24px;font-weight:500;">You are yet to make payment!</p>
                              <p style="color:#555555;">Transaction ID:&nbsp;<strong style="font-weight:500;font-size:16px;color: #222222;"><?php echo $order_id ?></strong><br>Payment amount:&nbsp;<strong style="font-weight:500;font-size:16px;color: #222222;">&#8358;<?php echo $formatted_amount_in_naira ?></strong><br>The sum of <b><?php echo $amount_in_dollar; ?> USD</b> shall be credited to your Deriv wallet<strong style="font-weight:500;font-size:15px;color: #222222;"> after confirmation.</strong></p>
                            </div>
                            <hr>
                            <div class="modal-footer">
                             <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                          
                        </div>
                        </div>
                      <!-- End of view Deriv buy order modal -->
                      
                                
                        <!-- Start of view Bitcoin Buy order modal -->
                        <div class="modal fade" id="BitcoinViewOderModal" data-backdrop="static" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="border:none;border-radius: 5px;">
                        <div class="modal-header" style="background: #1ab394; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" style="opacity:1;color:#fff;font-size:20px"><b>&times;</b></button>
                              <h4 class="modal-title text-center"><img src="images/waiting.png" style="width:50px;pointer-events: none;" alt=""></h4>
                            </div>
                            <div class="modal-body">
                                    <?php
                                    		
                                    include_once("pdoconfig.php");
                                    
                                    // $email = $_SESSION['email'];
                                    
                                    $adminemail = "support@sahmax.com";
                                    
                                    $stmt = $con->prepare("SELECT btcbuy FROM rates WHERE email = :adminemail LIMIT 1");
                                    $stmt->execute(array('adminemail' => $adminemail));
                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                                    {
                                    
                                    $Validate_btc_buy = $row['btcbuy'];	
                                    $btc_buy = escape($Validate_btc_buy);
                                    //Get order USD amount
                                    $unformatted_amount_in_dollar = $amount_in_naira / $btc_buy;
                                    $amount_in_dollar = number_format($unformatted_amount_in_dollar, 2);
                                    
                                    }
                                ?>
                              <p style="text-align:center;color:#1ab394;font-size:24px;font-weight:500;">You are yet to make payment!</p>
                              <p style="color:#555555;">Transaction ID:&nbsp;<strong style="font-weight:500;font-size:16px;color: #222222;"><?php echo $order_id ?></strong><br>Payment amount:&nbsp;<strong style="font-weight:500;font-size:16px;color: #222222;">&#8358;<?php echo $formatted_amount_in_naira ?></strong><br>The sum of <b><?php echo $amount_in_dollar; ?> USD</b> shall be credited to your Deriv wallet<strong style="font-weight:500;font-size:15px;color: #222222;"> after confirmation.</strong></p>
                            </div>
                            <hr>
                            <div class="modal-footer">
                             <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                          
                        </div>
                        </div>
                      <!-- End of view Bitcoin buy order modal -->
                      
                      
                      
                                <!-- FETCH ORDER DETAILS FROM TABLE -->
                                <?php
                            			
                                include_once("pdoconfig.php");
                            
                                $email = $_SESSION['email']; 
                                
                                //get user ID from db
                                $sql = "SELECT id FROM users WHERE email = :email LIMIT 1";
                                $query = $con->prepare($sql);
                                $query->execute(array('email' => $email));
                                $row = $query->fetch(PDO::FETCH_ASSOC);
                                
                                $user_id = $row['id'];
                                
                                $sell_payment_status = "0";
                    			    
                			    $stmt = $con->prepare("SELECT order_id , amount_in_usd , receipt , payment_status , order_status , dollar_type , time , date from sell_order WHERE user_id = :user_id AND payment_status = :payment_status ORDER BY :user_id DESC");
                                $stmt->bindParam(':user_id', $user_id);
                                $stmt->bindParam(':payment_status', $sell_payment_status);
                                $stmt->execute();
                                while($row = $stmt->fetch()){
                                   $sell_payment_status = $row['payment_status'];
                                   $sell_order_id = $row['order_id'];
                                   $sell_order_status = $row['order_status'];
                                   $sell_dollar_type = $row['dollar_type'];
                                   $amount_in_usd = $row['amount_in_usd'];
                                   $sell_receipt = $row['receipt'];
                                   //Formatted amount in Naira to be used in email message
                                   $formatted_amount_in_usd = number_format($amount_in_usd, 2);
                                   
                                    $unformatted_date =  $row['date'];
                                    $datestamp = strtotime($unformatted_date);
                                    $date = date('d F Y', $datestamp);
                                    
                                    $unformatted_time =  $row['time'];
                                    $timestamp = strtotime($unformatted_time);
                                    $time = date('h:i A', $timestamp);
                                }
                                
                          
                          // Check if user has mark order as paid and show order marked paid modal
                        
                          if ($sell_dollar_type=="Deriv"){
                              
                          echo "<footer style='border: 1px solid #969696;'>
                              <div class='container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3'>
                                <div>
                                  <a href='javascript:void(0)' class='footer-text fw-bolder'>Deriv Sell Order | Order ID - $sell_order_id | <span style='width:10px;color:#03B0D4'><i class='bx bx-time'></i></span> $time<img src='images/star.gif' style='width:15px;height:15px'></a><br>
                                  <span>$date</span> | <span>Amount - &dollar;$formatted_amount_in_usd | <span style='color:#FF0000'>pending</span></b>
                                </div>
                                <div>
                                  <div class='form-check form-control-sm footer-link me-3'>
                                    <button type='button' class='btn btn-sm btn-outline-danger' disabled>
                                      Unpaid
                                    </button>
                                  </div> 
                                  
                                  
                                  <div class='dropdown dropup footer-link me-3'>
                                  <a class='dropdown-item' href='deriv-sell?orderid=$sell_order_id&amount=$amount_in_usd'>
                                    <button type='button' class='btn btn-sm btn-outline-info' >
                                      View order
                                    </button>
                                    </a>
                                  </div>
                                  <a href='javascript:void(0)' class='btn btn-sm btn-outline-danger' data-bs-toggle='modal' data-bs-target='#CancelSellOrderModal'
                                    ><i class='bx bx-log-out-circle'></i> Cancel</a>
                                </div>
                              </div>
                            </footer>";
                            
                          }elseif($sell_dollar_type=="Bitcoin"){
                         
                            echo "<footer style='border: 1px solid #969696;'>
                              <div class='container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3'>
                                <div>
                                  <a href='javascript:void(0)' class='footer-text fw-bolder'>Bitcoin Sell Order | Order ID - $sell_order_id | <span style='width:10px;color:#03B0D4'><i class='bx bx-time'></i></span> $time<img src='images/star.gif' style='width:15px;height:15px'></a><br>
                                  <span>$date</span> | <span>Amount - &dollar;$formatted_amount_in_usd | <span style='color:#FF0000'>pending</span></b>
                                </div>
                                <div>
                                  <div class='form-check form-control-sm footer-link me-3'>
                                    <button type='button' class='btn btn-sm btn-outline-danger' disabled>
                                      Unpaid
                                    </button>
                                  </div> 
                                  <div class='dropdown dropup footer-link me-3'>
                                  <a class='dropdown-item' href='bitcoin-sell?orderid=$sell_order_id&amount=$amount_in_usd'>
                                    <button type='button' class='btn btn-sm btn-outline-info' >
                                      View order
                                    </button>
                                    </a>
                                  </div>
                                  <a href='javascript:void(0)' class='btn btn-sm btn-outline-danger' data-bs-toggle='modal' data-bs-target='#CancelSellOrderModal'
                                    ><i class='bx bx-log-out-circle'></i> Cancel</a>
                                </div>
                              </div>
                            </footer>";
                                                  
                          }elseif($sell_dollar_type=="USDT"){
                         
                            echo "<footer style='border: 1px solid #969696;'>
                              <div class='container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3'>
                                <div>
                                  <a href='javascript:void(0)' class='footer-text fw-bolder'>USDT Sell Order | Order ID - $sell_order_id | <span style='width:10px;color:#03B0D4'><i class='bx bx-time'></i></span> $time<img src='images/star.gif' style='width:15px;height:15px'></a><br>
                                  <span>$date</span> | <span>Amount - &dollar;$formatted_amount_in_usd | <span style='color:#FF0000'>pending</span></b>
                                </div>
                                <div>
                                  <div class='form-check form-control-sm footer-link me-3'>
                                    <button type='button' class='btn btn-sm btn-outline-danger' disabled>
                                      Unpaid
                                    </button>
                                  </div>      
                                  <div class='dropdown dropup footer-link me-3'>
                                  <a class='dropdown-item' href='usdt-sell?orderid=$sell_order_id&amount=$amount_in_usd'>
                                    <button type='button' class='btn btn-sm btn-outline-info' >
                                      View order
                                    </button>
                                    </a>
                                  </div>
                                  <a href='javascript:void(0)' class='btn btn-sm btn-outline-danger' data-bs-toggle='modal' data-bs-target='#CancelSellOrderModal'
                                    ><i class='bx bx-log-out-circle'></i> Cancel</a>
                                </div>
                              </div>
                            </footer>";
                                                  
                          }elseif($sell_dollar_type=="PM"){
                         
                            echo "<footer style='border: 1px solid #969696;'>
                              <div class='container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3'>
                                <div>
                                  <a href='javascript:void(0)' class='footer-text fw-bolder'>PM Sell Order | Order ID - $sell_order_id | <span style='width:10px;color:#03B0D4'><i class='bx bx-time'></i></span> $time<img src='images/star.gif' style='width:15px;height:15px'></a><br>
                                  <span>$date</span> | <span>Amount - &dollar;$formatted_amount_in_usd | <span style='color:#FF0000'>pending</span></b>
                                </div>
                                <div>
                                  <div class='form-check form-control-sm footer-link me-3'>
                                    <button type='button' class='btn btn-sm btn-outline-danger' disabled>
                                      Unpaid
                                    </button>
                                  </div> 
                                  
                                  <div class='dropdown dropup footer-link me-3'>
                                  <a class='dropdown-item' href='pm-sell?orderid=$sell_order_id&amount=$amount_in_usd'>
                                    <button type='button' class='btn btn-sm btn-outline-info' >
                                      View order
                                    </button>
                                    </a>
                                  </div>
                                  <a href='javascript:void(0)' class='btn btn-sm btn-outline-danger' data-bs-toggle='modal' data-bs-target='#CancelSellOrderModal'
                                    ><i class='bx bx-log-out-circle'></i> Cancel</a>
                                </div>
                              </div>
                            </footer>";
                            
                          }elseif($sell_dollar_type=="Neteller"){
                         
                            echo "<footer style='border: 1px solid #969696;'>
                              <div class='container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3'>
                                <div>
                                  <a href='javascript:void(0)' class='footer-text fw-bolder'>Neteller Sell Order | Order ID - $sell_order_id | <span style='width:10px;color:#03B0D4'><i class='bx bx-time'></i></span> $time<img src='images/star.gif' style='width:15px;height:15px'></a><br>
                                  <span>$date</span> | <span>Amount - &dollar;$formatted_amount_in_usd | <span style='color:#FF0000'>pending</span></b>
                                </div>
                                <div>
                                  <div class='form-check form-control-sm footer-link me-3'>
                                    <button type='button' class='btn btn-sm btn-outline-danger' disabled>
                                      Unpaid
                                    </button>
                                  </div> 
                                  <div class='dropdown dropup footer-link me-3'>
                                  <a class='dropdown-item' href='neteller-sell?orderid=$sell_order_id&amount=$amount_in_usd'>
                                    <button type='button' class='btn btn-sm btn-outline-info' >
                                      View order
                                    </button>
                                    </a>
                                  </div>
                                  <a href='javascript:void(0)' class='btn btn-sm btn-outline-danger' data-bs-toggle='modal' data-bs-target='#CancelSellOrderModal'
                                    ><i class='bx bx-log-out-circle'></i> Cancel</a>
                                </div>
                              </div>
                            </footer>";

                            }
                                
                            ?>
                    
                    
                    <!-- Start of Cancel sell order Modal -->
                      <div class="modal fade" id="CancelSellOrderModal" data-backdrop="static" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-confirm modal-dialog-centered" role="document">
                    		<div class="modal-content">
                    			<div class="modal-header flex-column">
                    				<div class="icon-box">
                    					<i class="material-icons">&#xE5CD;</i>
                    				</div>						
                    				<h4 class="modal-title w-100">Are you sure?</h4>	
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                    			</div>
                    			<div class="modal-body">
                    				<p>Do you really want to cancel this transaction? This process cannot be undone.</p>
                    			</div>
                    			<?php echo"<form action='cancel-sell-order-validation.php' method='POST'>
                    			<div class='modal-footer justify-content-center'>
                    			    <input type='hidden' name='id' value='$user_id'/>
                    				<button type='submit' name='delete_user' class='btn btn-danger'>Yes cancel</button>
                    			</div>
                    			</form>";
                    			?>
                        
                    		</div>
                    	</div>
                    </div>     
                    <!-- End of cancel sell order modal -->

                                                                
                                <!-- FETCH ORDER DETAILS FROM TABLE -->
                                <?php
                            			
                                include_once("pdoconfig.php");
                            
                                $email = $_SESSION['email']; 
                                
                                //get user ID from db
                                $sql = "SELECT id FROM users WHERE email = :email LIMIT 1";
                                $query = $con->prepare($sql);
                                $query->execute(array('email' => $email));
                                $row = $query->fetch(PDO::FETCH_ASSOC);
                                
                                $user_id = $row['id'];
                                
                                $sell_order_status = "open";
                    			    
                			    $stmt = $con->prepare("SELECT order_id , amount_in_usd , payment_status , order_status , dispute_level from sell_order WHERE user_id = :user_id AND order_status = :order_status ORDER BY :user_id DESC");
                                $stmt->bindParam(':user_id', $user_id);
                                $stmt->bindParam(':order_status', $sell_order_status);
                                $stmt->execute();
                                while($row = $stmt->fetch()){
                                   $sell_payment_status = $row['payment_status'];
                                   $sell_order_id = $row['order_id'];
                                   $sell_order_status = $row['order_status'];
                                   $dispute_level = $row['dispute_level'];
                                   $amount_in_usd = $row['amount_in_usd'];
                                   //Formatted amount in Naira to be used in email message
                                   $formatted_amount_in_usd = number_format($amount_in_usd, 2);
                                
                                $dispute_level = "1";
                                if ($row['dispute_level']==$dispute_level){
                                // Check if user has mark order as paid and show order mark paid modal

                                // CALL MODAL HERE IF ORDER HAS BEEN PAID FOR
                        		echo '<script type="text/javascript">
                        			$(document).ready(function(){
                        				$("#selldisputedModal").modal("show");
                        			});
                        		</script>';
                        		
                               }
                                }
                                
                                ?>
                                
                                
                        <!-- Start of disputed order modal -->
                          <div class="modal fade" id="selldisputedModal" data-backdrop="static" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                             <!-- Modal content-->
                            <div class="modal-content" style="border:none;border-radius: 5px;">
                            <div class="modal-header" style="background: #d75a4a; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                            </div>
                            <div class="modal-body">
                              <p style="text-align:center;color:#d75a4a;font-size:24px;font-weight:500;">There's a problem with your Deriv withdrawal. <br>Contact us via live chat!</p> 
                              <p style="color:#555555;">Transaction ID:&nbsp;<strong style="font-weight:500;font-size:16px;color: #222222;"><?php echo $sell_order_id ?></strong><br>Withdrawn amount:&nbsp;<strong style="font-weight:500;font-size:16px;color: #222222;">&dollar;<?php echo $formatted_amount_in_usd ?></strong></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                         </div>
                        </div>
                       <!-- End of disputed order modal -->

                                
                        <!-- Start of view order modal -->
                        <div class="modal fade" id="sellPaidModal" data-backdrop="static" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="border:none;border-radius: 5px;">
                        <div class="modal-header" style="background: #1ab394; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" style="opacity:1;color:#fff;font-size:20px"><b>&times;</b></button>
                              <h4 class="modal-title text-center"><img src="images/waiting.png" style="width:50px;pointer-events: none;" alt=""></h4>
                            </div>
                            <div class="modal-body">
                                    <?php
                                    		
                                    include_once("pdoconfig.php");
                                    
                                    // $email = $_SESSION['email'];
                                    
                                    $adminemail = "support@sahmax.com";
                                    
                                    $stmt = $con->prepare("SELECT derivsell FROM rates WHERE email = :adminemail LIMIT 1");
                                    $stmt->execute(array('adminemail' => $adminemail));
                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                                    {
                                    
                                    $Validate_deriv_sell = $row['derivsell'];	
                                    $deriv_sell = escape($Validate_deriv_sell);
                                    //Get order Naira amount
                                    $unformatted_amount_in_naira = $amount_in_usd * $deriv_sell;
                                    $amount_in_naira = number_format($unformatted_amount_in_naira, 2);
                                    
                                    }
                                ?>
                              <p style="text-align:center;color:#1ab394;font-size:24px;font-weight:500;">You have marked order as paid! <br> Please hold, we're on it.</p>
                              <p style="color:#555555;">Transaction ID:&nbsp;<strong style="font-weight:500;font-size:16px;color: #222222;"><?php echo $sell_order_id ?></strong><br>Payment amount:&nbsp;<strong style="font-weight:500;font-size:16px;color: #222222;">&#8358;<?php echo $amount_in_naira ?></strong><br>The sum of <b><?php echo $amount_in_naira ?> Naira</b> will be paid into your bank account<strong style="font-weight:500;font-size:15px;color: #222222;"> after confirmation.</strong></p>
                            </div>
                            <hr>
                            <div class="modal-footer">
                             <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                          
                        </div>
                        </div>
                      <!-- End of view sell order modal -->
                      

            <div class="container-xxl flex-grow-1 container-p-y">
    
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">

                          <?php
                          // Check if user has data in SSN column
                          $date_of_birth = "";
                          $sql = $con->prepare("SELECT date_of_birth FROM users WHERE email = :email LIMIT 1");
                          $sql->execute(array('email' => $email));
                          if($sql->rowCount() > 0){
                          $row = $sql->fetch(PDO::FETCH_ASSOC);
                          if ($row['date_of_birth']==$date_of_birth){
                            echo "<h5 class='card-title text-primary'>Congratulations 
                            <span class='' style='text-transform:capitalize'> $firstname</span>! &#x1F389;</h5>
                            <p class='mb-4'>
                            You are few steps away from completing your profile.
                            <span class='fw-bold'>40%</span> completed. Click on 'Fill your info'
                            below.</p>
                            <a href='registration-form' class='btn btn-sm btn-outline-primary'>Fill your info</a>";
                          } else {
                            echo "<h5 class='card-title text-primary'>
                            <a href='javascript:void;' class='menu-link'>
                            <i class='menu-icon tf-icons bx bx-credit-card'></i>
                            <div data-i18n='Basic'>What deal do you have?</div>
                            </a></h5>
                            <p class='mb-4'>A leading exchange platform.
                            We are a committed company, dedicated to meet and understand the needs of our customers.
                            <a href='javascript:void;'><button class='btn btn-sm btn-outline-primary' style='text-transform:capitalize'>$firstname $middlename $surname</button></a></p>";
                            
                          }
                        }
                        
                        ?>       

                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                      </div>
                    </div>
                  </div>
                </div>

          </div>
        </div>
        </div>
        <!-- end of rates section -->
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

        
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
      
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
    
    <!-- Deriv Jquery rate calculator script -->
    <script>
    $('#AmountInNaira, #price').on('input',function() {
        var AmountInNaira = parseInt($('#AmountInNaira').val());
        var price = parseFloat($('#price').val());
        $('#AmountInUSD').val((price / AmountInNaira ? AmountInNaira / price : 0).toFixed(2));
    });
    </script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script> 

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    
    <!-- Bootstrap JS files -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
  </body>
</html>
