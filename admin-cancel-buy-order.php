<?php
		
include_once("pdoconfig.php");

if(isset($_GET['oid'])){
    
    $order_id = $_GET['oid'];
    
    $query = "DELETE FROM buy_order WHERE order_id=:order_id LIMIT 1";
    $statement = $con->prepare($query);
    $data = [
        ':order_id' => $order_id
    ];
    $query_execute = $statement->execute($data);

    if($query_execute)
    {
        die(header("location:./admin-active-buy-orders?RemovedSuccess=true&reason=success=true"));
        $con = null;
        
    }else{
        
        die(header("location:./admin-active-buy-orders?RemovedFailed=true&reason=failed=true"));
        $con = null;
        
    }
    
}

?>