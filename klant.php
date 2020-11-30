<?php
require_once "DBGegevens.php";
require_once "errorBroodjesBar.php";
class Klant
{
    private $id;
    private $naam;
    private $email;
    private $wachtwoord;
    public function __construct(
        $cid = null,
        $cnaam = null,
        $cemail = null,
        $cwachtwoord = null
    ) {
        $this->id = $cid;
        $this->naam = $cnaam;
        $this->email = $cemail;
        $this->wachtwoord = $cwachtwoord;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getNaam()
    {
        return $this->naam;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getWachtwoord()
    {
        return $this->wachtwoord;
    }
    public function setNaam($naam)
    {
        $this->naam = $naam;
    }
    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new OngeldigEmailadresException();
        }
        $this->email = $email;
    }
    public function setWachtwoord($wachtwoord, $herhaalwachtwoord)
    {
        if ($wachtwoord !== $herhaalwachtwoord) {
            throw new WachtwoordenKomenNietOvereenException();
        }
        $this->wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
    }
    public function emailReedsInGebruik()
    {
        $dbh = new PDO(
            DBGegevens::DB_STRING,
            DBGegevens::DB_USER,
            DBGegevens::DB_PWD
        );
        $stmt = $dbh->prepare("SELECT * FROM klanten WHERE email = :email");
        $stmt->bindValue(":email", $this->email);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        $dbh = null;
        return $rowCount;
    }
    public function register()
    {
        $rowCount = $this->emailReedsInGebruik();
        if ($rowCount > 0) {
            throw new GebruikerBestaatAlException();
        }
        $dbh = new PDO(
            DBGegevens::DB_STRING,
            DBGegevens::DB_USER,
            DBGegevens::DB_PWD
        );
        $stmt = $dbh->prepare("INSERT INTO klanten (naamKlant, email, wachtwoord) VALUES
(:naamKlant, :email, :wachtwoord)");
        $stmt->bindValue(":naamKlant", $this->naam);
        $stmt->bindValue(":email", $this->email);
        $stmt->bindValue(":wachtwoord", $this->wachtwoord);
        $stmt->execute();
        $laatsteNieuweId = $dbh->lastInsertId();
        $dbh = null;
        $this->id = $laatsteNieuweId;
        return $this;
    }
    public function login()
    {
        $rowCount = $this->emailReedsInGebruik();
        if ($rowCount == 0) {
            throw new GebruikerBestaatNietException();
        }
        $dbh = new PDO(
            DBGegevens::DB_STRING,
            DBGegevens::DB_USER,
            DBGegevens::DB_PWD
        );
        $stmt = $dbh->prepare("SELECT id, naamKlant, wachtwoord FROM klanten WHERE email =
:email");
        $stmt->bindValue(":email", $this->email);
        $stmt->execute();
        $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
        $isWachtwoordCorrect = password_verify(
            $this->wachtwoord,
            $resultSet["wachtwoord"]
        );
        if (!$isWachtwoordCorrect) {
            throw new WachtwoordIncorrectException();
        }
        $this->naam = $resultSet["naamKlant"];
        $this->id = $resultSet["id"];
        $dbh = null;
        return $this;
    }
}
