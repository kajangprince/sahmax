<?php

session_start();
include('pdoconfig.php');

if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    $email = $_SESSION['email'];

    try {

        $query = "DELETE FROM account_details WHERE email = :email LIMIT 1";
        $statement = $con->prepare($query);
        $data = [
            ':email' => $email
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['AccountDetailsAddedmessage'] = "Payment method successfully removed";
            header('Location:userdashboard');
            exit(0);
        }
        else
        {
            $_SESSION['Failedmessage'] = "Failed to remove payment method";
            header('Location:userdashboard');
            exit(0);
        }

    } catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>