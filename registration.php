<?php 

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";

include_once("pdoconfig.php");


    // Storing google recaptcha response
    // in $recaptcha variable
    $recaptcha = $_POST['g-recaptcha-response'];
  
    // Put secret key here, which we get
    // from google console
    $secret_key = '6Le-VWQoAAAAAOj7-XM9vdlTAkhZuJCJstIytnMk';
  
    // Hitting request to the URL, Google will
    // respond with success or error scenario
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
          . $secret_key . '&response=' . $recaptcha;
  
    // Making request to verify captcha
    $response = file_get_contents($url);
  
    // Response return by google is in
    // JSON format, so we have to parse
    // that json
    $response = json_decode($response);
  
    // Checking, if response is true or not
    if ($response->success == true) {
        echo"";
    } else {
        die(header("location:./register?registerationFailed=true&reason=reCAPTACHA_issue=true"));
        //echo '<script>alert("Error in Google reCAPTACHA")</script>';
    }


if(ctype_alpha($_POST['firstname'])){
    $firstname = strtolower($_POST['firstname']);
}else{ 
    die(header("location:./register?registerFailedinvalidfirstname=true&reason=invalid_firstnamecredential=true"));
    $error = true;			
}

if(ctype_alpha($_POST['middlename'])){
    $middlename = strtolower($_POST['middlename']);
}else{ 
    die(header("location:./register?registerFailedinvalidmiddlename=true&reason=invalid_middlenamecredential=true"));
    $error = true;			
}

if(ctype_alpha($_POST['surname'])){
    $surname = strtolower($_POST['surname']);
}else{ 
    die(header("location:./register?registerFailedinvalidsurname=true&reason=invalid_surnamecredential=true"));
    $error = true;			
}

// check for valid email address
$email = strtolower($_POST['email']);
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){	
	die(header("location:./register?registerUnsuccessfulEmail=true&reason=invalidemail=true"));
	die();
}else{
	$email = strtolower($_POST['email']);	
}

if(empty($_POST['password'])){
    die(header("location:./register?registerUnsuccessfulemptyPassword=true&reason=emptypassword=true"));
}

if ($_POST["password"] === $_POST["cpassword"]) {
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
}elseif(strlen($_POST['password'])<6){
	die(header("location:./register?registerUnsuccessfulPasswordl=true&reason=invalidpasswordl=true"));
}else{
	die(header("location:./register?registerUnsuccessfulUnmatchedPassword=true&reason=unmatchedpasswordl=true"));
}

$pin_code = mt_rand(1111,9999); //crerate 4 digit random number

$verification_code = substr(md5(uniqid(rand(),1)),3,30);


