<?php
		
    session_start();
    		
    include_once("pdoconfig.php");

if(isset($_GET['uid'])){
    $uid = $_GET['uid'];
}

        $email = $_SESSION['email'];
        $verification_image = null;
        $verification_status = "0";
        
        $cancelreviewquery = "UPDATE users SET verification_image = :verification_image WHERE email = :email LIMIT 1";	
        
        $stmt = $con->prepare($cancelreviewquery);
        $stmt->bindParam(":verification_image",$verification_image);				
        $stmt->bindParam(":email",$email);			
        $stmt->execute();
        
        $cancelreviewquery1 = "UPDATE users SET verification_status = :verification_status WHERE email = :email LIMIT 1";	
        
        $stmt = $con->prepare($cancelreviewquery1);
        $stmt->bindParam(":verification_status",$verification_status);				
        $stmt->bindParam(":email",$email);			
        $stmt->execute();

        $query = "DELETE FROM verification_request WHERE user_id = :uid";
        $statement = $con->prepare($query);
        $data = [
            ':uid' => $uid
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            die(header("location:./verification?deleted=true&reason=id_card_deleted=true"));
            die();
        }else{
            die(header("location:./verification?deletedFailed=true&reason=id_card_deletedFailed=true"));
            die();
        }      


?>
