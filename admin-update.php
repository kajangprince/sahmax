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
    <title>Update Client Info</title>

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
            <li class="menu-item active">
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
            <li class="menu-item">
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
        
        $profile_pic = escape($row['profile_img']);
        
        $phone_number = $row['phone_number'];
        
        $address = $row['address'];
        
        $state = $row['state'];
        
        $city = $row['city'];
        
        $zipcode = $row['zipcode'];
        
        $occupation = $row['occupation'];
        
        $dob = $row['date_of_birth'];
            
        $time =  $row['created_at'];
        $timestamp = strtotime($time);
        $formatted_time = date('d F Y', $timestamp);
                    
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
                      <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-cog me-1"></i> Account</a>
                    </li>
                    <li class="nav-item">
                      <?php echo"<a class='nav-link' href='admin-client-verification?uid=$uid'><i class='bx bx-user'></i>User Verification</a>"; ?>
                    </li>
                    <li class="nav-item">
                      <?php echo"<a class='nav-link' href='admin-message-user?uid=$uid'><i class='bx bx-message'></i>Message User</a>"; ?>
                    </li>
                  </ul>
                  
                 <div class="card mb-4">
                   <h5 class="card-header">Client Image Upload</h5>
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
                    
                    if (isset($_POST["upload"])) {
                        
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
                         
                                 echo "<span style='font-size:15px;color:#FF0000;font-family:monospace;'>Choose image file to upload</span>";
                          
                        }    // Validate file input to check if is with valid extension
                        else if (! in_array($file_extension, $allowed_image_extension)) {
                                
                                 echo "<span style='font-size:15px;color:#FF0000;font-family:monospace;'>Upload valid images. Only PNG and JPEG are allowed</span>";                                
                                
                    
                        }    // Validate image file size
                        else if (($_FILES["file-input"]["size"] > 10000000)) {
                    
                                 echo "<span style='font-size:15px;color:#FF0000;font-family:monospace;'>Image size exceeds 10MB</span>";                                
                    
                        } else {
                            $target = "profilepictures/" . basename($_FILES["file-input"]["name"]);
                            if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)) {
                                
                                $picname = $target;
                            	$updatedp = "UPDATE users SET profile_img = :picname WHERE id = :uid LIMIT 1";
                            	$stmt1 = $con->prepare($updatedp);
                            	$stmt1->bindParam(":picname",$picname);
                            	$stmt1->bindParam(":uid",$uid);
                            	$stmt1->execute();
                    
                                echo "<span style='font-size:15px;color:green;font-family:monospace;'>Account image updated. Refresh or go back a page for changes to take effect.</span>";
                    
                            } else {
                                
                                 echo "<span style='font-size:15px;color:#FF0000;font-family:monospace;'>Problem in uploading image file.</span>";
                            }
                        }
                    }
                    ?>


                         <form action="" method="post" enctype="multipart/form-data">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-image d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                              name="file-input"
                            />
                            <!--<input type="file" class="file-input" name="file-input">-->
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>
                          <button type="submit" name="upload" class="btn btn-outline-primary mb-4">
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Submit</span>
                          </button>

                          <p class="text-muted mb-0">Allowed JPG, PNG. Max upload size 10mb</p>
     
                          </form>

                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                  <div class="card mb-4">
                        
                    <h5 class="card-header">Fill client personal details appropriately</h5>
                    
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="<?php echo "$profile_pic" ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar"
                        />
                        <div class="button-wrapper">

                        <p class="text-muted mb-0" style="font-size:13px; text-transform:capitalize">
                        <?php echo "$firstname" ?> <?php echo "$middlename" ?> <?php echo "$surname" ?>
                        </p>

                          <p class="text-muted mb-0" style="font-size:13px; text-transform:capitalize">
                              <?php 
                              
                              if($email_status == "0"){
                              echo "<span style='text-transform:lowercase'>$email</span> <i class='fa fa-times-circle' style='color:red'></i>"; 
                              }else{ 
                              echo "<span style='text-transform:lowercase'>$email</span> <i class='fa fa-check-circle' style='color:green'></i>";
                              } 
                              
                              ?>
                              
                        </p>
                        
                        <p class="text-muted mb-0" style="font-size:13px; text-transform:capitalize">
                        No: <?php echo "$phone_number" ?> 
                        </p>
                        
                        <p class="text-muted mb-0" style="font-size:13px; text-transform:capitalize">
                        Add: <?php echo "$address" ?> 
                        </p>
                        
                        <p class="text-muted mb-0" style="font-size:13px; text-transform:capitalize">
                        State: <?php echo "$state" ?> 
                        </p>
                        
                        <p class="text-muted mb-0" style="font-size:13px; text-transform:capitalize">
                        City: <?php echo "$city" ?> 
                        </p>
                        
                        <p class="text-muted mb-0" style="font-size:13px; text-transform:capitalize">
                        Zipcode: <?php echo "$zipcode" ?> 
                        </p>
                              
                        <p class="text-muted mb-0" style="font-size:13px; text-transform:capitalize">
                        Occupation: <?php echo "$occupation" ?> 
                        </p>
                        
                        <p class="text-muted mb-0" style="font-size:13px; text-transform:capitalize">
                        DOB: <?php echo "$dob" ?> 
                        </p>
                              
                          <p class="text-muted mb-0" style="font-size:13px">Created at: <?php echo "$formatted_time"; ?></p>
                          
                            <!-- SHOW registeration SUCCESSFUL MESSAGE -->
                            <?php $registerationsuccessfulmsg = array("successfullyregistered=true" => 
                            "<div style='color: #3c763d;background-color: #dff0d8; border-color: #d6e9c6;padding: 15px; margin-bottom: -60px; border: 1px solid transparent; border-radius: 4px;'>                        
                            <a href='#' style='text-decoration: none; float: right; font-size: 21px; font-weight: 700; line-height: 1; color: #000; text-shadow: 0 1px 0 #fff; filter: alpha(opacity=20); opacity: .2;' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Submitted!</strong> we have received your personal data.<br></div>" );                        
                            if(isset($_GET['registrationationSuccessful'])) echo $registerationsuccessfulmsg[$_GET['reason']]; ?>

                        </div>
                      </div>
                    </div>
                    
                    
                <?php 

                include_once("pdoconfig.php");
                
                if(isset($_GET['uid'])){
                    $uid = $_GET['uid'];
                }
                
                if(isset($_POST['submit'])){
                
                $dob = $_POST['dob'];
                $phonenumber = $_POST['phonenumber'];
                $address = strtolower($_POST['address']);
                $state = strtolower($_POST['state']);
                $city = strtolower($_POST['city']);
                $zipcode = $_POST['zipcode'];
                $occupation = strtolower($_POST['occupation']);
                $uid = $uid;

$error = false;
            if(!isset($dob) || trim($dob) == '') {
            echo"<div class='alert alert-danger'>You cannot submit empty DOB</div>";
            $error = true;			
			}
            if(!isset($phonenumber) || trim($phonenumber) == '') {
              echo"<div class='alert alert-danger'>Phone number is required</div>";  
            $error = true;			
			}
            if(!isset($address) || trim($address) == '') {
               echo"<div class='alert alert-danger'>Address is required</div>";
            $error = true;			
			}
            if(!isset($state) || trim($state) == '') {
               echo"<div class='alert alert-danger'>State is required</div>";
            $error = true;			
			}
			if(!isset($city) || trim($city) == '') {
               echo"<div class='alert alert-danger'>City is required</div>";
            $error = true;			
			}
			if(!isset($zipcode) || trim($zipcode) == '') {
               echo"<div class='alert alert-danger'>Zip code is required</div>";
            $error = true;			
			}
			if(!isset($occupation) || trim($occupation) == '') {
               echo"<div class='alert alert-danger'>Occupation is required</div>";
            $error = true;			
			}

			if(!$error){
                
                    $reg1 = "UPDATE users SET date_of_birth = :dob, phone_number = :phonenumber, address = :address,
                    state = :state, city = :city, zipcode = :zipcode, occupation = :occupation WHERE id = :uid LIMIT 1";	
                  
                    $stmt = $con->prepare($reg1);
                    $stmt->bindParam(":dob",$dob);
                    $stmt->bindParam(":phonenumber",$phonenumber);
                    $stmt->bindParam(":address",$address);
                    $stmt->bindParam(":state",$state);
                    $stmt->bindParam(":city",$city);
                    $stmt->bindParam(":zipcode",$zipcode);			
                    $stmt->bindParam(":occupation",$occupation);				
                    $stmt->bindParam(":uid",$uid);			
                    $stmt->execute();

                    if($reg1){
                   echo"<div class='alert alert-success'>Form submitted successfully</div>";
                }else{
                   echo"<div class='alert alert-danger'>Error in form submission</div>";
                }
            }
            
        }
            

?>
                    
                    
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" action="" onsubmit="return true">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input class="form-control" type="text" value="<?php echo"$firstname" ?>" disabled/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Middle Name</label>
                            <input class="form-control" type="text" value="<?php echo"$middlename" ?>" disabled/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Surname</label>
                            <input class="form-control" type="text" value="<?php echo"$surname" ?>" disabled/>
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label for="dob" class="form-label">Date of birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" placeholder="D.O.B" />
                            <!-- dob error -->
                            <?php $emptydobmsg = array("empty_dobcredential=true" => 
                            "<div style='color:red'>Oops! this field is <strong>required</strong><br></div>" );                        
                            if(isset($_GET['registrationFaileddob'])) echo $emptydobmsg[$_GET['reason']]; ?>  
                         </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                              <!--<span class="input-group-text">US (+1)</span>-->
                              <input
                                type="tel"
                                id="phoneNumber"
                                name="phonenumber"
                                class="form-control"
                                maxlength="20";
                                onkeypress="return isNumberKey(event)"
                                placeholder="Phone number"
                              />
                            </div>

                            <!-- phone number error -->
                            <?php $emptyfieldmsg = array("empty_phonenumbercredential=true" => 
                            "<div style='color:red'>Oops! this field is <strong>required</strong><br></div>" );                        
                            if(isset($_GET['registrationFailedphonenumber'])) echo $emptyfieldmsg[$_GET['reason']]; ?>  

                            <!-- prevent user from entering numbers in phone number field -->
                            <script>

                            function isNumberKey(evt){
                                var charCode = (evt.which) ? evt.which : evt.keyCode
                                if (charCode > 31 && (charCode < 48 || charCode > 57))
                                    return false;
                                return true;
                            }

                            </script>

                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
                            <!-- address error -->
                            <?php $emptyfieldmsg = array("empty_addresscredential=true" => 
                            "<div style='color:red'>Oops! this field is <strong>required</strong><br></div>" );                        
                            if(isset($_GET['registrationFailedaddress'])) echo $emptyfieldmsg[$_GET['reason']]; ?>   
                         </div>
                          <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state" 
                            placeholder="Enter state" />
                            <!-- state error -->
                            <?php $emptyfieldmsg = array("empty_statecredential=true" => 
                            "<div style='color:red'>Oops! this field is <strong>required</strong><br></div>" );                        
                            if(isset($_GET['registrationFailedstate'])) echo $emptyfieldmsg[$_GET['reason']]; ?>   
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City" />
                            <!-- city error -->
                            <?php $emptyfieldmsg = array("empty_citycredential=true" => 
                            "<div style='color:red'>Oops! this field is <strong>required</strong><br></div>" );                        
                            if(isset($_GET['registrationFailedcity'])) echo $emptyfieldmsg[$_GET['reason']]; ?>   
                        </div>
                          <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">Zip code</label>
                            <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zip code" />
                            <!-- zip code error -->
                            <?php $emptyfieldmsg = array("empty_zipcodecredential=true" => 
                            "<div style='color:red'>Oops! this field is <strong>required</strong><br></div>" );                        
                            if(isset($_GET['registrationFailedzipcode'])) echo $emptyfieldmsg[$_GET['reason']]; ?>  
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="occupation">Occupation</label>
                            <select id="occupation" name="occupation" class="select2 form-select">
                              <option value="">Select type of occupation</option>                       
                              <option value="student">Student</option>
                              <option value="employed">Employed</option>      
                              <option value="self employed">Self-employed</option>
                            </select>
                            <!-- occupation error -->
                            <?php $emptyfieldmsg = array("empty_occupationcredential=true" => 
                            "<div style='color:red'>Oops! this field is <strong>required</strong><br></div>" );                        
                            if(isset($_GET['registrationFailedoccupation'])) echo $emptyfieldmsg[$_GET['reason']]; ?>   
                          </div>
                        <div class="mt-2">
                          <button type="submit" name="submit" class="btn btn-primary me-2">Submit form</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                      </form>
                      </div>
                      </div>
                    </div>
                    <!-- /Account -->
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