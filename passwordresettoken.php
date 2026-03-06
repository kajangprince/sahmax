<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
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
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Password Reset</title>

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

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>

</head>
<body> 
 
 <?php

	include("config.php");

	if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	if ($_POST["password"] === $_POST["cpassword"]) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	}else{
	   $unmatchedPasswordError = "<div class='' style='font-size:15px;color:red;font-family:monospace;'>New and Retype password must match</div>";
	}

	$resettoken = $_POST['resettoken'];
    $sql = mysqli_query($con,"SELECT email,resettoken FROM users WHERE email = '$email' AND resettoken = '$resettoken' LIMIT 1");
    $row = mysqli_num_rows($sql);
    if($row == 1){
        $null = NULL;
        $insert = mysqli_query($con,"UPDATE users SET password = '$password',resettoken = '$null' WHERE email = '$email' LIMIT 1"); 
        
        $successmsg = "<div class='' style='font-size:15px;color:green;font-family:monospace;'>Password Changed</div>";
    }else{
        $errormsg = "<div class='' style='font-size:15px;color:red;font-family:monospace;'>Failed to update password</div>";
    }
	}
?>
 
    <!-- Content -->
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="back" style=""><center><a href="userdashboard" style="text-decoration:none;"> Back </a></center></div>
              <div class="app-brand justify-content-center">
                <a href="userdashboard" class="app-brand-link gap-2">
                  <span class="app-brand-text demo text-body fw-bolder">Sahmax Optimum</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Password Reset! &#128274;</h4>
               <form name="frmChange" method="POST" action="" onSubmit="return validateForm()">
                   
                <!-- Failed to update password error message -->
                <?php if(isset($errormsg)){ echo $errormsg; }else{ echo "";} ?>
                
                <!-- unmatched passwords error message -->
                <?php if(isset($unmatchedPasswordError)){ echo $unmatchedPasswordError; }else{ echo "";} ?>
                
                <!-- unmatched passwords error message -->
                <?php if(isset($successmsg)){ echo $successmsg; }else{ echo "";} ?>
                
                <div class="mb-3">
                  <label for="email" class="form-label">Reset Token</label>
                  <input type="text" name="resettoken" class="form-control" placeholder="Reset Token" title="Enter Reset Token" required>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Email</label>
                  </div>
                  <div class="input-group input-group-merge">
                      <input type="email" name="email" placeholder="Type your email" class="form-control" required>
                  </div>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">New Password</label>
                    <?php if(isset($new_password_match_with_old)) { echo $new_password_match_with_old; } ?>
                     <?php if(isset($passtooshortmessage)) { echo $passtooshortmessage; } ?>
                  </div>
                  <div class="input-group input-group-merge">
                      <input type="password" name="password" pattern=".{6,}" title="Choose 6 or more characters" 
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" class="form-control aria-describedby="password"required>
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Retype password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input type="password" name="cpassword" pattern=".{6,}" title="Please retype your password" 
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" class="form-control" aria-describedby="password" required>
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit" name="submit">Change Password</button>
                </div>
              </form>

            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->
    
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


</body>
</html>