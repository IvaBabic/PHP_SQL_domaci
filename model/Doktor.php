<?php


class Doktor
{
 
    private $id;
    private $ime;
    private $prezime;
    private $datumRodjenja;
    private $email;

    private $specijalizacija;
    private $pacijenti = [];

    public function __construct($id=null, $ime, $prezime, $datumRodjenja, $specijalizacija, $email)
    {
        $this->id = $id;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->datumRodjenja = $datumRodjenja;
        $this->specijalizacija = $specijalizacija;
        $this->email = $email;
    }


    public static function add($ime, $prezime, $datumRodjenja, $specijalizacija, $email, mysqli $conn){
        $q = "INSERT INTO doktor (ime, prezime, datumRodjenja, specijalizacija, email) VALUES ('$ime', '$prezime', '$datumRodjenja', '$specijalizacija', '$email')";
        return $conn->query($q);
    }

    public static function getAll(mysqli $conn){
        $doktori = "SELECT * FROM doktor";
        $result = $conn->query($doktori);
        return $result;
    }
    


    // public static function getPacijenti(mysqli $conn)
    // {
    //     // $pacijenti = $this->pacijenti;
    //     // foreach ($pacijenti as $pacijent) {
    //     //     //Kontroler::prikaziPodatke($pacijent); radi i ovo, ali sam ipak htela drugacije da prikaze podatke zbog __to string metode
    //     //     echo $pacijent . $pacijent->getAge();
    //     //     echo "<br>";
    //     // }

    //     $pacijenti = "SELECT pacijent.id, pacijent.ime, pacijent.prezime, pacijent.datumRodjenja, pacijent.email, pacijent.sifra, pacijent.doktor_id FROM `pacijent` INNER JOIN doktor ON pacijent.id = doktor.pacijent_id;";
    //     $result = $conn->query($pacijenti);
    //     return $result;
    // }

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

?>