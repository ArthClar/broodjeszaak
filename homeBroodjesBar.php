<?php
//broodjes.php
declare(strict_types=1);
require_once "broodjes.php";
?>

<?php
require_once("header.php");
?>
<h1>Welkom bij Broodjeszaak PHP</h1>
<h3>Geniet van een ruim assortiment aan verse broodjes die je als klant bij ons kan bestellen: </h3>
<?php
$bl = new Broodjes();
$naamBroodje = $bl->getNamenBroodjes();
$omschrijvingBroodje = $bl->getOmschrijvingenBroodjes();
$prijsBroodje = $bl->getPrijzenBroodjes();
?>
<table border=1>
    <tr style="text-align: left">
        <th>Naam:</th>
        <th>Omschrijving:</th>
        <th>Prijs</th>
    </tr>
    <?php
    for ($i = 0; $i < count($naamBroodje); $i++) {
        print("<tr>" . "<td>" . $naamBroodje[$i] . "</td>" .
            "<td>" . $omschrijvingBroodje[$i] . "</td>" .
            "<td>" . $prijsBroodje[$i] . "</td>" . "</tr>");
    }
    ?>
</table>
<h3>Bent u klant en u wilt bestellen? Klik dan op <a href="loginBroodjesBar.php">inloggen</a></h3>
<h3>Nog geen klant? <a href="registrerenBroodjesBar.php">Registreer</a></h3>
<?php
require_once("footer.php");
?>