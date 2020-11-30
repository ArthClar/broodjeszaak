<?php
session_start();
require_once("klant.php");
require_once("broodjes.php");
require_once("bestelling.php");
if (!isset($_SESSION["gebruiker"])) {
    header("Location: homeBroodjesBar.php");
    exit;
}
$gebruiker = unserialize($_SESSION["gebruiker"], ["Klant"]);
$naamGebruiker = $gebruiker->getNaam();
// Bestellen
if (isset($_POST["bestellen"])) {
    $bestelling = new Bestelling();
    $bestelling->setNaamKlant($naamGebruiker);
    $bestelling->setNaamBroodje($_POST["broodjes"]);
    $bestelling = $bestelling->bestellen();
    $_SESSION["bestelling"] = serialize($bestelling);
}
// einde van de pagina-specifieke logica
?>
<?php
// start van de HTML
require_once("header.php");
?>
<?php
if (isset($_SESSION["bestelling"])) {
    print("<h4> Je broodje is besteld. </h4>");
    unset($_SESSION["bestelling"]);
}
if (!isset($_SESSION["bestelling"])) {
?>
    <h2>Welkom, <?php echo $naamGebruiker ?></h2>
    <h4>Waar heb je vandaag zin in?</h4>
    <form method="POST" action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>">
        <label for="broodjes">Kies een broodje:</label>
        <select name="broodjes">
            <?php
            $bl = new Broodjes();
            $broodje = $bl->getLijstBroodjes();
            $naamBroodje = $bl->getNamenBroodjes();
            for ($i = 0; $i < count($naamBroodje); $i++) {
            ?>
                <option value="<?php print($naamBroodje[$i]) ?>"><?php print($broodje[$i]) ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Bestel" name="bestellen">
    </form>
<?php } ?>
<?php
// einde van de HTML
require_once("footer.php");
?>