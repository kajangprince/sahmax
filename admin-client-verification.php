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
    <title>Account verification</title>

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
              
            <li class="menu-item active">
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
        
        <?php
				
        include_once("pdoconfig.php");

        if(isset($_GET['uid'])){
            $uid = $_GET['uid'];
        }

        $stmt = $con->prepare("SELECT * FROM users WHERE id = :uid LIMIT 1");
        $stmt->execute(array('uid' => $uid));
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

        $email_status = escape($row['is_verified']);

        $verification_status = escape($row['verification_status']);
        
        $verification_image = escape($row['verification_image']);
        
        $profile_pic = escape($row['profile_img']);
            
        $time =  $row['created_at'];
        $timestamp = strtotime($time);
        $formatted_time = date('d F Y', $timestamp);
                    
        }

        ?>
        
        <?php
				
        include_once("pdoconfig.php");

        $stmt = $con->prepare("SELECT id_card,id_card_back,photo_with_id,document_type,requested_at FROM verification_request WHERE user_id = :uid LIMIT 1");
        $stmt->execute(array('uid' => $uid));
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
        $Validate_id_card = $row['id_card'];
        $id_card = escape($Validate_id_card);
        
        $Validate_id_card_back = $row['id_card_back'];
        $id_card_back = escape($Validate_id_card_back);

        $Validate_photo_with_id = $row['photo_with_id'];
        $photo_with_id = escape($Validate_photo_with_id);

        $Validate_document_type = $row['document_type'];	
        $document_type = escape($Validate_document_type);
        
        $date =  $row['requested_at'];
        $timestamp = strtotime($date);
        $formatted_requested_at_date = date('d F Y', $timestamp);
        
        $time =  $row['requested_at'];
        $timestamp = strtotime($time);
        $formatted_requested_at_time = date('H:i:s', $timestamp);
                    
        }

        ?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Update /</span> Client</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link" href="javascript:void(0);"><i class="bx bx-cog me-1"></i> Account</a>
                    </li>
                    <li class="nav-item">
                      <?php echo"<a class='nav-link active' href='admin-client-verification?uid=$uid'><i class='bx bx-user'></i>Client Verification</a>"; ?>
                    </li>
                    <li class="nav-item">
                      <?php echo"<a class='nav-link' href='admin-message-user?uid=$uid'><i class='bx bx-message'></i>Message User</a>"; ?>
                    </li>
                  </ul>
                  
                 <div class="card mb-4">
                   <h5 class="card-header">
                   <?php 
                   if($verification_status=="0"){ 
                       echo"Unverified account &#x1F61E;"; 
                    }else{ 
                       echo"Verified account <img src='images/verification-badge.png' style='width:11px;pointer-events:none'></span>"; 
                    } 
                    ?></h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="<?php echo "$profile_pic" ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar"
                        />
                        <div class="button-wrapper">
                            
                        <!-- Failed to update password error message -->
                        <?php if(isset($passtooshortmessage)){ echo $passtooshortmessage; }else{ echo "";} ?>
                        
                        <?php
                        
                        include_once("pdoconfig.php");
                        
                        if(isset($_GET['uid'])){
                            $uid = $_GET['uid'];
                        }
                        
                        ?>


                          <label class="btn btn-primary me-2 mb-4" tabindex="0">
                              
                                <?php 
                                if($verification_image==""){ 
                                   echo"This user is yet to submit verification document";
                                }elseif($verification_image=="removed"){
                                   echo"User verification documents removed by admin"; 
                                }else{
                                   echo"Verification document found";
                                }
                                ?>
                                
                          </label>

                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                  <div class="card mb-4">
             
            <!-- Start of verify user script -->          
            <?php 

                include_once("pdoconfig.php");
                
                if(isset($_GET['uid'])){
                    $uid = $_GET['uid'];
                }
                
                if(isset($_POST['submit'])){
                    
                    $verification_status = "1";
                    $verification_stage = "5";

                    $verifyquery1 = "UPDATE users SET verification_status = :verification_status WHERE id = :uid LIMIT 1";		
                  
                    $stmt = $con->prepare($verifyquery1);
                    $stmt->bindParam(":verification_status",$verification_status);				
                    $stmt->bindParam(":uid",$uid);			
                    $stmt->execute();
                    
                    $verifyquery2 = "UPDATE verification_request SET verification_status = :verification_status WHERE user_id = :uid LIMIT 1";	
                  
                    $stmt = $con->prepare($verifyquery2);
                    $stmt->bindParam(":verification_status",$verification_status);				
                    $stmt->bindParam(":uid",$uid);			
                    $stmt->execute();
                    
                    $verifyquery3 = "UPDATE verification_request SET verification_stage = :verification_stage WHERE user_id = :uid LIMIT 1";	
                  
                    $stmt = $con->prepare($verifyquery3);				
                    $stmt->bindParam(":verification_stage",$verification_stage);				
                    $stmt->bindParam(":uid",$uid);			
                    $stmt->execute();
                
                //Send email notification to user if verification successful		
                $message = "<html><body className='snippet-body' style='background-color: #F8F9FD; margin: 0 !important; padding: 0 !important;'> ";
                $message = "<table border='0' cellpadding='0' cellspacing='0' width='100%'> 
                  <tr> <td bgcolor='#F8F9FD' align='center'> 
                  <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> 
                  <tr> <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td> </tr> 
                  </table> </td> </tr> <tr> <td bgcolor='#F8F9FD' align='center' style='padding: 0px 10px 0px 10px;'> 
                  <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> 
                  <tr> <td bgcolor='#F8F9FD' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #ffffff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;'> 
                  <h1 style='font-size: 48px; font-weight: 400; margin: 2;'>Account Verified!</h1> 
                  <img src='https://www.sahmax.com/images/android-chrome-512x512.png' width='125' height='120' style='display: block; border: 0px; margin : 30px 20px 20px 20px' /> 
                  </td> </tr> </table> </td> </tr> <tr> 
                  <td bgcolor='#F8F9FD' align='center' style='padding: 0px 10px 0px 10px;'> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> 
                  <tr> <td bgcolor='#F8F9FD' align='left' style='padding: 20px 30px 40px 30px; color: #ffffff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'> 
                  <p style='margin: 0;'>Hi there, your Sahmax Optimum account has been verified.</p> </td> </tr> 
                  <tr> <td bgcolor='#F8F9FD' align='left'> <table width='100%' border='0' cellspacing='0' cellpadding='0'> <tr> 
                  <td bgcolor='#F8F9FD' align='center' style='padding: 20px 30px 60px 30px;'> 
                  <table border='0' cellspacing='0' cellpadding='0'> 
                  <tr> <td bgcolor='#F8F9FD' align='left' style='padding: 0px 30px 20px 30px; color: #ffffff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'> 
                  <p style='margin: 0;'>This is an auto-generated email. Please <b>do not</b> reply to this email.</p> </td> </tr> 
                  <tr> <td bgcolor='#F8F9FD' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #ffffff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'> 
                  <p style='margin: 0;'>Cheers,<br>Sahmax Optimum Support</p> </td> </tr> </table> </td> </tr> 
                  <tr> <td bgcolor='#F8F9FD' align='center' style='padding: 30px 10px 0px 10px;'> 
                  <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> ";
                $message .= '</body></html>';
    			$ehead = "MIME-Version: 1.0" . "\r\n";
    			$ehead.= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    			$ehead.= "From: Sahmax Optimum <support@sahmax.com>\r\n".
    					 "Reply-To: noreply@sahmax.com\r\n" .
    					 "X-Mailer: PHP/" . phpversion();
    			 
    			$email = $email;
    			$subj = "Verification Successful";
    			$mailsend=mail("$email","$subj","$message","$ehead");
    	        
    	        if ($mailsend) {
    	            
                    echo"<div class='alert alert-success'>Account Verified</div>";
                    $con = null;
                        
                } else {
                    
                    echo"<div class='alert alert-danger'>Failed to verify account</div>";
                    $con = null;
                
              }
              }
            
            ?>
            <!-- End of verify user script -->
            
             
            <!-- Start of reject user verification script -->          
            <?php 

                include_once("pdoconfig.php");
                
                if(isset($_GET['uid'])){
                    $uid = $_GET['uid'];
                }
                
                if(isset($_POST['rejectsubmit'])){
                    
                    $verification_stage = "0";
                    
                    $verification_status = "rejected";
                    
                    $verification_image = "removed";
                    
                    $id_card = null;

                    $rejectverificationquery = "UPDATE users SET verification_status = :verification_status WHERE id = :uid LIMIT 1";		
                  
                    $stmt = $con->prepare($rejectverificationquery);
                    $stmt->bindParam(":verification_status",$verification_status);				
                    $stmt->bindParam(":uid",$uid);			
                    $stmt->execute();
                    
                    $rejectverificationquery1 = "UPDATE users SET verification_image = :verification_image WHERE id = :uid LIMIT 1";		
                  
                    $stmt = $con->prepare($rejectverificationquery1);
                    $stmt->bindParam(":verification_image",$verification_image);				
                    $stmt->bindParam(":uid",$uid);			
                    $stmt->execute();

                    $rejectverificationquery2 = "UPDATE verification_request SET verification_stage = :verification_stage WHERE user_id = :uid LIMIT 1";	
                  
                    $stmt = $con->prepare($rejectverificationquery2);				
                    $stmt->bindParam(":verification_stage",$verification_stage);				
                    $stmt->bindParam(":uid",$uid);			
                    $stmt->execute();

                    $rejectverificationquery3 = "UPDATE verification_request SET id_card = :id_card WHERE user_id = :uid LIMIT 1";	
                  
                    $stmt = $con->prepare($rejectverificationquery3);				
                    $stmt->bindParam(":id_card",$id_card);				
                    $stmt->bindParam(":uid",$uid);			
                    $stmt->execute();
                
                //Send email notification to user if verification successful		
                $message = "<html><body className='snippet-body' style='background-color: #F8F9FD; margin: 0 !important; padding: 0 !important;'> ";
                $message = "<table border='0' cellpadding='0' cellspacing='0' width='100%'> 
                  <tr> <td bgcolor='#F8F9FD' align='center'> 
                  <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> 
                  <tr> <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td> </tr> 
                  </table> </td> </tr> <tr> <td bgcolor='#F8F9FD' align='center' style='padding: 0px 10px 0px 10px;'> 
                  <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> 
                  <tr> <td bgcolor='#F8F9FD' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #ffffff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;'> 
                  <h1 style='font-size: 48px; font-weight: 400; margin: 2;'>Verification Failed!</h1> 
                  <img src='https://www.sahmax.com/images/android-chrome-512x512.png' width='125' height='120' style='display: block; border: 0px; margin : 30px 20px 20px 20px' /> 
                  </td> </tr> </table> </td> </tr> <tr> 
                  <td bgcolor='#F8F9FD' align='center' style='padding: 0px 10px 0px 10px;'> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> 
                  <tr> <td bgcolor='#F8F9FD' align='left' style='padding: 20px 30px 40px 30px; color: #ffffff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'> 
                  <p style='margin: 0;'>Verification documents rejected! Kindly login to resubmit your documents.</p> </td> </tr> 
                  <tr> <td bgcolor='#F8F9FD' align='left'> <table width='100%' border='0' cellspacing='0' cellpadding='0'> <tr> 
                  <td bgcolor='#F8F9FD' align='center' style='padding: 20px 30px 60px 30px;'> 
                  <table border='0' cellspacing='0' cellpadding='0'> 
                  <tr> <td bgcolor='#F8F9FD' align='left' style='padding: 0px 30px 20px 30px; color: #ffffff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 400; line-height: 25px;'> 
                  <p style='margin: 0;'>This is an auto-generated email. Please <b>do not</b> reply to this email.</p> </td> </tr> 
                  <tr> <td bgcolor='#F8F9FD' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #ffffff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'> 
                  <p style='margin: 0;'>Cheers,<br>Sahmax Optimum Support</p> </td> </tr> </table> </td> </tr> 
                  <tr> <td bgcolor='#F8F9FD' align='center' style='padding: 30px 10px 0px 10px;'> 
                  <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> ";
                $message .= '</body></html>';
    			$ehead = "MIME-Version: 1.0" . "\r\n";
    			$ehead.= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    			$ehead.= "From: Sahmax Optimum <support@sahmax.com>\r\n".
    					 "Reply-To: noreply@sahmax.com\r\n" .
    					 "X-Mailer: PHP/" . phpversion();
    			 
    			$email = $email;
    			$subj = "Verification Failed";
    			$mailsend=mail("$email","$subj","$message","$ehead");
    	        
    	        if ($mailsend) {
    	            
                    echo"<div class='alert alert-success'>Verification Rejected. Mail has been sent to user</div>";
                    $con = null;
                        
                } else {
                    
                    echo"<div class='alert alert-danger'>Failed to reject verification Documents</div>";
                    $con = null;
                
              }
              }
            
            ?>
            <!-- End of reject user verification script -->
                        
                    <h5 class="card-header">User verification section</h5>
                    
                    <!-- Account -->
                    <div class="card-body">
                        <center>
                      <div class="d-flex align-items-start align-items-sm-center gap-4">

                        <div class="button-wrapper">
                            <hr>
                            <?php 
                            if($verification_image==""){
                                echo"User has not submitted verification document yet"; 
                            }elseif($verification_image=="removed"){
                                echo"Verification document removed by you (admin)"; 
                            }else{
                                echo"<span class='text-muted mb-0'>Document Front</span><img src='$id_card' alt='user verification document - document front' class='d-block rounded' height='100' width='100' id='uploadedAvatar' /><hr>";
                            }
                            ?>
                          
                            <?php 
                            if($verification_image==""){
                                echo""; 
                            }elseif($verification_image=="removed"){
                                echo""; 
                            }else{
                                echo"<span class='text-muted mb-0'>Document Back</span><img src='$id_card_back' alt='user verification document - document back' class='d-block rounded' height='100' width='100' id='uploadedAvatar' /><hr>";
                            }
                            ?>
                            
                            <?php 
                            if($verification_image==""){
                               echo""; 
                            }elseif($verification_image=="removed"){
                                echo""; 
                            }else{
                               echo"<span class='text-muted mb-0'>Selfie with Document</span><img src='$photo_with_id' alt='user verification document - Selfie with Document' class='d-block rounded' height='100' width='100' id='uploadedAvatar' />";
                            }
                            ?>
                            <hr>
                            <p class="text-muted mb-0" style="font-size:13px; text-transform:capitalize">
                            <?php echo "$firstname" ?> <?php echo "$middlename" ?> <?php echo "$surname" ?>
                            </p>
                                  
                            <p class="text-muted mb-0" style="font-size:13px"><?php if(!$id_card==""){
                            echo "Document type: $document_type<br>
                            Document submitted date: $formatted_requested_at_date <br>
                            Document submitted time: $formatted_requested_at_time"; } ?></p>

                            <p class="text-muted mb-0" style="font-size:13px; text-transform:capitalize">
                                
                              <?php 
                              
                              if($verification_status == "1"){
                                  
                                  echo"Verified account <img src='images/verification-badge.png' style='width:11px;pointer-events:none'></span>"; 
                                  
                              }elseif($verification_status=="rejected"){
                                  
                                echo"";   
                                
                              }else{
                                  
                                  echo"<label class='btn btn-primary btn-sm me-2 mb-4' tabindex='0' data-bs-toggle='modal' data-bs-target='#verificationmodal'>Verify user</label>";
                                  echo"<label class='btn btn-danger btn-sm me-2 mb-4' tabindex='0' data-bs-toggle='modal' data-bs-target='#verificationrejectmodal'>Reject user</label>"; 
                                  
                              }
                              
                              ?>
                              
                        </p>

                        </div>
                      </div>
                    </div>
                    
                    <!-- Cancel order Modal -->
                      <div class="modal fade" id="verificationrejectmodal" data-backdrop="static" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-confirm modal-dialog-centered" role="document">
                    		<div class="modal-content">
                    			<div class="modal-header flex-column">					
                    				<h4 class="modal-title w-100 text-center">Are you sure?</h4>	
                    			</div>
                    			<div class="modal-body">
                    				<p>Do you really want to reject user verification?</p>
                    			</div>
                    			<?php echo"<form action='' method='POST'>
                    			<div class='modal-footer justify-content-center'>
                    			    <input type='hidden' name='id' value='$uid'/>
                    				<button type='submit' name='rejectsubmit' class='btn btn-danger'>Yes reject</button>
                    			</div>
                    			</form>";
                    			?>
                        
                    		</div>
                    	</div>
                    </div>     
                    <!-- End of cancel order modal -->
                    
                    <!-- Cancel order Modal -->
                      <div class="modal fade" id="verificationmodal" data-backdrop="static" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-confirm modal-dialog-centered" role="document">
                    		<div class="modal-content">
                    			<div class="modal-header flex-column">					
                    				<h4 class="modal-title w-100 text-center">Are you sure?</h4>	
                    			</div>
                    			<div class="modal-body">
                    				<p>Do you really want to verify this user?</p>
                    			</div>
                    			<?php echo"<form action='' method='POST'>
                    			<div class='modal-footer justify-content-center'>
                    			    <input type='hidden' name='id' value='$uid'/>
                    				<button type='submit' name='submit' class='btn btn-primary'>Yes verify</button>
                    			</div>
                    			</form>";
                    			?>
                        
                    		</div>
                    	</div>
                    </div>     
                    <!-- End of cancel order modal -->
                    
                   <hr class="my-0" />
                                  
                </div>
              </div>
              </center>
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