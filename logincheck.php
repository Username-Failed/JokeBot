<?php
    if($_POST["user"] == "admin") {
        if($_POST["password"] == "password") {
            session_start();
            $_SESSION['validToken'] = rand(1000, 9999);
            header("Location: changedatabase.php");
        } else {
            echo "Incorrect Username and/or Password";
            exit();
        }
    } else {
        echo "Incorrect Username and/or Password";
        exit();
    }
?>