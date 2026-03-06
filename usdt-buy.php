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
    <title>Buy USDT</title>

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
    
    .img{
        pointer-events: none;
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

        $Validate_usdt_buy = $row['usdtbuy'];	
        $usdt_buy = escape($Validate_usdt_buy);

        $time =  $row['updated_at'];
        $timestamp = strtotime($time);
        $formatted_time = date('d F Y', $timestamp);
        
        }        

        ?>
        
                        <!-- USDT Buy Funds Modal -->
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
                                <h5 class="modal-title" id="modalToggleLabel"><img src="images/tether-usdt-logo.svg" alt="USDT Logo" style="width:20px">USDT BUY</h5>
                                <!--<button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button-->
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                <span class="alert alert-info">Rate = &#x20A6;<?php echo $usdt_buy; ?>/&#36;
                                <!-- Hidden USDT Rate To be Used In Jquery Rate Calculation -->
                                <input type="text" name="price" id="price" <?php echo "value='$usdt_buy'"; ?> hidden/>
                                <br>Limit Min. 20 USD = &#x20A6;<?php $usdt_min_quantity = "20"; 
                                $total_usdt_min_amount = $usdt_buy * $usdt_min_quantity;
                                /* Format Amount to decimal place */
                                $formatted_total_usdt_min_amount = number_format($total_usdt_min_amount); echo"$formatted_total_usdt_min_amount"; ?> </span>
                                
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
                                $dollar_type= "USDT";
                    			    
                			    $stmt = $con->prepare("SELECT order_id , amount_in_naira , account_details , payment_status , order_status , receipt, dispute_level from buy_order WHERE user_id = :user_id AND order_status = :order_status AND dollar_type = :dollar_type ORDER BY :user_id DESC");
                                $stmt->bindParam(':user_id', $user_id);
                                $stmt->bindParam(':order_status', $order_status);
                                $stmt->bindParam(':dollar_type', $dollar_type);
                                $stmt->execute();
                                while($row = $stmt->fetch()){
                                   $payment_status = $row['payment_status'];
                                   $order_id = $row['order_id'];
                                   $order_status = $row['order_status'];
                                   $account_details = $row['account_details'];
                                   $receipt = $row['receipt'];
                                   $dispute_level = $row['dispute_level'];
                                   $amount_in_naira = $row['amount_in_naira'];
                                   //Formatted amount in Naira to be used in email message
                                   $formatted_amount_in_naira = number_format($amount_in_naira, 2);
                                   
                                    //Get order USD amount
                                    $unformatted_amount_in_dollar = $amount_in_naira / $usdt_buy;
                                    $amount_in_dollar = number_format($unformatted_amount_in_dollar, 2);
                                
                                if ($payment_status=="1"){
                                // Check if user has mark order as paid and show order mark paid modal

                                // CALL MODAL HERE IF ORDER HAS BEEN PAID FOR
                        		echo '<script type="text/javascript">
                        			$(document).ready(function(){
                        				$("#paidModal").modal("show");
                        			});
                        		</script>';
                        		
                               }elseif($receipt=="0"){
                                // CALL MODAL HERE IF ORDER HAS BEEN PAID FOR
                        		echo '<script type="text/javascript">
                        			$(document).ready(function(){
                        				$("#myModal").modal("show");
                        			});
                        		</script>';
                                }
                                }
                                
                                ?>
                                
                                
                                
                                
                       <!-- USDT Buy Funds Modal -->
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
                                <h5 class="modal-title" id="modalToggleLabel"><img src="images/tether-usdt-logo.svg" alt="USDT Logo" style="width:20px"><b>USDT BUY</b></h5>
                                </div>
                                <div class='modal-body text-center'>
                                    <div class='alert alert-danger'>***ORDER TERMS***<br>We will not be responsible for funding a wrong account provided by you.
                                    You must NOT use phrases like; bitcoin, btc, USDT, LTC, PM, Perfect Money, crypto, wallet, fund, buying etc in your transfer memo/details/narration/purpose 
                                    (leave it blank or enter your name if neccessary).
                                    Failure to follow instructions will lead to account deactivation and your money will not be funded or refunded.</div>  
                                <div class='' style='font-size:15px'>
                                    <span><b>ORDER INSTRUCTIONS:</b></span><br>
                                    <b>1.</b> Make payment of <?php echo "<b>$formatted_amount_in_naira</b>"; ?> Naira to the stated account details<br>
                                       <?php if($account_details=="Accessbank"){
                                            echo"Bank Name: Access Bank <br> Account Number: 0819878223 <br> Account Name: SULAIMAN SAHEED ADEKUNLE";
                                       }elseif($account_details=="Palmpay"){
                                           echo"Bank Name: Palmpay <br> Account Number: 9550442502 <br> Account Name: SULAIMAN SAHEED ADEKUNLE";
                                       }elseif($account_details=="FCMB"){
                                           echo"Bank Name: FCMB <br> Account Number: 6790775020 <br> Account Name: Sahmax Optimum Nig. Ltd. Mgt";
                                       }elseif($account_details=="Fidelity bank"){
                                           echo"Bank Name: Fidelity bank <br> Account Number: 6319300403 <br> Account Name: SULAIMAN SAHEED ADEKUNLE";
                                       }elseif($account_details=="Zenith bank"){
                                           echo"Bank Name: Zenith bank <br> Account Number: 2372268468 <br> Account Name: SULAIMAN SAHEED ADEKUNLE";
                                       }elseif($account_details=="GTBank"){
                                           echo"Bank Name: GTBank <br> Account Number: 0126487124 <br> Account Name: SULAIMAN SAHEED ADEKUNLE";
                                       }elseif($account_details=="UBA"){
                                           echo"Bank Name: UBA <br> Account Number: 2132903127 <br> Account Name: SULAIMAN SAHEED ADEKUNLE";
                                       }
                                       
                                       ?> <br>
                                     <b>2.</b> Upload transaction receipt<br>
                    
                    <!-- Account -->
                        <center><img src="" alt="#" class="d-block rounded" height="40" width="40" id="uploadedAvatar"
                        /></center>
                    
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
                    
                    $dollar_type = "USDT";
                    
                    $support_email = "support@sahmax.com";
                    
                    $stmt = $con->prepare("SELECT usdtbuy FROM rates WHERE email = :support_email LIMIT 1");
                    $stmt->execute(array('support_email' => $support_email));
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                    $Validate_usdt_buy = $row['usdtbuy'];	
                    $usdt_buy = escape($Validate_usdt_buy);
                    
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
                                
                            	$updatedp = "UPDATE buy_order SET receipt = :picname, payment_status = :paid WHERE user_id = :user_id AND order_id  = :order_id LIMIT 1";
                            	$stmt1 = $con->prepare($updatedp);
                            	$stmt1->bindParam(":picname",$picname);
                            	$stmt1->bindParam(":paid",$paid);
                            	$stmt1->bindParam(":user_id",$user_id);
                            	$stmt1->bindParam(":order_id",$order_id);
                            	$stmt1->execute();
                    
                                //Send email notification to admin if order placed		
                                $message = '<html><body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">';
                                $message .= '<table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px green;">';
                                $message .= '<thead>';
                                $message .= '<tr>';
                                $message .= '<th style="text-align:left;"><img style="max-width: 150px;" src="https://www.sahmax.com/images/android-chrome-512x512.png" alt="Sahmax Optimum Logo"></th>';
                                $message .= "<th style='text-align:right;font-weight:400;'>$date</th>";
                                $message .= '</tr>';
                                $message .= '</thead>';
                                $message .= '<tbody>';
                                $message .= '<tr>';
                                $message .= '<td style="height:35px;"></td>';
                                $message .= '</tr>';
                                $message .= '<tr>';
                                $message .= '<td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">';
                                $message .= "<p style='font-size:14px;margin:0 0 6px 0;'><span style='font-weight:bold;display:inline-block;min-width:150px'>Order type</span> USDT USD Purchase</p>";
                                $message .= "<p style='font-size:14px;margin:0 0 6px 0;'><span style='font-weight:bold;display:inline-block;min-width:150px'>Order status</span><b style='color:green;font-weight:normal;margin:0'>Active</b></p>";
                                $message .= "<p style='font-size:14px;margin:0 0 6px 0;'><span style='font-weight:bold;display:inline-block;min-width:146px'>Order ID</span> $order_id</p>";
                                $message .= "<p style='font-size:14px;margin:0 0 0 0;'><span style='font-weight:bold;display:inline-block;min-width:146px'>Order amount</span> &#8358;$formatted_amount_in_naira</p>";
                                $message .= "<p style='font-size:14px;margin:0 0 0 0;'><span style='font-weight:bold;display:inline-block;min-width:146px'>Order amount</span> &#36;$amount_in_dollar</p>";
                                $message .= "</td>";
                                $message .= "</tr>";
                                $message .= "<tr>";
                                $message .= "<td style='height:35px;'></td>";
                                $message .= "</tr>";
                                $message .= "<tr>";
                                $message .= "<td style='width:50%;padding:20px;vertical-align:top'>";
                                $message .= "<p style='margin:0 0 10px 0;padding:0;font-size:14px;text-transform:capitalize'><span style='display:block;font-weight:bold;font-size:13px'>Customer Name</span> $firstname $surname</p>";
                                $message .= "<p style='margin:0 0 10px 0;padding:0;font-size:14px;text-transform:capitalize'><span style='display:block;font-weight:bold;font-size:13px'>What to do?</span> Confirm payment </p>";
                                $message .= '</td><td style="width:50%;padding:20px;vertical-align:top">';
                                $message .= "<p style='margin:0 0 10px 0;padding:0;font-size:14px;'><span style='display:block;font-weight:bold;font-size:13px;'>Date</span> $date</p>";
                                $message .= "<p style='margin:0 0 10px 0;padding:0;font-size:14px;'><span style='display:block;font-weight:bold;font-size:13px;'>Time</span> $time</p>";
                                $message .= "</td></tr>";
                                $message .= "<tr><td colspan='2' style='padding:15px;'>";
                                $message .= '</tbody>
                                            <tfooter style="margin-bottom:-40px; margin-top:-30px">
                                              <tr>
                                                <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                                                  <strong style="display:block;margin:0 0 10px 0;">Regards,<br>Support<br><a href="https://sahmax.com">https://www.sahmax.com/</a></strong>  
                                                </td>
                                              </tr>
                                            </tfooter>
                                          </table>';
                                $message .= '</body></html>';
                    			$ehead = "MIME-Version: 1.0" . "\r\n";
                    			$ehead.= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
                    			$ehead.= "From: Sahmax Optimum <support@sahmax.com>\r\n".
                    					 "Reply-To: noreply@sahmax.com\r\n" .
                    					 "X-Mailer: PHP/" . phpversion();
                    			 
                    			$adminemail = "sulaimansaheedadekunle@gmail.com";
                    			$subj = "Order Marked Paid ($amount_in_dollar USD Order)";
                    			$mailsend=mail("$adminemail","$subj","$message","$ehead");
                    	        
                    	        if ($mailsend) {
                                   // CALL MODAL HERE IF ORDER_PLACED
                            		echo '<script type="text/javascript">
                            			$(document).ready(function(){
                            				$("#paidModal").modal("show");
                            			});
                            		</script>';
                                }
            
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
                           <br><b>3.</b>Mark order as paid and wait for admin<br><br>
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
                                <div class='alert alert-danger'>***Name of depositor should match your Sahmax Optimum account name. No third parties***</div>
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
                                    //Get order USD amount
                                    $unformatted_amount_in_dollar = $amount_in_naira / $usdt_buy;
                                    $amount_in_dollar = number_format($unformatted_amount_in_dollar, 2);
                                ?>
                              <p style="text-align:center;color:#1ab394;font-size:24px;font-weight:500;">You have marked order as paid! <br> Please hold, we're on it.</p>
                              <p style="color:#555555;">Transaction ID:&nbsp;<strong style="font-weight:500;font-size:16px;color: #222222;"><?php echo $order_id ?></strong><br>
                              Payment amount:&nbsp;<strong style="font-weight:500;font-size:16px;color: #222222;">&#8358;<?php echo $formatted_amount_in_naira ?></strong><br>
                              The sum of <b><?php echo $amount_in_dollar; ?> USDT </b> shall be funded into your USDT wallet<strong style="font-weight:500;font-size:15px;color: #222222;"> after confirmation.</strong></p>
                            </div>
                            <hr>
                            <div class="modal-footer" style="justify-content: center">
                             <a href="userdashboard"><button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">You can place one order at a time</button></a>
                            </div>
                          </div>
                          
                        </div>
                        </div>
                      <!-- End of order paid successful modal -->
                                
                               
                                <form method="POST" action="usdt-buy-validation.php" name="frmChange" onSubmit="return validateusdtbuy()">
                                <?php $reason = array("Failed_unknownerror=true" => "<p style='color:red;'>Failed to place order</p>"); 
                                 if(isset($_GET['purchaseFailedunknownerror'])) echo $reason[$_GET['reason']]; ?>
                                <div class="row g-2">                                  
                                  <div class="col mb-0"> 
                                    <label for="AmountInNaira" class="form-label">I will send (&#x20A6;)</label>
                                    <input type="text" id="AmountInNaira" name="AmountInNaira" class="form-control" placeholder="Amount in Naira" minlength="4" required/>
                                    <span id="NairaAmount" class="required"></span>
                                    <?php $reason = array("invalid_AmountInNairacredential=true" => "<p style='color:red;'>Wrong Naira Format</p>"); 
                                     if(isset($_GET['purchaseFailedinvalidAmountInNaira'])) echo $reason[$_GET['reason']]; ?>
                                     
                                    <?php $reason = array("invalid_AmountInNairalength=true" => "<p style='color:red;'>Min. you can buy is $50 ($formatted_total_usdt_min_amount Naira)</p>"); 
                                     if(isset($_GET['purchaseFailedinvalidAmountInNaira'])) echo $reason[$_GET['reason']]; ?>
                                     
                                    <?php $reason = array("completeactiveorders=true" => "<p style='color:red;'>Complete your active orders</p>"); 
                                    if(isset($_GET['purchaseFailedOrderexist'])) echo $reason[$_GET['reason']]; ?>
                                  </div>
                                  
                                  <div class="col mb-0">
                                    <label for="AmountInUSD" class="form-label" title="This is what you will receive">I will receive <a href="https://emoji.gg/emoji/7868-usdt"><img src="https://cdn3.emoji.gg/emojis/7868-usdt.png" width="20px" height="20px" alt="USDT"></a></label>
                                    <input type="number" id="AmountInUSD" class="form-control" placeholder="Amount in USDT" disabled/>
                                    <span id="USDAmount" class="required"></span> 
                                  </div>
                                </div>
                                  
                                <div class="row g-2">                                  
                                    <?php
                                    
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
                                    
                                  <div class="col mb-0">
                                    <label for="AccountDetails" class="form-label">Choose Payment Details</label>
                                    <select name="AccountDetails" id="AccountDetails" class="form-control" required>
                                      <option selected disabled value="">Select Account</option>
                                      <option value="<?php echo"$first_account" ?>"><?php echo"$first_account" ?></option>
                                      <option value="<?php echo"$second_account" ?>"><?php echo"$second_account" ?></option>
                                      <option value="<?php echo"$third_account" ?>"><?php echo"$third_account" ?></option>
                                      <option value="<?php echo"$fourth_account" ?>"><?php echo"$fourth_account" ?></option>
                                      <option value="<?php echo"$fifth_account" ?>"><?php echo"$fifth_account" ?></option>
                                      <option value="<?php echo"$sixth_account" ?>"><?php echo"$sixth_account" ?></option>
                                      <option value="<?php echo"$seventh_account" ?>"><?php echo"$seventh_account" ?></option>
                                    </select>
                                    <span id="BankDetails" class="required"></span> 
                                    <?php $reason = array("invalid_AccountDetailscredential=true" => "<p style='color:red;'>Wrong Account Details</p>"); 
                                    if(isset($_GET['purchaseFailedinvalidAccountDetails'])) echo $reason[$_GET['reason']]; ?>
                                  </div>
                                  
                                  <div class="col mb-0">
                                    <label for="AccountDetails" class="form-label">Choose USDT Network</label>
                                    <select name="network" id="network" class="form-control" required>
                                      <option selected disabled value="">Choose Your USDT Network</option>
                                      <option value="ERC20">ERC20 (ETH)</option>
                                      <option value="TRC20">TRC20 (TRON)</option>
                                      <option value="BEP20">BEP20 (BNB)</option>
                                    </select> 
                                    <span id="network" class="required"></span> 
                                    <?php $reason = array("invalid_networkcredential=true" => "<p style='color:red;'>No choosen network</p>"); 
                                    if(isset($_GET['purchaseFailedinvalidnetwork'])) echo $reason[$_GET['reason']]; ?>
                                  </div>
                                </div>
                                
                                  <div class="col mb-3">
                                    <label for="AccountDetails" class="form-label">Your USDT address</label>
                                    <input type="text" id="address" name="address" class="form-control" Title="Confirm your USDT address and network, error cannot be undone" placeholder="Your USDT address" minlength="26" required/>
                                    <span id="USDTAddress" class="required"></span> 
                                    <span style="color:red">Confirm your USDT address and network, We will not be responsible for funding a wrong account provided by you.</span>
                                     <?php $reason = array("invalid_Addresscredential=true" => "<p style='color:red;'>Your USDT address is required</p>"); 
                                     if(isset($_GET['purchaseFailedinvalidAddress'])) echo $reason[$_GET['reason']]; ?>
                                  </div>
                                
                               <center>
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
                                     
                                    echo "<button type='submit' name='usdtbuy' class='btn btn-primary'>Place Order</button>";
                                 }
                                 }
                                    
                                ?>
                                
                              </div>
                            </form>
                           </div>
                          </div>
                        </div>
                        <!-- Modal 2-->
                        
                        <!-- JS validate input -->
                        <script>
                        function validateusdtbuy() {
                        var AmountInNaira,AmountInUSD,AccountDetails,address,output = true;
                        
                        AmountInNaira = document.frmChange.AmountInNaira;
                        AmountInUSD = document.frmChange.AmountInUSD;
                        AccountDetails = document.frmChange.AccountDetails;
                        address = document.frmChange.address;
                         
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
                        else if(!address.value) {	
                            address.focus();
                        	document.getElementById("USDTAddress").innerHTML = "<p style='color:red; font-size:13px'>Your USDT address is required</p>";
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
    
    <!-- usdt Jquery rate calculator script -->
    <script>
    $('#AmountInNaira, #price').on('input',function() {
        var AmountInNaira = parseInt($('#AmountInNaira').val());
        var price = parseFloat($('#price').val());
        $('#AmountInUSD').val((price / AmountInNaira ? AmountInNaira / price : 0).toFixed(2));  
    }); 
    
    $("form#usdtbuyForm").submit(function(){ // on form submit
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
