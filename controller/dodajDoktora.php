<?php

require "../model/dbBroker.php";
require "../model/Doktor.php";


if(isset($_POST['ime']) && isset($_POST['prezime']) 
    && isset($_POST['datumRodjenja']) && isset($_POST['specijalizacija'])  && isset($_POST['email']) && isset($_POST['sifra']) ){

   $status = Doktor::add($_POST['ime'], $_POST['prezime'], $_POST['datumRodjenja'], $_POST['specijalizacija'], $_POST['email'], $_POST['sifra'], $conn);

   if($status){
    echo 'Success';
} else{
    echo $status;
    echo "Failed";
}
}

?>