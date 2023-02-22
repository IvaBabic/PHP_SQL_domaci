<?php
require "controller/controller.php";
require "model/dbBroker.php";
require "model/Doktor.php";
require "model/Pacijent.php";

$result = Doktor::getAll($conn);
$pacijenti = Pacijent::getAll($conn);

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

<div class="container-fluid p-5 bg-dark text-white text-center">
  <h1 class="text-info"><?php echo Kontroler::$ordinacija; ?></h1>
  <h2>Administratore, dobrodosao u korisnicki servis!</h2> 
</div>
  
<!-- Dugmici -->
<div class="container mt-5">
  <div class="row">

    <div class="col">
    <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#myModal2" value="Prikazi sve doktore" id="Prikazisvedoktore" name="PrikaziSveDoktore">Prikazi sve doktore</button>
    </div>

    <div class="col">
    <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#myModal3" value="Prikazi sve pacijente" id="Prikazisvepacijente" name="PrikaziSvePacijente">Prikazi sve pacijente</button>
    </div>

    <div class="col">
    <button class="btn btn-info" id="btnDodaj" role="button" data-toggle="modal" data-target="#myModal" value="Dodaj doktora" name="btnDodajDoktora">Dodaj doktora</button>
    </div>

    <div class="col">
    <button class="btn btn-info" id="btnDodajPacijenta" role="button" onclick="window.location.href = 'DodajPacijenta.php';" value="Dodaj pacijenta" name="dugmeDodajpacijenta">Dodaj pacijenta</button>

    </div>

    <div class="col">
    <button type="submit" class="btn btn-info" role="button" onclick="window.location.href = 'Obrisi.php';" value="Obrisi" id="Obrisi" name="Obrisi">Obrisi</button>
    </div>


    <div class="col">
    <button type="submit" class="btn btn-info" id="imePretraga" data-toggle="modal" data-target="#myModal5"name="ime" placeholder="Pretrazi po imenu/prezimenu *" value="" >Pretrazi po imenu/prezimenu</button>
    </div>

    <!-- <div class="col">
    <button type="submit" class="btn btn-info" value="Izmeni doktora" id="Izmeni doktora" name="Izmeni doktora">
    </div>

    <div class="col">
    <button type="submit" class="btn btn-info" value="Izmeni pacijenta" id="Izmeni pacijenta" name="Izmeni pacijenta">
    </div> --> 
</div>
</div>


    <!-- FORMA ZA PRIKAZIVANJE DOKTORA -->

    <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Prikaz doktora</h4>
        </div>
        <div class="modal-body">
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

 <!-- FORMA ZA PRIKAZIVANJE PACIJENTA -->

 <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Prikaz pacijenata</h4>
        </div>
        <div class="modal-body">
        <table class="table" id="tabela">
            <thead>
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Datum Rodjenja</th>
                    <th>Email</th>
                    <th>Izabrani lekar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                   while($row = $pacijenti->fetch_assoc()){
       
                ?>
                    <tr>
                        <td><?php echo $row['ime'] ?></td>
                        <td><?php echo $row['prezime'] ?></td>
                        <td><?php echo $row['datumRodjenja'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['doktor_punoIme'] ?></td>

                    </tr>
                <?php
                    }
                
                ?>
            </tbody>
        </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- FORMA ZA DODAVANJE DOKTORA -->
<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="border: 4px solid blue;">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <div class="container tim-form">
                        <form action="#" method="post" id="dodajDoktora">
                            <h3 id="naslov" style="color: black">Dodavanje doktora</h3>
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
                                        <input type="text" style="border: 1px solid #653428; width:80%" name="specijalizacija" class="form-control" placeholder="Specijalizacija *" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <button id="btnDodajdoktora" type="submit" class="btn btn-success btn-block" style="background-color: blue; border: 1px solid black; width:80%"><i class="glyphicon glyphicon-plus"></i>Dodaj doktora
                                        </button>
                                    </div>

                                </div>


                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" style="color: white; background-color: blue; border: 1px solid black" data-dismiss="modal">Zatvori</button>
                </div>
            </div>
        </div>
    </div>

    <!-- FORMA ZA DODAVANJE PACIJENTA -->

    <!-- <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">
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
                                        <button id="btnDodajpacijenta" type="submit" class="btn btn-success btn-block" style="background-color: blue; border: 1px solid black; width:80%"><i class="glyphicon glyphicon-plus"></i>Dodaj pacijenta
                                        </button>
                                    </div>

                                </div>


                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" style="color: white; background-color: blue; border: 1px solid black" data-dismiss="modal">Zatvori</button>
                </div>
            </div>
        </div>
    </div> -->

     <!-- FORMA ZA ODABIR DOKTORA -->
<!-- <div class="modal fade" id="myModalIzaberiD" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="border: 4px solid blue;">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <div class="container tim-form">
                        <form action="#" method="post" id="izaberiDoktora">
                            <h3 id="naslov" style="color: black">Izaberi doktora</h3>
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

                                    <div class="form-group">
                                        <button id="btnIzaberiDoktora" type="submit" class="btn btn-success btn-block" style="background-color: blue; border: 1px solid black; width:80%"><i class="glyphicon glyphicon-plus"></i>Izaberi doktora
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>      
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" style="color: white; background-color: blue; border: 1px solid black" data-dismiss="modal">Zatvori</button>
                </div>
            </div>
        </div>
    </div> -->



    <!-- FORMA ZA BRISANJE -->
<!-- 
    <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Brisanje doktora/pacijenta</h4>
        </div>
        <div class="modal-body">
        <table class="table" id="tabela">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Tip</th>
                    <th> <button role="button" class="btn btn-info" id="btn-obrisi">Obrisi</button>
</th>


                </tr>
            </thead>
            <tbody>
            <?php
                $q = "SELECT doktor.id, doktor.ime, doktor.prezime, doktor.tip FROM doktor UNION ALL SELECT pacijent.id, pacijent.ime, pacijent.prezime, pacijent.tip FROM pacijent;";
                $osobe = $conn->query($q);
                while($row = $osobe->fetch_assoc()){                                                              
             ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['ime']; ?></td>
                        <td><?php echo $row['prezime']; ?></td>
                        <td><?php echo $row['tip'];   ?></td>

                        <td class="celija">
                            <label class="radio-btn">
                                <input type="radio" class="radio" name="checked-donut" value=<?php echo $row['id']. $row['tip']; ?>>
                                <span class="checkmark"></span>
                            </label>
                        </td>

                    </tr>
                    <?php
                    }
                
                ?>
            </tbody>
        </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
        </div>
      </div>
    </div>
  </div>
</div> -->


<!-- FORMA ZA PRETRAGU -->

<div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pretraga</h4>
        </div>
        <div class="modal-body">
        <input type="text" id="imePretraga" style="border: 1px solid #653428" name="ime" class="form-control" placeholder="Pretrazi po imenu *" value="" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>



<?php


// if (isset($_POST["PrikaziSveDoktore"])) {
//     foreach ($nizOsoba as $dr) {
//         if ($dr->getNameOfClass() == "Doktor") {
//        Kontroler::prikaziPodatke($dr);
//             echo "<br>";
//         }
//     }
// }


// if (isset($_POST["PrikaziSvePacijente"])) {
//     foreach ($nizOsoba as $p) {
//         if ($p->getNameOfClass() == "odrasliPacijent" || $p->getNameOfClass() == "detePacijent" ) {
//        Kontroler::prikaziPodatke($p);
//             echo "<br>";
//         }
//     }
// }

// if (isset($_POST["Odjavise"])) {
//     header("Location: ../../index.php"); 
//     }


  

?>
