<?php
require "controller/controller.php";
require "model/dbBroker.php";
require "model/Doktor.php";
require "model/Pacijent.php";

if(isset($_POST['submit'])){
    if(isset($_POST['pretraga'])){
        $inputRec = strtolower($_POST['pretraga']);

        $q = "SELECT * FROM doktor WHERE ime LIKE '$inputRec' OR prezime LIKE '$inputRec';";
        $q1 = "SELECT * FROM pacijent WHERE ime LIKE '$inputRec' OR prezime LIKE '$inputRec';";

        $doktori = $conn->query($q);
        $pacijenti = $conn->query($q1);
        $trazeneOsobe = [];

        while($doktor = $doktori->fetch_assoc()){
        $trazeneOsobe[] = $doktor;
        }

        while($pacijent = $pacijenti->fetch_assoc()){
            $trazeneOsobe[] = $pacijent;
        }
      

       
    }
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

        <div class="modal-header">
          <h4 class="modal-title">Pretraga doktora/pacijenta</h4>
        </div>
        <div class="modal-body">

        <form action="" method="post">
                            <input type="text" id="imePretraga" style="border: 1px solid #653428" name="pretraga" class="form-control" placeholder="Pretrazi po imenu ili prezimenu *" value="" />
                            <input type="submit" id="pretrazi" name="submit" />
        </form>

            
        <table class="table" id="tabela">
            <thead>
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Tip</th>
                    <th>Email</th>


                </tr>
            </thead>
            <tbody>
            <?php
            if(isset($_POST['submit'])){
             if(!$trazeneOsobe){
                ?>
                <h3>Nema rezultata za uneto ime/prezime</h3>
                <?php
            }else{
             
                foreach($trazeneOsobe as $o){                                                              
             ?>
                    <tr>
                        <td><?php echo $o['ime']; ?></td>
                        <td><?php echo $o['prezime']; ?></td>
                        <td><?php echo $o['tip']; ?></td>
                        <td><?php echo $o['email'];   ?></td>
                        
                    </tr>
                    <?php
                    }
            }
        }
                ?>
            </tbody>
        </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="window.location.href = 'home.php';" data-dismiss="modal">Zatvori</button>
        </div>
      </div>
   


</body>
</html>