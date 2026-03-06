<?php
    
    session_start();
    
    include_once("pdoconfig.php");
    
    if (isset($_POST["submit"])) {
        
        $email = $_SESSION['email'];
        $id_card = NULL;
        $document_type = NULL;
        $bvn = $_POST['bvn'];
        
    if(ctype_digit($_POST['bvn'])){
        $bvn = $_POST['bvn'];
    }else{ 
        die(header("location:./verification?validationFailed=true&reason=wrong_bvn_number=true"));
        die();		
    }     
    
    if(strlen($_POST['bvn'])<11){
        die(header("location:./verification?validationFailed=true&reason=wrong_bvn_length=true"));
        die();		
    }else{
    	$bvn = $_POST['bvn'];
    }
    
    if(strlen($_POST['bvn'])>11){
        die(header("location:./verification?validationFailed=true&reason=wrong_bvn_length=true"));
        die();		
    }else{
    	$bvn = $_POST['bvn'];
    }
    
    $check_bvn = NULL;
    $sql = $con->prepare("SELECT bvn FROM verification_request WHERE email = :email");
    $sql->execute(array('email' => $email));
    if($sql->rowCount() > 0){
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    if($check_bvn!=$row['bvn'])
    {
        die(header("location:./verification?validationFailed=true&reason=bvnexist=true"));
        die();
    } 
    }
   
    if(empty($bvn)) {
        die(header("location:./verification?validationFailed=true&reason=wrong_bvn_validation=true"));
        die();
    }else{
        $insert = "INSERT INTO verification_request (email, id_card, bvn, document_type) 
        VALUES(:email , :id_card , :bvn, :document_type)";
       
        $stmt = $con->prepare($insert);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":id_card",$id_card);
        $stmt->bindParam(":bvn",$bvn);	
        $stmt->bindParam(":document_type",$document_type);						
        $stmt->execute();
    }
    
    if($insert){
        header("location:verification-step-2");
        exit();
    }else{
        die(header("location:./verification?validationFailed=true&reason=unknownerror=true"));
        die();
    }
        
    }
    
    
?>