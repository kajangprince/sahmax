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
        echo"";
    }elseif($row['verification_stage']=="2"){ 
        //show this if user is in verification_stage 2 (stage 2 verification page will show user button to naviagate to stage 3)
        die(header("location:./verification-step-two?verificationStepOneComplete=true&reason=documentreceived=true"));
    }elseif($row['verification_stage']=="3"){ 
        //stage 3 will refer user back to stage 1 with a pending message if user already completed the process)
        die(header("location:./verification?validationFailed=true&reason=requestpending=true")); 
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
     
        die(header("location:./verification-step-two?validationFailed=true&reason=emptydocument=true"));
      
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
                                            
        die(header("location:./verification-step-two?validationFailed=true&reason=invaliddocument=true"));

    }    // Validate image file size
    else if (($_FILES["file-input"]["size"] > 10000000)) {

        die(header("location:./verification?validationFailed=true&reason=documentsize=true"));

    } else {
        
            //$target = "verificationimages/" . basename($_FILES["file-input"]["name"]);
            //if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)) {
            //$target = "verificationimages/" .("$newfilename");
            $temp = explode(".", $_FILES["file-input"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            if(move_uploaded_file($_FILES["file-input"]["tmp_name"], "verificationimages/" . $newfilename)) {
            
            $picname = "verificationimages/$newfilename";
 
            $verification_stage = "3";
            
            $query = "UPDATE verification_request SET id_card_back = :picname, verification_stage = :verification_stage WHERE user_id = :user_id LIMIT 1";
            $stmt1 = $con->prepare($query);
            $stmt1->bindParam(":picname",$picname);
            $stmt1->bindParam(":verification_stage",$verification_stage);
            $stmt1->bindParam(":user_id",$user_id);
            $stmt1->execute();
        
	        if ($query) {
	            
                die(header("location:./verification-step-three?verificationStepOneComplete=true&reason=documentreceived=true"));
                $con = null;
                    
            } else {
                
                die(header("location:./verification?validationFailed=true&reason=unknownerror=true"));
            
          }
        }
      }
    }

?>
