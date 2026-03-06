<?php

session_start();
if(!isset($_SESSION['email'])){
	header("location:./login");
}

?>


    <?php
    
    	include("pdoconfig.php");
    
    	if(isset($_POST['update'])){
        $email = $_SESSION['email'];
    	$result = $con->prepare("SELECT id,email,password from users WHERE email = :email LIMIT 1");	
    	$result->execute(array('email' => $email));
    	$result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $id = $row['id'];	
        $email = $row['email'];	
        $password = $row['password'];	
        $currentPassword = $_POST['currentPassword'];	
    		
    	$pass = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    	
    if(strlen($_POST['confirmPassword'])<6){
    	$passtooshortmessage = "<p style='color:red;'>New Password and Confirm Password must be more than 6 characters</p>";
    }
    
    if(strlen($_POST['newPassword'])<6){
    	$passtooshortmessage = "<p style='color:red;'>New Password and Confirm Password must be more than 6 characters</p>";
    }else{
    	//SHOW ERROR IF NEW PASSWORD MATCHES WITH OLD PASSWORD IN DB
    if(password_verify($_POST['newPassword'], $row['password'])){
    	$new_password_match_with_old = "<p style='color:red;'>You are using this password already. Please change to a new password</p>";
    }else{	
    	//GRANT ACCESS IF CURRENT PASSWORD MATCHES WITH OLD PASSWORD IN DB
    	if(password_verify($_POST['currentPassword'], $row['password'])){
    	$changepassword = "UPDATE users SET password = :pass WHERE email = :email LIMIT 1";
    	$stmt1 = $con->prepare($changepassword);
    	$stmt1->bindParam(":pass",$pass);
    	$stmt1->bindParam(":email",$email);
    	$stmt1->execute();
    $email = "$email";
    $emess = "<html><body>";
    $emess = "<h5 style='font-size:18px'>Hi $email, You've got an urgent notification.</h5><hr>";  
    $emess.= "<p style='color:black; font-size:14px;'>Your Sahmax Optimum password has just been changed,
    please ignore this message if this action is from you.<br/> 
    Quickly use the link below and request for a new password if this action is not from you.<br/>
    <a href='https://www.sahmax.com/change-password'>Click here to secure your account</a><hr>
    <br><hr></p>";
    $emess.= "</body></html>";
    $ehead = "MIME-Version: 1.0" . "\r\n";
    $ehead.= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $ehead.= "From: Sahmax Optimum <support@sahmax.com>\r\n".
             "Reply-To: ".$email."\r\n" .
             "X-Mailer: PHP/" . phpversion();
     
    $subj = "Sahmax Optimum Password Change";
    $mailsend=mail("$email","$subj","$emess","$ehead");
    
    	 $message = "<p style='color:green;'>Your password has been changed successfully</p>";
    
    }else{
    $email = $_SESSION['email'];
    $email = "$email";
    $emess = "<html><body>";
    $emess = "<h5 style='font-size:18px'>Hi $email.</h5><hr>"; 
    $emess.= "<p style='color:black; font-size:14px;'>You or someone else is trying to change your Sahmax Optimum account password.<br/> 
     Quickly login to your account and make your password more secure.
     Please ignore this messsage if the password change action is from you.<br/>
    <a href='https://www.sahmax.com/change-password'>Click here to secure your account</a><hr>
    <br><hr></p>";
    $emess.= "</body></html>";
    $ehead = "MIME-Version: 1.0" . "\r\n";
    $ehead.= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $ehead.= "From: Sahmax Optimum <support@sahmax.com>\r\n".
             "Reply-To: noreply@sahmax.com\r\n" .
             "X-Mailer: PHP/" . phpversion();
     
    $subj = "Sahmax Optimum Password Change Error";
    $mailsend = mail("$email","$subj","$emess","$ehead");
    $message = "<p style='color:red;'>Your current password is incorrect</p>";
    }
    }
    }
    }
    }
    $con = null;
    ?>
    
<?php $email = $_SESSION['email']; ?>

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
    <meta name="description" content="Account profile, details, information...">
    <meta name="keywords" content="dashboard, user">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Password Change</title>

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

<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "<p style='color:red'>Current password cannot be empty</p>";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "<p style='color:red'>New password cannot be empty</p>";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "<p style='color:red'>Confirm password cannot be empty</p>";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "<p style='color:red'>Your new password does not match with your confirm password</p>";
	output = false;
} 	
return output;
}
</script>

<body> 
 
 
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
              <h4 class="mb-2">Change password! &#128274;</h4>
               <form name="frmChange" method="POST" action="" onSubmit="return validatePassword()">
               <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
                <div class="mb-3">
                  <label for="email" class="form-label">Password</label>
                  <input type="password" name="currentPassword" class="form-control" pattern=".{6,}" placeholder="Current password" title="Current password" required>
            	  <span id="currentPassword" class="required"></span>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">New Password</label>
                    <?php if(isset($new_password_match_with_old)) { echo $new_password_match_with_old; } ?>
                     <?php if(isset($passtooshortmessage)) { echo $passtooshortmessage; } ?>
                  </div>
                  <div class="input-group input-group-merge">
                      <input type="password" name="newPassword" pattern=".{6,}" title="Choose 6 or more characters" 
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" class="form-control aria-describedby="password"required>
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    <span id="newPassword" class="required"></span>
                  </div>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Retype password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input type="password" name="confirmPassword" pattern=".{6,}" title="Please retype your password" 
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" class="form-control" aria-describedby="password" required>
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    <span id="confirmPassword" class="required"></span>
                  </div>
                </div>
                <div class="mb-3">
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit" name="update">Change Password</button>
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