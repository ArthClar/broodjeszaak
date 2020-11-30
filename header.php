<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BroodjeszaakPHP</title>
</head>

<body>
    <a href="homeBroodjesBar.php">Home</a> -
    <?php if (!isset($_SESSION["gebruiker"])) { ?>
        <a href="loginBroodjesBar.php">Login</a> -
        <a href="registrerenBroodjesBar.php">Registreren</a>
    <?php } else { ?>
        <a href="paginaBestellen.php">Bestellen</a> -
        <a href="logoutBroodjesBar.php">Logout</a>
    <?php } ?>