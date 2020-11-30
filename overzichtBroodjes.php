<?php
//broodjes.php
declare(strict_types=1);
require_once "DBGegevens.php";
class Overzicht
{
    public function getOverzichtBestellingen(): array
    {
        $dbh = new PDO(
            DBGegevens::DB_STRING,
            DBGegevens::DB_USER,
            DBGegevens::DB_PWD
        );
        $resultSet = $dbh->query("select naamKlant, naamBroodje from bestellingen");
        $lijst = array();
        foreach ($resultSet as $rij) {
            $naam = $rij["naamKlant"] . " heeft een broodje " . $rij["naamBroodje"] . " besteld.";
            array_push($lijst, $naam);
        }
        $dbh = null;
        return $lijst;
    }
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset=utf-8>
    <title>Overzicht Broodjes</title>
</head>

<body>
    <?php
    $overzicht = new Overzicht();
    $lijstBestellingen = $overzicht->getOverzichtBestellingen();
    ?>
    <ul>
        <?php
        foreach ($lijstBestellingen as $bestelling) {
            print("<li>" . $bestelling . "</li>");
        }
        ?>
    </ul>
</body>

</html>