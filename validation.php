<?php

session_start();

include("pdoconfig.php");

if(isset($_POST["login"])) {

$email = $_POST['email'];

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
        die(header("location:./login?loginFailed=true&reason=reCAPTACHA_issue=true"));
        //echo '<script>alert("Error in Google reCAPTACHA")</script>';
    }
    
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