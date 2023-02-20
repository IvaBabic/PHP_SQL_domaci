<?php
require "controller/controller.php";
require "model/dbBroker.php";
require "model/Doktor.php";
require "model/Pacijent.php";

$result = Doktor::getAll($conn);
$pacijenti = Pacijent::getAll($conn);

if(isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['datumRodjenja']) && isset($_POST['email']) && isset($_POST['sifra']) && isset($_POST['izabraniDoktor'])){
    //include "controller/dodajPacijenta.php";

    $doktorID = Pacijent::doktorID($_POST['izabraniDoktor'], $conn);
    Pacijent::add($_POST['ime'], $_POST['prezime'], $_POST['datumRodjenja'], $_POST['email'], $_POST['sifra'], $doktorID, $conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Administrator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="" id="" style="width:50%" >
        <div class="">
            <div class="modal-content" style="border: 4px solid blue;">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <div class="container tim-form">
                        <form action="#" method="post" id="m3">
                            <h3 id="naslov" style="color: black">Dodavanje pacijenta</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" style="border: 1px solid #653428; width:80%" name="ime" class="form-control" placeholder="Ime *" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" style="border: 1px solid #653428; width:80%" name="prezime" class="form-control" placeholder="Prezime *" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" style="border: 1px solid #653428; width:80%" name="datumRodjenja" class="form-control" placeholder="Datum Rodjenja *" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" style="border: 1px solid #653428; width:80%" name="email" class="form-control" placeholder="Email*" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" style="border: 1px solid #653428; width:80%" name="sifra" class="form-control" placeholder="sifra*" value="" required/>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" style="border: 1px solid #653428; width:80%" name="izabraniDoktor" class="form-control" placeholder="Unesite ime i prezime doktora kojeg birate" value="" required/>
                                        <table class="table" id="tabela">
                                            <thead>
                                                <tr>
                                                    <th>Ime</th>
                                                    <th>Prezime</th>
                                                    <th>Datum Rodjenja</th>
                                                    <th>Specijalizacija</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                
                                                while($row = $result->fetch_array()){
                                    
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['ime'] ?></td>
                                                        <td><?php echo $row['prezime'] ?></td>
                                                        <td><?php echo $row['datumRodjenja'] ?></td>
                                                        <td><?php echo $row['specijalizacija'] ?></td>
                                                        <td><?php echo $row['email'] ?></td>

                                                    </tr>
                                                <?php
                                                    }
                                                
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="form-group">
                                        <button id="btnDodajpacijenta" type="submit" class="btn btn-success btn-block" style="background-color: blue; border: 1px solid black; width:80%"><i class="glyphicon glyphicon-plus"></i>Dodaj pacijenta
                                        </button>
                                    </div>

                                </div>


                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="window.location.href = 'home.php';"style="color: white; background-color: blue; border: 1px solid black" data-dismiss="modal">Zatvori</button>
                </div>
            </div>
        </div>
    </div>


    

        </body>
</html>