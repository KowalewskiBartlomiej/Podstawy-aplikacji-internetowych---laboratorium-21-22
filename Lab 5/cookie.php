<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>

<body>
    <?php
    require("funkcje.php");
    if(isSet($_GET["utworzCookie"])){
        setcookie("ciasteczko", $_GET["czas"], time() + 10, "/");
        echo "Dodano ciasteczko" . "<br/>";
    }
    ?>
    <a href="index.php">Wstecz</a>
</body>

</html>