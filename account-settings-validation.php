<?php 

session_start();
if(!isset($_SESSION['email'])){
	header("location:./login");
}

include_once("pdoconfig.php");

$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$surname = $_POST['surname'];
$dob = $_POST['dob'];
$phonenumber = $_POST['phonenumber'];
$address = strtolower($_POST['address']);
$state = strtolower($_POST['state']);
$city = strtolower($_POST['city']);
$zipcode = $_POST['zipcode'];
$occupation = strtolower($_POST['occupation']);
$email = $_SESSION['email'];

$error = false;
            if(!isset($firstname) || trim($firstname) == '') {
                die(header("location:./registration-form.php?registrationFailedfirstname=true&reason=empty_firstnamecredential=true"));
                die();
            $error = true;			
			}
            if(!isset($middlename) || trim($middlename) == '') {
                die(header("location:./registration-form.php?registrationFailedmiddlename=true&reason=empty_middlenamecredential=true"));
                die();
            $error = true;			
			}
            if(!isset($surname) || trim($surname) == '') {
                die(header("location:./registration-form.php?registrationFailedsurname=true&reason=empty_surnamecredential=true"));
                die();
            $error = true;			
			}
            if(!isset($dob) || trim($dob) == '') {
                die(header("location:./registration-form.php?registrationFaileddob=true&reason=empty_dobcredential=true"));
                die();
            $error = true;			
			}
            if(!isset($phonenumber) || trim($phonenumber) == '') {
                die(header("location:./registration-form.php?registrationFailedphonenumber=true&reason=empty_phonenumbercredential=true"));
                die();
            $error = true;			
			}
            if(!isset($address) || trim($address) == '') {
                die(header("location:./registration-form.php?registrationFailedaddress=true&reason=empty_addresscredential=true"));
                die();
            $error = true;			
			}
            if(!isset($state) || trim($state) == '') {
				die(header("location:./registration-form.php?registrationFailedstate=true&reason=empty_statecredential=true"));
				die();
            $error = true;			
			}
			if(!isset($city) || trim($city) == '') {
				die(header("location:./registration-form?registrationFailedcity=true&reason=empty_citycredential=true"));
				die();
            $error = true;			
			}
			if(!isset($zipcode) || trim($zipcode) == '') {
				die(header("location:./registration-form?registrationFailedzipcode=true&reason=empty_zipcodecredential=true"));
				die();
            $error = true;			
			}
			if(!isset($occupation) || trim($occupation) == '') {
				die(header("location:./registration-form?registrationFailedoccupation=true&reason=empty_occupationcredential=true"));
				die();
            $error = true;			
			}

			if(!$error){
                
                                          // Check if user is verified
                      $verification_status = "0";
                      $sql = $con->prepare("SELECT verification_status FROM users WHERE email = :email LIMIT 1");
                      $sql->execute(array('email' => $email));
                      if($sql->rowCount() > 0){
                      $row = $sql->fetch(PDO::FETCH_ASSOC);
                      if ($row['verification_status']==$verification_status){

                
                    $reg1 = "UPDATE users SET firstname = :firstname, middlename = :middlename, surname = :surname, date_of_birth = :dob, phone_number = :phonenumber,
                    address = :address, state = :state, city = :city, zipcode = :zipcode, occupation = :occupation WHERE email = :email LIMIT 1";	
                  
                    $stmt = $con->prepare($reg1);
                    $stmt->bindParam(":firstname",$firstname);
                    $stmt->bindParam(":middlename",$middlename);
                    $stmt->bindParam(":surname",$surname);
                    $stmt->bindParam(":dob",$dob);
                    $stmt->bindParam(":phonenumber",$phonenumber);
                    $stmt->bindParam(":address",$address);
                    $stmt->bindParam(":state",$state);
                    $stmt->bindParam(":city",$city);
                    $stmt->bindParam(":zipcode",$zipcode);			
                    $stmt->bindParam(":occupation",$occupation);						
                    $stmt->bindParam(":email",$email);			
                    $stmt->execute();

                    if($reg1){

                    $title = "Account profile updated successfully";
        
                    $insert_notifics = "INSERT INTO notifications(title , email) 
                    VALUES(:title , :email)";
                
                    $stmt1 = $con->prepare($insert_notifics);
                    $stmt1->bindParam(":title",$title);
                    $stmt1->bindParam(":email",$email);
                    $stmt1->execute();
                    die(header("location:./registration-form?registrationationSuccessful=true&reason=successfullyregistered=true"));
                    die();
                    $con = null;
                    }else{
                        die(header("location:./registration-form?somethingwentwrong=true&reason=unknownerror=true"));
                        die();
                    }
    
                    } else {
                        die(header("location:./registration-form?somethingwentwrong=true&reason=cantedit=true"));
                        die();
                      }
                    }
                    
                   
            }
            

?>