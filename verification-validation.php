<?php

    session_start();
    
    //Import the PHPMailer class into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require "PHPMailer/src/Exception.php";
    require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/SMTP.php";
    
    include_once("pdoconfig.php");

    if(isset($_POST["upload"])) {
    
    $email = $_SESSION['email'];
    
    //Get current time
    date_default_timezone_set('Africa/Lagos');
    $datetime = date('Y-m-d H:i:s');
    
    //get user ID from db
    $sql = "SELECT id FROM users WHERE email = :email LIMIT 1";
    $query = $con->prepare($sql);
    $query->execute(array('email' => $email));
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $user_id = $row['id'];
    
    $sql = $con->prepare("SELECT user_id,verification_stage FROM verification_request WHERE user_id = :user_id");
    $sql->execute(array('user_id' => $user_id));
    if($sql->rowCount() > 0){
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    if($row['verification_stage']=="1"){ 
        die(header("location:./verification"));
    }elseif($row['verification_stage']=="2"){ 
        //show this if user is in verification_stage 2 (stage 2 verification page will show user button to naviagate to stage 3)
        die(header("location:./verification-step-two?verificationStepOneComplete=true&reason=documentreceived=true"));
    }elseif($row['verification_stage']=="3"){ 
        //stage 3 will refer user back to stage 1 with a pending message if user already completed the process)
        echo"";
    }elseif($row['verification_stage']=="4"){ 
        //refer user to verification 1 page if user is in verification_stage 4 
        die(header("location:./verification"));
    }else{
        die(header("location:./verification?validationFailed=true&reason=requestpending=true")); 
    }
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
     
        die(header("location:./verification-step-three?validationFailed=true&reason=emptydocument=true"));
      
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
                                            
        die(header("location:./verification-step-three?validationFailed=true&reason=invaliddocument=true"));

    }    // Validate image file size
    else if (($_FILES["file-input"]["size"] > 10000000)) {

        die(header("location:./verification-step-three?validationFailed=true&reason=documentsize=true"));

    } else {
        
            //$target = "verificationimages/" . basename($_FILES["file-input"]["name"]);
            //if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)) {
            //$target = "verificationimages/" .("$newfilename");
            $temp = explode(".", $_FILES["file-input"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            if(move_uploaded_file($_FILES["file-input"]["tmp_name"], "verificationimages/" . $newfilename)) {
            
            $picname = "verificationimages/$newfilename";
            
            $verification_stage = "4";
            
            $query = "UPDATE verification_request SET photo_with_id = :picname, verification_stage = :verification_stage WHERE user_id = :user_id LIMIT 1";
            $stmt1 = $con->prepare($query);
            $stmt1->bindParam(":picname",$picname);
            $stmt1->bindParam(":verification_stage",$verification_stage);
            $stmt1->bindParam(":user_id",$user_id);
            $stmt1->execute();
            
            $verification_image = "submitted";
            
            $verifyquery = "UPDATE users SET verification_image = :verification_image WHERE email = :email LIMIT 1";	
            
            $stmt = $con->prepare($verifyquery);
            $stmt->bindParam(":verification_image",$verification_image);				
            $stmt->bindParam(":email",$email);			
            $stmt->execute();
            
    //Send email notification to admin if verification requseted
    $message = "<html><body className='snippet-body' style='background-color: #F8F9FD; margin: 0 !important; padding: 0 !important;'> ";
    $message = "<table border='0' cellpadding='0' cellspacing='0' width='100%'> <!-- LOGO --> 
              <tr> <td bgcolor='#F8F9FD' align='center'> 
              <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> 
              <tr> <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td> </tr> 
              </table> </td> </tr> <tr> <td bgcolor='#F8F9FD' align='center' style='padding: 0px 10px 0px 10px;'> 
              <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> 
              <tr> <td bgcolor='#F8F9FD' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #ffffff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;'> 
              <h1 style='font-size: 48px; font-weight: 400; margin: 2;'>Verification Request!</h1> 
              <img src='https://www.sahmax.com/images/android-chrome-512x512.png' width='125' height='120' style='display: block; border: 0px; margin : 30px 20px 20px 20px' /> 
              </td> </tr> </table> </td> </tr> <tr> 
              <td bgcolor='#F8F9FD' align='center' style='padding: 0px 10px 0px 10px;'> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> 
              <tr> <td bgcolor='#F8F9FD' align='left' style='padding: 20px 30px 40px 30px; color: #ffffff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'> 
              <p style='margin: 0;'>Hi Sahmax Optimium Admin, a new user has requested for verification.</p> </td> </tr> 
              <tr> <td bgcolor='#F8F9FD' align='left'> <table width='100%' border='0' cellspacing='0' cellpadding='0'> <tr> 
              <td bgcolor='#F8F9FD' align='center' style='padding: 20px 30px 60px 30px;'> 
              <table border='0' cellspacing='0' cellpadding='0'> 
              <tr> <td bgcolor='#F8F9FD' align='left' style='padding: 0px 30px 20px 30px; color: #ffffff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'> 
              <p style='margin: 0;'>This is an auto-generated email. Please <b>do not</b> reply to this email.</p> </td> </tr> 
              <tr> <td bgcolor='#F8F9FD' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #ffffff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'> 
              <p style='margin: 0;'>Cheers,<br>Sahmax Optimum Support</p> </td> </tr> </table> </td> </tr> 
              <tr> <td bgcolor='#F8F9FD' align='center' style='padding: 30px 10px 0px 10px;'> 
              <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>";
            $message .= '</body></html>';
			$ehead = "MIME-Version: 1.0" . "\r\n";
			$ehead.= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
			$ehead.= "From: Sahmax Optimum <support@sahmax.com>\r\n".
					 "Reply-To: noreply@sahmax.com\r\n" .
					 "X-Mailer: PHP/" . phpversion();
			 
			$subj = "A New User Requested For Verification";
			$mailsend=mail("sulaimansaheedadekunle@gmail.com","$subj","$message","$ehead");
			
	//Send email notification to user if verification submitted		
    $message = "<html><body className='snippet-body' style='background-color: #F8F9FD; margin: 0 !important; padding: 0 !important;'> ";
    $message = "<table border='0' cellpadding='0' cellspacing='0' width='100%'> 
              <tr> <td bgcolor='#F8F9FD' align='center'> 
              <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> 
              <tr> <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td> </tr> 
              </table> </td> </tr> <tr> <td bgcolor='#F8F9FD' align='center' style='padding: 0px 10px 0px 10px;'> 
              <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> 
              <tr> <td bgcolor='#F8F9FD' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #ffffff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;'> 
              <h1 style='font-size: 48px; font-weight: 400; margin: 2;'>Verification Request!</h1> 
              <img src='https://www.sahmax.com/images/android-chrome-512x512.png' width='125' height='120' style='display: block; border: 0px; margin : 30px 20px 20px 20px' /> 
              </td> </tr> </table> </td> </tr> <tr> 
              <td bgcolor='#F8F9FD' align='center' style='padding: 0px 10px 0px 10px;'> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> 
              <tr> <td bgcolor='#F8F9FD' align='left' style='padding: 20px 30px 40px 30px; color: #ffffff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'> 
              <p style='margin: 0;'>We have received your verification request and will get back to you soon.</p> </td> </tr> 
              <tr> <td bgcolor='#F8F9FD' align='left'> <table width='100%' border='0' cellspacing='0' cellpadding='0'> <tr> 
              <td bgcolor='#F8F9FD' align='center' style='padding: 20px 30px 60px 30px;'> 
              <table border='0' cellspacing='0' cellpadding='0'> 
              <tr> <td bgcolor='#F8F9FD' align='left' style='padding: 0px 30px 20px 30px; color: #ffffff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'> 
              <p style='margin: 0;'>This is an auto-generated email. Please <b>do not</b> reply to this email.</p> </td> </tr> 
              <tr> <td bgcolor='#F8F9FD' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #ffffff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'> 
              <p style='margin: 0;'>Cheers,<br>Sahmax Optimum Support</p> </td> </tr> </table> </td> </tr> 
              <tr> <td bgcolor='#F8F9FD' align='center' style='padding: 30px 10px 0px 10px;'> 
              <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'> ";
            $message .= '</body></html>';
			$ehead = "MIME-Version: 1.0" . "\r\n";
			$ehead.= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
			$ehead.= "From: Sahmax Optimum <support@sahmax.com>\r\n".
					 "Reply-To: noreply@sahmax.com\r\n" .
					 "X-Mailer: PHP/" . phpversion();
			 
			$email = $_SESSION['email'];
			$subj = "Account Verification Request";
			$mailsend=mail("$email","$subj","$message","$ehead");
	        
	        if ($mailsend) {
	            
                die(header("location:./userdashboard?verificationComplete=true&reason=documentreceived=true"));
                $con = null;
                    
            } else {
                
                die(header("location:./verification-step-three?validationFailed=true&reason=unknownerror=true"));
            
          }
        }
      }
    }

?>
