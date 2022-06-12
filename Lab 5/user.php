<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>

<body>
    <a href="index.php">Index</a> <br>

    <?php
    require("funkcje.php");

    if (!isset($_SESSION["zalogowany"]) or $_SESSION["zalogowany"] != 1) {
        header("Location: index.php");
    } else {
        echo "Zalogowano" . "<br/>";
        echo "Imię i nazwisko: " . test_input($_SESSION["zalogowanyImie"]) . "<br>";
    }

    if (isset($_POST["upload"])) {
        $currentDir = getcwd();
        $uploadDirectory = "/pictures/";
        $fileName = $_FILES['myfile']['name'];
        $fileSize = $_FILES['myfile']['size'];
        $fileTmpName = $_FILES['myfile']['tmp_name'];
        $fileType = $_FILES['myfile']['type'];

        if ($fileName != "" and ($fileType == 'image/png' or $fileType == 'image/jpeg'
            or $fileType == 'image/JPEG' or $fileType == 'image/PNG')) {
            $uploadPath = $currentDir . $uploadDirectory . $fileName;
            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                echo "<img src='pictures\img.png' alt='picture'>";
            }
        }
    }
    ?>

    <form action="user.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Wczytywanie obrazka:</legend>
            <input name="myfile" type="file">
            <input type="submit" value="Upload" name="upload">
        </fieldset>
    </form>

    <fieldset>
        <legend>Wylogowanie:</legend>
        <form action="index.php" method="POST">
            <input type="submit" value="Wyloguj" name="wyloguj">
        </form>
    </fieldset>

</body>

</html>