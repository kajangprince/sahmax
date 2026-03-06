<?php
session_start();
include('pdoconfig.php');

if(isset($_POST['delete_user']))
{
    $id = $_POST['user_id'];
    
            $email = $_SESSION['email']; 
            //get user ID from db
            $sql = "SELECT id FROM users WHERE email = :email LIMIT 1";
            $query = $con->prepare($sql);
            $query->execute(array('email' => $email));
            $row = $query->fetch(PDO::FETCH_ASSOC);
            
            $user_id = $row['id'];
			    
		    $stmt = $con->prepare("SELECT order_id , amount_in_naira , account_details , payment_status from buy_order WHERE user_id = :user_id ORDER BY :user_id DESC");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            while($row = $stmt->fetch()){
               $payment_status = $row['payment_status'];
               $order_id = $row['order_id'];
               $account_details = $row['account_details'];
               $amount_in_naira = $row['amount_in_naira'];
               //Formatted amount in Naira to be used in email message
               $formatted_amount_in_naira = number_format($amount_in_naira, 2);
            } 

    try {

        $query = "DELETE FROM buy_order WHERE user_id=:user_id and order_id=:order_id LIMIT 1";
        $statement = $con->prepare($query);
        $data = [
            ':user_id' => $user_id,
            ':order_id' => $order_id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Deleted Successfully";
            header('Location: userdashboard.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Deleted";
            header('Location: userdashboard');
            exit(0);
        }

    } catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>