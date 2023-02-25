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
        $q = "SELECT pacijent.id, pacijent.ime, pacijent.prezime, pacijent.datumRodjenja, pacijent.email, pacijent.sifra, CONCAT(doktor.ime, ' ', doktor.prezime) as doktor_punoIme FROM pacijent INNER JOIN doktor ON pacijent.doktor_id = doktor.id;";
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

    public static function update($id, $ime, $prezime, $datumRodjenja, $email, $sifra, mysqli $conn){
        $q = "UPDATE pacijent SET ime='$ime', prezime='$prezime', datumRodjenja='$datumRodjenja', email='$email', sifra='$sifra' WHERE id=$id";
        return $conn->query($q);
    }

}