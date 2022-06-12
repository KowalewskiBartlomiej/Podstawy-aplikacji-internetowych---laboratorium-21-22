<?php 
	session_start();
	require ("funkcje.php");
	if(isSet($_POST["zaloguj"])) {
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
            header("Location: index.php");
            $_SESSION["zalogowany"] = 0;
        }
    }
?>