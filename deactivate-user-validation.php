<?php
session_start();
include('pdoconfig.php');

if(isset($_POST['deactivate_user'])){
    
    $id = $_POST['id'];
    $account_status = "1";
    
	$query = "UPDATE users SET account_status = :account_status WHERE id = :id LIMIT 1";
	$stmt1 = $con->prepare($query);
	$stmt1->bindParam(":id",$id);
	$stmt1->bindParam(":account_status",$account_status);
	$stmt1->execute();
	
	if($query){
        die(header("location:./admindashboard?accountdeactivated=true&reason=deactivated=true"));
	}else{
        die(header("location:./admindashboard?deactivationfailed=true&reason=Failed_to_deactivate=true"));
	}
	
  }

?>