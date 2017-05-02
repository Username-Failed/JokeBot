<?php
    if($_POST["user"] == "admin") {
        if($_POST["password"] == "password") {
            header("Location: changedatabase.php");
        } else {
            echo "Incorrect Password";
            exit();
        }
    } else {
        echo "Incorrect Username";
        exit();
    }
?>