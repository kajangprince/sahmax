<?php

include("pdoconfig.php");

    $name = strtolower($_POST['name']);    
    $email = strtolower($_POST['email']);
    $number = $_POST['number'];
    
    if(ctype_digit($_POST['number'])){
        $number = $_POST['number'];
    }else{ 
        die(header("location:./index?formFailed=true&reason=incorrect_number=true"));
        die();	
    }     
    
    if(strlen($_POST['number'])<9){
        die(header("location:./index?formFailed=true&reason=incorrect_number=true"));
        die();	
    }else{
    	$number = $_POST['number'];
    }
    
    if(strlen($_POST['number'])>12){
        die(header("location:./index?formFailed=true&reason=incorrect_number=true"));
        die();
    }else{
    	$number = $_POST['number'];
    }
    
    $message = strtolower($_POST['message']);

    $error = false;
            if(!isset($name) || trim($name) == '') {
                die(header("location:./index?formFailed=true&reason=failed_credential=true"));
                die();
            $error = true;			
			}
            if(!isset($name) || trim($name) == '') {
                die(header("location:./index?formFailed=true&reason=failed_credential=true"));
                die();
            $error = true;			
			}
            if(!isset($number) || trim($number) == '') {
                die(header("location:./index?formFailed=true&reason=failed_credential=true"));
                die();
            $error = true;			
			}
            if(!isset($message) || trim($message) == '') {
                die(header("location:./index?formFailed=true&reason=failed_credential=true"));
                die();
            $error = true;			
			}


			if(!$error){
    
        $contact_query = "INSERT INTO contact(name , number , email , message) 
        VALUES(:name , :number ,  :email , :message)";

        $stmt = $con->prepare($contact_query);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":number",$number);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":message",$message);			
        $stmt->execute();

        if($contact_query){
            die(header("location:./index?formSuccess=true&reason=received_credential=true"));
            die();
        }else{
            die(header("location:./index?formFailed=true&reason=failed_credential=true"));
            die();
        }

    }

?>