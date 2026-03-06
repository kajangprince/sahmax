<!DOCTYPE html>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, shrink-to-fit=no, user-scalable=no">
    <meta name="handheldfriendly" content="yes">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="shortcut icon" href="favicon.png" />
    <link rel="manifest" href="/site.webmanifest">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/signuploginstyle.css">

    <style type="text/css">
     #regiration_form fieldset:not(:first-of-type) {
        display: none;
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
   document.getElementById("email").innerHTML = "<span style='color:red; font-size:12px'>Email cannot be empty</span>";
   output = false;
}
if(!password.value){
   password.focus();
   document.getElementById("password").innerHTML = "<span style='color:red; font-size:12px'>Password cannot be empty</span>";
   output = false;
}
return output;
}
</script>

  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem; margin-top:-20px">
            <div class="card-body p-5 text-center">
              <div class="mb-md-5 mt-md-4 pb-0">
                  
                        <noscript>Please turn on javascript in your browser settings to \ have a better view of Firstgradebank features.</noscript>
                    
                    <form action="admin-validation.php" method="POST" class="register-form" name="frmChange" id="formTermsNConditions" onSubmit="return validateForm()" autocomplete="off">
                    <fieldset>
                    <h2 class="fw-bold mb-2 text-uppercase">Admin Login</h2>
                    <br>
                    <!--<form method="POST" class="register-form" name="frmChange" onSubmit="return validateForm()" id="login-form">-->
                    <?php $reason = array("wrong_logincredentials=true" => "<p style='color:red; font-size:12px; margin-top: -30px; margin-bottom: 10px;'>You are not an admin. Contact your webmaster!</p>"); 
                    if(isset($_GET['loginFailed'])) echo $reason[$_GET['reason']]; ?>

                    <!-- SHOW USER CONTACT SUPPORT FOR ACCOUNT NUMBER MESSAGE -->
                    <?php $registerationsuccessfulmsg = array("successfullyregistered=true" => 
                    "<div style='color: #3c763d;background-color: #dff0d8; border-color: #d6e9c6;padding: 15px; margin-bottom: 10px; border: 1px solid transparent; border-radius: 4px;'>                        
                    <strong>Notice:</strong> Client has been successfully registered, ask him or her to login and complete their account registration and to also verify their email.</div>" );                        
                    if(isset($_GET['registerationSuccessful'])) echo $registerationsuccessfulmsg[$_GET['reason']]; ?>
                    
                    <div class="form-group">
                    <p><input type="email" class="form-control" name="email" placeholder="Enter your email">
                    <span id="email" class="required"></span></p>
                    </div>
                    <div class="form-group">
                    <p><input type="password" class="form-control" name="password" placeholder="Password">
                    <span id="password" class="required"></span></p> 
                    </div>
                        <div class="form-group">
                        <label for="termsnconditions" class="label-agree-term"><span><span></span></span>
                        By clicking "Continue" you agree to be admin</label>
                            </div>
                            <br>
                    <input type="submit" name="login" id="signin" class="form-submit btn btn-outline-light btn-md px-5" value="Continue"><br><br>
                </fieldset>
               
                <div>
                <p class="mb-0"><a href="login" class="text-white-50 fw-bold">Client Login</a></p>
              </div>
              </fieldset>
            </form>
           </div>
         </div>
       </div>
    </div>
  </div>
</section>


<script>
  
$(document).ready(function(){
  var current = 1,current_step,next_step,steps;
  steps = $("fieldset").length;
  $(".next").click(function(){
    current_step = $(this).parent();
    next_step = $(this).parent().next();
    next_step.show();
    current_step.hide();
    setProgressBar(++current);
  });
  $(".previous").click(function(){
    current_step = $(this).parent();
    next_step = $(this).parent().prev();
    next_step.show();
    current_step.hide();
    setProgressBar(--current);
  });
  setProgressBar(current);
  // Change progress bar action
  function setProgressBar(curStep){
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
      .css("width",percent+"%")
      .html(percent+"%");   
  }
});
  </script>
</body>
</html>