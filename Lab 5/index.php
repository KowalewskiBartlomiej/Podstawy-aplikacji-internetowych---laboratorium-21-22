<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>

<body>
    <a href="user.php">User</a>
    <?php
    require("funkcje.php");
    echo "<h1> Nasz System </h1>";
    /*if(isSet($_POST["zaloguj"])) {
        //echo "Przesłany login: " . test_input($_POST["login"]) . "<br>";
        //echo "Przesłane hasło: " . test_input($_POST["haslo"]);
        if($osoba1->login == test_input($_POST["login"]) and $osoba1->haslo == test_input($_POST["haslo"])) {
            $_SESSION["zalogowany"] = 1;
            $_SESSION["zalogowanyImie"] = $osoba1->imieNazwisko;
            header("Location: user.php");
        }
        else if($osoba2->login == test_input($_POST["login"]) and $osoba2->haslo == test_input($_POST["haslo"])) {
            $_SESSION["zalogowany"] = 1;
            $_SESSION["zalogowanyImie"] = $osoba2->imieNazwisko;
            header("Location: user.php");
        } else {
            $_SESSION["zalogowany"] = 0;
        }
    }*/
    if (isset($_POST["wyloguj"])) {
        $_SESSION["zalogowany"] = 0;
        header("index.php");
    }

    if (isset($_COOKIE["ciasteczko"])) {
        echo "Wartość ciasteczka: " . $_COOKIE["ciasteczko"];
    }
    ?>
    <fieldset>
        <legend>Logowanie:</legend>
        <form action="logowanie.php" method="post">
            Login: <input type="text" name="login"><br>
            Haslo: <input type="text" name="haslo"><br>
            <input type="submit" name="zaloguj" value="Zaloguj">
        </form>
    </fieldset>

    <fieldset>
        <legend>Cookie:</legend>
        <form action="cookie.php" method="GET">
            Czas[s]: <input type=number name="czas" /><br />
            <input type=submit name="utworzCookie" value="utworzCookie" />
        </form>
    </fieldset>
</body>

</html>