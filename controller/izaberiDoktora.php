<?php

require "../model/dbBroker.php";
require "../model/Doktor.php";


$status = Doktor::getAll($conn);
    if($status){
        $row = mysqli_fetch_assoc($status);
    } else{
        echo $status;
        echo "Failed";
    }

?>