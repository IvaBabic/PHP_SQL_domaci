<?php


class Pacijent
{
 
    private $id;
    private $ime;
    private $prezime;
    private $datumRodjenja;
    private $email;
    private $sifra;
    private $tip;

    private $izabraniDoktor;

    public function __construct($id=null, $ime, $prezime, $datumRodjenja, $email, $sifra, $tip = 'pacijent')
    {
        $this->id = $id;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->datumRodjenja = $datumRodjenja;
        $this->email = $email;
        $this->sifra = $sifra;
        $this->tip = $tip;
    }

    public static function add($ime, $prezime, $datumRodjenja, $email, $sifra, $doktorID, mysqli $conn){
        $q = "INSERT INTO pacijent (ime, prezime, datumRodjenja, email, sifra, doktor_id) VALUES ('$ime', '$prezime', '$datumRodjenja', '$email', '$sifra', $doktorID)";
        return $conn->query($q);
    }

    public static function getAll(mysqli $conn){
        $q = "SELECT pacijent.ime, pacijent.prezime, pacijent.datumRodjenja, pacijent.email, CONCAT(doktor.ime, ' ', doktor.prezime) as doktor_punoIme FROM pacijent INNER JOIN doktor ON pacijent.doktor_id = doktor.id;";
        $pacijenti= $conn->query($q);
        return $pacijenti;
    }

    public static function doktorID($doktor, mysqli $conn){
        $query = "SELECT id FROM doktor WHERE CONCAT(ime, ' ', prezime) = '$doktor';";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        $doktorID = $row['id'];
        return $doktorID;
    }

    public static function deleteById($id, mysqli $conn){
        $q = "DELETE FROM pacijent WHERE id=$id";
        return $conn->query($q);
    }


    // public static function izaberiDoktora($doktorID, mysqli $conn){
       
    //     $q = "INSERT INTO pacijent (doktor_id) VALUES ($doktorID)";
    //     return $conn->query($q);
        
    // }

    


    public static function getPacijenti(mysqli $conn)
    {
        // $pacijenti = $this->pacijenti;
        // foreach ($pacijenti as $pacijent) {
        //     //Kontroler::prikaziPodatke($pacijent); radi i ovo, ali sam ipak htela drugacije da prikaze podatke zbog __to string metode
        //     echo $pacijent . $pacijent->getAge();
        //     echo "<br>";
        // }

        $pacijenti = "SELECT pacijent.id, pacijent.ime, pacijent.prezime, pacijent.datumRodjenja, pacijent.email, pacijent.sifra, pacijent.doktor_id FROM `pacijent` INNER JOIN doktor ON pacijent.id = doktor.pacijent_id;";
        $result = $conn->query($pacijenti);
        return $result;
    }

    // public function getPregledi()
    // {
    //   $preg = $this->pregledi;
    //   foreach($preg as $p){
    //         echo $p;
    //         echo "<br>";
    //   }
  
    // }

    // public function getRecepti()
    // {
    //     $recepti = $this->recepti;
    //     foreach ($recepti as $r) {
    //         echo $r;
    //         echo "<br>";
    //     }
    // }

}