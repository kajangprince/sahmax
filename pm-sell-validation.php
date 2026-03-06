<?php 

session_start();

function escape($string){
return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";

include_once("pdoconfig.php");

if(isset($_POST['pmsell'])){
    
    $email = $_SESSION['email']; 
    
    //check if user has account details in DB
	$stmt = $con->prepare("SELECT email FROM account_details WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    while($row = $stmt->fetch()){
        $account_email = $row['email']; 
    }
    if($account_email!=$_SESSION['email']){
        $_SESSION['NoAccountDetails'] = "Something is wrong";
        header('Location: pm-sell');
        exit(0);
    }
    
    //get user ID from db
    $sql = "SELECT id, firstname, surname FROM users WHERE email = :email LIMIT 1";
    $query = $con->prepare($sql);
    $query->execute(array('email' => $email));
    $row = $query->fetch(PDO::FETCH_ASSOC);
    
    $user_id = $row['id'];
    $firstname = $row['firstname'];
    $surname = $row['surname'];
    
    $dollar_type = "PM";

    $support_email = "support@sahmax.com"; 

    $stmt = $con->prepare("SELECT pmsell FROM rates WHERE email = :support_email LIMIT 1");
    $stmt->execute(array('support_email' => $support_email));
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        
    $Validate_pm_sell = $row['pmsell'];	
    $pm_sell = escape($Validate_pm_sell);
    
    $pm_min_quantity = "20"; 
    //$total_pm_min_amount = $pm_sell * $pm_min_quantity;
    
    }
    
    if($_POST['AmountInUSD'] >= $pm_min_quantity){
        $amount_in_usd = $_POST['AmountInUSD'];
    }else{
        die(header("location:./pm-sell?sellFailedinvalidAmountInUSD=true&reason=invalid_AmountInUSDlength=true"));
    }
    
    if(empty($_POST['AmountInUSD'])){
        die(header("location:./pm-sell?sellFailedinvalidAmountInUSD=true&reason=invalid_AmountInUSDcredential=true"));
    }
    
    if(ctype_digit($_POST['AmountInUSD'])){
        $amount_in_usd = $_POST['AmountInUSD'];
    }else{ 
        die(header("location:./pm-sell?sellFailedinvalidAmountInUSD=true&reason=invalid_AmountInUSDcredential=true"));
        $error = true;			
    }
    
    $digits_needed=8; //start of ORDER_ID generation

    $order_id =''; 
    
    $count=0;
    
    while ( $count < $digits_needed ) {
        $random_digit = mt_rand(0, 9);
        
        $order_id .= $random_digit; 
        $count++;
    } // end of ORDER_ID generation
    
    //Get order Naira amount
    $unformatted_amount_in_naira = $amount_in_usd * $pm_sell;
    $amount_in_naira = number_format($unformatted_amount_in_naira, 2);
    
    //Formatted amount in Dollar to be used in email message
    $formatted_amount_in_usd = number_format($amount_in_usd, 2);
    
    //Get current time
    date_default_timezone_set('Africa/Lagos');
    $date = date('Y-m-d');
    $time = date('H:i:s');
    
    $error = false;
    if(!isset($amount_in_usd) || trim($amount_in_usd) == '') {
        die(header("location:./pm-sell?sellFailedinvalidAmountInUSD=true&reason=invalid_AmountInUSDcredential=true"));
    $error = true;			
    }
    
	if(!$error){
	    
	    $order_status = "open";
	    $stmt = $con->prepare("SELECT receipt , order_status from sell_order WHERE user_id = :user_id AND order_status = :order_status ORDER BY :user_id DESC");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':order_status', $order_status);
        $stmt->execute();
        while($row = $stmt->fetch()){
            $fetch_order_status = $row['order_status'];
            $receipt = $row['receipt'];
        }
        if($fetch_order_status=="open"){
            die(header("location:./pm-sell?purchaseFailedOrderexist=true&reason=completeactiveorders=true"));
        //}elseif($receipt=="0"){
            //die(header("location:./pm-buy?purchaseFailedOrderexist=true&reason=completeactiveorders=true"));
        }else{
        $reg1 = "INSERT INTO sell_order(order_id , user_id , dollar_type , amount_in_usd , time , date) 
        VALUES(:order_id , :user_id , :dollar_type, :amount_in_usd , :time , :date)";
        
        $stmt = $con->prepare($reg1);
        $stmt->bindParam(":order_id",$order_id);
        $stmt->bindParam(":user_id",$user_id);
        $stmt->bindParam(":dollar_type",$dollar_type);
        $stmt->bindParam(":amount_in_usd",$amount_in_usd);
        $stmt->bindParam(":time",$time);
        $stmt->bindParam(":date",$date);
        $stmt->execute();

    $message = '<html><body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">';
    $message .= '<table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px green;">';
    $message .= '<thead>';
    $message .= '<tr>';
    $message .= '<th style="text-align:left;"><img style="max-width: 150px;" src="https://www.sahmax.com/images/android-chrome-512x512.png" alt="Sahmax Optimum Logo"></th>';
    $message .= "<th style='text-align:right;font-weight:400;'>$date</th>";
    $message .= '</tr>';
    $message .= '</thead>';
    $message .= '<tbody>';
    $message .= '<tr>';
    $message .= '<td style="height:35px;"></td>';
    $message .= '</tr>';
    $message .= '<tr>';
    $message .= '<td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">';
    $message .= "<p style='font-size:14px;margin:0 0 6px 0;'><span style='font-weight:bold;display:inline-block;min-width:150px'>Order type</span> PM Sell</p>";
    $message .= "<p style='font-size:14px;margin:0 0 6px 0;'><span style='font-weight:bold;display:inline-block;min-width:150px'>Order status</span><b style='color:green;font-weight:normal;margin:0'>Active</b></p>";
    $message .= "<p style='font-size:14px;margin:0 0 6px 0;'><span style='font-weight:bold;display:inline-block;min-width:146px'>Order ID</span> $order_id</p>";
    $message .= "<p style='font-size:14px;margin:0 0 0 0;'><span style='font-weight:bold;display:inline-block;min-width:146px'>Order amount</span> &#36;$formatted_amount_in_usd</p>";
    $message .= "<p style='font-size:14px;margin:0 0 0 0;'><span style='font-weight:bold;display:inline-block;min-width:146px'>Order amount</span> &#8358;$amount_in_naira</p>";
    $message .= "</td>";
    $message .= "</tr>";
    $message .= "<tr>";
    $message .= "<td style='height:35px;'></td>";
    $message .= "</tr>";
    $message .= "<tr>";
    $message .= "<td style='width:50%;padding:20px;vertical-align:top'>";
    $message .= "<p style='margin:0 0 10px 0;padding:0;font-size:14px;text-transform:capitalize'><span style='display:block;font-weight:bold;font-size:13px'>Name</span> $firstname $surname</p>";
    $message .= "<p style='margin:0 0 10px 0;padding:0;font-size:14px;text-transform:capitalize'><span style='display:block;font-weight:bold;font-size:13px'>Payment Details</span> Visit your account dashboard </p>";
    $message .= '</td><td style="width:50%;padding:20px;vertical-align:top">';
    $message .= "<p style='margin:0 0 10px 0;padding:0;font-size:14px;'><span style='display:block;font-weight:bold;font-size:13px;'>Date</span> $date</p>";
    $message .= "<p style='margin:0 0 10px 0;padding:0;font-size:14px;'><span style='display:block;font-weight:bold;font-size:13px;'>Time</span> $time</p>";
    $message .= "</td></tr>";
    $message .= "<tr><td colspan='2' style='font-size:20px;padding:30px 15px 0 15px;'>INSTRUCTIONS</td></tr>";
    $message .= "<tr><td colspan='2' style='padding:15px;'>";
    $message .= '<p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">1. Visit your order in dashboard.</span></p>
          <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">2. Read order terms and instructions.</span></p>
          <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">3. Proceed to withdrawal using the stated PM Account ID in order page.</span></p>
          <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">4. Upload payment receipt, mark order as paid and wait for admin.</span></p>
          <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span style="display:block;font-size:13px;font-weight:normal;">5. Receive funds in your bank account after confirmation.</span></p>
        </td>
      </tr>
    </tbody>
    <tfooter style="margin-bottom:-40px; margin-top:-30px">
      <tr>
        <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
          <strong style="display:block;margin:0 0 10px 0;">Regards,<br>Support<br><a href="https://sahmax.com">https://www.sahmax.com/</a></strong>  
        </td>
      </tr>
    </tfooter>
  </table>';
            $message .= '</body></html>';
			$ehead = "MIME-Version: 1.0" . "\r\n";
			$ehead.= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
			$ehead.= "From: Sahmax Optimum <support@sahmax.com>\r\n".
					 "Reply-To: noreply@sahmax.com\r\n" .
					 "X-Mailer: PHP/" . phpversion();
			 
			$subj = "$$amount_in_usd PM Sell Order Has Been Placed";
			$mailsend=mail("$email","$subj","$message","$ehead");
			
	//Send email notification to admin if order placed		
    $message = '<html><body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">';
    $message .= '<table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px green;">';
    $message .= '<thead>';
    $message .= '<tr>';
    $message .= '<th style="text-align:left;"><img style="max-width: 150px;" src="https://www.sahmax.com/images/android-chrome-512x512.png" alt="Sahmax Optimum Logo"></th>';
    $message .= "<th style='text-align:right;font-weight:400;'>$date</th>";
    $message .= '</tr>';
    $message .= '</thead>';
    $message .= '<tbody>';
    $message .= '<tr>';
    $message .= '<td style="height:35px;"></td>';
    $message .= '</tr>';
    $message .= '<tr>';
    $message .= '<td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">';
    $message .= "<p style='font-size:14px;margin:0 0 6px 0;'><span style='font-weight:bold;display:inline-block;min-width:150px'>Order type</span> PM Sell</p>";
    $message .= "<p style='font-size:14px;margin:0 0 6px 0;'><span style='font-weight:bold;display:inline-block;min-width:150px'>Order status</span><b style='color:green;font-weight:normal;margin:0'>Active</b></p>";
    $message .= "<p style='font-size:14px;margin:0 0 6px 0;'><span style='font-weight:bold;display:inline-block;min-width:146px'>Order ID</span> $order_id</p>";
    $message .= "<p style='font-size:14px;margin:0 0 0 0;'><span style='font-weight:bold;display:inline-block;min-width:146px'>Order amount</span> &#36;$formatted_amount_in_usd</p>";
    $message .= "<p style='font-size:14px;margin:0 0 0 0;'><span style='font-weight:bold;display:inline-block;min-width:146px'>Order amount</span> &#8358;$amount_in_naira</p>";
    $message .= "</td>";
    $message .= "</tr>";
    $message .= "<tr>";
    $message .= "<td style='height:35px;'></td>";
    $message .= "</tr>";
    $message .= "<tr>";
    $message .= "<td style='width:50%;padding:20px;vertical-align:top'>";
    $message .= "<p style='margin:0 0 10px 0;padding:0;font-size:14px;text-transform:capitalize'><span style='display:block;font-weight:bold;font-size:13px'>Customer Name</span> $firstname $surname</p>";
    $message .= "<p style='margin:0 0 10px 0;padding:0;font-size:14px;text-transform:capitalize'><span style='display:block;font-weight:bold;font-size:13px'>What to do?</span> Wait for payment </p>";
    $message .= '</td><td style="width:50%;padding:20px;vertical-align:top">';
    $message .= "<p style='margin:0 0 10px 0;padding:0;font-size:14px;'><span style='display:block;font-weight:bold;font-size:13px;'>Date</span> $date</p>";
    $message .= "<p style='margin:0 0 10px 0;padding:0;font-size:14px;'><span style='display:block;font-weight:bold;font-size:13px;'>Time</span> $time</p>";
    $message .= "</td></tr>";
    $message .= "<tr><td colspan='2' style='padding:15px;'>";
    $message .= '</tbody>
                <tfooter style="margin-bottom:-40px; margin-top:-30px">
                  <tr>
                    <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                      <strong style="display:block;margin:0 0 10px 0;">Regards,<br>Support<br><a href="https://sahmax.com">https://www.sahmax.com/</a></strong>  
                    </td>
                  </tr>
                </tfooter>
              </table>';
            $message .= '</body></html>';
			$ehead = "MIME-Version: 1.0" . "\r\n";
			$ehead.= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
			$ehead.= "From: Sahmax Optimum <support@sahmax.com>\r\n".
					 "Reply-To: noreply@sahmax.com\r\n" .
					 "X-Mailer: PHP/" . phpversion();
			 
			$adminemail = "sulaimansaheedadekunle@gmail.com";
			$subj = "$$amount_in_usd PM Sell Order Has Been Placed";
			$mailsend=mail("$adminemail","$subj","$message","$ehead");
	        
	        if ($mailsend) {
                die(header("location:./pm-sell?orderid=$order_id&amount=$amount_in_naira"));
                $con = null;
            }
        }
        
	}else{
        die(header("location:./pm-sell?sellFailedunknownerror=true&reason=Failed_unknownerror=true"));
	}
    
}


?>