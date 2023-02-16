<?php


class Doktor
{
 
    private $id;
    private $ime;
    private $prezime;
    private $datumRodjenja;
    private $email;
    private $sifra;

    private $izabraniDoktor;

    public function __construct($id=null, $ime, $prezime, $datumRodjenja, $email)
    {
        $this->id = $id;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->datumRodjenja = $datumRodjenja;
        $this->email = $email;
    }



    


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