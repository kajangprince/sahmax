<?php 
session_start();
if(!isset($_SESSION['email'])){
	header("location:./login");
}

include_once("pdoconfig.php");

$email = $_SESSION['email'];
            
if(isset($_POST["submit_payment_method"])){
    
            $bankCode = $_POST['bankCode'];
            $accountNumber = $_POST['accountNumber'];
            $email = $_SESSION['email'];
             
            if(ctype_digit($_POST['accountNumber'])){
                $accountNumber = $_POST['accountNumber'];
            }else{ 
                $_SESSION['wrong_accountNo_format'] = "Enter your account number correctly";
                header('Location: deriv-sell');
                exit(0);
            }     
            
            if(strlen($_POST['accountNumber'])<10){  
                $_SESSION['wrong_accountNo_length'] = "Incorrect Account Number";
                header('Location: deriv-sell');
                exit(0);
            }else{
            	$accountNumber = $_POST['accountNumber'];
            }
            
            if(strlen($_POST['accountNumber'])>10){
                $_SESSION['wrong_accountNo_length'] = "Incorrect Account Number";
                header('Location: deriv-sell');
                exit(0);
            }else{
            	$accountNumber = $_POST['accountNumber'];
            }

            $error = false;
            if(!isset($bankCode) || trim($bankCode) == '') {
                $_SESSION['payment-method-required'] = "All fields are required";
                header('Location: deriv-sell');
                exit(0);
            $error = true;			
			}
            if(!isset($accountNumber) || trim($accountNumber) == '') {
                $_SESSION['payment-method-required'] = "All fields are required";
                header('Location: deriv-sell');
                exit(0);
            $error = true;			
			}
			
			if(!$error){
			    
	        $stmt = $con->prepare("SELECT firstname,surname FROM users WHERE email = :email LIMIT 1");
            $stmt->execute(array('email' => $email));
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                
            $firstname = $row['firstname'];
            $surname = $row['surname'];
            $account_name = "$surname $firstname";
            
            }
			    
            //Get current time
            date_default_timezone_set('Africa/Lagos');
            $date = date('Y-m-d');
            $time = date('H:i:s');

            $insert = "INSERT INTO account_details(account_number , account_name, bank_name , email , time , date) 
            VALUES(:accountNumber , :account_name , :bankCode , :email , :time , :date)";
           
            $stmt = $con->prepare($insert);
            $stmt->bindParam(":accountNumber",$accountNumber);
            $stmt->bindParam(":account_name",$account_name);
            $stmt->bindParam(":bankCode",$bankCode);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":time",$time);
            $stmt->bindParam(":date",$date);
            $stmt->execute();

            $title = "You have successfully added a payment method";
        
            $insert_notifics = "INSERT INTO notifications(title , email) 
            VALUES(:title , :email)";
        
            $stmt1 = $con->prepare($insert_notifics);
            $stmt1->bindParam(":title",$title);
            $stmt1->bindParam(":email",$email);
            $stmt1->execute();

            if($insert){
                $_SESSION['recipientsuccessfullyadded'] = "Payment Method Added";
                header('Location: deriv-sell');
                exit(0);
            }else{
                $_SESSION['recipientaddedfailed'] = "Payment Method Added";
                header('Location: deriv-sell');
                exit(0);
            }

        } 
        
     }


?>

