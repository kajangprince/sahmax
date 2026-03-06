<?php

session_start();

include("pdoconfig.php");

if(isset($_POST["login"])) {

$email = $_POST['email'];
  
    
if(empty($email) && empty($password)) {
    die(header("location:./login?loginFailed=true&reason=wrong_logincredentials=true"));
}else{
$sql = "SELECT password,email,account_status FROM users WHERE email = :email LIMIT 1";
$query = $con->prepare($sql);
$query->execute(array('email' => $email));
$row = $query->fetch(PDO::FETCH_ASSOC);
$account_status = $row['account_status'];
if($account_status=="1"){
    die(header("location:./login?loginFailed=true&reason=deactivatedaccount=true"));
    die();
}elseif(password_verify($_POST['password'], $row['password'])){
    $_SESSION["email"] = $_POST["email"];
    header("location:userdashboard");
    exit();
}else{
    die(header("location:./login?loginFailed=true&reason=wrong_logincredentials=true"));
}
}
}

?>