<?php
    session_start();
    $link = mysqli_connect("localhost", "scott", "tiger", "instytut");
    if (!$link) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    if (isset($_POST['id_prac']) &&
        is_numeric($_POST['id_prac']) &&
        is_string($_POST['nazwisko']))
        {
            $sql = "INSERT INTO pracownicy(id_prac,nazwisko) VALUES(?,?)";
            $stmt = $link->prepare($sql);
            $stmt->bind_param("is", $_POST['id_prac'], $_POST['nazwisko']);
            try {
                $result = $stmt->execute();
                $_SESSION["error"] = "Dodano pracownika!";
                header("Location: form06_get.php");
            } catch (Exception $e) {
                if (!$result) {
                    $_SESSION["error"] = mysqli_error($link);
                    header("Location: form06_post.php");
                }
            } finally {
                $stmt->close();
            }
        }
    else {
        $_SESSION["error"] = "Podano nieprawidłowe dane!";
        header("Location: form06_post.php");
    }
    $link->close();
?>