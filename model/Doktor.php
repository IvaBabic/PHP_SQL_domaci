<?php


class Doktor
{
 
    private $id;
    private $ime;
    private $prezime;
    private $datumRodjenja;
    private $email;
    private $sifra;
    private $tip;

    private $specijalizacija;

    public function __construct($id=null, $ime, $prezime, $datumRodjenja, $specijalizacija, $email, $sifra, $tip = 'doktor')
    {
        $this->id = $id;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->datumRodjenja = $datumRodjenja;
        $this->specijalizacija = $specijalizacija;
        $this->email = $email;
        $this->sifra = $sifra;
        $this->tip = $tip;
    }


    public static function add($ime, $prezime, $datumRodjenja, $specijalizacija, $email, $sifra, mysqli $conn){
        $q = "INSERT INTO doktor (ime, prezime, datumRodjenja, specijalizacija, email, sifra) VALUES ('$ime', '$prezime', '$datumRodjenja', '$specijalizacija', '$email', '$sifra')";
        return $conn->query($q);
    }

    public static function getAll(mysqli $conn){
        $doktori = "SELECT * FROM doktor";
        $result = $conn->query($doktori);
        return $result;
    }

    public static function deleteById($id, mysqli $conn){
        $q = "DELETE FROM doktor WHERE id=$id";
        return $conn->query($q);
    }

    public static function update($id, $ime, $prezime, $datumRodjenja, $specijalizacija, $email, $sifra, mysqli $conn){
        $q = "UPDATE doktor SET ime='$ime', prezime='$prezime', datumRodjenja='$datumRodjenja', specijalizacija='$specijalizacija', email='$email', sifra='$sifra' WHERE id=$id";
        return $conn->query($q);
    }

    
}

?>