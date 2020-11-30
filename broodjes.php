<?php
//broodjes.php
declare(strict_types=1);
require_once "DBGegevens.php";
class Broodjes
{
    public function getNamenBroodjes(): array
    {
        $dbh = new PDO(
            DBGegevens::DB_STRING,
            DBGegevens::DB_USER,
            DBGegevens::DB_PWD
        );
        $resultSet = $dbh->query("select Naam from broodjes");
        $lijst = array();
        foreach ($resultSet as $rij) {
            $naam =$rij["Naam"];
            array_push($lijst, $naam);
        }
        $dbh = null;
        return $lijst;
    }

    public function getOmschrijvingenBroodjes(): array
    {
        $dbh = new PDO(
            DBGegevens::DB_STRING,
            DBGegevens::DB_USER,
            DBGegevens::DB_PWD
        );
        $resultSet = $dbh->query("select Omschrijving from broodjes");
        $lijst = array();
        foreach ($resultSet as $rij) {
            $omschrijving =$rij["Omschrijving"];
            array_push($lijst, $omschrijving);
        }
        $dbh = null;
        return $lijst;
    }

    public function getPrijzenBroodjes(): array
    {
        $dbh = new PDO(
            DBGegevens::DB_STRING,
            DBGegevens::DB_USER,
            DBGegevens::DB_PWD
        );
        $resultSet = $dbh->query("select Prijs from broodjes");
        $lijst = array();
        foreach ($resultSet as $rij) {
            $prijs =$rij["Prijs"];
            array_push($lijst, $prijs);
        }
        $dbh = null;
        return $lijst;
    }
    public function getLijstBroodjes(): array
    {
        $dbh = new PDO(
            DBGegevens::DB_STRING,
            DBGegevens::DB_USER,
            DBGegevens::DB_PWD
        );
        $resultSet = $dbh->query("select Naam, Omschrijving, Prijs from broodjes");
        $lijst = array();
        foreach ($resultSet as $rij) {
            $naam =$rij["Naam"] . ": " . $rij["Omschrijving"] . ", " . "€" . $rij["Prijs"];
            array_push($lijst, $naam);
        }
        $dbh = null;
        return $lijst;
    }
}
