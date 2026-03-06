<?php
session_start();
// on login screen, redirect to dashboard if already logged in
if(isset($_SESSION['email'])){
    header("location:./userdashboard");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, shrink-to-fit=no, user-scalable=no">
    <meta name="handheldfriendly" content="yes">
    <meta name="description" content="Login Sahmax Optimum Nigeria Limited">
    <meta name="keywords" content="login, account, signin">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <title>Login | Sahmax Optimum Nigeria Limted</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/signup-loginstyle.css">

    <style>
     .dark-mode {
      background: #000;
      filter: invert(1) hue-rotate(180deg)
   }
   </style>

</head>
<body>


<script>
function validateForm(){
var email,password,output = true;
	
email = document.frmChange.email;
password = document.frmChange.password;

if(!email.value){
   email.focus();
   document.getElementById("email").innerHTML = "<p style='color:red; font-size:12px'>Account number cannot be empty</p>";
   output = false;
}
if(!password.value){
   password.focus();
   document.getElementById("password").innerHTML = "<p style='color:red; font-size:12px'>Password cannot be empty</p>";
   output = false;
}
return output;
}
</script>

    <div class="main">

        <!-- Sign in  Form -->
        <section class="sign-in" style="margin-top:-120px">
            <div class="container">

                <!-- SHOW registeration SUCCESSFUL MESSAGE -->
                <?php $registerationsuccessfulmsg = array("successfullyregistered=true" => 
                "<div style='color: #3c763d;background-color: #dff0d8; border-color: #d6e9c6;padding: 15px; margin-bottom: -60px; border: 1px solid transparent; border-radius: 4px;'>                        
                <a href='#' style='text-decoration: none; float: right; font-size: 21px; font-weight: 700; line-height: 1; color: #000; text-shadow: 0 1px 0 #fff; filter: alpha(opacity=20); opacity: .2;' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Verify!</strong> Help us verify your email, a link has been sent to you.<br></div>" );                        
                if(isset($_GET['registerationSuccessful'])) echo $registerationsuccessfulmsg[$_GET['reason']]; ?>

                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sign up image"></figure>
                        <a href="register" class="signup-image-link">Create Account</a>
                    </div>

                    <div class="signin-form">
                       
                       <h2 class="form-title">Sign-In</h2>
                        <div class="alert-alert-success">Welcome to Sahmax Optimum Nigeria Limited, kindly login to enjoy the best market rates.</div><br>
                        <div class="alert alert-danger"><noscript>Please turn on javascript in your browser settings to \
                        have a better view of Sahmax Optimum Nigeria Limited features.</noscript></div>
                        
                        <form action="validation.php" method="POST" class="register-form" name="frmChange" id="formTermsNConditions" onSubmit="return validateForm()" autocomplete="off">
                        <!--<form method="POST" class="register-form" name="frmChange" onSubmit="return validateForm()" id="login-form">-->
                        <?php $reason = array("wrong_logincredentials=true" => "<p style='color:red; font-size:12px; margin-top: -30px; margin-bottom: 10px;'>wrong email or password!</p>"); 
                        if(isset($_GET['loginFailed'])) echo $reason[$_GET['reason']]; ?>
                        
                        <?php $reason = array("deactivatedaccount=true" => "<p style='color:red; font-size:12px; margin-top: -30px; margin-bottom: 10px;'>Account deactivated! Contact support via live chat.</p>"); 
                        if(isset($_GET['loginFailed'])) echo $reason[$_GET['reason']]; ?>

                        <!-- SHOW USER CONTACT SUPPORT FOR ACCOUNT NUMBER MESSAGE -->
                        <?php $registerationsuccessfulmsg = array("successfullyregistered=true" => 
                        "<div style='color: #3c763d;background-color: #dff0d8; border-color: #d6e9c6;padding: 15px; margin-bottom: 10px; border: 1px solid transparent; border-radius: 4px;'>                        
                        <strong>Notice:</strong> Login and complete your account registration.</div>" );                        
                        if(isset($_GET['registerationSuccessful'])) echo $registerationsuccessfulmsg[$_GET['reason']]; ?>

                        <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" placeholder="Enter your email" required/>
                                <span id="email" style='color:red' class="required"></span>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" placeholder="Password" required/>
                                <span id="password" style='color:red' class="required"></span>
                            </div>

                            <!-- Jquery -->
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                            <!-- Dont submit form if checkmark not marked -->
                            <script>

                            $( '#formTermsNConditions' ).on('submit', function(e) {
                            if($( 'input[name^="termsnconditions"]:checked' ).length === 0) {
                                alert( 'You did not accept our Terms of Service' );
                                e.preventDefault();
                            }
                            });

                            </script>
                            <div class="form-group">
                                <input type="checkbox" name="termsnconditions" id="termsnconditions" class="agree-term" />
                                <label for="termsnconditions" class="label-agree-term"><span><span></span></span>
                                By clicking "Continue" you agree to our <a href="terms" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group">
                                <label for="termsnconditions" class="label-agree-term"><span><span></span></span>
                                <a href="forgot-password" class="term-service">Reset password</a></label>
                            </div>                            
                    
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="signin" class="form-submit" value="Continue"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

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


    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/signup-loginmain.js"></script>
</body>
</html>