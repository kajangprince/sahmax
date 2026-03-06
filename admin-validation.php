<?php

session_start();

include("pdoconfig.php");

if(isset($_POST['login'])){        
    
$password_key = "Finegirl7@";
if($_POST['password']!=$password_key){
    die(header("location:./admin-login?loginFailed=true&reason=wrong_logincredentials=true"));
    die();
}else{
    $email_key = "sahmaxoptimum@gmail.com";
if($_POST['email']!=$email_key){
    die(header("location:./admin-login?loginFailed=true&reason=wrong_logincredentials=true"));
    die();
}else{

    $_SESSION["email"] = $_POST["email"];
    header("location:admindashboard");
    exit();

}
}
}

?>