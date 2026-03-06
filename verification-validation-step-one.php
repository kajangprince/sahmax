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
    
    $document = $_POST['document'];
    
    $email = $_SESSION['email'];
    
    //Get current time
    date_default_timezone_set('Africa/Lagos');
    $datetime = date('Y-m-d H:i:s');
    
    if(empty($document)) {
        die(header("location:./verification?validationFailed=true&reason=emptydocument_type=true"));
    }else{
        $document = $_POST['document'];
    }
    
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
        //show this if user is in verification_stage 1 (stage 1 verification page will show user button to naviagate to stage 2)
        die(header("location:./verification?verificationStepOneComplete=true&reason=documentreceived=true"));
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
     
        die(header("location:./verification?validationFailed=true&reason=emptydocument=true"));
        die();
      
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
                                            
        die(header("location:./verification?validationFailed=true&reason=invaliddocument=true"));
        die();

    }    // Validate image file size
    else if (($_FILES["file-input"]["size"] > 10000000)) {

        die(header("location:./verification?validationFailed=true&reason=documentsize=true"));
        die();

    } else {
        
            //$target = "verificationimages/" . basename($_FILES["file-input"]["name"]);
            //if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)) {
            //$target = "verificationimages/" .("$newfilename");
            $temp = explode(".", $_FILES["file-input"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            if(move_uploaded_file($_FILES["file-input"]["tmp_name"], "verificationimages/" . $newfilename)) {
            
            $picname = "verificationimages/$newfilename";
            $insert = "INSERT INTO verification_request (user_id, id_card, document_type, requested_at) 
            VALUES(:user_id , :picname , :document , :datetime)";
            
            $stmt = $con->prepare($insert);
            $stmt->bindParam(":user_id",$user_id);
            $stmt->bindParam(":picname",$picname);
            $stmt->bindParam(":document",$document);						
            $stmt->bindParam(":datetime",$datetime);						
            $stmt->execute();
        
	        if ($insert) {
	            
                die(header("location:./verification-step-two?verificationStepOneComplete=true&reason=documentreceived=true"));
                $con = null;
                    
            } else {
                
                die(header("location:./verification?validationFailed=true&reason=unknownerror=true"));
            
          }
        }
      }
    }

?>