$error = false;
            if(!isset($firstname) || trim($firstname) == '') {
                die(header("location:./register?registerFailedfirstname=true&reason=empty_firstnamecredential=true"));
                die();
            $error = true;			
			}
            if(!isset($middlename) || trim($middlename) == '') {
                die(header("location:./register?registerFailedmiddlename=true&reason=empty_middlenamecredential=true"));
                die();
            $error = true;			
			}
            if(!isset($surname) || trim($surname) == '') {
                die(header("location:./register?registerFailedsurname=true&reason=empty_surnamecredential=true"));
                die();
            $error = true;			
			}
            if(!isset($password) || trim($password) == '') {
				die(header("location:./register?registerFailedPassword=true&reason=empty_Passwordcredential=true"));
				die();
            $error = true;			
			}
			if(!isset($email) || trim($email) == '') {
				die(header("location:./register?registerFailedEmail=true&reason=empty_Emailcredential=true"));
				die();
            $error = true;			
			}

			if(!$error){
                $sql = $con->prepare("SELECT email FROM users WHERE email = :email");
                $sql->execute(array('email' => $email));
                if($sql->rowCount() > 0){
                $row = $sql->fetch(PDO::FETCH_ASSOC);
                if($email==$row['email'])
                {
                    die(header("location:./register?registerUnsuccessfulEmailexist=true&reason=invalidemailexist=true"));
                    die();
                }            
                }else{
                    
                    //Get current time
                    date_default_timezone_set('Africa/Lagos');
                    $created_at = date('Y-m-d H:i:s');
                    
                    $reg1 = "INSERT INTO users(firstname , middlename , surname , email ,  password , pin_code, verification_code , created_at) 
                    VALUES(:firstname , :middlename, :surname , :email , :password , :pin_code , :verification_code , :created_at)";
                   
                    $stmt = $con->prepare($reg1);
                    $stmt->bindParam(":firstname",$firstname);
                    $stmt->bindParam(":middlename",$middlename);
                    $stmt->bindParam(":surname",$surname);
                    $stmt->bindParam(":email",$email);
                    $stmt->bindParam(":password",$password);
                    $stmt->bindParam(":pin_code",$pin_code);
                    $stmt->bindParam(":verification_code",$verification_code);						
                    $stmt->bindParam(":created_at",$created_at);						
                    $stmt->execute();
                    
        
                    /**
                     * This example shows sending a message using a local sendmail binary.
                     */

                    //Create a new PHPMailer instance
                    $mail = new PHPMailer();
                    //Set PHPMailer to use the sendmail transport
                    $mail->isSendmail();
                    //Set who the message is to be sent from
                    $mail->setFrom("support@sahmax.com", "Sahmax Optimum");
                    //Set an alternative reply-to address
                    $mail->addReplyTo("noreply@sahmax.com", "Sahmax Optimum");
                    //Set who the message is to be sent to
                    $mail->addAddress("$email", "");
                    $body = "<!DOCTYPE html>
                    <head>
                    <meta charset='utf-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1'>
                    <title>Sahmax Optimum Email Verification</title>
                    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
                    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> 
                    <meta name='viewport' content='width=device-width, initial-scale=1'> 
                    <meta http-equiv='X-UA-Compatible' content='IE=edge' /> 
                    <style type='text/css'> 
                        @media screen { 
                        @font-face { 
                        font-family: 'Lato'; 
                        font-style: normal; 
                        font-weight: 400; 
                        src: local('Lato Regular'), local('Lato-Regular'),
                        url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) 
                        format('woff'); } @font-face { font-family: 'Lato'; font-style: normal; font-weight: 700; 
                        src: local('Lato Bold'), local('Lato-Bold'), 
                        url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) 
                        format('woff'); } @font-face { font-family: 'Lato'; font-style: italic; font-weight: 400; 
                        src: local('Lato Italic'), local('Lato-Italic'),
                        url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) 
                        format('woff'); } @font-face { font-family: 'Lato'; font-style: italic; font-weight: 700; 
                        src: local('Lato Bold Italic'), local('Lato-BoldItalic'), 
                        url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff'); } }                
                    
                        ::-webkit-scrollbar {
                          width: 8px;
                        }

                        ::-webkit-scrollbar-track {
                          background: #f1f1f1; 
                        }
                    
                        ::-webkit-scrollbar-thumb {
                          background: #888; 
                        }
                    
                        ::-webkit-scrollbar-thumb:hover {
                          background: #555; 
                        } 
                    </style>
                    </head>
                    
                    <body className='snippet-body' style='background-color: #214696; margin: 0 !important; padding: 0 !important;'> <!-- HIDDEN PREHEADER TEXT -->  
                      <table border='0' cellpadding='0' cellspacing='0' width='100%'> <!-- LOGO --> 
                      <tr> <td bgcolor='#214696' align='center'> 
                      <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> 
                      <tr> <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td> </tr> 
                      </table> </td> </tr> <tr> <td bgcolor='#214696' align='center' style='padding: 0px 10px 0px 10px;'> 
                      <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> 
                      <tr> <td bgcolor='#ffffff' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;'> 
                      <h1 style='font-size: 48px; font-weight: 400; margin: 2;'>Welcome to Sahmax Optimum!</h1> 
                      <img src='https://www.sahmax.com/images/hero_1.jpg' width='125' height='120' style='display: block; border: 0px; margin : 30px 20px 20px 20px' /> 
                      </td> </tr> </table> </td> </tr> <tr> 
                      <td bgcolor='#214696' align='center' style='padding: 0px 10px 0px 10px;'> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> 
                      <tr> <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'> 
                      <p style='margin: 0;'>Thank you for choosing sahmax. First, help us verify your email by clicking on the below button.</p> </td> </tr> 
                      <tr> <td bgcolor='#ffffff' align='left'> <table width='100%' border='0' cellspacing='0' cellpadding='0'> <tr> 
                      <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'> 
                      <table border='0' cellspacing='0' cellpadding='0'> 
                      <tr> <td align='center' style='border-radius: 20px;' bgcolor='#214696'>
                      <a href='https://www.sahmax.com/confirm-email?vkey=$verification_code' style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 20px; border: 1px solid #214696; display: inline-block;'>Verify email</a></td> </tr> </table> </td> </tr> </table> </td> </tr> 
                      <tr> <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 20px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'> 
                      <p style='margin: 0;'>This is an auto-generated email. Please <b>do not</b> reply to this email.</p> </td> </tr> 
                      <tr> <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'> 
                      <p style='margin: 0;'>Cheers,<br>Sahmax Optimum Team</p> </td> </tr> </table> </td> </tr> 
                      <tr> <td bgcolor='#214696' align='center' style='padding: 30px 10px 0px 10px;'> 
                      <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> 
                    
                    </body>
                    </html>";
                    $mail->MsgHTML($body);
                    //Set the subject line
                    $mail->Subject = "Sahmax Optimum Email Verification";
                    //Read an HTML message body from an external file, convert referenced images to embedded,
                    //convert HTML into a basic plain-text alternative body
                    //$mail->msgHTML(file_get_contents("email-content.html"), __DIR__);
                    //Replace the plain text body with one created manually
                    $mail->AltBody = "Thank you for choosing Sahmax Optimum. First, help us verify your email by clicking on the below button.";
                    //Attach an image file
                    //send the message, check for errors
                    if (!$mail->send()) {
                        die(header("location:./register?registerFailed=true&reason=unknownerror=true"));
                        die();
                    } else {
                        die(header("location:./login?registerationSuccessful=true&reason=successfullyregistered=true"));
                        die();
                        $con = null;
                    }                   
                }
            }

?>