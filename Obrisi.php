<?php
require "controller/controller.php";
require "model/dbBroker.php";
require "model/Doktor.php";
require "model/Pacijent.php";

$result = Doktor::getAll($conn);
$pacijenti = Pacijent::getAll($conn);

if (isset($_POST['submit'])) {
    if(isset($_POST['radio']))
    {

    $array = explode(" ",$_POST['radio']);
    $id = $array[0];
    $tip = $array[1];

          if($tip == 'doktor'){
                $status = Doktor::deleteById($id, $conn);
                    }
                    else{
                        $status = Pacijent::deleteById($id, $conn);
                    }

                    if($status){
                        echo 'Osoba je obrisana';
                    } else{
                        echo $status;
                        echo "Failed";
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
                    <th>Obrisi</th>


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
                        <td>

                        <form action="" method="post">
                            <input type="radio" name="radio" value="<?php echo $row['id'] . " " . $row['tip']?>">
                            <input type="submit" name="submit" />
                        </form>

                        </td>
                    </tr>
                    <?php
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