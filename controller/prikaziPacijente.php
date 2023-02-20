<?php

require "../model/dbBroker.php";
require "../model/Pacijent.php";


$status = Pacijent::getAll($conn);
    if($status){
        $row = mysqli_fetch_assoc($status);
    
    } else{
        echo $status;
        echo "Failed";
    }

?>