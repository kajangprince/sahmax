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
    <title>MyProfile</title>

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
            <li class="menu-item active">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Account Settings</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="account-settings.php" class="menu-link">
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
                      <img src="../assets/img/avatars/2.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/2.png" alt class="w-px-40 h-auto rounded-circle" />
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
                   <!-- <li>
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-cog me-1"></i> Account</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="myprofile"
                        ><i class="bx bx-user me-1"></i> Profile</a
                      >
                    </li>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="verification"
                        ><i class="bx bx-user-circle"></i> Verification</a
                      >
                    </li>
                  </ul>
                  <div class="card mb-4">
                        
                    <h5 class="card-header">Help us fill your personal details</h5>
                    
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="<?php echo "$profile_pic" ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar"
                        />
                        <div class="button-wrapper">
                        <p class="text-muted mb-0" style="font-size:13px; text-transform:capitalize">
                        <?php echo "$firstname" ?> <?php echo "$middlename" ?> <?php echo "$surname" ?>
                        </p>

                          <p class="text-muted mb-0" style="font-size:13px; text-transform:capitalize"><?php echo "$email"; ?></p>
                          <p class="text-muted mb-0" style="font-size:13px; text-transform:capitalize">Default currency: Naira &#8358;</p>
                          
                            <!-- SHOW registeration SUCCESSFUL MESSAGE -->
                            <?php $registerationsuccessfulmsg = array("successfullyregistered=true" => 
                            "<div style='color: #3c763d;background-color: #dff0d8; border-color: #d6e9c6;padding: 15px; margin-bottom: -60px; border: 1px solid transparent; border-radius: 4px;'>                        
                            <a href='#' style='text-decoration: none; float: right; font-size: 21px; font-weight: 700; line-height: 1; color: #000; text-shadow: 0 1px 0 #fff; filter: alpha(opacity=20); opacity: .2;' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Submitted!</strong> we have received your personal data.<br></div>" );                        
                            if(isset($_GET['registrationationSuccessful'])) echo $registerationsuccessfulmsg[$_GET['reason']]; ?>
                            
                            <!-- something went wrong error -->
                            <?php $somethingwentwrongmsg = array("unknownerror=true" => 
                            "<div style='color: #FF0000;background-color: #f8d7da; border-color: #d6e9c6;padding: 15px; margin-bottom: -60px; border: 1px solid transparent; border-radius: 4px;'>                        
                            <a href='#' style='text-decoration: none; float: right; font-size: 21px; font-weight: 700; line-height: 1; color: #000; text-shadow: 0 1px 0 #fff; filter: alpha(opacity=20); opacity: .2;' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Oops!</strong> System error occured<br></div>" );                        
                            if(isset($_GET['somethingwentwrong'])) echo $somethingwentwrongmsg[$_GET['reason']]; ?>
                            
                            <!-- cant edit verified profile error -->
                            <?php $somethingwentwrongmsg = array("cantedit=true" => 
                            "<div style='color: #FF0000;background-color: #f8d7da; border-color: #d6e9c6;padding: 15px; margin-bottom: -60px; border: 1px solid transparent; border-radius: 4px;'>                        
                            <a href='#' style='text-decoration: none; float: right; font-size: 21px; font-weight: 700; line-height: 1; color: #000; text-shadow: 0 1px 0 #fff; filter: alpha(opacity=20); opacity: .2;' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Oops!</strong> Verified profiles can't be edited<br></div>" );                        
                            if(isset($_GET['somethingwentwrong'])) echo $somethingwentwrongmsg[$_GET['reason']]; ?>

                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" action="account-settings-validation.php" onsubmit="return true">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input class="form-control" type="text" name="firstname" placeholder="<?php echo"$firstname" ?>"/>
                            <!-- firstname error -->
                            <?php $emptyfirstnamemsg = array("empty_firstnamecredential=true" => 
                            "<div style='color:red'>Oops! this field is <strong>required</strong><br></div>" );                        
                            if(isset($_GET['registrationFailedfirstname'])) echo $emptyfirstnamemsg[$_GET['reason']]; ?>  
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Middle Name</label>
                            <input class="form-control" type="text" name="middlename" placeholder="<?php echo"$middlename" ?>"/>
                            <!-- middlename error -->
                            <?php $emptymiddlenamemsg = array("empty_middlenamecredential=true" => 
                            "<div style='color:red'>Oops! this field is <strong>required</strong><br></div>" );                        
                            if(isset($_GET['registrationFailedmiddlename'])) echo $emptymiddlenamemsg[$_GET['reason']]; ?>  
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Surname</label>
                            <input class="form-control" type="text" name="surname" placeholder="<?php echo"$surname" ?>"/>
                            <!-- surname error -->
                            <?php $emptysurnamemsg = array("empty_surnamecredential=true" => 
                            "<div style='color:red'>Oops! this field is <strong>required</strong><br></div>" );                        
                            if(isset($_GET['registrationFailedsurname'])) echo $emptysurnamemsg[$_GET['reason']]; ?> 
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
                          <button type="submit" class="btn btn-primary me-2">Submit form</button>
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
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  Copyright &copy;
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  </script>, Sahmax Optimum     
                </div>
                <div>                 
                  <a href="javascript:void(0);" class="footer-link me-4">Zone 9, Beside CAC church, Dada Estate, Osogbo</a>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

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