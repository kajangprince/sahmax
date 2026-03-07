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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Deriv Withdraw</title>

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
    
    <!-- Modal pop up on page load -->
    <script>
    $(document).ready(function(){
        $("#modalToggle").modal('show');
    });

   </script>

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
            <li class="menu-item active">
              <a href="userdashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>


            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Account Verification</span>
            </li>
            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
               <i class="bx bx-user me-2"></i>
                <div data-i18n="Layouts">My profile</div>
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
                                $firstname $surname <img src='images/verification-badge.png' style='width:11px;'></span>";
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

            <div class="container-xxl flex-grow-1 container-p-y">
                
        <?php
				
        include_once("pdoconfig.php");

        // $email = $_SESSION['email'];

        $email = "support@sahmax.com";

        $stmt = $con->prepare("SELECT * FROM rates WHERE email = :email LIMIT 1");
        $stmt->execute(array('email' => $email));
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
        $Validate_id = $row['id'];
        $id = escape($Validate_id);

        $Validate_deriv_sell = $row['derivsell'];	
        $deriv_sell = escape($Validate_deriv_sell);

        $time =  $row['updated_at'];
        $timestamp = strtotime($time);
        $formatted_time = date('d F Y', $timestamp);
        
        }        

        ?>
        
                        <!-- Deriv Sell Funds Modal -->
                        <div
                          class="modal fade" data-bs-backdrop="static"
                          id="modalToggle"
                          aria-labelledby="modalToggleLabel"
                          tabindex="-1"
                          style="display: none"
                          aria-hidden="true"
                        >
                          <div class="modal-dialog modal-fullscreen" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalToggleLabel"><img src="images/deriv-logo.png" alt="Deriv Logo" style="width:20px">DERIV WITHDRAW</h5>
                                <!--<button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button-->
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                <span class="alert alert-info">Rate = &#x20A6;<?php echo $deriv_sell; ?>/&#36;
                                <!-- Hidden Deriv Rate To be Used In Jquery Rate Calculation -->
                                <input type="text" name="price" id="price" <?php echo "value='$deriv_sell'"; ?> hidden/>
                                <br>Limit Min. 5 USD = &#x20A6;<?php $deriv_min_quantity = "5"; 
                                $total_deriv_min_amount = $deriv_sell * $deriv_min_quantity;
                                /* Format Amount to decimal place */
                                $formatted_total_deriv_min_amount = number_format($total_deriv_min_amount); echo"$formatted_total_deriv_min_amount"; ?> </span>
                                
                               <?php 
                               
                               if(isset($_GET['orderid']))                     
                               
                               // CALL MODAL HERE IF ORDER_PLACED
                        		echo '<script type="text/javascript">
                        			$(document).ready(function(){
                        				$("#myModal").modal("show");
                        			});
                        		</script>';
                                
                                ?>
                                
                                
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
                    			    
                			    $stmt = $con->prepare("SELECT order_id , amount_in_usd , payment_status , order_status , dollar_type , receipt, dispute_level from sell_order WHERE user_id = :user_id AND order_status = :order_status ORDER BY :user_id DESC");
                                $stmt->bindParam(':user_id', $user_id);
                                $stmt->bindParam(':order_status', $order_status);
                                $stmt->execute();
                                while($row = $stmt->fetch()){
                                   $payment_status = $row['payment_status'];
                                   $order_id = $row['order_id'];
                                   $order_status = $row['order_status'];
                                   $receipt = $row['receipt'];
                                   $dollar_type = $row['dollar_type'];
                                   $dispute_level = $row['dispute_level'];
                                   $amount_in_usd = $row['amount_in_usd'];
                                   //Formatted amount in Dollar to be used in email message
                                   $formatted_amount_in_usd = number_format($amount_in_usd, 2);
                                   
                                    //Get order Naira amount
                                    $unformatted_amount_in_naira = $amount_in_usd * $deriv_sell;
                                    $amount_in_naira = number_format($unformatted_amount_in_naira, 2);
                                
                                if ($payment_status=="1" AND $dollar_type=="Deriv"){
                                // Check if user has mark order as paid and show order mark paid modal

                                // CALL MODAL HERE IF ORDER HAS BEEN PAID FOR
                        		echo '<script type="text/javascript">
                        			$(document).ready(function(){
                        				$("#paidModal").modal("show");
                        			});
                        		</script>';
                        		
                                }elseif($receipt=="0" AND $dollar_type=="Deriv"){
                                // CALL MODAL HERE IF ORDER HAS BEEN PAID FOR
                        		echo '<script type="text/javascript">
                        			$(document).ready(function(){
                        				$("#myModal").modal("show");
                        			});
                        		</script>';
                                }
                                }
                                
                                ?>
                                
                                
                                
                        <!-- Deriv Buy Funds Modal -->
                        <div
                          class="modal fade" data-bs-backdrop="static"
                          id="myModal"
                          aria-labelledby="modalToggleLabel"
                          tabindex="-1"
                          style="display: none"
                          aria-hidden="true"
                        >
                          <div class="modal-dialog modal-fullscreen" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalToggleLabel"><img src="images/deriv-logo.png" alt="Deriv Logo" style="width:20px"><b>DERIV WITHDRAW</b></h5>
                                </div>
                                <div class='modal-body text-center'>
                                    <div class='alert alert-danger'>***ORDER TERMS***<br>Payment will be made directly into your personal account, we don't accept third party 
                                    transactions. Your bank account information must tally with your Deriv account name.</div>  
                                <div class='' style='font-size:15px'>
                                    <span><b>ORDER INSTRUCTIONS:</b></span><br>
                                    Don't know how to withdraw? <a href="deriv-withdrawal-process">Learn here</a><br>
                                    <b>1.</b> Withdraw <?php echo "<b>$amount_in_usd</b>"; ?>USD to the stated payment agent account below<br>
                                    Sahmax Optimum Nigeria Limited (CR1400966).<br>
                                    <b>2.</b> Upload transaction receipt<br>
                    
                        <!-- Account -->
                        <center><img src="" alt="#" class="d-block rounded" height="40" width="40" id="uploadedAvatar"/></center>
                    
                    <?php
                    
                    include_once("pdoconfig.php");
                    
                    if (isset($_POST["upload"])) {
                        
                    $email = $_SESSION['email']; 
                        
                    //get user ID from db
                    $sql = "SELECT id,firstname,surname FROM users WHERE email = :email LIMIT 1";
                    $query = $con->prepare($sql);
                    $query->execute(array('email' => $email));
                    $row = $query->fetch(PDO::FETCH_ASSOC);
                    
                    $user_id = $row['id'];
                    $firstname = $row['firstname'];
                    $surname = $row['surname'];
                    
                    $dollar_type = "Deriv";
                    
                    $support_email = "support@sahmax.com";
                    
                    $stmt = $con->prepare("SELECT derivsell FROM rates WHERE email = :support_email LIMIT 1");
                    $stmt->execute(array('support_email' => $support_email));
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                    $Validate_deriv_sell = $row['derivsell'];	
                    $deriv_sell = escape($Validate_deriv_sell);
                    
                    //Get current time
                    date_default_timezone_set('Africa/Lagos');
                    $date = date('Y-m-d');
                    $time = date('H:i:s');
                    
                    }
                        
                        
                        $allowed_image_extension = array(
                            "png",
                            "jpg",
                            "JPG",
                            "jpeg"
                        );
                        
                        // Get image file extension
                        $file_extension = pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION);
                        
                        // Validate file input to check if is not empty
                        if (! file_exists($_FILES["file-input"]["tmp_name"])) {
                         
                                 echo "<span style='font-size:15px;color:#FF0000;font-family:monospace;'>Attach your receipt</span>";
                          
                        }    // Validate file input to check if is with valid extension
                        else if (! in_array($file_extension, $allowed_image_extension)) {
                                
                                 echo "<span style='font-size:15px;color:#FF0000;font-family:monospace;'>Upload valid images. Only PNG and JPEG are allowed</span>";                                
                                
                    
                        }    // Validate image file size
                        else if (($_FILES["file-input"]["size"] > 10000000)) {
                    
                                 echo "<span style='font-size:15px;color:#FF0000;font-family:monospace;'>Image size exceeds 10MB</span>";                                
                    
                        } else {
                            
                                $temp = explode(".", $_FILES["file-input"]["name"]);
                                $newfilename = round(microtime(true)) . '.' . end($temp);
                                if(move_uploaded_file($_FILES["file-input"]["tmp_name"], "receipts/" . $newfilename)) {
                                
                                $picname = "receipts/$newfilename";
                                
                                $paid = "1";
                                
                            	$updatedp = "UPDATE sell_order SET receipt = :picname, payment_status = :paid WHERE user_id = :user_id AND order_id  = :order_id LIMIT 1";
                            	$stmt1 = $con->prepare($updatedp);
                            	$stmt1->bindParam(":picname",$picname);
                            	$stmt1->bindParam(":paid",$paid);
                            	$stmt1->bindParam(":user_id",$user_id);
                            	$stmt1->bindParam(":order_id",$order_id);
                            	$stmt1->execute();
                    
                                //Send email notification to admin if order placed		
     
                                // CALL MODAL HERE IF ORDER_PLACED
                            		echo '<script type="text/javascript">
                            			$(document).ready(function(){
                            				$("#paidModal").modal("show");
                            			});
                            		</script>';
            
                            } else {
                                
                                 echo "<span style='font-size:15px;color:#FF0000;font-family:monospace;'>Failed to Mark Order, contact support.</span>";
                            }
                        }
                    }
                    ?>

                         <form action="" method="post" enctype="multipart/form-data">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block"><i class="bx bx-image"></i>choose file</span>
                            <i class="bx bx-image d-block d-sm-none">choose file</i>
                            <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" name="file-input" required />
                            <!--<input type="file" class="file-input" name="file-input">-->
                          </label>
                           <br><b>3.</b> Mark order as paid and wait for admin<br><br>
                          <hr class="my-0" />
                          <br>
                                    
                                    <!-- Done button -->
                                    <a href='userdashboard'>
                                    <button type="button" class="btn btn-outline-secondary">Exit</button></a>
                                     
                                    <!-- Mark Paid -->
                                    <button type="submit" name="upload" class="btn btn-outline-primary">Mark Paid</button>
                                </form>
                                </div>
                                <br>
                                <div class='alert alert-danger'>***Your account details should match your Deriv name. No third parties***</div>
                                </div>            
                                </div>
                            </div>
                            </div>
                            <!-- End of Order Placed Modal -->
                            
                            
                    <!-- Disable submit button if receipt has not been upload -->
                    <script>
                        $(document).ready(function () {
                        $("#btnSubmit").click(function () {
                            setTimeout(function () { disableButton(); }, 0);
                        });
                        
                        function disableButton() {
                            $("#btnSubmit").prop('disabled', true);
                        }
                        });
                    </script>
                    
                        <!-- Start of order paid successful modal -->
                        <div class="modal fade" id="paidModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="border:none;border-radius: 5px;">
                        <div class="modal-header" style="background: #1ab394; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                              <a href="userdashboard"><button type="button" class="btn btn-outline-secondary" style="opacity:1;color:#fff;font-size:20px"><b>&times;</b></button></a>
                              <h4 class="modal-title text-center"><img src="images/waiting.png" style="width:50px;pointer-events: none;" alt=""></h4>
                            </div>
                            <div class="modal-body">
                                <?php 
                                    //Get order Naira amount
                                    $unformatted_amount_in_usd = $amount_in_usd * $deriv_sell;
                                    $amount_in_naira = number_format($unformatted_amount_in_usd, 2);
                                ?>
                              <p style="text-align:center;color:#1ab394;font-size:24px;font-weight:500;">You have marked order as paid! <br> Please hold, we're on it.</p>
                              <p style="color:#555555;">Transaction ID:&nbsp;<strong style="font-weight:500;font-size:16px;color: #222222;"><?php echo $order_id ?></strong><br>Payment amount:&nbsp;<strong style="font-weight:500;font-size:16px;color: #222222;">&#8358;<?php echo $amount_in_naira ?></strong><br>The sum of <b><?php echo $amount_in_naira ?> Naira</b> will be paid into your bank account<strong style="font-weight:500;font-size:15px;color: #222222;"> after confirmation.</strong></p>
                            </div>
                            <hr>
                            <div class="modal-footer" style="justify-content: center">
                             <a href="userdashboard"><button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">You can place one order at a time</button></a>
                            </div>
                          </div>
                          
                        </div>
                        </div>
                      <!-- End of order paid successful modal -->
                                
                               
                                <form method="POST" action="deriv-sell-validation.php" name="frmChange" onSubmit="return validateDerivSell()">
                                <?php $reason = array("Failed_unknownerror=true" => "<p style='color:red;'>Failed to place order</p>"); 
                                 if(isset($_GET['sellFailedunknownerror'])) echo $reason[$_GET['reason']]; ?>
                                <div class="row g-2">                                  
                                  <div class="col mb-0">
                                    <label for="AmountInUSD" class="form-label">I will send (&#36;)</label>
                                    <input type="number" id="AmountInUSD" name="AmountInUSD" class="form-control" placeholder="Amount in Dollar" minlength="1" required/>
                                    <span id="NairaAmount" class="required"></span>
                                    <?php $reason = array("invalid_AmountInUSDcredential=true" => "<p style='color:red;'>Wrong Dollar Format</p>"); 
                                     if(isset($_GET['sellFailedinvalidAmountInUSD'])) echo $reason[$_GET['reason']]; ?>
                                     
                                    <?php $reason = array("invalid_AmountInUSDlength=true" => "<p style='color:red;'>Min. you can withdraw is &dollar;5</p>"); 
                                     if(isset($_GET['sellFailedinvalidAmountInUSD'])) echo $reason[$_GET['reason']]; ?>
                                     
                                    <?php $reason = array("completeactiveorders=true" => "<p style='color:red;'>Complete your active orders</p>"); 
                                    if(isset($_GET['sellFailedOrderexist'])) echo $reason[$_GET['reason']]; ?>
                                  </div>
                                  
                                  <div class="col mb-0">
                                    <label for="AmountInNaira" class="form-label" title="This is what you will receive">I will receive (&#x20A6;)</label>
                                    <input type="number" id="AmountInNaira" class="form-control" placeholder="Amount in Naira" disabled/>
                                    <span id="NairaAmount" class="required"></span> 
                                  </div>
                                </div>
                             <div class="col mb-3">
                                      
                            <?php 
                            
                            $sql = $con->prepare("SELECT email, bank_name, account_name FROM account_details WHERE email = :email");
                            $sql->execute(array('email' => $email));
                            while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                            
                            $bank_name = escape($row['bank_name']);
                            
                            }
                            
                            ?>
                            
                            <?php
                             
                            if($bank_name=="801"){
                                $bankname_decode = "Abbey Mortgage Bank";
                            }elseif($bank_name=="044"){
                                $bankname_decode = "Access Bank";
                            }elseif($bank_name=="401"){
                                $bankname_decode = "ASO Savings and Loans";
                            }elseif($bank_name=="50931"){
                                $bankname_decode = "Bowen Microfinance Bank";
                            }elseif($bank_name=="50823"){
                                $bankname_decode = "CEMCS Microfinance Bank";
                            }elseif($bank_name=="023"){
                                $bankname_decode = "Citibank";
                            }elseif($bank_name=="559"){
                                $bankname_decode = "Coronation Merchant Bank";
                            }elseif($bank_name=="050"){
                                $bankname_decode = "Ecobank";
                            }elseif($bank_name=="562"){
                                $bankname_decode = "Ekondo Microfinance Bank";
                            }elseif($bank_name=="50126"){
                                $bankname_decode = "Eyowo";
                            }elseif($bank_name=="070"){
                                $bankname_decode = "Fidelity Bank";
                            }elseif($bank_name=="51314"){
                                $bankname_decode = "Firmus MFB";
                            }elseif($bank_name=="011"){
                                $bankname_decode = "First Bank";
                            }elseif($bank_name=="214"){
                                $bankname_decode = "First City Monument Bank (FCMB)";
                            }elseif($bank_name=="501"){
                                $bankname_decode = "FSDH Merchant Bank Limited";
                            }elseif($bank_name=="00103"){
                                $bankname_decode = "Globus Bank";
                            }elseif($bank_name=="058"){
                                $bankname_decode = "Guaranty Trust Bank (GTB)";
                            }elseif($bank_name=="51251"){
                                $bankname_decode = "Hackman Microfinance Bank";
                            }elseif($bank_name=="50383"){
                                $bankname_decode = " Hasal Microfinance Bank";
                            }elseif($bank_name=="030"){
                                $bankname_decode = "Heritage Bank";
                            }elseif($bank_name=="51244"){
                                $bankname_decode = "Ibile Microfinance Bank";
                            }elseif($bank_name=="50457"){
                                $bankname_decode = "Infinity MFB";
                            }elseif($bank_name=="301"){
                                $bankname_decode = "Jaiz Bank";
                            }elseif($bank_name=="082"){
                                $bankname_decode = "Keystone Bank";
                            }elseif($bank_name=="50211"){
                                $bankname_decode = "Kuda Bank";
                            }elseif($bank_name=="90052"){
                                $bankname_decode = "Lagos Building Investment Company Plc.";
                            }elseif($bank_name=="50563"){
                                $bankname_decode = "Mayfair MFB";
                            }elseif($bank_name=="50304"){
                                $bankname_decode = "Mint MFB";
                            }elseif($bank_name=="999992"){
                                $bankname_decode = "Opay";
                            }elseif($bank_name=="565"){
                                $bankname_decode = "One Finance";
                            }elseif($bank_name=="999991"){
                                $bankname_decode = "PalmPay";
                            }elseif($bank_name=="526"){
                                $bankname_decode = "Parallex Bank";
                            }elseif($bank_name=="311"){
                                $bankname_decode = "Parkway - ReadyCash";
                            }elseif($bank_name=="076"){
                                $bankname_decode = "Polaris Bank";
                            }elseif($bank_name=="101"){
                                $bankname_decode = "Providus Bank";
                            }elseif($bank_name=="502"){
                                $bankname_decode = "Rand Merchant Bank";
                            }elseif($bank_name=="125"){
                                $bankname_decode = "Rubies MFB";
                            }elseif($bank_name=="51310"){
                                $bankname_decode = "Sparkle Microfinance Bank";
                            }elseif($bank_name=="221"){
                                $bankname_decode = "Stanbic IBTC Bank";
                            }elseif($bank_name=="068"){
                                $bankname_decode = "Standard Chartered Bank";
                            }elseif($bank_name=="232"){
                                $bankname_decode = "Sterling Bank";
                            }elseif($bank_name=="100"){
                                $bankname_decode = "Suntrust Bank";
                            }elseif($bank_name=="302"){
                                $bankname_decode = "TAJ Bank";
                            }elseif($bank_name=="51211"){
                                $bankname_decode = "TCF MFB";
                            }elseif($bank_name=="102"){
                                $bankname_decode = "Titan Bank";
                            }elseif($bank_name=="032"){
                                $bankname_decode = "Union Bank of Nigeria";
                            }elseif($bank_name=="033"){
                                $bankname_decode = "United Bank For Africa";
                            }elseif($bank_name=="215"){
                                $bankname_decode = "Unity Bank";
                            }elseif($bank_name=="566"){
                                $bankname_decode = "VFD Microfinance Bank Limited";
                            }elseif($bank_name=="035"){
                                $bankname_decode = "Wema Bank";
                            }elseif($bank_name=="057"){
                                $bankname_decode = "Zenith Bank";
                            }else{
                                $bankname_decode = "Resubmit your bank details";
                            }

                            $sql = $con->prepare("SELECT email, bank_name, account_name, account_number FROM account_details WHERE email = :email");
                            $sql->execute(array('email' => $email));
                            if($sql->rowCount() > 0){
                            $row = $sql->fetch(PDO::FETCH_ASSOC);
                            if($email==$row['email'])
                            {
                                
                              $bank_name = escape($row['bank_name']);
                              $account_name = escape($row['account_name']);
                              $account_number = escape($row['account_number']);
                              
                              echo"<br><label class='form-label' for='recipient'>Choose payment method</label>
                              <select id='recipient' name='recipient' class='select2 form-select'>
                              <option value='$bank_name' style='text-transform:capitalize'>$bankname_decode $account_number $account_name</option>
                              </select> <br>
                              <span id='paymentmethod' onclick='deleteMethodFunction()'>Add another payment method?
                              <button class='btn btn-danger btn-sm'>
                              Delete old method</button></span>";
                            }            
                            }else{
                            echo"<label class='form-label' for='recipient'>Choose payment method</label>
                            <select name='AccountDetails' id='AccountDetails' class='form-control' required>
                            <option> No payment method </option>
                            </select>   
                            <span class='' style='color:#0000FF' data-bs-toggle='modal' 
                            data-bs-target='#largeModal'><button class='btn btn-primary btn-sm' style='margin-top:5px'>Add payment method</button></span>"; 
                            } 

                            ?> 
                            
                            <script>
                            function deleteMethodFunction() { 
                            document.getElementById("paymentmethod").innerHTML="Do you wish to delete payment method?<br><?php echo"<a href='delete_payment_method_validation?id=$account_number'>"; ?><button type='submit' name='delete_payment_method' class='btn btn-danger btn-sm'><b>Yes</b></button></a> or <a href=''><button class='btn btn-info btn-sm'><b>NO</b></button></a>"; 
                            }	 
                            </script>
                            
                            <!-- show  this message if user submit form without adding payment method -->
                            <?php if(isset($_SESSION['NoAccountDetails'])) : ?>
                                <p style='color:red;'>You are yet to add payment method</p>
                            <?php 
                                unset($_SESSION['NoAccountDetails']);
                                endif; 
                            ?>
                             
                            <br>
                            <br>
                            
                            <?php if(isset($_SESSION["payment-method-required"])) : ?>
                            <center><div class="alert alert-danger alert-bs-dismissible" role="alert" style="font-size:15px; margin-top:-15px;"></span>
                            All fields are required <span type="button" class="close" data-bs-dismiss="alert" aria-label="Close" style="font-size:20px">
                            <span aria-hidden='true'>&times;</span></div></center>
                            <?php 
                                unset($_SESSION['payment-method-required']);
                                endif; 
                            ?>
                            
                            <?php if(isset($_SESSION["wrong_accountNo_length"])) : ?>
                            <center><div class="alert alert-danger alert-bs-dismissible" role="alert" style="font-size:15px; margin-top:-15px;"></span>
                            Incorrect Account Number <span type="button" class="close" data-bs-dismiss="alert" aria-label="Close" style="font-size:20px">
                            <span aria-hidden='true'>&times;</span></div></center>
                            <?php 
                                unset($_SESSION['wrong_accountNo_length']);
                                endif; 
                            ?>
                            
                            <?php if(isset($_SESSION["wrong_accountNo_format"])) : ?>
                            <center><div class="alert alert-danger alert-bs-dismissible" role="alert" style="font-size:15px; margin-top:-15px;"></span>
                            Enter your account number correctly <span type="button" class="close" data-bs-dismiss="alert" aria-label="Close" style="font-size:20px">
                            <span aria-hidden='true'>&times;</span></div></center>
                            <?php 
                                unset($_SESSION['wrong_accountNo_format']);
                                endif; 
                            ?>
                            
                            <?php if(isset($_SESSION["recipientaddedfailed"])) : ?>
                            <center><div class="alert alert-danger alert-bs-dismissible" role="alert" style="font-size:15px; margin-top:-15px;"></span>
                            Failed to add payment method <span type="button" class="close" data-bs-dismiss="alert" aria-label="Close" style="font-size:20px">
                            <span aria-hidden='true'>&times;</span></div></center>
                            <?php 
                                unset($_SESSION['recipientaddedfailed']);
                                endif; 
                            ?>
                            
                            <?php if(isset($_SESSION["recipientsuccessfullyadded"])) : ?>
                            <div class="alert alert-success alert-bs-dismissible" role="alert" style="font-size:15px; margin-top:-15px;"></span>
                            Payment Method Added <span type="button" class="close" data-bs-dismiss="alert" aria-label="Close" style="font-size:20px">
                            <span aria-hidden='true'>&times;</span></div>
                            <?php 
                                unset($_SESSION['recipientsuccessfullyadded']);
                                endif; 
                            ?>
                            
                            <span id="BankDetails" class="required"></span> 
                            <?php $reason = array("invalid_AccountDetailscredential=true" => "<p style='color:red;'>Wrong Account Details</p>"); 
                            if(isset($_GET['sellFailedinvalidAccountDetails'])) echo $reason[$_GET['reason']]; ?>   
                                    

                                  </div>
                                </div>
                               <center><span class="btn btn-info btn-sm">Order Tags</span><br><br>
                               <span class="btn btn-warning btn-sm"><i class="bx bx-user-plus bx-sm"></i> No third parties</span> <span class="btn btn-warning btn-sm"><i class="bx bx-receipt bx-sm"></i> Receipt required</span></center>
                              </div>
                              <div class="modal-footer">
                                <a href="userdashboard"><button type="button" class="btn btn-outline-secondary">
                                  Cancel
                                </button></a>   
                                
                                <!-- show this message if account not verified -->
                                <?php
                                
                                  $verification_status = "0";
                                  $sql = $con->prepare("SELECT verification_status FROM users WHERE email = :email LIMIT 1");
                                  $sql->execute(array('email' => $email));
                                  if($sql->rowCount() > 0){
                                  $row = $sql->fetch(PDO::FETCH_ASSOC);
                                  if ($row['verification_status']==$verification_status){
                                      
                                     
                                    echo "<a href='verification'><button type='button' class='btn btn-danger'>Help us verify your account</button></a>";
                                    
                                 }else{
                                     
                                    echo "<button type='submit' name='derivsell' class='btn btn-primary'>Place Order</button>";
                                 }
                                 }
                                    
                                ?>
                                
                              </div>
                            </form>
                           </div>
                          </div>
                        </div>
                        <!-- Modal 2-->
                        
                    <!-- Payment method modal -->
                      <div class="modal fade" id="largeModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel3">Add payment method</h5>
                            </div>
                           <div class="modal-body">
                            <form method="POST" action="payment-method-validation.php">
                            <label class="form-control-label" for="input-last-name">Bank Name</label>
                            <select id="bankCode" name="bankCode" class="form-control form-control-alternative" required>
                                
                            <option value="">--Select Bank--</option>
                        
                            <option value="801">
                              Abbey Mortgage Bank
                            </option>
                         
                            <option value="044">
                              Access Bank
                            </option>
                        
                            <option value="401">
                              ASO Savings and Loans
                            </option>
                        
                            <option value="50931">
                              Bowen Microfinance Bank
                            </option>
                        
                            <option value="50823">
                              CEMCS Microfinance Bank
                            </option>
                        
                            <option value="023">
                              Citibank Nigeria
                            </option>
                        
                            <option value="559">
                              Coronation Merchant Bank
                            </option>
                        
                            <option value="050">
                              Ecobank Nigeria
                            </option>
                        
                            <option value="562">
                              Ekondo Microfinance Bank
                            </option>
                        
                            <option value="50126">
                              Eyowo
                            </option>
                        
                            <option value="070">
                              Fidelity Bank
                            </option>
                        
                            <option value="51314">
                              Firmus MFB
                            </option>
                        
                            <option value="011">
                              First Bank of Nigeria
                            </option>
                        
                            <option value="214">
                              First City Monument Bank
                            </option>
                        
                            <option value="501">
                              FSDH Merchant Bank Limited
                            </option>
                        
                            <option value="00103">
                              Globus Bank
                            </option>
                        
                            <option value="058">
                              Guaranty Trust Bank
                            </option>
                        
                            <option value="51251">
                              Hackman Microfinance Bank
                            </option>
                        
                            <option value="50383">
                              Hasal Microfinance Bank
                            </option>
                        
                            <option value="030">
                              Heritage Bank
                            </option>
                        
                            <option value="51244">
                              Ibile Microfinance Bank
                            </option>
                        
                            <option value="50457">
                              Infinity MFB
                            </option>
                        
                            <option value="301">
                              Jaiz Bank
                            </option>
                        
                            <option value="082">
                              Keystone Bank
                            </option>
                        
                            <option value="50211">
                              Kuda Bank
                            </option>
                        
                            <option value="90052">
                              Lagos Building Investment Company Plc.
                            </option>
                        
                            <option value="50563">
                              Mayfair MFB
                            </option>
                        
                            <option value="50304">
                              Mint MFB
                            </option>
                            
                            <option value="999992">
                              Opay (Paycom)
                            </option>
                        
                            <option value="565">
                              One Finance
                            </option>
                        
                            <option value="999991">
                              PalmPay
                            </option>
                        
                            <option value="526">
                              Parallex Bank
                            </option>
                        
                            <option value="311">
                              Parkway - ReadyCash
                            </option>
                        
                            <option value="50746">
                              Petra Mircofinance Bank Plc
                            </option>
                        
                            <option value="076">
                              Polaris Bank
                            </option>
                        
                            <option value="101">
                              Providus Bank
                            </option>
                        
                            <option value="502">
                              Rand Merchant Bank
                            </option>
                        
                            <option value="125">
                              Rubies MFB
                            </option>
                        
                            <option value="51310">
                              Sparkle Microfinance Bank
                            </option>
                        
                            <option value="221">
                              Stanbic IBTC Bank
                            </option>
                        
                            <option value="068">
                              Standard Chartered Bank
                            </option>
                        
                            <option value="232">
                              Sterling Bank
                            </option>
                        
                            <option value="100">
                              Suntrust Bank
                            </option>
                        
                            <option value="302">
                              TAJ Bank
                            </option>
                        
                            <option value="51211">
                              TCF MFB
                            </option>
                        
                            <option value="102">
                              Titan Bank
                            </option>
                        
                            <option value="032">
                              Union Bank of Nigeria
                            </option>
                        
                            <option value="033">
                              United Bank For Africa
                            </option>
                        
                            <option value="215">
                              Unity Bank
                            </option>
                        
                            <option value="566">
                              VFD Microfinance Bank Limited
                            </option>
                        
                            <option value="035">
                              Wema Bank
                            </option>
                        
                            <option value="057">
                              Zenith Bank
                            </option>
                          </select>
                          
                          <label class="form-control-label" for="input-last-name">Account Number</label>
                          <input type="number" name="accountNumber" minlength="10" maxlength="10" placeholder="--Acount Number--" class="form-control" required>
                      
                          <div class="row">
                            <label class="form-control-label" for="input-last-name">Account Name</label>
                            <span class="alert alert-secondary"><?php echo "<p style='text-transform:capitalize'>$surname $firstname</p>" ?> </span>
                         </div>
                        
                         <div class="d-grid gap-2">
                          <button class="btn btn-primary" type="submit" name="submit_payment_method">Add Method</button>
                        </div>
                        </form>
                        </div>
                       </div>
                     </div>
                    </div>
                        
                        <!-- JS validate input -->
                        <script>
                        function validateDerivSell() {
                        var AmountInNaira,AmountInUSD,AccountDetails,output = true;
                        
                        AmountInNaira = document.frmChange.AmountInNaira;
                        AmountInUSD = document.frmChange.AmountInUSD;
                        AccountDetails = document.frmChange.AccountDetails;
                        
                        if(!AmountInNaira.value) {
                            AmountInNaira.focus();
                        	document.getElementById("NairaAmount").innerHTML = "<p style='color:red; font-size:13px'>Amount in Naira is required</p>";
                            output = false;
                        }
                        else if(!AmountInUSD.value) {	
                            AmountInUSD.focus();
                        	document.getElementById("USDAmount").innerHTML = "<p style='color:red; font-size:13px'>Amount In USD is required</p>";
                        	output = false;
                        }
                        else if(!AccountDetails.value) {	
                            AccountDetails.focus();
                        	document.getElementById("BankDetails").innerHTML = "<p style='color:red; font-size:13px'>Select Account Details to pay to</p>";
                        	output = false;
                        }
                        return output;
                        }
                        </script>


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
                        href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/landing/"
                        target="_blank"
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
                          Currency
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="javascript:void(0);">&#8358; Naira</a>
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
    $('#AmountInUSD, #price').on('input',function() {
        var AmountInUSD = parseInt($('#AmountInUSD').val());
        var price = parseFloat($('#price').val());
        $('#AmountInNaira').val((price * AmountInUSD ? AmountInUSD * price : 0).toFixed(2));
    });
    
    $("form#DerivBuyForm").submit(function(){ // on form submit
    var vals = $(this).serialize(); // get all the form values

    $.ajax({
        url: "transaction-validation.php", // page in which the php is
        method: "post",
        data: vals, // you can access the values in php like you normally 
                    // would (using the names of the individual input fields)
        success: function(){ // if post is successful
            alert("success!"); // alert "success!"
        }
    });

    return false; // prevent page refresh
    });
    </script>

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
