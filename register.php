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
    <meta name="description" content="Create account on Sahmax Optimum Nigeria Limited...">
    <meta name="keywords" content="Signup, create account">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <title>Create Account | Sahmax</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/signup-loginstyle.css">
</head>
<body>

<script>
function validatePassword() {
var firstname,middlename,surname,password,cpassword,email,output = true;

firstname = document.frmChange.firstname;
middlename = document.frmChange.middlename;
surname = document.frmChange.surname;
password = document.frmChange.password;
cpassword = document.frmChange.cpassword;
email = document.frmChange.email;

if(!firstname.value) {
    firstname.focus();
	document.getElementById("firstname").innerHTML = "<p style='color:red; font-size:13px'>First name cannot be empty</p>";
    output = false;
}
else if(!middlename.value) {	
    middlename.focus();
	document.getElementById("middlename").innerHTML = "<p style='color:red; font-size:13px'>Middlename cannot be empty</p>";
	output = false;
}
else if(!surname.value) {	
    surname.focus();
	document.getElementById("surname").innerHTML = "<p style='color:red; font-size:13px'>Surname cannot be empty</p>";
	output = false;
}
else if(!password.value) {
	password.focus();
	document.getElementById("password").innerHTML = "<p style='color:red; font-size:13px'>Password cannot be empty</p>";
	output = false;
}
else if(!cpassword.value) {
	cpassword.focus();
	document.getElementById("cpassword").innerHTML = "<p style='color:red'>Confirm password cannot be empty</p>";
	output = false;
}
if(password.value != cpassword.value) {
	password.value="";
	cpassword.value="";
	password.focus();
	document.getElementById("cpassword").innerHTML = "<p style='color:red; font-size:13px'>Cpassword does not match with your password</p>";
	output = false;
} 	
else if(!email.value) {
	email.focus();
	document.getElementById("email").innerHTML = "<p style='color:red; font-size:13px'>Email cannot be empty</p>";
	output = false;
}  
return output;
}
</script>


    <div class="main">

        <!-- Sign up form -->
        <section class="signup" style="margin-top:-120px">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Create Account</h2>
                        <form method="POST" action="registration.php" name="frmChange" id="formTermsNConditions" onSubmit="return validatePassword()" class="register-form" >
                    
                    	<?php $unknownerror = array("unknownerror=true" => "<p style='color:red; margin-top:0px; margin-bottom:10px;'>Unknown error occured</p>"); 
                        if(isset($_GET['registerFailed'])) echo $unknownerror[$_GET['reason']]; ?>                      
                    
                        <?php $reason = array("empty_firstnamecredential=true" => "<p style='color:red;'>First name cannot be empty</p>"); 
                        if(isset($_GET['registerFailedfirstname'])) echo $reason[$_GET['reason']]; ?>
                        
                        <?php $reason = array("invalid_firstnamecredential=true" => "<p style='color:red;'>Type your firstname without spaces</p>"); 
                        if(isset($_GET['registerFailedinvalidfirstname'])) echo $reason[$_GET['reason']]; ?>
                            
                            <span id="firstname" class="required"></span> 
                            <div class="form-group">
                                <label><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="firstname" placeholder="First name" />
                            </div>                            
                            <span id="middlename" class="required"></span> 
                            <?php $reason = array("invalid_middlenamecredential=true" => "<p style='color:red;'>Type your middlename without spaces</p>"); 
                             if(isset($_GET['registerFailedinvalidmiddlename'])) echo $reason[$_GET['reason']]; ?>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="middlename" placeholder="Middle name" />
                            </div>              
                           <?php $reason = array("invalid_surnamecredential=true" => "<p style='color:red;'>Type your surname without spaces</p>"); 
                           if(isset($_GET['registerFailedinvalidsurname'])) echo $reason[$_GET['reason']]; ?>
                            <span id="surname" class="required"></span>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="surname" placeholder="Surname" />
                            </div>
                                                       
                            <?php $InvalidEmailmsg = array("invalidemailexist=true" => "<span class='' style='color:red; margin-top:0px; margin-bottom:10px;'>
                            Email already exist. Please choose a different email</span>"); 
                            if(isset($_GET['registerUnsuccessfulEmailexist'])) echo $InvalidEmailmsg[$_GET['reason']]; ?>

                            <?php $InvalidEmailmsg = array("invalidemail=true" => "<p style='color:red; margin-top:0px; margin-bottom:10px;'>Invalid Email Address</p>"); 
                            if(isset($_GET['registerUnsuccessfulEmail'])) echo $InvalidEmailmsg[$_GET['reason']]; ?>
                            <span id="email" class="required"></span>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" placeholder="Your Email" />
                            </div>

                            <!-- RETURN PASSWORD ERROR MESSAGE IF ANY -->
                            <?php $InvalidPasswordmsg = array("invalidpasswordl=true" => "<span class='' style='color:red; margin-top:0px; margin-bottom:10px;'>
                            Password must contain 8 or more characters</span>" ); 
                            if(isset($_GET['registerUnsuccessfulPasswordl'])) echo $InvalidPasswordmsg[$_GET['reason']]; ?>
                            <span id="password" class="required"></span>  
                            <div class="form-group">
                                <label><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" placeholder="Password" />
                            </div>                
                            <?php $reason = array("empty_Passwordcredential=true" => "<p style='color:red; margin-top: -30px; margin-bottom: 10px;'>Cpassword must match with password</p>"); 
                            if(isset($_GET['registerFailedPassword'])) echo $reason[$_GET['reason']]; ?>  
                            
                            <?php $InvalidPasswordmsg = array("emptypassword=true" => "<span class='' style='color:red; margin-top:0px; margin-bottom:10px;'>
                            Password must contain 6 or more characters</span>" ); 
                            if(isset($_GET['registerUnsuccessfulemptyPassword'])) echo $InvalidPasswordmsg[$_GET['reason']]; ?>
                            
                            <?php $InvalidPasswordmsg = array("unmatchedpasswordl=true" => "<span class='' style='color:red; margin-top:0px; margin-bottom:10px;'>
                            Password and Retype password must match</span>" ); 
                            if(isset($_GET['registerUnsuccessfulUnmatchedPassword'])) echo $InvalidPasswordmsg[$_GET['reason']]; ?>
                            <span id="cpassword" class="required"></span>                                               
                            <div class="form-group">
                                <label><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="cpassword" placeholder="Repeat your password" />
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
                            
                            <!-- div to show reCAPTCHA -->
                            <div class="g-recaptcha" data-sitekey="6Le-VWQoAAAAAOoPNhIzOh_9orqHUN1m7g3UhhOI"></div> 
                            <br>
                            <?php $reason = array("reCAPTACHA_issue=true" => "<p style='color:red; font-size:13px; margin-top: -25px;'>Error in Google reCAPTACHA!</p>"); 
                            if(isset($_GET['registerationFailed'])) echo $reason[$_GET['reason']]; ?>
                            
                            <div class="form-group form-button">
                                <!--<input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>-->
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Submit"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signin-image.jpg" alt="sign up image"></figure>
                        <a href="login" class="signup-image-link">I am already a member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
</body>
</html>