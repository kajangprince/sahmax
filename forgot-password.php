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
    <meta name="description" content="Forgot Password, get reset link...">
    <meta name="keywords" content="forgot, password, rest, link, sahmax, optimum, nigeria, limited">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Forgot Password</title>

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

    <style>
      html {
        transition: color 300ms, background-color 300ms;
      }

      html[data-theme='dark'] {
        background: #000;
        filter: invert(1) hue-rotate(180deg)
      }

      html[data-theme='dark'] img {
      filter: invert(1) hue-rotate(180deg)
      }
      </style>

  </head>

  <body>

    <!-- Start of google translator -->
    <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <!-- End of google translator -->            
    
    <!-- Content -->
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Forgot Password -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="back" style=""><center><a href="userdashboard" style="text-decoration:none;"> Back </a></center></div>
              <div class="app-brand justify-content-center">
                <a href="" class="app-brand-link gap-2">
 
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder">Sahmax Optimum</span>
                </a>
              </div>

              <?php

              //error_reporting(0);

              include("config.php");

              //This code runs if the form has been submitted
              if (isset($_POST['submit']))
              {
              
              // check for valid email address
              $email = mysqli_real_escape_string($con,$_POST['email']);
              if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                  $invalid_email = "<div class='' style='font-size:15px;color:red;font-family:monospace;'></div>";
              }
              
              // checks if the email is in use
              $check = mysqli_query($con,"SELECT email FROM users WHERE email = '$email' LIMIT 1");
              $check2 =$check->num_rows;

              mysqli_real_escape_string($con,$email);
              
              
              //if the name exists it gives an error
              if ($check2 == 0) {
                $errormsg = "<div class='' style='font-size:15px;color:green;font-family:monospace;'>You will receive a reset link if this email exist in our system.</div>";
              }else{
                //$successmsg = "<div class='' style='font-size:15px;color:green;font-family:monospace;'>A reset link has been sent to $email</div>";
                $resettoken = substr(md5(uniqid(rand(),1)),3,30);
                $pass = ($resettoken); //encrypted version for database entry
                //insert resettoken code to db column 
                $insert = mysqli_query($con,"UPDATE users SET resettoken = '$resettoken' WHERE email = '$email' LIMIT 1"); 
                {
                $email = "$email";
                $emess = "<html><body>";
                $emess = "<h5 style='font-size:18px'>Hi, please ensure you read and understand the text below.</h5><hr>";
                $emess.= "<p style='color:black; font-size:17px;'>You or someone else have requested for your password and your password reset token is
                <p style='font-size:20px; color:green;'><b>$resettoken</b></p>
                <p style='font-size:17px'>Your password reset token is required in your change password first input field. Copy <br/>
                and paste the reset token on the change password first input field<br/>Following the link below</p>
                <p style='font-size:17px;'><a href='https://www.sahmax.com/passwordresettoken?resettoken=$pass'>Click here to reset your password</a> ensure you 
                have copied your resettoken.<hr><p style='font-size:17px;'><br/> 
                Ignore this message if the request is not from you and use the link below to make your account more secured.<br />
                <p style='font-size:17px;'><a href='https://www.sahmax.com/login'>Click here to login and change your password</a><hr></p></p><br/>
                <a href='https://sahmax.com/#contact-section'>Sahmax Optimum Support</a><hr></p>";
                $emess.= "<h6>&copy; Sahmax Optimum</h6>";
                $emess.= "</body></html>";
                $ehead = "MIME-Version: 1.0" . "\r\n";
                $ehead.= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
                $ehead.= "From: Sahmax Optimum <support@sahmax.com>\r\n".
                        "Reply-To: support@sahmax.com\r\n" .
                        "X-Mailer: PHP/" . phpversion();
                
                $subj = "Sahmax Optimum Password Recovery";
                $mailsend=mail("$email","$subj","$emess","$ehead");
              }                     
            }

            if($mailsend){
              $successmsg = "<div class='' style='font-size:15px;color:green;font-family:monospace;'>You will receive a reset link if this email exist in our system.</div>";
           }
          }
          ?>

              <!-- /Logo -->
              <h4 class="mb-2">Forgot Password? &#128274; </h4>
              <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
              <form method="POST" class="mb-3" action="" onSubmit="return validateemail()" name="frmChange">   
                
              <!-- Not found in db error message -->
              <?php if(isset($errormsg)){ echo $errormsg; }else{ echo "";} ?>

              <!-- Invalid email message -->
              <?php if(isset($invalid_email)){ echo $invalid_email; }else{ echo "";} ?>

              <!-- success message -->
              <?php if(isset($successmsg )){ echo $successmsg ; }else{ echo "";} ?>                      
              
              <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email" autofocus />
                    <span id="email" class="required"></span>
                </div>
                <button type="submit" name="submit" class="btn btn-primary d-grid w-100">Get Reset Link</button>
              </form>
              <div class="text-center">
                <a href="../login" class="d-flex align-items-center justify-content-center">
                  <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                  Back to login
                </a>
              </div>
            </div>
          </div>
          <!-- /Forgot Password -->
        </div>
      </div>
    </div>

    <!-- / Content -->

        <!-- JS script to turn on dark mode -->
        <script>
                        
        const htmlEl = document.getElementsByTagName('html')[0];

        const toggleTheme = (theme) => {
            htmlEl.dataset.theme = theme;
        }

        </script>

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

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
